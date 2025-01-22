<?php

namespace Quebecstudio\SafeName\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class SafeName implements ValidationRule
{
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $exactWords = config('safename.exact', []);
        $partialWords = config('safename.partial', []);

        $value = strtolower($value);

        if (in_array($value, array_map('strtolower', $exactWords))) {
            $fail(trans('safename::validation.exact'));
            return;
        }

        foreach ($partialWords as $word) {
            if (str_contains($value, strtolower($word))) {
                $fail(trans('safename::validation.partial'));
                return;
            }
        }
    }
}
