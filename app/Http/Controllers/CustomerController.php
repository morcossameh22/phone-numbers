<?php

namespace App\Http\Controllers;

use App\Http\Controllers\NumbersService\Impl\NumbersServiceImpl;
use App\Http\Controllers\Validation\Impl\ValidatorImpl;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getNumbers(Request $request) {
        $validator = new ValidatorImpl();
        $validRequest = $validator->validate($request);
        if (!$validRequest) {
            return response("Request data is not valid", 400);
        }

        $numbersService = new NumbersServiceImpl();

        return $numbersService->fetchNumbers($request);
    }
}
