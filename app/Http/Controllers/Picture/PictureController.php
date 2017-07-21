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
        dd($request->all(), $request->file('filess'));
        $image = $this->service->create($request->user(),$uuid, $request->get('file'));

        return fractal($image, new PicturesTransformer());
    }
}