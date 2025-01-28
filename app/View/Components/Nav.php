<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Nav extends Component
{

    public $items ;
    public $active ;
    public $user_role ;
    public $user_name ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = config('nav');
        $this->active = Route::currentRouteName();
        $user =Auth::user();
        $this->user_role = $user->role;
        $this->user_name = $user->name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav');
    }

}
