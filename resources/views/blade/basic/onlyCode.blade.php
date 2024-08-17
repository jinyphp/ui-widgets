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
        <div class="bg-gray-300 p-3 mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content p-3" id="pills-tabTwoContent">

                        <pre
                            class="bg-gray-300 m-0">
                            <code class="language-markup bg-gray-300 ">
                                {!! code_view($rows['code']) !!}
                            </code></pre>

                    </div>
                </div>
            </div>
        </div>
    @endif

</x-www-preview>
