<div style="align-items: center">
    <button wire:click="like" @if($userHasLike || !auth()->user()) disabled @endif>
        <span class="@if($userHasLike) text-green-500 @else text-gray-400 @endif mr-1 inline-flex items-center ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
            </svg>{{ $likesCount }}
        </span>
    </button>
    <button wire:click="dislike" @if($userHasDislike || !auth()->user()) disabled @endif>
        <span class="@if($userHasDislike) text-red-400 @else text-gray-400 @endif inline-flex items-center leading-none text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
            </svg>{{ $dislikesCount }}
        </span>
    </button>
</div>
