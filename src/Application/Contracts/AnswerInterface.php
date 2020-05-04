<?php

namespace Laravel\YandexSpeller\Application\Contracts;

/**
 * Interface AnswerInterface
 * @package Laravel\YandexSpeller\Application\Contracts
 */
interface AnswerInterface
{
    public function getSourceString(): string;
    public function getFirstCorrectedString(): string;
    public function getCorrectedArray(): array;
    public function isStringCorrected(): bool;
}