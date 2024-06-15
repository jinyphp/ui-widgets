<div class="text-center">
    <h2 class="fw-bolder">FAQ</h2>
    {{--
    <p class="lead fw-normal text-muted mb-5">
        Dedicated to quality and your success
    </p>
    --}}
</div>

<div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
    <ul class="list-group">
        @foreach ($rows as $i => $item)
        <li class="list-group-item">
            <h5 class="fw-bolder" wire:click="edit({{$i}})">
                {{$item['question']}}
            </h5>
            <div class="fst-italic text-muted">
                {{$item['answer']}}
            </div>
        </li>
        @endforeach
    </ul>
</div>
