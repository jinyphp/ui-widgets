<div class="text-center">
    <h2 class="fw-bolder">Our team</h2>
    <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
</div>

<div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">

    @foreach ($rows as $i => $item)
        <div class="col mb-5 mb-5 mb-xl-0">
            <div class="text-center">
                @if(isset($item['image']))
                    <img class="img-fluid rounded-circle mb-4 px-4"
                        src="{{$item['image']}}"
                        alt="..." />
                @else
                    <img class="img-fluid rounded-circle mb-4 px-4"
                        src="https://dummyimage.com/150x150/ced4da/6c757d"
                        alt="..." />
                @endif
                <h5 class="fw-bolder" wire:click="edit({{$i}})">{{$item['name']}}</h5>
                <div class="fst-italic text-muted">{{$item['position']}}</div>
            </div>
        </div>

    @endforeach

</div>
