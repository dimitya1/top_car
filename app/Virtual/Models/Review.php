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

    /**
     * @OA\Property(
     *     title="Fuel type",
     *     description="Fuel type of user's car",
     *     example="Petrol"
     * )
     *
     * @var string
     */
    private string $fuel_type;

    /**
     * @OA\Property(
     *     title="Power",
     *     description="Engine power of user's car",
     *     example=250
     * )
     *
     * @var integer
     */
    private int $power;

    /**
     * @OA\Property(
     *     title="Engine",
     *     description="Engine name of user's car",
     *     example="B-80"
     * )
     *
     * @var string
     */
    private string $engine;

    /**
     * @OA\Property(
     *     title="Consumption city",
     *     description="Consumption in city per 100 km of user's car",
     *     example=9.2
     * )
     *
     * @var float
     */
    private float $consumption_city;

    /**
     * @OA\Property(
     *     title="Consumption highway",
     *     description="Consumption in highway per 100 km of user's car",
     *     example=7.1
     * )
     *
     * @var float
     */
    private float $consumption_highway;

    /**
     * @OA\Property(
     *     title="Gallery",
     *     description="Array of user's car gallery images",
     *     @OA\Items(
     *         type="string",
     *         format="string",
     *         example="https://i.picsum.photos/id/237/200/300.jpg?hmac=TmmQSbShHz9CdQm0NkEjx1Dyh_Y984R9LpNrpvH2D_U"
     *     )
     * )
     *
     * @var array
     */
    private array $gallery;

    /**
     * @OA\Property(
     *     title="Careted at",
     *     format="date-time",
     *     description="Date and time of creation a review",
     *     example="2020-10-19 12:22:09"
     * )
     *
     * @var string
     */
    private string $created_at;

    /**
     * @OA\Property(
     *     title="Rating",
     *     description="Rating of a review based on reatins to currenct review in format n/5",
     *     example="3.4/5"
     * )
     *
     * @var string
     */
    private string $rating;
}
