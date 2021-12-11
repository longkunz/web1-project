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
    //Test update user with email is null
    public function test_updateUserEmailNull()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newEmail = null;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['email' => $newEmail]);
            $newUser = $user->where("name", "Test")->first();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with email is array
    public function test_updateUserEmailArray()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newEmail = array();
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['email' => $newEmail]);
            $newUser = $user->where("name", "Test")->first();
            $this->assertEquals('[]', $newUser->email);
        } catch (Throwable $e) {
            
        }
        DB::rollBack();
    }
    //Test update user with email is object
    public function test_updateUserEmailObject()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newEmail = $user;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['email' => $newEmail]);
            $newUser = $user->where("name", "Test")->first();
            $this->assertEquals('[]', $newUser->email);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with email is Boolean
    public function test_updateUserEmailBoolean()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newEmail = true;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['email' => $newEmail]);
            $newUser = $user->where("name", "Test")->first();
            $this->assertEquals('[]', $newUser->email);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with name is null
    public function test_updateUserNameNull()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newName = null;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['name' => $newName]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            // $this->assertEquals('[]', $newUser->name);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with name is empty
    public function test_updateUserNameEmpty()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newName = '';
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['name' => $newName]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            $this->assertEquals('[]', $newUser->name);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with name is array
    public function test_updateUserNameArray()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newName = array();
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['name' => $newName]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            $this->assertEquals('[]', $newUser->name);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with name is object
    public function test_updateUserNameObject()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newName = $user;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['name' => $newName]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            $this->assertEquals('[]', $newUser->name);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with name is boolean
    public function test_updateUserNameBoolean()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newName = true;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['name' => $newName]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            $this->assertEquals('[]', $newUser->name);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test get user
    public function test_getUserOK()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newName = true;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $this->assertEquals('test@gmail.com', $newUser->email);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test get user NG
    public function test_getUserNG()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newName = true;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test100")->first();
            $this->assertEquals(array(), $newUser);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with role is null
    public function test_updateUserRoleNull()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newRole = null;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['role' => $newRole]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            $this->assertEquals('[]', $newUser->role);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with role is array
    public function test_updateUserRoleArray()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newRole = array();
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['role' => $newRole]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            $this->assertEquals('[]', $newUser->role);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with role is empty
    public function test_updateUserRoleEmpty()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newRole = '';
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['role' => $newRole]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            $this->assertEquals('[]', $newUser->role);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with role is object
    public function test_updateUserRoleObject()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newRole = $user;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['role' => $newRole]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            $this->assertEquals('[]', $newUser->role);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test update user with role is boolean
    public function test_updateUserRoleBoolean()
    {
        $user = new User();
        $newUserData =
            [
                'name' => "Test",
                'email' => "test@gmail.com",
                'password' => Hash::make('test'),
                'role' => 'admin',
            ];
        $newRole = true;
        DB::beginTransaction();
        try {
            $user->create($newUserData);
            $newUser = $user->where("name", "Test")->first();
            $status = $newUser->update(['role' => $newRole]);
            $newUser = $user->where("email", "test@gmail.com")->first();
            $this->assertEquals('[]', $newUser->role);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
}
