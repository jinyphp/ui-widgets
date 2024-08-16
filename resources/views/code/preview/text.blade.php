<x-www-preview>

    @if(isset($rows['title']))
        <h2 class="text-3xl font-bold mb-4">
            {{ $rows['title'] }}
        </h2>
    @endif
    @if(isset($rows['description']))
        <p class="text-lg m-0" style="white-space: pre-line;">{{ $rows['description'] }}</p>
    @endif

</x-www-preview>