<?php


namespace App\Virtual\Resources;

use App\Virtual\Models\Review;

/**
 * @OA\Schema(
 *     title="ReviewResource",
 *     description="Review resource",
 *     @OA\Xml(
 *         name="ReviewResource"
 *     )
 * )
 */
class ReviewResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var Review[]
     */
    private array $data;
}
