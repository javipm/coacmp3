<x-layout :seoModel="$modality">
    <section class="mt-2 mb-2">
        {{ Breadcrumbs::render('modality', $modality) }}
    </section>

    <section class="container w-full mx-auto h-full items-center">
        <h1 class="font-title text-2xl text-orange-600 mb-6">
            {{ Str::plural($modality->name) }}
        </h1>

        @if($modality->description)
        <article class="mb-10 md:mb-0
            [&>h3]:text-md [&>h3]:font-title [&>h3]:text-orange-800 [&>h3]:pb-4
            [&>p]:text-xs [&>p]:pb-4 [&>p]:text-gray-600">
            {!! $modality->description !!}
        </article>

        <article>
            <h2 class="font-title text-md text-orange-800 pb-4">{{ Str::plural($modality->name) }}
                @if ($modality->name == 'Cuarteto'||$modality->name == 'Coro')
                destacados
                @else
                destacadas
                @endif
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 ">
                @foreach($groups as $group)
                <a class="shadow hover:shadow-xl
                @if (count($groups) == 1)
                col-span-2
                @else
                col-span-1
                @endif
                " href="{{ route('group', ['modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug]) }}"
                    title="{{$group->name}}">
                    <x-group.card :group="$group" :outside="true" />
                </a>
                @endforeach
            </div>
        </article>
        @endif

    </section>

</x-layout>