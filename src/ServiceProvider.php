<?php

namespace Laravel\YandexSpeller;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        parent::register();
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/yandex-speller.php');
        $this->publishes([
            __DIR__ . '/../config/yandexspeller.php' => config_path('yandexspeller.php'),
            'yandexspeller-config'
        ]);
        $this->mergeConfigFrom(__DIR__ . '/../config/yandexspeller.php', 'yandexspeller');
    }
 }