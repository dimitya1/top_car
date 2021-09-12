<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public const TYPE_WARNING = 'warning';
    public const TYPE_PRIMARY = 'primary';
    public const TYPE_DANGER = 'danger';
    public const TYPE_SUCCESS = 'success';

    public function __construct(public ?string $type = null, public ?string $message = null)
    {}

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('components.alert');
    }
}
