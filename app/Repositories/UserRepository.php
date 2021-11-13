<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getUsers($num)
    {
        return User::orderBy('id', 'ASC')->paginate($num);
    }

    //Store user
    public function storeUser($data)
    {
        return User::create($data);
    }

    //find user by id
    public function findUser($id)
    {
        return User::findOrFail($id);
    }
}
