<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public Collection|array $options,
        public string $attributeName,
        public string|null $placeholder=null,
        public string|null $value=null,
    )
    {
        $options = $this->options->pluck($this->attributeName, 'id')->toArray();
        $this->options = $options;

        if($placeholder)
        {
            $this->options = ['' => $placeholder] + $this->options;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}
