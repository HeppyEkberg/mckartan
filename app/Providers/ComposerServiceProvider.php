<?php

namespace App\Providers;

use App\Http\ViewComposers\NavbarViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('layouts.partials.navbar', NavbarViewComposer::class);
    }


    public function register()
    {
        //
    }
}
