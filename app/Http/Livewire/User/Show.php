<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRequests;
    public $user;
    public function render()
    {
        return view('livewire.user.show');
    }

    public function password()
    {
        $this->authorize('update',$this->user);
        $this->user->password=Hash::make(env('DEFAULT_PASSWORD'));
        $this->user->save();

    }



}
