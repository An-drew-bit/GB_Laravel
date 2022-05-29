<?php

namespace Tests\Browser;

use App\Models\User;
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
    public function testRegisterForm()
    {
        $user = User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => 'test12asdwwW',
            'password_confirmation' => 'test12asdwwW',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('register.showForm'))
                ->type('name', $user->name)
                ->type('email', $user->email)
                ->type('password', $user->password)
                ->type('password_confirmation', $user->password_confirmation)
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
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'test12asdwwW'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('register.showForm'))
                ->type('email', $user->email)
                ->type('password', $user->password)
                ->press('Sign in')
                ->assertPathIs(route('home'));
        });
    }
}
