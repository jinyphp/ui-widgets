<x-www-preview>
    @if(isset($rows['description']))
        <p style="white-space: pre-line;" class="font-semibold border-s-4 bg-yellow-100 border-yellow-400 shadow overflow-hidden py-3 ps-4">{{ $rows['description'] }}</p>
    @endif
</x-www-preview>