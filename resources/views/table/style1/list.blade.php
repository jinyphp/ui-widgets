<x-www-preview>
    <table class="table-auto w-full border-collapse border-2 border-black text-black">
        <thead>
            @if(isset($rows[1]))
                @foreach (array_slice($rows[1], 0, -2) as $key => $i)
                    <!-- 마지막 두 요소를 제외 -->
                    <th class="divide-x-2 text-lg p-2">
                        {{$i}}
                    </th>
                @endforeach
            @endif
        </thead>
        <tbody>
            @if(isset($rows[1]))
                @foreach (array_slice($rows, 1) as $i => $item)
                    <tr class="divide-y-2 divide-x-2 divide-black text-md ">
                        @foreach (array_slice($item, 0, -2) as $value)
                            <!-- 각 행의 마지막 두 요소를 제외 -->
                            <td class="p-2">
                                {{$value}}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</x-www-preview>