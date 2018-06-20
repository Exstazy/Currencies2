<?php

namespace App\Http\Controllers;

use App\Currencies;
use Illuminate\Routing\Controller as BaseController;
class CurrencyController extends BaseController
{
    public function index()
    {
        $search = request()->get('search');

        $currencies = (new Currencies())->where('name', 'like', '%' . $search . '%')->paginate(20);

        return view('currencies', ['currencies' => $currencies]);
    }

    public function search()
    {

    }
}
