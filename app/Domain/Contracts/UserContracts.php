<?php
namespace App\Domain\Contracts;

use App\Models\User;

interface UserContracts
{

    public function create(array $user);

    public function update(User $user, array $dados);
}