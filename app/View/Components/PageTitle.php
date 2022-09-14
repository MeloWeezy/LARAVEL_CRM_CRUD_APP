<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component
{
    public string $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title ='Dashboard')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.page-title');
    }
}
