<?php
namespace App\Domain\Repository;

use App\Domain\Contracts\UserContracts;
use App\Models\User;

class UserRepository implements UserContracts
{

    public function __construct()
    {
    }

    public function create(array $user)
    {
        $user = (new User())->fill($user);
        $user->save();
        return $user;
    }

    public function update(User $user, array $dados)
    {
        $user->fill($dados);
        return $user->save();
    }
}