<div>
    <x-navtab class="mb-3 nav-bordered">
        <x-navtab-item class="show active" >
            <x-navtab-link class="rounded-0 active">
                <span class="d-none d-md-block">Items</span>
            </x-navtab-link>
            <div class="mb-3">
                <label for="simpleinput" class="form-label">이름</label>
                <input type="text" class="form-control"
                            wire:model.defer="forms.name">
            </div>

            <div class="mb-3">
                <label for="simpleinput" class="form-label">유형</label>
                <textarea class="form-control" id="example-textarea" rows="5"
                wire:model.defer="forms.type">

                </textarea>
            </div>

            <div class="mb-3">
                <label for="simpleinput" class="form-label">기본 값</label>
                <textarea class="form-control" id="example-textarea" rows="5"
                wire:model.defer="forms.default">

                </textarea>
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