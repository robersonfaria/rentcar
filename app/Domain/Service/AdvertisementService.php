<?php

namespace App\Domain\Service;


use App\Domain\Contracts\AdvertisementContract;
use App\Models\User;

class AdvertisementService
{

    /**
     * @var AdvertisementContract
     */
    private $repository;

    public function __construct(AdvertisementContract $repository)
    {
        $this->repository = $repository;
    }

    public function getUuid($uuid)
    {
        return $this->repository->findByUuid($uuid);
    }

    public function getImagesByUuid($uuid)
    {
        return $this->repository->getImagesByUuid($uuid);
    }

    public function getAllByUser(User $user)
    {
        return $this->repository->findAllByUser($user);
    }

    public function getUuidByUser(User $user, $uuid)
    {
        return $this->repository->findUuidByUser($user, $uuid);
    }

    public function store(User $user, array $data)
    {
        return $this->repository->store($user, $data);
    }

    public function update(User $user, $uuid, array $data)
    {
        $advertisement = $this->repository->findUuidByUser($user, $uuid);

        return $this->repository->update($advertisement, $data);
    }

    public function destroy(User $user, $uuid)
    {
        return $this->repository->destroyCascade($user, $uuid);
    }

    public function tooglePublished(User $user, $uuid)
    {
        $advertisement = $this->repository->findUuidByUser($user, $uuid);

        return $this->repository->tooglePublished($advertisement);
    }

    public function search($q)
    {
        return $this->repository->search($q);
    }
}