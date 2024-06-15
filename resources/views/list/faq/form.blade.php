<div>
    <x-navtab class="mb-3 nav-bordered">

        <!-- formTab -->
        <x-navtab-item class="show active" >
            <x-navtab-link class="rounded-0 active">
                <span class="d-none d-md-block">Items</span>
            </x-navtab-link>
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Question</label>
                <input type="text" class="form-control"
                            wire:model.defer="forms.question">
            </div>

            <div class="mb-3">
                <label for="simpleinput" class="form-label">Answer</label>
                <textarea class="form-control" id="example-textarea" rows="5"
                wire:model.defer="forms.answer">
                </textarea>
            </div>


        </x-navtab-item>

    </x-navtab>

</div>
