<?php

namespace VelocitySportsLabs\DataCenter\Tests;

use Dotenv\Dotenv;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;
use VelocitySportsLabs\DataCenter\DataCenterServiceProvider;

class TestCase extends Orchestra
{
    use WithWorkbench;

    public static $latestResponse;

    protected function setUp(): void
    {
        $this->loadEnvironmentVariables();

        parent::setUp();
    }

    protected function loadEnvironmentVariables(): void
    {
        if ( ! file_exists(__DIR__ . '/../.env')) {
            return;
        }

        $dotEnv = Dotenv::createImmutable(__DIR__ . '/..');

        $dotEnv->load();
    }

    protected function getPackageProviders($app)
    {
        return [
            DataCenterServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('app.key', '6rE9Nz59bGRbeMATftriyQjrpdsfF7Dc43OQdam');
    }
}
