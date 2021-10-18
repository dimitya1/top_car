<?php


namespace App\Http\Controllers\Api;


class Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="TopCar API Documentation",
     *      description="This API allows to get all reviews, get reviews by car model name, get car models and create new reviews",
     *      @OA\Contact(
     *          email=L5_SWAGGER_CONST_EMAIL
     *      ),
     *      @OA\License(
     *          name=L5_SWAGGER_CONST_LICENSE_NAME,
     *      )
     * )
     *
     * @OAS\SecurityScheme(
     *      securityScheme="bearer_token",
     *      type="http",
     *      scheme="bearer"
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="API Server"
     * )
     *
     * @OA\Tag(
     *     name="Authorization",
     *     description="API Endpoint to get authorization token"
     * )
     *
     * @OA\Tag(
     *     name="Reviews",
     *     description="API Endpoints of Reviews"
     * )
     *
     * @OA\Tag(
     *     name="CarModels",
     *     description="API Endpoint of Car Models"
     * )
     */
}
