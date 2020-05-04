<?php

namespace Laravel\YandexSpeller\Application\Contracts;

interface YandexSpellerInterface
{
    public function getAnswerByString(string $string): ?AnswerInterface;
}