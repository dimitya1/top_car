<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Review\StoreReviewRequest;
use App\Http\Resources\ReviewCollection;
use App\Services\CarModelService;
use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/reviews",
     *      operationId="getReviewsList",
     *      tags={"Reviews"},
     *      summary="Get list of all existing reviews",
     *      description="Returns list of car reviews",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *         name="model",
     *         in="query",
     *         description="A specified car model to filter the reviews",
     *         required=false,
     *         example="Caddy",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="All car models successfully returned",
     *          @OA\JsonContent(ref="#/components/schemas/ReviewResource")
     *      ),
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
     * @param  Request  $request
     * @param  ReviewService  $reviewService
     *
     * @return ReviewCollection
     */
    public function index(Request $request, ReviewService $reviewService): ReviewCollection
    {
        $reviews = $reviewService->get($request->model);

        return new ReviewCollection($reviews);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/reviews",
     *      operationId="storeNewReview",
     *      tags={"Reviews"},
     *      summary="Store a new review into the system",
     *      description="Stores a review into the system",
     *      security={{"bearer_token":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreReviewRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Review successfully stored",
     *          @OA\JsonContent()
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
     * @param StoreReviewRequest $request
     * @param ReviewService $reviewService
     * @param CarModelService $carModelService
     * @return JsonResponse
     */
    public function store(StoreReviewRequest $request, ReviewService $reviewService, CarModelService $carModelService): JsonResponse
    {
        $data = $request->all();
        $data['car_model_id'] = $carModelService->getByName($data['car_model_name'])->id;

        $review = $reviewService->store($data);

        return response()->json(['data' => (object)[]]);
    }
}
