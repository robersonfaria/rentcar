<?php
namespace App\Domain\Contracts;

use App\Models\Advertisement;
use App\Models\User;

interface AdvertisementContract
{

    public function findByUuid($uuid);

    public function getImagesByUuid($uuid);

    public function findAllByUser(User $user);

    public function findUuidByUser(User $user, $uuid);

    public function store(User $user, array $data);

    public function update(Advertisement $advertisement, array $data);

    public function destroyCascade(User $user, $uuid);

    public function tooglePublished(Advertisement $advertisement);

    public function search($q);

}