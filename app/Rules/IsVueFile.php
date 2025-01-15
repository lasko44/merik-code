<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;
use Illuminate\Translation\PotentiallyTranslatedString;

class IsVueFile implements ValidationRule
{
    private const VUE_EXTENSION = '.vue';
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!Str::contains($value, self::VUE_EXTENSION)){
            $fail('The :attribute must have a vue file extension.');
        }
    }
}
