<?php

namespace CodeblogPro\YandexSpeller\Application\Services\YandexSpeller\Resolvers;

class CurlRequestContentResolver
{
    /**
     * @param string $url
     * @param array $postData
     * @param array $optionsList
     * @return array
     */
    public function handle(string $url, array $postData = [], array $optionsList = []): array
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);

        if (!empty($postData)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postData));
        }

        if (!empty($optionsList)) {
            foreach ($optionsList as $optionKey => $optionValue) {
                curl_setopt($curl, $optionKey, $optionValue);
            }
        }

        $result = [
            'result' => curl_exec($curl),
            'errno' => curl_errno($curl),
            'error' => curl_error($curl),
            'http_code' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
        ];

        curl_close($curl);

        return $result;
    }
}
