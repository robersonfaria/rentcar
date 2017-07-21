<?php

namespace App\Domain\Service;


use App\Domain\Contracts\AdvertisementContract;
use App\Domain\Contracts\PictureContract;
use App\Models\User;

class PictureService
{

    /**
     * @var PictureContract
     */
    private $repository;
    /**
     * @var AdvertisementContract
     */
    private $advRepository;

    function __construct(PictureContract $repository, AdvertisementContract $advRepository)
    {
        $this->repository = $repository;
        $this->advRepository = $advRepository;
    }

    public function create(User $user, $uuid, $file)
    {
        $advertisement = $this->advRepository->findUuidByUser($user,$uuid);

        return $this->repository->create($advertisement,$file);
    }
}