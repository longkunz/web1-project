<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Throwable;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    protected function setUp(): void
    {
        parent::setUp();
    }
    protected function tearDown(): void
    {
        parent::tearDown();
    }
    //Test update password true
    public function test_updatePassTrue()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newPassword = "123";
        DB::beginTransaction();
        $user->create($newUserData);
        $newUser = $user->where("name", "Test")->first();
        $status = $newUser->update(['password' => $newPassword]);
        $newUser = $user->where("name", "Test")->first();
        $this->assertEquals("123", $newUser->password);
        DB::rollBack();
    }
    //Test update password null
    public function test_updatePassNull()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newPassword = null;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['password' => $newPassword]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update password is array
    public function test_updatePassArray()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newPassword = ["long", "kunz"];
        DB::beginTransaction();
        $user->create($newUserData);
        $newUser = $user->where("name", "Test")->first();
        $status = $newUser->update(['password' => $newPassword]);
        $newUser = $user->where("name", "Test")->first();
        $this->assertEquals('["long","kunz"]', $newUser->password);
        DB::rollBack();
    }
    //Test update password is object
    public function test_updatePassObject()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newPassword = new User();
        DB::beginTransaction();
        $user->create($newUserData);
        $newUser = $user->where("name", "Test")->first();
        $status = $newUser->update(['password' => $newPassword]);
        $newUser = $user->where("name", "Test")->first();
        $this->assertEquals('[]', $newUser->password);
        DB::rollBack();
    }
}
