<?php


namespace Laravel\YandexSpeller;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/yandex-speller.php');
    }
 }