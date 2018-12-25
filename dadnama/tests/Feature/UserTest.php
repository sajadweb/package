    <?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_create()
    {
        $username = 'sajadweb';
        $email = 'sajadweb@gmail.com';

        factory(\App\Packages\User\Model\Admin::class)->create([
            'username'=>$username,
            'name'=>"sajad",
            'email'=>$email,
            'password'=> bcrypt('secret'),
            'status'=>1
        ]);

        $this->assertDatabaseHas('users', [
            'title' => $username,
            'email' => $email
        ]);
    }
}
