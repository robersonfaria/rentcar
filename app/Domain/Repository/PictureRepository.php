<?php
namespace App\Domain\Repository;


use App\Domain\Contracts\PictureContract;
use App\Models\Advertisement;
use App\Models\Picture;
use Illuminate\Http\UploadedFile;

class PictureRepository implements PictureContract
{

    public function create(Advertisement $advertisement, UploadedFile $file)
    {
        $filename = $file->getFilename().".".$file->extension();
        $file = $file->move(storage_path('app/public/images/'), $filename);
        $picture = (new Picture());
        $picture->file = '/storage/images/'.$filename;
        $picture->active = true;
        $advertisement->pictures()->save($picture);

        return $picture;
    }
}