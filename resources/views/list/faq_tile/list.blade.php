{{-- 위젯 헤더 --}}
<div class=" mb-3">
    <h2 class="fw-bolder">
        @if (isset($widget['title']))
            {{ $widget['title'] }}
        @endif
    </h2>
    <p class="text-muted">
        @if (isset($widget['subtitle']))
            {{ $widget['subtitle'] }}
        @endif
    </p>
</div>

<div class="row">
    @foreach ($rows as $i => $item)
    <div class="col-md-6 col-12">
        <!-- col -->
        <div class="mb-6 pe-lg-8">
            <h5 class="mb-2">{{ $item['question'] }}</h5>
            <p class="fs-6">{{ $item['answer'] }}</p>

            @if ($design && isAdmin())
            <button class="btn btn-sm btn-outline-primary" wire:click="edit({{ $i }})">
                수정
            </button>
            @endif

        </div>
    </div>
    @endforeach
</div>
