<?php

namespace App\Console\Commands;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Services\CarBrandService;
use App\Services\CarModelService;
use Illuminate\Console\Command;

class GetRealBrandsModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topcar:brands-models:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse real JSON and store data to DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(CarBrandService $carBrandService, CarModelService $carModelService)
    {
        $carsData = json_decode(file_get_contents(base_path('car-list.json')), true);

        foreach ($carsData as $brandWithModels) {
            $brand = $carBrandService->save(['name' => $brandWithModels['brand']]);
            foreach ($brandWithModels['models'] as $model) {
                try {
                    $carModelService->save(['name' => $model, 'car_brand_id' => $brand->id]);
                } catch (\Exception) {}
            }
        }
    }
}
