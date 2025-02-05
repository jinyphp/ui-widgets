<div style="position: relative;">

    {{-- 위젯 설정버튼 --}}
    @if($design && isAdmin())
    <div style="position: absolute;top:4px;right:4px;z-index:50;">
        <span class="text-primary" wire:click="create">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
        </span>

        <span wire:click="setting">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
            </svg>
        </span>
    </div>
    @endif

    {{-- 목록화면 --}}
    @includeIf($viewList)


    <!-- 팝업 데이터 수정창 -->
    @if ($popupForm)
    <x-wire-dialog-modal wire:model="popupForm" maxWidth="3xl">
        <x-slot name="title">
            <div class="d-flex justify-content-between">
                <div>
                    @if ($edit_id)
                    {{ __('수정') }}
                    @else
                    {{ __('신규 입력') }}
                    @endif
                </div>
                <div>
                    <button class="btn btn-sm btn-secondary"
                        wire:click="widgetPopup">
                        위젯설정
                    </button>
                </div>
            </div>


        </x-slot>

        <x-slot name="content">
            @if($setup)
                @includeIf("jiny-widgets::widgets.layout_form")
            @else
                @includeIf($viewForm)
            @endif
        </x-slot>

        <x-slot name="footer">
            @if ($edit_id)
            {{-- 수정폼--}}
            <x-flex-between>
                <div> {{-- 2단계 삭제 --}}
                    @if($popupDelete)
                    <span class="text-red-600">정말로 삭제를 진행할까요?</span>
                    <button type="button" class="btn btn-danger" wire:click="deleteConfirm">삭제</button>
                    @else
                    <button type="button" class="btn btn-warning" wire:click="delete">삭제</button>
                    @endif
                </div>
                <div> {{-- right --}}
                    <button type="button" class="btn btn-secondary"
                        wire:click="cancel">취소</button>
                    <button type="button" class="btn btn-info"
                        wire:click="update">수정</button>
                </div>
            </x-flex-between>

            @else
            {{-- 생성폼 --}}
            <div class="flex justify-between">
                <div>
                    <button type="button" class="btn btn-danger"
                        wire:click="resetItems">초기화</button>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-secondary"
                        wire:click="cancel">취소</button>
                    <button type="button" class="btn btn-primary"
                        wire:click="store">저장</button>
                </div>
            </div>
            @endif
        </x-slot>
    </x-wire-dialog-modal>
    @endif

    {{-- 위젯 선택창 --}}
    @if(isset($widget_select) && $widget_select)
    <x-wire-dialog-modal wire:model="widget_select" maxWidth="5xl">
        <x-slot name="title">
            <div class="d-flex justify-content-between">
                <div>변경할 위젯을 선택해 주세요</div>
                <div>
                    <a href="/admin/site/widget" class="btn btn-sm btn-secondary">Admin</a>
                </div>
            </div>

        </x-slot>
        <x-slot name="content">
            <div class="container" style="max-height:70vh; overflow-y:auto;">
                <style>
                    .widget-card:hover {
                        background-color: #f8f9fa;
                        cursor: pointer;
                        transition: background-color 0.2s ease;
                    }
                </style>
                <div class="row row-cols-3">
                    @foreach($widget_type as $id => $item)
                    <div class="col mb-3">
                        <div class="card h-100 widget-card" wire:click="widgetPopupSelect({{ $id }})">
                            @if(isset($item['image']) && $item['image'])
                                <div style="aspect-ratio: 16/9; overflow:hidden;">
                                    <img src="{{$item['image']}}"
                                        class="card-img-top w-100 h-100 object-cover"
                                        alt="{{ $item['name'] }}">
                                </div>
                            @else
                                <div style="aspect-ratio: 16/9; background-color: #e9ecef;" class="d-flex align-items-center justify-content-center">
                                    <i class="bi bi-image text-secondary" style="font-size: 2rem;"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['name'] }}</h5>
                                <p class="card-text">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="d-flex justify-content-between">
                <div>
                    <button type="button" class="btn btn-secondary"
                        wire:click="widgetPopupClose">취소
                    </button>
                </div>
                <div>
                    {{-- <button type="button" class="btn btn-primary"
                        wire:click="widgetPopupSelect">선택</button> --}}
                </div>
            </div>
        </x-slot>
    </x-wire-dialog-modal>
    @endif

</div>
