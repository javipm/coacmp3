<div class="block px-10 rounded w-full h-full">
    <div class="h-14 py-4 text-center">
        <h3 class="text-md font-bold text-orange-800">También te puede interesar...</h3>
    </div>
    <div class="tag-cloud flex justify-center flex-wrap gap-2 mx-auto4">
        @foreach ($groups as $group)
        <a wire:navigate
            class="tag px-2 py-2 text-orange-800 rounded bg-orange-200 text-xs hover:bg-orange-300 transition duration-200 ease-in-out"
            href="{{ route('group', ['modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug]) }}">
            {{ $group->name }}
        </a>
        @endforeach
    </div>

</div>