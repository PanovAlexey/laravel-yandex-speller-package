<?php

namespace Laravel\YandexSpeller;

use Laravel\YandexSpeller\Application\Contracts\AnswerInterface;
use Laravel\YandexSpeller\Application\Contracts\YandexSpellerInterface;
use Laravel\YandexSpeller\Application\Models\Answer;
use Laravel\YandexSpeller\Application\Services\YandexSpeller\YandexSpellerService;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        parent::register();

        $this->app->bind(YandexSpellerInterface::class, YandexSpellerService::class);
        $this->app->bind(AnswerInterface::class, Answer::class);
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