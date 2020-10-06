<?php

namespace Laravel\YandexSpeller\Tests;

class BlanksAndMocksAndConstants
{
    public static function getValidTypoString(): string
    {
        return 'temperaturi';
    }

    public static function getValidNonEmptyCorrectedStringArray(): array
    {
        return ['temperature'];
    }

    public static function getValidEmptyCorrectedStringArray(): array
    {
        return [];
    }
}
