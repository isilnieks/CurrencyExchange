<?php

namespace App\Services;

use App\Models\Currency;

class ShowCurrenciesService
{
    public function show()
    {
        return Currency::all();
    }

    public function convert(string $currency, int $amount)
    {
        $currency = Currency::where('symbol', '=', $currency)->firstOrFail();
        return $currency->rate * $amount;
    }
}
