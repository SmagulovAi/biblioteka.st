{{-- Проверка, есть ли ошибки валидации --}}
@if($errors->any())
    <h3 style="color: red;">Есть ошибки заполнения формы:</h3>

    <ul>
        {{-- Перебор всех ошибок --}}
        @foreach($errors->all() as $error)
            {{-- Вывод текста ошибки --}}
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{--
    Форма отправляющая запрос методом POST на маршрут /request/create/order
    Маршрут можно поменять на /request/create/order2 или на /request/create/order3
    Разница - в разных методах контроллера обрабатывающих принимаемые данные, см. в web.php
--}}
<form action="/request/create/order" method="POST">
    @csrf {{-- CSRF токен --}}
    <p>
        Товар:
        <input type="text" name="product"
           {{-- Если есть ошибка валидации поля product, то добавим красную обводку --}}
            @style([
                'border: 1px solid red' => $errors->has('product')
            ])
           {{--
               Если будет ошибка валидации и запрос вернется на эту форму назад,
               то будет удобно если форма уже будет заполнена предыдущими данными
               Для этого используется функция old
           --}}
            value="{{ old('product') }}">
        {{-- Если есть ошибка валидации этого поля --}}
        @error('product')
            {{-- выведем сообщение об ошибке --}}
            <span style="color: red;">Здесь у вас ошибка: {{ $message }}</span>
        @enderror
    </p>
    {{-- В остальных полях та же логика --}}
    <p>
        Количество:
        <input type="text" name="quantity"
            @style([
                'border: 1px solid red' => $errors->has('quantity')
            ])
            value="{{ old('quantity') }}">
        @error('quantity')
            <span style="color: red;">Здесь у вас ошибка: {{ $message }}</span>
        @enderror
    </p>
    <p>
        Цвет:
        <input type="text" name="color"
            @style([
                'border: 1px solid red' => $errors->has('color')
            ])
            value="{{ old('color') }}">
        @error('color')
            <span style="color: red;">Здесь у вас ошибка: {{ $message }}</span>
        @enderror
    </p>
    <p>
        Размер:
        <input type="text" name="size"
            @style([
                'border: 1px solid red' => $errors->has('size')
            ])
            value="{{ old('size') }}">
        @error('size')
            <span style="color: red;">Здесь у вас ошибка: {{ $message }}</span>
        @enderror
    </p>
    <button>Создать заказ</button>
</form>
