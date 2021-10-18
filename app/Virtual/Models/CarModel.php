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
}
