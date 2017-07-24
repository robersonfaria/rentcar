<?php

namespace App\Domain\Service;


use App\Domain\Contracts\AdvertisementContract;
use App\Domain\Contracts\PictureContract;
use App\Models\User;
use Illuminate\Http\UploadedFile;

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

    public function create(User $user, UploadedFile $file, $uuid)
    {
        $advertisement = $this->advRepository->findUuidByUser($user,$uuid);

        return $this->repository->create($advertisement,$file);
    }

    public function destroy(User $user, $uuid, $file){
        dd(parse_url($file));
        $advertisement = $this->advRepository->findUuidByUser($user,$uuid);
        $advertisement->pictures()->whereFile(parse_url($file));
    }
}