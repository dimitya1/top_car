<div>
    <div class="flex justify-center items-center mb-2">
        <button wire:click="toggleStatus">
            <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear {{ $divBackgroundClass }}">
                <label for="toggle" class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full
                      transition transform duration-100 ease-linear cursor-pointer {{ $labelClass }}">
                </label>
            </div>
        </button>
    </div>
    @if($feedback->handled_by)
        <a href="{{ route('admin.administrators.edit', ['administrator' => $feedback->administrator]) }}" target="_blank">
            <div class="flex items-center text-sm">
                <div class="relative w-12 h-12 mr-3 rounded-full md:block">
                    @if($feedback->administrator->avatar)
                        <img class="object-cover w-full h-full rounded-full"
                             src="{{ url("storage/$feedback->administrator->avatar") }}" alt="{{ $feedback->administrator->name }}" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                </div>
                <div>
                    <p class="font-semibold text-black">{{ $feedback->administrator->name }}</p>
                    <p class="text-xs text-gray-600">@lang('app.admin.feedback.administrator')</p>
                </div>
            </div>
        </a>
    @else
        @lang('app.admin.feedback.not_handled_yet')
    @endif
</div>
