<?php

namespace Devzihad\EnvEditor;

use Illuminate\Support\ServiceProvider;

class EnvEditorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('env-editor', function () {
            return new EnvEditor();
        });
    }
}
