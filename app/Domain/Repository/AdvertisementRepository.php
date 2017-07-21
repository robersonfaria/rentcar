<?php
namespace App\Domain\Repository;


use App\Domain\Contracts\AdvertisementContract;
use App\Exceptions\NotFountAdvertisement;
use App\Models\Advertisement;
use App\Models\User;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class AdvertisementRepository implements AdvertisementContract
{


    public function findByUuid($uuid)
    {
        $advertisement = (new Advertisement())->whereUuid($uuid)->first();

        $this->getCover($advertisement);

        return $advertisement;
    }

    public function getImagesByUuid($uuid){
        $advertisement = (new Advertisement())->whereUuid($uuid)->first();

        return $advertisement->pictures;
    }

    public function findAllByUser(User $user)
    {
        return $user->advertisements->transform(function ($advertisement, $key){
            $this->getCover($advertisement);
            return $advertisement;
        });
    }

    public function findUuidByUser(User $user, $uuid)
    {
        if(!$advertisement = $user->advertisements()->whereUuid($uuid)->first()){
            throw new NotFountAdvertisement();
        }

        $this->getCover($advertisement);

        return $advertisement;
    }


    public function store(User $user, array $data)
    {
        $advertisement = (new Advertisement())->fill($data);
        $advertisement->uuid = Uuid::uuid1()->toString();

        $user->advertisements()->save($advertisement);

        $this->getCover($advertisement);

        return $advertisement;
    }

    public function update(Advertisement $advertisement, array $data)
    {
        $advertisement->fill($data)->save();

        $this->getCover($advertisement);

        return $advertisement;
    }

    public function destroyCascade(User $user, $uuid)
    {
        $advertisement = $this->findUuidByUser($user, $uuid);

        $advertisement->pictures()->delete();

        $advertisement->delete();

        return $advertisement;
    }

    public function tooglePublished(Advertisement $advertisement)
    {
        $advertisement->published_at = (is_null($advertisement->published_at))?Carbon::now():null;

        $advertisement->save();

        return $advertisement;
    }

    private function getCover(Advertisement $advertisement)
    {
        if($picture = $advertisement->pictures()->first()){
            $advertisement->cover = url($picture->file);
        }

        return $advertisement;
    }

    public function search($q)
    {
        return (new Advertisement())->whereRaw('MATCH (title, description, tags) AGAINST (?)',$q)->get();
    }
}