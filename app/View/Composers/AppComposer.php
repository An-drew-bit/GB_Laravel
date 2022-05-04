<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppComposer
{
    public function compose(View $view): void
    {
        $view->with('name', Auth::user());
    }
}
