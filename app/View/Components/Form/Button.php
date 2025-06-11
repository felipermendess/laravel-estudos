<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Button extends Component
{
    public $nameButton;
    public $collorButton;
    public $isWarning;
    /**
     * Create a new component instance.
     */
    public function __construct(string $nameButton, string $collorButton, bool $isWarning)
    {
        $this->nameButton = $nameButton;
        $this->collorButton = $collorButton;
        $this->isWarning = $isWarning;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.button');
    }
}
