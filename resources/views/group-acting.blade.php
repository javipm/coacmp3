<x-layout>
    <section class="mt-2 mb-2">
        {{ Breadcrumbs::render('group', $group) }}
    </section>

    <section class="container w-full mx-auto h-full items-center">
        <h1 class="font-title text-2xl text-orange-600 mb-8">{{$group->modality->name}} {{ $group->name }}</h1>

        <div class="xl:grid grid-cols-3 gap-10 ">
            <div class="col-span-1 mb-10 md:mb-0 shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                <x-group.card :group="$group" />
                <x-group.audio-player :actings="$actings" :initialSong="$initialSong"
                    :actingSelected="$actingSelected" />
            </div>

            <article class="col-span-2 mb-10 md:mb-0 [&>p]:text-sm [&>p]:pb-4 [&>p]:text-gray-600">
                {!! $group->description !!}
            </article>
        </div>
    </section>
</x-layout>