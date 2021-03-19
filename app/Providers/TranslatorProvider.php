<?php

namespace App\Providers;

use App\Exporter\CSVExporter;
use App\Exporter\Exporter;
use App\Exporter\Translator;
use Illuminate\Support\ServiceProvider;

class TranslatorProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Exporter::class, function ($app){
            return new CSVExporter(new Translator("string"));
        });
    }
}
