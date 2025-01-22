<?php

declare(strict_types=1);

namespace Quebecstudio\SafeName\Tests; // DOIT correspondre au chemin du fichier

use Orchestra\Testbench\TestCase as Orchestra;
use Quebecstudio\SafeName\SafeNameServiceProvider;

final class TestCase extends Orchestra
{
    public function defineEnvironment($app): void
    {
        $app['config']->set('safename.words', ['admin', 'root']);
    }

    protected function getPackageProviders($app): array
    {
        return [
            SafeNameServiceProvider::class,
        ];
    }
}
