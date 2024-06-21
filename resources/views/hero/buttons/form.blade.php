<h3>버튼</h3>
<div class="mb-3">
    <label for="simpleinput" class="form-label">스타일</label>
    <select class="form-control" wire:model.defer="forms.style">
        <option value="primary" selected>Primary</option>
        <option value="secondary">Secondary</option>
        <option value="success">Success</option>
        <option value="danger">Danger</option>
        <option value="info">Info</option>
        <option value="warning">Warning</option>
    </select>
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">타이틀</label>
    <input type="text" class="form-control"
        wire:model.defer="forms.link_title">
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">url</label>
    <input type="text" class="form-control"
        wire:model.defer="forms.link">
</div>
