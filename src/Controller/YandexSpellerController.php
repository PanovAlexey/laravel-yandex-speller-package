<?php

namespace CodeblogPro\YandexSpeller\Controller;

use Illuminate\Routing\Controller;
use CodeblogPro\YandexSpeller\Application\Services\YandexSpeller\YandexSpellerService;

class YandexSpellerController extends Controller
{
    public function index(?string $sourceString = '')
    {
        if (!empty($sourceString)) {
            try {
                $yandexSpellerService = resolve(YandexSpellerService::class);
                $yandexSpellerAnswer = $yandexSpellerService->getAnswerByString($sourceString);
            } catch (\Throwable $throwable) {
                $yandexSpellerAnswer = null;
            }

            if (empty($yandexSpellerAnswer)) {
                $result = [
                    'status' => 500,
                    'body' => ['error' => ['message' => 'Internal error. Please, try again later']]
                ];
            } else {
                $result = [
                    'status' => 200,
                    'body' => [
                        'source_string' => $yandexSpellerAnswer->getSourceString(),
                        'corrected_array' => $yandexSpellerAnswer->getCorrectedArray(),
                    ]
                ];
            }
        } else {
            $result = [
                'status' => 400,
                'body' => ['error' => ['message' => 'Invalid string']]
            ];
        }

        return response()->json($result['body'], $result['status']);
    }

    public function incorrectMethod()
    {
        $result = [
            'status' => 405,
            'body' => ['error' => ['message' => 'Method Not Allowed']]
        ];

        return response()->json($result['body'], $result['status']);
    }
}
