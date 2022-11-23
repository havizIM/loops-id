<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Membership;
use App\Models\UserMembership;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class BuyMembership extends Component
{
    public $membership;

    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $phone = '';

    /** @var string */
    public $gender = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function mount($id)
    {
        $this->membership = Membership::where('is_active', true)->findOrFail($id);
    }

    public function subscribe($id)
    {
        $membership = Membership::where('is_active', true)->findOrFail($id);

        if(!Auth::check()) {
            $this->validate([
                'name'     => ['required'],
                'email'    => ['required', 'email', 'unique:users'],
                'gender'   => ['required', 'in:Male,Female'],
                'phone'    => ['required'],
                'password' => ['required', 'min:8', 'same:passwordConfirmation'],
            ]);

            $user = User::create([
                'email'    => $this->email,
                'name'     => $this->name,
                'gender'   => $this->gender,
                'phone'    => $this->phone,
                'password' => Hash::make($this->password),
            ]);
        } else {
            $user = Auth::user();
        }

        UserMembership::create([
            'user_id'           => $user->id,
            'membership_id'     => $membership->id,
            'membership_log'    => $membership,
            'status'            => 'Active',
            'activated_at'      => Carbon::now(),
            'expired_at'        => Carbon::now()->addMonth($membership->duration_in_month)
        ]);

        if(!Auth::check()) {
            event(new Registered($user));
            Auth::login($user, true);
        }

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.buy-membership')->extends('layouts.auth');
    }
}
