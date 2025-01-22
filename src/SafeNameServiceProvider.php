<?php

declare(strict_types=1);

namespace Quebecstudio\SafeName;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

final class SafeNameServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'safename');

        $this->publishes([
            __DIR__.'/../config/safename.php' => $this->app->configPath('safename.php'),
            __DIR__.'/../resources/lang' => $this->app->langPath('vendor/safename'),
        ], 'safename');

        Validator::extend('safe_name', function ($attribute, $value, $parameters, $validator) {
            $reservedWords = $this->app['config']->get('safename.words', []);

            return ! in_array(mb_strtolower($value), array_map('strtolower', $reservedWords));
        });

        // Add custom message
        Validator::replacer('safe_name', function ($message, $attribute, $rule, $parameters) {
            return __('validation.safe_name', ['attribute' => $attribute]);
        });
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/safename.php', 'safename'
        );
    }
}
