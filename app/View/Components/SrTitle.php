<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SrTitle extends Component
{
    /**
     * The HTML tag that should be displayed.
     *
     * @var string $tag
     */
    public $tag;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tag = 'h1')
    {
        $this->tag = $tag;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
            <{{ $tag }} class="sr-only">
                {{ $slot }}
            </{{ $tag }}>
        blade;
    }
}
