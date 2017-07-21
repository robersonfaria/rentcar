<?php
namespace App\Domain\Contracts;

use App\Models\User;

interface AdvertisementContract
{

    public function store(User $user, array $data);
}