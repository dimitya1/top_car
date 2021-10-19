<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarModelCollection;
use App\Services\CarModelService;

class CarModelController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/models",
     *      operationId="getCarModelsList",
     *      tags={"CarModels"},
     *      summary="Get list of car models",
     *      description="Returns list of car models",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="All car models successfully returned",
     *          @OA\JsonContent(ref="#/components/schemas/CarModelResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid data",
     *          @OA\JsonContent()
     *      )
     *     )
     *
     * Display a listing of the resource.
     *
     * @param  CarModelService  $carModelService
     *
     * @return CarModelCollection
     */
    public function index(CarModelService $carModelService): CarModelCollection
    {
        $models = $carModelService->getAll();

        return new CarModelCollection($models);
    }
}
