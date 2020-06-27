<?php

namespace Laravel\YandexSpeller\Application\Services\YandexSpeller;

use Laravel\YandexSpeller\Application\Contracts\AnswerInterface;
use Laravel\YandexSpeller\Application\Contracts\YandexSpellerInterface;
use Laravel\YandexSpeller\Application\Models\Answer;
use Laravel\YandexSpeller\Application\Services\YandexSpeller\Resolvers\CurlRequestContentResolver;

class YandexSpellerService implements YandexSpellerInterface
{
    public function getAnswerByString(string $sourceString): ?AnswerInterface
    {
        $yandexSpellerRequestResolver = resolve(CurlRequestContentResolver::class);
        $curlContent = $yandexSpellerRequestResolver->handle(
            config('yandexspeller.yandex_speller_api_url'),
            [
                'text' => $sourceString
            ],
            [
                CURLOPT_TIMEOUT => config('yandexspeller.yandex_speller_curlopt_timeout'),
                CURLOPT_CONNECTTIMEOUT => config('yandexspeller.yandex_speller_curlopt_connecttimeout'),
            ]
        );

        $correctedStringArray = [];

        if (empty($curlContent['result']) || (bool)$curlContent['result'] === false) {
            return null;
        } else {
            $curlContentResult = json_decode($curlContent['result']);
            $spellResult = (is_array($curlContentResult)) ? current($curlContentResult) : [];
            $correctionMap = [];

            // @ToDo: Now the first correction is taken for each word. It is necessary to give the functional
            // of obtaining all possible permutations. Accordingly, $resultText will become an array
            foreach ($spellResult as $correction) {
                if (!isset($correction->word) || empty($correction->s) || current($correction->s) === $sourceString) {
                    continue;
                }

                $correctionMap[$correction->word] = current($correction->s);
            }

            if (!empty($correctionMap)) {
                $correctedStringArray[] = str_replace(
                    array_keys($correctionMap),
                    array_values($correctionMap),
                    $sourceString
                );
            }
        }

        return resolve(
            Answer::class,
            ['string' => $sourceString, 'correctedStringArray' => $correctedStringArray]
        );
    }
}
