<?php

namespace App\Http\Controllers\NumbersService\Impl;

use App\Http\Controllers\Data\Countries;
use App\Http\Controllers\NumbersService\NumbersService;
use App\Models\Customer;
use Illuminate\Http\Request;

class NumbersServiceImpl implements NumbersService
{
  public function fetchNumbers(Request $request)
  {
    $country = $request->input('country');
    $countries = (new Countries)->countries;
    $countryObj = $countries[$country];

    $valid = $request->input('valid');

    $res = Customer::where('phone', 'regexp', $valid ? $countryObj["fullRegex"] : $countryObj["prefix"]);
    if (!$valid) {
        $res->whereNotIn(
            'id',
            Customer::select('id')
                ->where('phone', 'regexp', $countryObj["fullRegex"])
                ->get()
                ->toArray()
        );
    }
    return $res->paginate(5);
  }
}
