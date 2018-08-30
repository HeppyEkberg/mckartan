<?php
namespace App\Http\ViewComposers;

use App\Models\City;
use Illuminate\View\View;

class NavbarViewComposer
{

    public function compose(View $view) {
        $cities = City::all();
        $view->with('cities', $cities);
    }

}