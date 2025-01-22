<?php

declare(strict_types=1);

namespace Quebecstudio\SafeName\Tests;

use Illuminate\Support\Facades\Validator;
use Quebecstudio\SafeName\Rules\SafeName;

test('it validates safe names', function (): void {
    $validator = Validator::make(
        ['username' => 'john_doe'],
        ['username' => new SafeName()]
    );
    expect($validator->passes())->toBeTrue();

    $validator = Validator::make(
        ['username' => 'admin'],
        ['username' => new SafeName()]
    );
    expect($validator->fails())->toBeTrue();

    $validator = Validator::make(
        ['username' => 'ADMIN'],
        ['username' => new SafeName()]
    );
    expect($validator->fails())->toBeTrue();
})->uses(TestCase::class);
