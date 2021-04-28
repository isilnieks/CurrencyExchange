<?php

namespace App\Http\Controllers;

use App\Services\ImportCurrenciesService;
use App\Services\ShowCurrenciesService;
use Illuminate\Http\Request;


class AppController extends Controller
{

    private $importCurrenciesService;
    private $showCurrencyService;


    public function __construct(ImportCurrenciesService $importCurrenciesService)
    {
        $this->importCurrenciesService = $importCurrenciesService;
        $this->showCurrencyService = new ShowCurrenciesService();
    }

    public function import(): void
    {
        $this->importCurrenciesService->import();
    }

    public function show()
    {
        $currencies = $this->showCurrencyService->show();
        return view('index',
        [
            'currencies' => $currencies
        ]);
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'symbol' => 'required',
            'amount' => 'required|numeric|gt:0'
        ]);

        $this->import();
        $convert = $this->showCurrencyService->convert($request->symbol, $request->amount);

        session()->flash('results', [$request->symbol, $convert]);

        return redirect('/');
    }

}
