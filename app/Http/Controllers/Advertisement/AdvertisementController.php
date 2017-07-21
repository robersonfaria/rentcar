<?php

namespace App\Http\Controllers\Advertisement;

use App\Domain\Service\AdvertisementService;
use App\Exceptions\NotFountAdvertisement;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Transformer\AdvertisementTransformer;
use App\Http\Transformer\PicturesTransformer;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{

    /**
     * @var AdvertisementService
     */
    private $service;

    public function __construct(AdvertisementService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $advertisement = $this->service->getAllByUser($request->user());

            return fractal($advertisement, new AdvertisementTransformer());
        } catch (NotFountAdvertisement $e){
            return $this->ExceptionMessageResponse($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementRequest $request)
    {
        $advertisement = $this->service->store($request->user(), $request->all());

        return fractal($advertisement, new AdvertisementTransformer())->respond(201);
    }

    /**
     * Display the specified resource by user
     *
     * @param Request $request
     * @param int $uuid
     */
    public function showByUser(Request $request, $uuid)
    {
        try {
            $advertisement = $this->service->getUuidByUser($request->user(),$uuid);

            return fractal($advertisement, new AdvertisementTransformer());
        } catch (NotFountAdvertisement $e){
            return $this->ExceptionMessageResponse($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementRequest $request, $uuid)
    {
        try {
            $advertisement = $this->service->update($request->user(), $uuid, $request->all());

            return fractal($advertisement, new AdvertisementTransformer());
        } catch (NotFountAdvertisement $e){
            return $this->ExceptionMessageResponse($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $uuid)
    {
        try {
            $advertisement = $this->service->destroy($request->user(), $uuid);

            return fractal($advertisement, new AdvertisementTransformer());
        } catch (NotFountAdvertisement $e){
            return $this->ExceptionMessageResponse($e);
        }
    }

    public function tooglePublished(Request $request, $uuid)
    {
        try {
            $advertisement = $this->service->tooglePublished($request->user(), $uuid);

            return fractal($advertisement, new AdvertisementTransformer());
        } catch (NotFountAdvertisement $e){
            return $this->ExceptionMessageResponse($e);
        }
    }

    public function search(Request $request)
    {
        $this->validate($request,
            [
                'q' => 'required|string'
            ]
        );

        try {
            $advertisement = $this->service->search($request->q);

            return fractal($advertisement, new AdvertisementTransformer());
        } catch (NotFountAdvertisement $e){
            return $this->ExceptionMessageResponse($e);
        }
    }

    public function publicView($uuid)
    {
        try {
            $advertisement = $this->service->getUuid($uuid);

            return fractal($advertisement, new AdvertisementTransformer());
        } catch (NotFountAdvertisement $e){
            return $this->ExceptionMessageResponse($e);
        }
    }

    public function getImagens($uuid)
    {
        try {
            $images = $this->service->getImagesByUuid($uuid);

            return fractal($images, new PicturesTransformer());
        } catch (NotFountAdvertisement $e){
            return $this->ExceptionMessageResponse($e);
        }
    }
}
