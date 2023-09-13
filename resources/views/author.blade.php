<x-layout :seoModel="$author">
    <section class="mt-2 mb-6">
        {{ Breadcrumbs::render('author', $author) }}
    </section>

    @section('breadcrumbs-json-ld')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'author', $author) }}
    @endsection

    <section class="container w-full mx-auto h-full items-center">
        <h1 class="font-title text-2xl text-orange-600 mb-6">
            {{ $author->name }}
        </h1>

        <div class="md:grid grid-cols-3 gap-10">
            @if($author->biography)
            <article class="md:col-span-2 mb-10 md:mb-0
            [&>h3]:text-md [&>h3]:font-title [&>h3]:text-orange-800 [&>h3]:pb-4
            [&>p]:text-sm [&>p]:pb-4 [&>p]:text-gray-600
            [&>ul>li]:mb-4 [&>ul>li]:pl-5 [&>ul>li]:text-sm">
                {!! $author->biography !!}
            </article>


            @endif

            <div class="rounded w-full h-full m-auto">
                <div class="pb-4">
                    <h3 class="text-md font-bold text-orange-800">Últimas agrupaciones del autor</h3>
                </div>
                <ul class="w-full flex flex-col">
                    @foreach ($author->groups() as $group)
                    <a class="tag px-2 py-2 mb-2 rounded bg-orange-200 text-orange-800 text-sm hover:bg-orange-300 transition duration-200 ease-in-out"
                        href="{{ route('group', ['modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug]) }}">
                        {{$group->modality->name }} {{ $group->name }}
                    </a>
                    @endforeach
                </ul>
            </div>

    </section>

</x-layout>