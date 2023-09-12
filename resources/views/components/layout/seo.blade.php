@if (isset($model))
{!! seo()->for($model) !!}
@else
<title>@yield('title')</title>
<meta name="description" content="@yield('description')" />
@endif