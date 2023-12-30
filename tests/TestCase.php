<?php

namespace FocusSportsLabs\FslDataCenter\Tests;

use Dotenv\Dotenv;
use FocusSportsLabs\FslDataCenter\FSLDataCenterServiceProvider;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use WithWorkbench;

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
            FSLDataCenterServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('app.key', '6rE9Nz59bGRbeMATftriyQjrpdsfF7Dc43OQdam');
    }
}
