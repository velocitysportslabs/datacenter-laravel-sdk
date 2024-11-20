<?php

namespace VelocitySportsLabs\DataCenter;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7\HttpFactory as GuzzleHttpFactory;
use Illuminate\Support\ServiceProvider;
use VelocitySportsLabs\DataCenter\HttpClient\Builder;
use VelocitySportsLabs\DataCenter\HttpClient\Options;

class DataCenterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('vsl-datacenter', function ($app) {
            $options = $this->createOptions($app['config']->get('vsl-datacenter'));

            $builder = $this->createBuilder();

            return new Client($options, $builder);
        });

        $this->app->alias('vsl-datacenter', Client::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->setupConfig();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'vsl-datacenter',
        ];
    }

    protected function createOptions(array $config): Options
    {
        return new Options(array_filter([
            'uri' => $config['api_base'],
            'user_agent' => $config['user_agent'],
            'origin' => $config['origin'],
            'auth_token' => $config['api_key'],
        ]));
    }

    protected function createBuilder(): Builder
    {
        $psrFactory = new GuzzleHttpFactory();

        return new Builder(
            new GuzzleHttpClient(['connect_timeout' => 10, 'timeout' => 30]),
            $psrFactory,
            $psrFactory,
        );
    }

    protected function setupConfig(): void
    {
        $this->publishes([
            __DIR__ . '/../config/vsl-datacenter.php' => config_path('vsl-datacenter.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/../config/vsl-datacenter.php', 'vsl-datacenter');
    }
}
