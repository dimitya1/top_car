<div class="items-center -mx-2 md:flex">
    <div class="w-full mx-2">
        <label class="block mb-2 text-sm font-medium text-white">Марка авто</label>

        <select wire:model="brand" name="car_brand_id" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            <option value="" selected></option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="w-full mx-2 mt-4 md:mt-0">
        <label class="block mb-2 text-sm font-medium text-white">Модель авто</label>

        <select wire:model="model" name="car_model_id" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            <option value="" selected></option>
            @foreach($models as $model)
                <option value="{{ $model->id }}">{{ $model->name }}</option>
            @endforeach
        </select>
    </div>
</div>
