<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        @foreach ($rows as $i => $item)
        <button type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="{{$i-1}}"
            @if(($i-1) == 0)
            class="active"
            @endif
            aria-current="true" aria-label="Slide {{$i-1}}"></button>

        @endforeach

    </div>

    <div class="carousel-inner">
        @foreach ($rows as $i => $item)
        <div class="carousel-item
            @if($i == 1)
                active
            @endif
            ">

            @if(isset($item['image']))
            <img class="d-block w-100"
                src="{{$item['image']}}"
                alt="..." />
            @else
            <img src="https://dummyimage.com/600x300/343a40/6c757d"
                class="d-block w-100" alt="...">
            @endif

            <div class="carousel-caption d-none d-md-block">
                <h5 wire:click="edit({{$i}})">
                    @if(isset($item['title']))
                    {!! $item['title'] !!}
                    @endif
                </h5>
                <p>
                    @if(isset($item['description']))
                    {!! $item['description'] !!}
                    @endif
                </p>
            </div>
        </div>
        @endforeach

    </div>

    <button class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
