<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectField extends Component
{

    public array $timeslotOptions;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->timeslotOptions = [
            [
                'value' => '',
                'selected' => true,
                'title' => 'Select'
            ],
            [
                'value' => 'Morning',
                'selected' => false,
                'title' => 'Morning'
            ],
            [
                'value' => 'Midday',
                'selected' => false,
                'title' => 'Midday'
            ],
            [
                'value' => 'Afternoon',
                'selected' => false,
                'title' => 'Afternoon'
            ],
            [
                'value' => 'Flexible',
                'selected' => false,
                'title' => 'Flexible'
            ]
        ];;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.select-field');
    }
}
