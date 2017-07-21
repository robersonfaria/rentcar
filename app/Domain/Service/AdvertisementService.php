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

    public function store(User $user, array $data)
    {
        return $this->repository->store($user, $data);
    }
}