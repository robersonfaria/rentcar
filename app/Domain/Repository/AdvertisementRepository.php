<?php
namespace App\Domain\Repository;


use App\Domain\Contracts\AdvertisementContract;
use App\Models\User;

class AdvertisementRepository implements AdvertisementContract
{


    public function store(User $user, array $data)
    {

    }
}