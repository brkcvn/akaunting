<?php

namespace App\View\Components;

use App\Abstracts\View\Component;

class Kbd extends Component
{
    public $size;

    public $textColor;

    public $backgroundColor;

    public $borderColor;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $size = 'medium',
        string $textColor = 'text-gray-800',
        string $backgroundColor = 'bg-gray-100',
        string $borderColor = 'border-gray-200',
    ) {
        $this->size = $this->getClass($size);
        $this->textColor = $textColor;
        $this->backgroundColor = $backgroundColor;
        $this->borderColor = $borderColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.kbd');
    }

    protected function getClass($size)
    {
        $default = 'px-2 py-1.5';

        switch ($size) {
            case 'small':
                $default = 'px-1 py-0.5';
                break;
            case 'small':
                $default = 'px-2 py-1.5';
                break;
            case 'large':
                $default = 'px-3 py-2';
                break;
        }

        return $default;
    }
}