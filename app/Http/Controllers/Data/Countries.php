<?php

namespace App\Http\Controllers\Data;

class Countries
{
    public $countries = [
        "Cameroon" => [
            "prefix" => '\(237\)',
            "fullRegex" => '\(237\)\ ?[2368]\d{7,8}$'
        ],
        "Ethiopia" => [
            "prefix" => '\(251\)',
            "fullRegex" => '\(251\)\ ?[1-59]\d{8}$'
        ],
        "Morocco" => [
            "prefix" => '\(212\)',
            "fullRegex" => '\(212\)\ ?[5-9]\d{8}$'
        ],
        "Mozambique" => [
            "prefix" => '\(258\)',
            "fullRegex" => '\(258\)\ ?[28]\d{7,8}$'
        ],
        "Uganda" => [
            "prefix" => '\(256\)',
            "fullRegex" => '\(256\)\ ?\d{9}$'
        ],
    ];
}
