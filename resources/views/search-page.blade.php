@section('title')
Búsqueda de agrupaciones - {{ env('APP_NAME')}}
@endsection

@section('description')
Puedes buscar de manera cómoda y sencilla las agrupaciones que te interesen en la plataforma
@endsection

<x-layout>
    <section class="mt-2 mb-6">
        {{ Breadcrumbs::render('search') }}
    </section>

    @section('breadcrumbs-json-ld')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'search') }}
    @endsection

    <livewire:search-component />
</x-layout>