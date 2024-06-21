<div class="row justify-content-center">
    <div class="col-lg-8 col-xxl-6">
        <div class="text-center my-5">
            <h1 class="fw-bolder mb-3">
                @if(isset($widget['title']))
                {{$widget['title']}}
                @endif
            </h1>
            <p class="lead fw-normal text-muted mb-4">
                @if(isset($widget['subtitle']))
                {{$widget['subtitle']}}
                @endif
            </p>
        </div>


        @foreach ($rows as $i => $item)

            <a class="btn btn-primary btn-lg" wire:click="edit({{$i}})">
                @if(isset($item['link_title']))
                    {!! $item['link_title'] !!}
                @else
                    ... {{$i}}
                @endif
            </a>

            {{-- @if(isset($item['link']))
                <a class="btn btn-primary btn-lg" href="{{$item['link']}}">
                    @if(isset($item['link_title']))
                    {!! $item['link_title'] !!}
                    @else
                    ...
                    @endif
                </a>
            @else
                <button class="btn btn-primary btn-lg" >
                    @if(isset($item['link_title']))
                    {!! $item['link_title'] !!}
                    @else
                    ...
                    @endif
                </button>
            @endif --}}
        @endforeach


    </div>
</div>
