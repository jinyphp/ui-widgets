<div class="row gx-5 align-items-center">
    <div class="col-lg-6 order-first order-lg-last">
        @if(isset($rows['image']))
        <img class="img-fluid rounded mb-5 mb-lg-0"
            src="/{{$rows['image']}}"
            alt="..." />
        @else
        <img class="img-fluid rounded mb-5 mb-lg-0"
            src="https://dummyimage.com/600x400/343a40/6c757d"
            alt="..." />
        @endif
    </div>
    <div class="col-lg-6">
        <h2 class="fw-bolder">
            @if(isset($rows['title']))
            {!! $rows['title'] !!}
            @endif
        </h2>
        <p class="lead fw-normal text-muted mb-0">
            @if(isset($rows['description']))
            {!! $rows['description'] !!}
            @endif
        </p>
    </div>
</div>
