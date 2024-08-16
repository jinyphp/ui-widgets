<div class="mx-4 mb-24 mt-8 md:mx-48">
    @if(isset($rows['title']))
        <h1 class="text-4xl mb-4 font-extrabold">
            {!! $rows['title'] !!}
        </h1>
    @endif
    @if(isset($rows['description']))
        <p style="white-space: pre-line;" class="text-xl m-0">{!! $rows['description'] !!}</p>
    @endif
</div>