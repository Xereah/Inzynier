<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
class AuthUserTest extends TestCase
{
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_register()    
    {   
         $user = User::create([ 
        'name' => 'test',
        'surname' => 'test',
        'email' => 'test@test.pl',
        'adress' => 'Sieradz',
        'phone' => 513623174,
        'password' => bcrypt('test1234'),
        'level' => 1,
    ]);
        
        

        $user = [
            'name' => 'test',
            'surname' => 'test',
            'email' => 'test@test.pl',
            'adress' => 'Sieradz',
            'phone' => 513623174,
            'password' => bcrypt('test1234'),
            'level' => 1,
          ];
          $response = $this->post('/register', $user);
          $response->assertRedirect('/');
          array_splice($user,4, 2);
          $this->assertDatabaseHas('users', $user);
    }

    public function test_user_can_login()    
    {        
        
        $response = $this->post('/login', [
            'email' => 'test@test.pl',
            'password' => bcrypt('test1234'),
        ]);
        $response->assertRedirect('/');

    }
    
    public function testLogout()
    {
        factory(User::class)->create([
            'email' => 'test@test.pl',
            'password' => bcrypt('test1234'),
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/logout')->logout();
        });
    }

}