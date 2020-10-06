<?php

namespace CodeblogPro\YandexSpeller;

use CodeblogPro\YandexSpeller\Application\Contracts\AnswerInterface;
use CodeblogPro\YandexSpeller\Application\Contracts\YandexSpellerInterface;
use CodeblogPro\YandexSpeller\Application\Models\Answer;
use CodeblogPro\YandexSpeller\Application\Services\YandexSpeller\YandexSpellerService;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        parent::register();

        $this->app->bind(YandexSpellerInterface::class, YandexSpellerService::class);
        $this->app->bind(AnswerInterface::class, Answer::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/yandex-speller.php');
        $this->publishes([
            __DIR__ . '/../config/yandexspeller.php' => config_path('yandexspeller.php'),
            'yandexspeller-config'
        ]);
        $this->mergeConfigFrom(__DIR__ . '/../config/yandexspeller.php', 'yandexspeller');
    }
}
