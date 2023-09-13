<x-layout :seoModel="$SEOData">
    <section class="mt-2 mb-6">
        {{ Breadcrumbs::render('group', $group) }}
    </section>

    @section('breadcrumbs-json-ld')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'group', $group) }}
    @endsection

    <section class="container w-full mx-auto h-full items-center">
        <h1 class="font-title text-2xl text-orange-600 mb-6">
            {{$group->modality->name}} {{ $group->name }}
        </h1>

        <div class="xl:grid grid-cols-3 gap-10">
            <article class="col-span-2">
                <x-group.card :group="$group" />
                <x-group.audio-player :actings="$actings" :initialSong="$initialSong"
                    :actingSelected="$actingSelected" />
            </article>

            <aside class="flex flex-col">
                <livewire:aside-related-component />
            </aside>
        </div>


    </section>
</x-layout>