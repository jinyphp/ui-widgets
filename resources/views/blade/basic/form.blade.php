<div class="mb-3">
    <label for="simpleinput" class="form-label">타이틀</label>
    <input type="text" class="form-control"
                wire:model.defer="forms.title">
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">설명</label>
    <textarea class="form-control" id="example-textarea" rows="5"
    wire:model.defer="forms.description">

    </textarea>
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">스넵삿</label>
    <input type="file" class="form-control"
                wire:model.defer="forms.image">
    <p>
        @if(isset($forms['image']))
        {{$forms['image']}}
        @endif
    </p>
</div>
{{--
<div class="mb-3">
    <label for="simpleinput" class="form-label">Blade</label>
    <textarea class="form-control" id="example-textarea" rows="5"
    wire:model.defer="forms.blade">

    </textarea>
</div> --}}




