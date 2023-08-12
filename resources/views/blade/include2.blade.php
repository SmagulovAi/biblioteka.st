{{-- наследование от шаблона app из папки layouts --}}
@extends('layouts.app')

{{-- изменение содержимого секции content --}}
@section('content')
    Include 2
@endsection

{{-- изменение содержимого секции menu --}}
@section('menu')
    <ul>
        <li>О нас</li>
        <li>Заказать</li>
    </ul>
@endsection
