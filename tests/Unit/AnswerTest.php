<?php

declare(strict_types=1);

namespace Laravel\YandexSpeller\Tests\Unit;

use Laravel\YandexSpeller\Application\Models\Answer;
use Laravel\YandexSpeller\Tests\BlanksAndMocksAndConstants;

class AnswerTest extends \PHPUnit\Framework\TestCase
{
    public function testConstructWithValidInputDataToAnswerObjectCreated(): void
    {
        $answer = new Answer(
            BlanksAndMocksAndConstants::getValidTypoString(),
            BlanksAndMocksAndConstants::getValidNonEmptyCorrectedStringArray(),
        );

        $this->assertInstanceOf(Answer::class, $answer);
    }

    public function testCheckMethodGetSourceStringToGetTheOriginalString(): void
    {
        $inputString = BlanksAndMocksAndConstants::getValidTypoString();

        $answer = new Answer(
            $inputString,
            BlanksAndMocksAndConstants::getValidNonEmptyCorrectedStringArray(),
        );

        $this->assertEquals($answer->getSourceString(), $inputString);
        $this->assertInstanceOf(Answer::class, $answer);
    }

    public function testCheckMethodGetCorrectedArrayToGetArrayEquivalentForPassedOne(): void
    {
        $correctedStringArray = BlanksAndMocksAndConstants::getValidNonEmptyCorrectedStringArray();

        $answer = new Answer(
            BlanksAndMocksAndConstants::getValidTypoString(),
            $correctedStringArray
        );

        $this->assertEquals($answer->getCorrectedArray(), $correctedStringArray);
    }

    public function testCheckMethodGetFirstCorrectedStringToGetFirstStringFromNonEmptyCorrectedArray(): void
    {
        $correctedStringArray = BlanksAndMocksAndConstants::getValidNonEmptyCorrectedStringArray();

        $answer = new Answer(
            BlanksAndMocksAndConstants::getValidTypoString(),
            $correctedStringArray
        );

        $this->assertEquals($answer->getFirstCorrectedString(), $correctedStringArray[0]);
    }

    public function testCheckMethodGetFirstCorrectedStringToGetEmptyStringFromEmptyCorrectedArray(): void
    {
        $correctedStringArray = BlanksAndMocksAndConstants::getValidEmptyCorrectedStringArray();

        $answer = new Answer(
            BlanksAndMocksAndConstants::getValidTypoString(),
            $correctedStringArray
        );

        $this->assertEquals($answer->getFirstCorrectedString(), '');
    }

    public function testCheckMethodIsStringCorrectedToGetFalseForNonCorrectedCase(): void
    {
        $answer = new Answer(
            BlanksAndMocksAndConstants::getValidTypoString(),
            BlanksAndMocksAndConstants::getValidEmptyCorrectedStringArray(),
        );

        $this->assertEquals($answer->isStringCorrected(), false);
    }

    public function testCheckMethodIsStringCorrectedToGetTrueForCorrectedCase(): void
    {
        $answer = new Answer(
            BlanksAndMocksAndConstants::getValidTypoString(),
            BlanksAndMocksAndConstants::getValidNonEmptyCorrectedStringArray()
        );

        $this->assertEquals($answer->isStringCorrected(), true);
    }
}
