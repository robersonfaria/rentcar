<?php
namespace App\Http\Transformer;


use App\Models\Advertisement;
use League\Fractal\TransformerAbstract;

class AdvertisementTransformer extends TransformerAbstract
{

    public function transform(Advertisement $advertisement){
        return [
            "uuid" => $advertisement->uuid,
            "tags" => $advertisement->tags,
            "title" => $advertisement->title,
            "cover" => $advertisement->cover,
            "price" => $advertisement->price,
            "published" => (is_null($advertisement->published_at))?null:$advertisement->published_at->toDateTimeString(),
            "description" => $advertisement->description
        ];
    }
}