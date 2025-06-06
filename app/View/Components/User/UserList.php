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
    public $cardClass;
    // except oculta o método/atributo
    // public $except = ['type'];

    /**
     * Create a new component instance.
     */
    public function __construct($users = null, $type = "lista", $cardClass = "success")
    {
        $this->users = User::all();
        // $this->users = $users;
        $this->type = $type;
        $this->cardClass = $cardClass;
    }

    public function isAdmin($username)
    {
        $message = $username === 'felipe' ? 'admin' : 'no admin';
        return $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.user-list');
    }
}
