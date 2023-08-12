{{-- наследование от шаблона app из папки layouts --}}
@extends('layouts.app')

{{-- изменение содержимого секции title --}}
@section('title' , 'Страница Include')

{{-- изменение содержимого секции content --}}
@section('content')
    {{-- подключение вьюшки header из папки parts --}}
    @include('parts.header')
@endsection

{{-- добавление стиля в стэк styles --}}
@push('styles')
<link rel="stylesheet" href="style.css">
@endpush

{{-- добавление еще одного стиля в стэк styles --}}
@push('styles')
<link rel="stylesheet" href="style2.css">
@endpush

{{-- добавление еще одного стиля в начало стэка styles --}}
@prepend('styles')
<link rel="stylesheet" href="style3.css">
@endprepend

{{-- добавление пункта в стэк links --}}
@push('links')
    <li>include</li>
@endpush