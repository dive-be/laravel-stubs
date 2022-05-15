<?php declare(strict_types=1);

namespace Dive\Stubs;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

final class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }
    }

    private function registerCommands()
    {
        $this->commands([
            PublishStubsCommand::class,
        ]);
    }
}
