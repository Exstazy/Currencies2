<?php

namespace App\Services;

use Nathanmac\Utilities\Parser\Parser;

class CurrencyService
{
    /**
     * @return array
     */
    public function parseFromXMLBank(): array
    {
        $link = 'https://www.bank.lv/vk/ecb_rss.xml';

        $xml = (new Parser())->xml(file_get_contents($link));

        // Get last currencies from given xml file
        $lastCurrencies = array_pop($xml['channel']['item'])['description'];

        // Split currencies, because all currencies is given on string
        $splitCurrencies = explode(' ', $lastCurrencies);

        // Merge currencies, ['name', 'rate']
        $currencies = array_chunk($splitCurrencies, 2);

        // Remove last record, because there is empty value from array_chunk
        array_pop($currencies);

        return $currencies;
    }
}