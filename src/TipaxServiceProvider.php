<?php

namespace AmirVahedix\Tipax;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AmirVahedix\Tipax\Commands\TipaxCommand;

class TipaxServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-tipax')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_tipax_table')
            ->hasCommand(TipaxCommand::class);
    }
}
