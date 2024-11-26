<?php

namespace Devzihad\EnvEditor\Facades;

use Illuminate\Support\Facades\Facade;

class EnvEditorFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'env-editor';
    }
}
