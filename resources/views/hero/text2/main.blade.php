<div class="p-4 p-lg-5 bg-light rounded-3 text-center">
    <div class="m-4 m-lg-5">
        <h1 class="display-5 fw-bold">
            @if(isset($rows['title']))
                {!! $rows['title'] !!}
            @endif
        </h1>

        <p class="fs-4">
            @if(isset($rows['description']))
                {!! $rows['description'] !!}
            @endif
        </p>

        @if(isset($rows['link']))
            <a class="btn btn-primary btn-lg" href="{{$rows['link']}}">
                @if(isset($rows['link_title']))
                {!! $rows['link_title'] !!}
                @else
                Click
                @endif
            </a>
        @endif

    </div>
</div>
