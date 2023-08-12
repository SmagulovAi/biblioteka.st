{{-- какая-то форма, которая отправляет запрос методом POST на маршрут /request/method --}}
<form action="/request/method" method="POST">
    @csrf {{-- для POST запросов нужен CSRF токен --}}
    <button>Узнать метод</button>
</form>
