<div class="w-full hidden xl:block xl:border-l-2 border-solid border-orange-200 pl-10 h-full">
    <div class="relative h-14 py-4 text-center ">
        <h3 class="text-md font-bold text-orange-600">Otros grupos destacados</h3>
    </div>
    <ul class="w-full flex flex-col">
        @foreach ($groups as $group)
        <a class="text-sm py-2 px-4 bg-white bg-opacity-50 border border-orange-100 rounded-lg mb-2 text-gray-900 shadow shadow-orange-200 hover:shadow-lg hover:text-orange-600"
            href="{{ route('group', ['modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug]) }}">
            {{ $group->name }}
        </a>
        @endforeach
    </ul>
    <div class="relative h-14 py-4 text-center ">
        <h3 class="text-md font-bold text-orange-600">Otros autores destacados</h3>
    </div>
    <ul class="w-full flex flex-col">
        @foreach ($authors as $author)
        <a class="text-sm py-2 px-4 bg-white bg-opacity-50 border border-orange-100 rounded-lg mb-2 text-gray-900 shadow shadow-orange-200 hover:shadow-lg hover:text-orange-600"
            href="#">
            {{ $author->name }}
        </a>
        @endforeach
    </ul>
</div>