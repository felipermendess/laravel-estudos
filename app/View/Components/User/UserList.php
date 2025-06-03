<?php

namespace App\View\Components\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;

class UserList extends Component
{
    public $users;
    public $type;
    /**
     * Create a new component instance.
     */
    public function __construct($users = null, $type = "lista")
    {
        $this->users = $users;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.user-list');
    }
}
