<x-www-preview>
    @if(isset($rows['description']))
        <p style="white-space: pre-line;" class="alert alert-primary">{{ $rows['description'] }}</p>
    @endif
</x-www-preview>