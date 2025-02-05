<div>
    <x-navtab class="mb-3 nav-bordered">

        <!-- formTab -->
        <x-navtab-item class="show active" >

            <x-navtab-link class="rounded-0 active">
                <span class="d-none d-md-block">기본정보</span>
            </x-navtab-link>

            <x-form-hor>
                <x-form-label>활성화</x-form-label>
                <x-form-item>
                    {!! xCheckbox()
                        ->setWire('model.defer',"forms.enable")
                    !!}
                </x-form-item>
            </x-form-hor>


            <x-form-hor>
                <x-form-label>
                    {{-- 유형 --}}
                    <a href="/admin/site/widget/type" class="btn btn-sm btn-primary">위젯타입</a>
                </x-form-label>
                <x-form-item>
                    {!! xSelect()
                        ->table('site_widget_type','type')
                        ->setWire('model.defer',"forms.type")
                        ->setWidth("medium")
                    !!}
                </x-form-item>
            </x-form-hor>


            <x-form-hor>
                <x-form-label>이름</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.name")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            {{-- <x-form-hor>
                <x-form-label>국가명</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.name")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor> --}}

            <x-form-hor>
                <x-form-label>스넵샷</x-form-label>
                <x-form-item>
                    <input type="file" class="form-control"
                            wire:model.defer="forms.image">
                    @if(isset($forms['image']))
                    <div class="p-2">파일명: {{$forms['image']}}</div>
                    <img src="{{$forms['image']}}" width="100px" alt="">
                    @endif
                </x-form-item>
            </x-form-hor>





            <x-form-hor>
                <x-form-label>메모</x-form-label>
                <x-form-item>
                    {!! xTextarea()
                        ->setWire('model.defer',"forms.description")
                    !!}
                </x-form-item>
            </x-form-hor>

        </x-navtab-item>


        <!-- formTab -->
        <x-navtab-item class="">
            <x-navtab-link class="rounded-0">
                <span class="d-none d-md-block">레이아웃</span>
            </x-navtab-link>

            <x-form-hor>
                <x-form-label>리스트</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.view_list")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>Forms</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.view_form")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>


        </x-navtab-item>



    </x-navtab>
</div>
