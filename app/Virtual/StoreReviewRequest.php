<?php


namespace App\Virtual;


/**
 * @OA\Schema(
 *      title="Store new review request",
 *      description="Store new review",
 *      type="object",
 *      required={"password"},
 *      required={"title"},
 * )
 */

class StoreReviewRequest
{
    /**
     * @OA\Property(
     *      title="Car model name",
     *      description="Car model to which this request will be attached. Please, try GET all models endpoint to use correct model name",
     *      example="Logan"
     * )
     *
     * @var string
     */
    public string $car_model_name;

    /**
     * @OA\Property(
     *      title="Title",
     *      description="Title of a review",
     *      example="Highly recommended for long trips"
     * )
     *
     * @var string
     */
    public string $title;

    /**
     * @OA\Property(
     *      title="Content",
     *      description="Additional content of the review",
     *      example="I usually travel far from away from my city and this car is perfect for traveling with family..."
     * )
     *
     * @var string
     */
    public string $content;

    /**
     * @OA\Property(
     *      title="Fuel type",
     *      description="One of: petrol, diesel, gas, electric, hybrid, other",
     *      example="gas"
     * )
     *
     * @var string
     */
    public string $fuel_type;

    /**
     * @OA\Property(
     *      title="Engine",
     *      description="Name of engine in user's car",
     *      example="М52"
     * )
     *
     * @var string
     */
    public string $engine;

    /**
     * @OA\Property(
     *      title="Power",
     *      description="Power of an engine",
     *      example=120
     * )
     *
     * @var integer
     */
    public int $power;

    /**
     * @OA\Property(
     *      title="Consumption city",
     *      description="Fuel consumption in city",
     *      example=11.1
     * )
     *
     * @var float
     */
    public float $consumption_city;

    /**
     * @OA\Property(
     *      title="Consumption highway",
     *      description="Fuel consumption in highway",
     *      example=7.3
     * )
     *
     * @var float
     */
    public float $consumption_highway;
}
