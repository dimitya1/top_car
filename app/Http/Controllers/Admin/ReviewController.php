<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\ReviewController as FrontReviewController;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    public function index(Request $request, ReviewService $reviewService)
    {
        return app(FrontReviewController::class)->index($request, $reviewService);
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
