<?php

namespace VendorName\YourPackageName;

use Porifa\LaravelPackageKit\Package;
use Porifa\LaravelPackageKit\PackageServiceProvider;
use VendorName\YourPackageName\Console\Commands\YourPackageNameCommand;

class YourPackageNameServiceProvider extends PackageServiceProvider
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
            ->hasCommands(YourPackageNameCommand::class);
    }
}
