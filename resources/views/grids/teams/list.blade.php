<style>
    .avatar-wrapper {
        width: 150px;
        height: 150px;
        overflow: hidden;
        /*border-radius: 50%;*/
        margin: 0 auto;
    }
    .avatar-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">

    @foreach ($rows as $i => $item)
    <div class="col mb-5 mb-5 mb-xl-0">
        <div class="text-center">
            <div class="avatar-wrapper mb-4">
                @if(isset($item['image']))
                <img class="avatar-image"
                    src="{{$item['image']}}"
                    alt="..." />

                @else
                <img class="avatar-image"
                    src="https://dummyimage.com/150x150/ced4da/6c757d"
                    alt="..." />
                @endif
            </div>
            @if($design)
            <h5 class="fw-bolder" wire:click="edit({{$i}})">
                {{$item['name']}}
            </h5>
            @else
            <h5 class="fw-bolder">
                {{$item['name']}}
            </h5>
            @endif

            @if(isset($item['position']))
            <div class="fst-italic text-muted">
                {{$item['position']}}
            </div>
            @endif
        </div>
    </div>
    @endforeach

</div>


