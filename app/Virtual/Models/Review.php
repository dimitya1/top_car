<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Review",
 *     description="Review model",
 *     @OA\Xml(
 *         name="Review"
 *     )
 * )
 */
class Review
{
    /**
     * @OA\Property(
     *     title="Car brand name",
     *     description="Car brand name",
     *     example="Audi"
     * )
     *
     * @var string
     */
    private string $car_brand_name;

    /**
     * @OA\Property(
     *     title="Car model name",
     *     description="Car model name",
     *     example="RS8"
     * )
     *
     * @var string
     */
    private string $car_model_name;

    /**
     * @OA\Property(
     *     title="Title",
     *     description="Review title given by user",
     *     example="Very nice"
     * )
     *
     * @var string
     */
    private string $title;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Review description given by user",
     *     example="Bought it in 2020..."
     * )
     *
     * @var string
     */
    private string $comment;
}
