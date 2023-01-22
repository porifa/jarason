<?php

namespace Porifa\Jarason;

use Porifa\Jarason\Console\Commands\JarasonInstallCommand;
use Porifa\Jarason\Console\Commands\JarasonMakeCommand;
use Porifa\Jarason\Console\Commands\MakeJarasonCommand;
use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\PackageServiceProvider;

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
            ->name('jarason')
            ->hasConfigFiles()
            ->hasCommands([
                JarasonMakeCommand::class,
                MakeJarasonCommand::class,
                JarasonInstallCommand::class,
            ]);
    }
}
