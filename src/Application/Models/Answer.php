<?php

namespace Laravel\YandexSpeller\Application\Models;

use Laravel\YandexSpeller\Application\Contracts\AnswerInterface;

class Answer implements AnswerInterface
{
    private string $sourceString;
    private array $correctedStringArray = [];

    // @ToDo: add the ability to set the language for error correction
    public function __construct(string $string, array $correctedStringArray)
    {
        $this->sourceString = trim($string);

        foreach ($correctedStringArray as $correctedString) {
            if (empty(trim($correctedString))) {
                continue;
            }

            $this->correctedStringArray[] = $correctedString;
        }
    }

    public function getSourceString(): string
    {
        return $this->sourceString;
    }

    public function getFirstCorrectedString(): string
    {
        return (empty($this->isStringCorrected())) ? '' : reset($this->correctedStringArray);
    }

    public function getCorrectedArray(): array
    {
        return $this->correctedStringArray;
    }

    public function isStringCorrected(): bool
    {
        return (empty($this->correctedStringArray) === false);
    }
}