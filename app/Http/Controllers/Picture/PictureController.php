<?php

namespace App\Http\Controllers\Picture;


use App\Domain\Service\PictureService;
use App\Http\Controllers\Controller;
use App\Http\Transformer\PicturesTransformer;
use Illuminate\Http\Request;

class PictureController extends Controller
{

    /**
     * @var PictureService
     */
    private $service;

    function __construct(PictureService $service)
    {
        $this->service = $service;
    }

    public function create(Request $request, $uuid)
    {
        $image = $this->service->create($request->user(), $request->file('file'),$uuid);

        return fractal($image, new PicturesTransformer());
    }

    public function destroy(Request $request, $uuid, $file){
        $image = $this->service->destroy($request->user(),$uuid,$file);

        return fractal($image, new PicturesTransformer())->respond(204);
    }
}