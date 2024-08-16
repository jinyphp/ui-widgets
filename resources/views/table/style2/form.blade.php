
<div>
    <x-navtab class="mb-3 nav-bordered">
        <x-navtab-item class="show active" >
            <x-navtab-link class="rounded-0 active">
                <span class="d-none d-md-block">Items</span>
            </x-navtab-link>
            <div class="mb-3">
                <label for="simpleinput" class="form-label">방법</label>
                <input type="text" class="form-control"
                            wire:model.defer="forms.method">
            </div>

            <div class="mb-3">
                <label for="simpleinput" class="form-label">설명</label>
                <textarea class="form-control" id="example-textarea" rows="5"
                wire:model.defer="forms.description">

                </textarea>
            </div>            
        </x-navtab-item>
    </x-navtab>

</div>

