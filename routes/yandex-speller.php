<?php
use Illuminate\Support\Facades\Route;
use Laravel\YandexSpeller\Controller\YandexSpellerController;

Route::prefix('api')->middleware('api')->group(function() {
    Route::get('/yandex-speller/{sourceString?}', [YandexSpellerController::class, 'index']);
    Route::match(['post', 'put', 'patch', 'delete', 'options'], '/yandex-speller/{sourceString?}', [
        YandexSpellerController::class, 'incorrectMethod']
    );
});