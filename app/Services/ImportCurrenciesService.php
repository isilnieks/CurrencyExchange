<?php

namespace App\Services;

use App\Models\Currency;

class ImportCurrenciesService
{
    public function import(): void
    {
        $xmlObject = simplexml_load_string(file_get_contents('https://www.bank.lv/vk/ecb.xml'));
        $json = json_encode($xmlObject);
        $rates = json_decode($json, TRUE);

        foreach ($rates['Currencies']['Currency'] as $rate) {

            Currency::updateOrCreate(
                ['symbol' => $rate['ID']],
                ['rate' => (int)((float)$rate['Rate'] * 100000)]
            );
        }
    }
}
