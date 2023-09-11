@if (isset($model))
{!! seo()->for($model) !!}
@else
<title>@yield('title')</title>
@endif