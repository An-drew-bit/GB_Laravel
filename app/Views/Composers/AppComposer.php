<?php

namespace App\Views\Composers;

use Illuminate\View\View;

class AppComposer
{
    public function compose(View $view): void
    {
        $view->with('name', auth()->user());
    }
}
