<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use App\Models\Review;
use App\Services\RatingService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ReviewLikable extends Component
{
    public Review $review;
    public int $likesCount;
    public int $dislikesCount;
    public bool $userHasLike = false;
    public bool $userHasDislike = false;

    private RatingService $ratingService;

    public function mount(Review $review, RatingService $ratingService)
    {
        $this->review = $review;
        $this->ratingService = $ratingService;

        $this->likesCount = $ratingService->calculateLikes($review);
        $this->dislikesCount = $ratingService->calculateDislikes($review);

        $this->userHasLike = self::checkUserLiked();
        $this->userHasDislike = self::checkUserDisliked();
    }

    public function render(): View
    {
        return view('livewire.review-likable');
    }

    public function like()
    {
        self::deleteVote();

        Rating::query()->create([
           'user_id' => auth()->id(),
           'review_id' => $this->review->id,
           'value' => Rating::VALUE_LIKE,
        ]);

        $this->userHasLike = true;

        self::updateLikesDislikes();
    }

    public function dislike()
    {
        self::deleteVote();

        Rating::query()->create([
            'user_id' => auth()->id(),
            'review_id' => $this->review->id,
            'value' => Rating::VALUE_DISLIKE,
        ]);

        $this->userHasDislike = true;

        self::updateLikesDislikes();
    }

    private function checkUserLiked(): bool
    {
        $rating = self::getAuthUserVote();

        $userLiked = false;
        if ($rating instanceof Rating && $rating->value === Rating::VALUE_LIKE) {
            $userLiked = true;
        }

        return $userLiked;
    }

    private function checkUserDisliked(): bool
    {
        $rating = self::getAuthUserVote();

        $userDisliked = false;
        if ($rating instanceof Rating && $rating->value === Rating::VALUE_DISLIKE) {
            $userDisliked = true;
        }

        return $userDisliked;
    }

    private function getAuthUserVote(): Rating|null
    {
        $rating = $this->review->ratings->where('user_id', auth()->id())->first();

        return $rating;
    }

    private function deleteVote()
    {
        $rating = self::getAuthUserVote();

        if ($rating instanceof Rating) {
            $rating->delete();
        }

        $this->userHasLike = false;
        $this->userHasDislike = false;
    }

    private function updateLikesDislikes()
    {
        $ratingService = new RatingService(new Rating());

        $this->likesCount = $ratingService->calculateLikes($this->review);
        $this->dislikesCount = $ratingService->calculateDislikes($this->review);
    }
}
