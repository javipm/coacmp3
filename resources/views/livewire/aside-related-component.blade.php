<div class="hidden xl:block px-10 rounded w-full m-auto">
    <div class="h-14 pb-4 ">
        <h3 class="text-md font-bold text-orange-800">Grupos más vistos</h3>
    </div>
    <ul class="w-full flex flex-col">
        @foreach ($groups as $group)
        <div class="mb-2">
            <span
                class="inline-block text-sm p-2 mr-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-md">{{
                $loop->index +1 }}º</span>
            <a class="text-sm py-2 px-4  text-orange-600 hover:text-orange-900 hover:underline focus:text-orange-900 focus:underline"
                href="{{ route('group', ['modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug]) }}">
                {{ $group->name }}
            </a>
        </div>
        @endforeach
    </ul>
    <div class="h-14 mt-4 pb-4 ">
        <h3 class="text-md font-bold text-orange-800">Autores más vistos</h3>
    </div>
    <ul class="w-full flex flex-col">
        @foreach ($authors as $author)
        <div class="mb-2">
            <span
                class="inline-block text-sm p-2 mr-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-md">{{
                $loop->index +1 }}º</span>
            <a class="text-sm py-2 px-4  text-orange-600 hover:text-orange-900 hover:underline focus:text-orange-900 focus:underline"
                href="#">
                {{ $author->name }}
            </a>
        </div>
        @endforeach
    </ul>
</div>