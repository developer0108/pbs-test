<?php

namespace App\Services;

class ExchangeService
{
    public function getExchangeRatesForCountryCodes(array $countryCodes)
    {
        $baseUrl = $_ENV["OPENEXCHANGE_BASEURL"];
        $appKey = $_ENV["OPENEXCHANGE_APPID"];
        $codesParam = implode(",", $countryCodes);
        $curlSession = curl_init($baseUrl . $appKey . "&symbols=" . $codesParam);

        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, 1);

        $jsonResult = curl_exec($curlSession);
        $decodedResult = json_decode($jsonResult, true);

        //todo error handling

        return $decodedResult["rates"];
    }
}
