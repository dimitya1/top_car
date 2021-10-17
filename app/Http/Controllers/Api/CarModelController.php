<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarModelCollection;
use App\Services\CarModelService;

class CarModelController extends Controller
{
    /**
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
