<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use auth;
use HasFactory;
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

    public function test_user_can_logout()
    {
         $user = $this->post('/login', [
            'email' => 'admin@wp.com',
            'password' => bcrypt('Admin@1234'),
        ]);
        

        // When
        $this->post(route('logout'));

        // Then
        $this->assertGuest();
    }



}