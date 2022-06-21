<?php

namespace App\Validation;

use App\Models\UsersModel;

class Usersrules
{
    public function validateUsers(string $str, string $fields, array $data)
    {
        $model = new UsersModel();
        $user = $model->where('username', $data['username'])
            ->first();

        if (!$user) {
            return false;
        }

        return password_verify($data['password'], $user['password']);
    }
}
