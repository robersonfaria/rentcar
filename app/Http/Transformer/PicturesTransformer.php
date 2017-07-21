<?php
namespace App\Http\Transformer;


use App\Models\Picture;
use League\Fractal\TransformerAbstract;

class PicturesTransformer extends TransformerAbstract
{

    public function transform(Picture $picture)
    {
        return [
            $picture->file
        ];
    }
}