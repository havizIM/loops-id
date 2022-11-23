<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->value('#email', 'viz.ndinq@gmail.com')
                ->value('#password', 'loopsid123')
                ->click('button[type="submit"]');
        });
    }
}
