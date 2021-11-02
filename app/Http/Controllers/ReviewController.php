<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\StoreReviewRequest;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param ReviewService $reviewService
     * @return View
     */
    public function index(Request $request, ReviewService $reviewService): view
    {
        $filterOwn = false;
        //user cannot filter own reviews by car model
        if ($request->own && auth()->user() && !$request->car_model_id && !$request->car_brand_id) {
            $filterOwn = true;
        }

        $reviews = $reviewService
            ->getAllPaginated($filterOwn, $request->car_brand_id, $request->car_model_id);

        return view('pages.reviews.index', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): view
    {
        return view('pages.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReviewRequest $request
     * @param ReviewService $reviewService
     * @return RedirectResponse
     */
    public function store(StoreReviewRequest $request, ReviewService $reviewService): RedirectResponse
    {
//        dd($request->all());
        $reviewService->store($request->all());

        return redirect()->route('reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Review  $review
     *
     * @return Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Review  $review
     *
     * @return Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Review  $review
     *
     * @return Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage by admin.
     *
     * @param  Review  $review
     * @param  ReviewService  $reviewService
     *
     * @return RedirectResponse
     */
    public function destroy(Review $review, ReviewService $reviewService): RedirectResponse
    {
        $reviewService->destroy($review);

        return redirect()->route('admin.reviews.index');
    }
}
