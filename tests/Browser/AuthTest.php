<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegisterForm()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('register.showForm'))
                ->type('name', $user->name)
                ->type('email', $user->email)
                ->type('password', $user->password)
                ->press('Sign up')
                ->assertPathIs(route('home'));
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('login.showForm'))
                ->type('email', 'test@example.com')
                ->type('password', 'test12asdwwW')
                ->press('Sign in')
                ->assertPathIs(route('home'));
        });
    }
}
