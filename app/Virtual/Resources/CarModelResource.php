<?php


namespace App\Virtual\Resources;

use App\Virtual\Models\CarModel;

/**
 * @OA\Schema(
 *     title="CarModelResource",
 *     description="Car model resource",
 *     @OA\Xml(
 *         name="CarModelResource"
 *     )
 * )
 */
class CarModelResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var CarModel[]
     */
    private array $data;
}
