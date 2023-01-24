<?php

namespace App\Http\Controllers\Validation\Impl;

use App\Http\Controllers\Data\Countries;
use App\Http\Controllers\Validation\Validator;
use Illuminate\Http\Request;

class ValidatorImpl implements Validator
{
  public function validate(Request $request): bool
  {
    $countryValidation = $this->validateCountryField($request->input('country'));
    $validValidation = $this->validateValidField($request->input('valid'));
    return $countryValidation && $validValidation;
  }

  private function validateCountryField($country) {
    if (!$country) {
      return false;
    }

    $countries = (new Countries)->countries;
    foreach ($countries as $key => $value) {
      if ($country === $key) {
        return true;
      }
    }
    return false;
  }

  private function validateValidField($valid) {
    return $valid === true || $valid === false || $valid === 'true' || $valid === 'false';
  }
}
