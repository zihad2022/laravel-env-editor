<?php

namespace Devzihad\EnvEditor;

use Illuminate\Support\Facades\File;

class EnvEditor
{
    protected $envPath;

    public function __construct()
    {
        $this->envPath = base_path('.env');
    }

    public function get($key)
    {
        return env($key);
    }

    public function set($key, $value)
    {
        $contents = File::get($this->envPath);
        $pattern = "/^$key=.*$/m";
        $replacement = "$key=$value";

        if (preg_match($pattern, $contents)) {
            $contents = preg_replace($pattern, $replacement, $contents);
        } else {
            $contents .= PHP_EOL."$replacement";
        }

        File::put($this->envPath, $contents);
    }

    public function delete($key)
    {
        $contents = File::get($this->envPath);
        $pattern = "/^$key=.*$/m";
        $contents = preg_replace($pattern, '', $contents);

        File::put($this->envPath, $contents);
    }
}
