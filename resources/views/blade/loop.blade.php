{{-- подключение вьюшки header из папки parts --}}
@include('parts.header')

{{-- цикл for, цикл со счетчиком --}}
@for($i = 0; $i < $number; $i++)
    <p>Строка номер {{ $i+1 }}</p>
@endfor

<ul>
    {{-- цикл foreach перебирающий элементы массива $names --}}
    @foreach($names as $key => $name)
        <li>{{ $key }}: {{ $name }}</li>
    @endforeach
</ul>

{{-- цикл foreach перебирающимож массива $users с проверкой на пустоту --}}
@forelse($users as $key => $user)
    <p>{{ $key }}: {{ $user }}</p>
@empty
    {{-- если массив оказался пустой, то выводится этот текст --}}
    <h3>Массив пустой</h3>
@endforelse

{{-- цикл while --}}
@while($b < 10)
    @if($b++ == 5)
        {{-- прерывание текущей итерации --}}
        @continue
    @endif
    @if($b == 7)
        {{-- прерывание всего цикла --}}
        @break
    @endif
    <p>. {{ $b++ }}</p>
@endwhile
