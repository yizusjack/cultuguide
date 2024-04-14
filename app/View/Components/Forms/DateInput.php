<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public string|null $min = null,
        public string|null $max = null,
        public string|null $value = null,
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->min = $min ?? date("Y-m-d");
        $this->max = $max ?? "2050-12-31";
        $this->value = $value ?? date("Y-m-d");
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.date-input');
    }
}
