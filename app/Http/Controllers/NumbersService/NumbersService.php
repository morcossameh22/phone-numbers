<?php

namespace App\Http\Controllers\NumbersService;

use Illuminate\Http\Request;

interface NumbersService
{
  public function fetchNumbers(Request $request);
}
