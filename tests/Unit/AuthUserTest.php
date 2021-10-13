<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use auth;
use HasFactory;
class AuthUserTest extends DuskTestCase
{
    use DatabaseTransactions;
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

    public function test_a_user_cannot_login_with_invalid_credentials()
    {
        $user = User::create([ 
            'name' => 'Testowy',
            'surname' => 'Testowy',
            'email' => 'test@test.pl',
            'adress' => 'Sieradz',
            'phone' => 513623174,
            'password' => bcrypt('test1234'),
            'level' => 1,
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost/Inzynier/public/login')
                    ->assertSee('Witaj')
                    ->type('email', 'test@test.pl')
                    ->type('password', 'zlehaslo')
                    ->press('Zaloguj')
                    ->assertSee('Te dane nie pasują do tych które posiadamy w bazie.');
        });
    }

    public function test_a_user_can_login_with_valid_credentials()
    {
        $user = User::create([ 
            'name' => 'Testowy',
            'surname' => 'Testowy',
            'email' => 'test@test.pl',
            'adress' => 'Sieradz',
            'phone' => 513623174,
            'password' => bcrypt('test1234'),
            'level' => 1,
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost/Inzynier/public/login')
                    ->assertSee('Zaloguj')
                    ->type('email', 'test@test.pl')
                    ->type('password', 'test1234')
                    ->press('Zaloguj');
                   
        });
    }

}