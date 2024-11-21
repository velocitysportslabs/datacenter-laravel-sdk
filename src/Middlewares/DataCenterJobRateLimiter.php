<?php

namespace VelocitySportsLabs\DataCenter\Middlewares;

use Closure;
use Illuminate\Support\Facades\Cache;
use VelocitySportsLabs\DataCenter\Exceptions\RateLimitExceededException;

class DataCenterJobRateLimiter
{
    /**
     * Process the queued job.
     *
     * @param  Closure(object): void  $next
     */
    public function handle(object $job, Closure $next): void
    {
        /** @var string $ratelimitKey */
        $ratelimitKey = config('vsl-datacenter.rate_limit_key');

        /** @var int|null */
        $timestamp = Cache::get($ratelimitKey);

        if (null !== $timestamp) {
            $job->release($timestamp - time()); // @phpstan-ignore-line

            return;
        }

        try {
            $next($job);
        } catch (RateLimitExceededException $exception) {
            $secondsRemaining = $exception->rateLimitRetryAfter;

            Cache::put(
                $ratelimitKey,
                now()->addSeconds($secondsRemaining)->timestamp,
                $secondsRemaining,
            );

            $job->release($secondsRemaining); // @phpstan-ignore-line

            return;
        }
    }
}
