<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Membership;
use App\Models\UserMembership;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public function unsubscribe($id)
    {
        $userMembership = UserMembership::where('user_id', Auth::user()->id)->findOrFail($id);

        $userMembership->update([
            'status'     => 'Stopped',
            'stopped_at' => Carbon::now()
        ]);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        $data['memberships'] = Membership::where('is_active', true)->get();

        if(Auth::check()) {
            $data['active_membership'] = UserMembership::where(
                'user_id', Auth::user()->id
            )->where(
                'status',
                'Active'
            )->first();
        }

        return view('livewire.home', $data)->extends('layouts.app');
    }
}
