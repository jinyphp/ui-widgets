<div class="row justify-content-center">
    <div class="col-lg-8 col-xxl-6">
        <div class="text-center my-5">

            <h1 class="fw-bolder mb-3">
                @if(isset($rows['title']))
                {!! $rows['title'] !!}
                @endif
            </h1>
            <p class="lead fw-normal text-muted mb-4">
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
</div>
