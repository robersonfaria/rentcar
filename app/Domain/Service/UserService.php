<?php
namespace App\Domain\Service;


use App\Domain\Contracts\UserContracts;
use App\Models\User;

class UserService
{

    private $repository;

    public function __construct(UserContracts $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $user)
    {
        return $this->repository->create($user);
    }
}