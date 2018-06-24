<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use App\User;


class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $password = 'secret';

        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => Hash::make($password) // bcrypt($password) Save the encrypted
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', $password)
                    ->press('Login')
                    ->assertPathIs('/')
                    ->assertSee($user->name);
        });

    }
}
