@php
    $uid = uniqid(mt_rand(), true);
    // 소수점(.)을 빈 문자열로 대체하여 제거
    $uid = str_replace('.', '', $uid);
@endphp
<x-www-preview>
    <div>
        @if(isset($rows['title']))
            <h3 class="text-3xl font-bold mb-4">
                {!! $rows['title'] !!}
            </h3>
        @endif
        @if(isset($rows['description']))
               <p class="text-lg m-0" style="white-space: pre-line;">{{ $rows['description'] }}</p>
        @endif
    </div>

    @if(isset($rows['code']))
        <div class="py-3 mt-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="pills-tabTwoContent">

                        <pre style="background-color: #1e1e1e;"><code style="font-size:0.8rem;">{!! code_view($rows['code']) !!}</code></pre>

                    </div>
                </div>
            </div>
        </div>
    @endif
</x-www-preview>