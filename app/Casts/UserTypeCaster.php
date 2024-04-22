<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\Log;

class UserTypeCaster implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return ['admin', 'smm', 'client'][$value];
    }

    
    public function set($model, string $key, $value, array $attributes)
    {
        //Log::info("UserTypeCaster set method received value: $value");

        $intValue = $value; // Assuming the integer value is already correct
        
        if (!in_array($intValue, [0, 1, 2])) {
            Log::error("Invalid user type value received: $value");
            $intValue = 0; // Default to the first user type (admin)
        }

        //Log::info("UserTypeCaster set method converted value to integer: $intValue");

        return $intValue;
    }
}