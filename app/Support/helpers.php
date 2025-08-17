<?php



if (! function_exists('docs')) {
    function docs()
    {
        return app('docs'); // returns the bound service directly
    }
}
