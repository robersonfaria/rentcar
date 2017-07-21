<?php
namespace App\Domain\Repository;


use App\Domain\Contracts\PictureContract;
use App\Models\Advertisement;

class PictureRepository implements PictureContract
{

    public function create(Advertisement $advertisement, $file)
    {
        dd($file);
    }
}