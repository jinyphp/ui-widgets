<div>
    <x-navtab class="mb-3 nav-bordered">

        <!-- formTab -->
        <x-navtab-item class="show active" >
            <x-navtab-link class="rounded-0 active">
                위젯정보
            </x-navtab-link>

            <div class="mb-3">
                <label for="simpleinput" class="form-label">타이틀</label>
                <input type="text" class="form-control"
                    wire:model.defer="widget.title">
            </div>

            <div class="mb-3">
                <label for="simpleinput" class="form-label">설명</label>
                <textarea class="form-control" id="example-textarea" rows="5"
                    wire:model.defer="widget.subtitle">
                </textarea>
            </div>

        </x-navtab-item>

        <!-- formTab -->
        <x-navtab-item>
            <x-navtab-link class="rounded-0">
                위젯폼
            </x-navtab-link>

            <div class="mb-3">
                <label for="simpleinput" class="form-label">List</label>
                <input type="text" class="form-control"
                            wire:model.defer="widget.view.list">
            </div>

            <div class="mb-3">
                <label for="simpleinput" class="form-label">Form</label>
                <input type="text" class="form-control"
                            wire:model.defer="widget.view.form">
            </div>

        </x-navtab-item>

    </x-navtab>
</div>
