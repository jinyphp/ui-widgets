<div>
    <div class="mb-3">
        <label for="simpleinput" class="form-label">Blade</label>
        <textarea class="form-control" id="example-textarea" rows="20"
        wire:model.defer="blade">

        </textarea>
    </div>

    <x-flex-between>
        <div></div>
        <div>
            <button class="btn btn-second" wire:click="codeEditClose()">Cancel</button>
            <button class="btn btn-primary" wire:click="codeEditUpdate()">Update</button>
        </div>
    </x-flex-between>


</div>
