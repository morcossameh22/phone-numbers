<?php

namespace App\Http\Controllers\Validation;

use Illuminate\Http\Request;

interface Validator
{
  public function validate(Request $request): bool;
}
