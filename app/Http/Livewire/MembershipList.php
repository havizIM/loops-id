<?php

namespace App\Http\Livewire;

use App\Models\Membership;
use Livewire\Component;

class MembershipList extends Component
{
    public function render()
    {
        return view('livewire.membership-list', [
            'memberships' => Membership::where('is_active', true)->get()
        ]);
    }
}
