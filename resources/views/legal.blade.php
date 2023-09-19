<x-layout :seoModel="$SEOData">

    <section class="mt-2 mb-6">
        {{ Breadcrumbs::render('legal') }}
    </section>

    @section('breadcrumbs-json-ld')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'legal') }}
    @endsection

    <section class="container w-full mx-auto h-full items-center">
        <h1 class="font-title text-2xl text-orange-600 mb-6">
            Aviso legal
        </h1>
        @if ($content)
        <article class="container mx-auto text-xs text-gray-600 leading-7 [&>p]:pt-5 [&>p]:pb-2 [&>ul>li]:pl-5">
            {!! $content !!}
        </article>
        @endif
    </section>

</x-layout>