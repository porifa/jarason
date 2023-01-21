<?php

namespace Porifa\Jarason;

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\PackageServiceProvider;
use Porifa\Jarason\Console\Commands\JarasonCommand;

class JarasonServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/porifa/laravel-package-kit
         */
        $package
            ->name('laravel-cool-package')
            ->hasConfigFiles()
            ->hasMigrations('create_cool_package_table')
            ->hasCommands(JarasonCommand::class);
    }
}
