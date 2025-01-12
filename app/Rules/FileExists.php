<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\File;
use Illuminate\Translation\PotentiallyTranslatedString;

class FileExists implements ValidationRule
{

    private const PATH = "../resources/js/Shared/";

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!File::exists(self::PATH.$value)){
            $fail('The :attribute file does not exist in the application');
        }
    }

}
