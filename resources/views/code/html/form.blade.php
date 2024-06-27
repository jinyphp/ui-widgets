<x-navtab class="mb-3 nav-bordered">

    <!-- formTab -->
    <x-navtab-item class="show active" >
        <x-navtab-link class="rounded-0 active">
            <span class="d-none d-md-block">정보</span>
        </x-navtab-link>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Code</label>
            <textarea class="form-control" id="example-textarea" rows="5"
            wire:model.defer="forms.code">

            </textarea>
        </div>

    </x-navtab-item>

    <!-- formTab -->
    <x-navtab-item class="">
        <x-navtab-link class="rounded-0">
            <span class="d-none d-md-block">정보</span>
        </x-navtab-link>

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

    </x-navtab-item>

</x-navtab>



