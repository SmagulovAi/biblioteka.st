Hello,

{{-- увидит только зареганный --}}
@auth
    вы аутентифицированы. Привет, {{ auth()->user()->name }}
@endauth

{{-- увидит только гость --}}
@guest
    вы гость
@endguest

@auth
    {{-- проверка на право --}}
    @can('is-admin')
        <h3 style="color: blue;">Вы администратор</h3>
    @else
        <h4 style="color: red;">Вы не администратор</h4>
    @endcan
@endauth

{{-- то же самое --}}
@if(auth()->user()->can('is-admin'))
    <ul>
        <li>Меню</li>
    </ul>
@endif
