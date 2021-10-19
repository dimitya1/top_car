<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Car model",
 *     description="Car model model",
 *     @OA\Xml(
 *         name="Review model"
 *     )
 * )
 */
class CarModel
{
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Car model name",
     *     example="Vectra"
     * )
     *
     * @var string
     */
    private string $name;

    /**
     * @OA\Property(
     *     title="Car brand name",
     *     description="Car brand name",
     *     example="Opel"
     * )
     *
     * @var string
     */
    private string $car_brand_name;

    /**
     * @OA\Property(
     *     title="Produced from",
     *     description="Year from which car model was produced",
     *     format="int32",
     *     example=1998
     * )
     *
     * @var integer
     */
    private int $produced_from;

    /**
     * @OA\Property(
     *     title="Produced to",
     *     description="Year to which car model was produced",
     *     format="int32",
     *     example=2016
     * )
     *
     * @var integer
     */
    private int $produced_to;

    /**
     * @OA\Property(
     *     title="Gallery",
     *     description="Array of car model's gallery",
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
     *     title="Reviews count",
     *     description="Number of rewiews related to currenct car model",
     *     format="int32",
     *     example=12
     * )
     *
     * @var integer
     */
    private int $reviews_count;
}
