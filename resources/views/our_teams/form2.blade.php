<div class="mb-3">
    <label for="simpleinput" class="form-label">이름</label>
    <input type="text" class="form-control"
                wire:model.defer="forms.name">
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">직위</label>
    <textarea class="form-control" id="example-textarea" rows="5"
    wire:model.defer="forms.position">

    </textarea>
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">사진</label>
    <input type="file" class="form-control"
                wire:model.defer="forms.image">
    <p>
        @if(isset($forms['image']))
        {{$forms['image']}}
        @endif
    </p>
</div>

dfklasjdf;jk
