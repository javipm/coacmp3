@unless ($breadcrumbs->isEmpty())
<nav class="container mx-auto">
    <ol class="px-0 pb-4 rounded flex flex-wrap text-xs text-gray-600">
        <li><i class='bx bxs-home text-xs mr-2 text-orange-600 font-bold'></i> </li>
        @foreach ($breadcrumbs as $breadcrumb)
        @if ($breadcrumb->url && !$loop->last)
        <li>
            <a wire:navigate href="{{ $breadcrumb->url }}"
                class="text-orange-600 hover:text-orange-900 hover:underline focus:text-orange-900 focus:underline">
                {{ $breadcrumb->title }}
            </a>
        </li>
        @else
        <li>
            {{ $breadcrumb->title }}
        </li>
        @endif

        @unless($loop->last)
        <li class="text-gray-500 px-2">
            /
        </li>
        @endif

        @endforeach
    </ol>
</nav>
@endunless