<?php
namespace App\Domain\Contracts;


use App\Models\Advertisement;
use Illuminate\Http\UploadedFile;

interface PictureContract
{

    public function create(Advertisement $advertisement, UploadedFile $file);
}