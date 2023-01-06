<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $allFiles = app_path('Helpers/Helpers.php');
        require_once $allFiles;
        // foreach($allFiles as $k => $helper){
        //     require_once $helper;
        // }
    }
}
