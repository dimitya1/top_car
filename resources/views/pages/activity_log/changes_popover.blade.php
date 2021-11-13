<button type="button" class="bg-gray-300 border-gray-500 border-2 text-black active:bg-gray-600 font-bold -bottom-0 bg-gray-300
    px-6 py-3 rounded shadow hover:shadow-lg outline-none
    focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
    onclick="openPopover(event,'popover_{{ $loop->iteration }}')">
        View changes
</button>
<div id="popover_{{ $loop->iteration }}" class="popover hidden bg-white border mr-3 block z-50 font-normal leading-normal text-sm
    max-w-xs text-left no-underline break-words rounded-lg">
        <div class="text-gray-800 p-3">
            @foreach($row['properties'] as $propertyKey => $propertyValues)
                <p class="text-2xl uppercase font-bold">{{ $propertyKey.':' }}</p>
                <ul class="list-disc list-inside">
                    @foreach($propertyValues as $key => $value)
                        <li>{{ $key.': '.$value }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
</div>