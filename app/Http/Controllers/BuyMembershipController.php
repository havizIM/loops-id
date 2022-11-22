<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

class BuyMembershipController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        return redirect(route('home'));
    }
}
