<?php
namespace App\Domain\Contracts;


use App\Models\Advertisement;

interface PictureContract
{

    public function create(Advertisement $advertisement, $file);
}