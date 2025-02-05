<div>
    <div class="mb-3">
        <label for="simpleinput" class="form-label">타이틀</label>
        <input type="text" class="form-control" wire:model.defer="widget.title">
    </div>

    {{-- <x-form-hor>
        <x-form-label>스넵샷</x-form-label>
        <x-form-item>
            <input type="file" class="form-control"
                    wire:model.defer="widget.image">
            @if(isset($widget['image']))
            <div class="p-2">파일명: {{$widget['image']}}</div>
            <img src="{{$widget['image']}}" width="100px" alt="">
            @endif
        </x-form-item>
    </x-form-hor> --}}

    <div class="mb-3">
        <label for="simpleinput" class="form-label">설명</label>
        <textarea class="form-control" id="example-textarea" rows="5"
            wire:model.defer="widget.subtitle">
        </textarea>
    </div>

    <x-ui-divider>위젯</x-ui-divider>



    <div class="d-flex gap-2">
        <div class="flex-grow-1">
            @if(isset($widget['name']))
            <h4 class="mb-3">{{ $widget['name'] }}</h4>
            @endif
        </div>
        <div>
            <button class="btn btn-warning" wire:click="widgetApply">적용</button>
        </div>
    </div>


    <div class="mb-3">
        <label for="simpleinput" class="form-label">List</label>
        <input type="text" class="form-control" wire:model.defer="widget.view.list">
    </div>

    <div class="mb-3">
        <label for="simpleinput" class="form-label">Form</label>
        <input type="text" class="form-control" wire:model.defer="widget.view.form">
    </div>


</div>
