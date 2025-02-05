<div class="row">
    @if (!empty($rows))
        @foreach ($rows as $item)
            <div class="col-md-3 mb-3">
                <div class="card">
                    @if ($item->image)
                        <div style="aspect-ratio: 16/9; overflow:hidden;">
                            <img src="{{ $item->image }}" class="card-img-top w-100 h-100 object-cover"
                                alt="{{ $item->name }}">
                        </div>
                    @else
                        <div style="aspect-ratio: 16/9; background-color: #e9ecef;"
                            class="d-flex align-items-center justify-content-center">
                            <i class="bi bi-image text-secondary" style="font-size: 2rem;"></i>
                        </div>
                    @endif


                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <div class="d-flex justify-content-between">
                            <div>
                                <small class="text-muted">{{ $item->created_at }}</small>
                            </div>
                            <div>
                                <x-click wire:click="edit({{ $item->id }})" class="btn btn-primary">Edit</x-click>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
