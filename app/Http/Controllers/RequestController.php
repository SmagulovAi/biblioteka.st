<?php

namespace App\Http\Controllers;

// Request - объект запроса, приходящий автоматически на любой маршрут
use Illuminate\Http\Request;

// CreateOrderRequest - свой класс для обработки входящего запроса
use App\Http\Requests\CreateOrderRequest;

// создать свой RequestForm можно artisan-командой:
// php artisan make:request CreateOrderRequest

class RequestController extends Controller
{
    /**
     * Любой метод может принимать первым параметром
     * объект класса Request, в котором будет находиться запрос пользователя
     * (куки, заголовки, переданные поля и т.п.)
     * Если также нужно принимать url-параметры, то можно их перечислить следующими аргументами
     * Типа вот так: showMethod(Request $request, $customParam)
     */
    public function showMethod(Request $request)
    {
        dump($request->method()); // получить метод, которым пришел запрос
        if ($request->isMethod('get')) {
        } // проверка, пришел ли запрос с указанным методом
        if ($request->method() == 'get') {
        } // то же самое, только сравнением
        if ($request->is('request/method')) {
        } // проверка, что сейчас мы находимся на странице request/method
        if ($request->is('request/*')) {
        } // проверка, что сейчас мы находимся на любой вложенной странице внутри request/
        if ($request->routeIs('request.method')) {
        } // проверка, что сейчас мы находимся на роутере с названием request.method
        if ($request->routeIs('request.*')) {
        } // проверка, что сейчас мы находимся на роутере у которого название начинается на request.
    }

    /**
     * Метод возвращающий вьюшку с формой
     */
    public function showForm()
    {
        return view('requests.form');
    }

    /**
     * Метод возвращающий вьюшку с другой формой
     */
    public function showFormCart()
    {
        return view('requests.cart');
    }

    /**
     * Метод для обработки данных с формы
     */
    public function createOrder(Request $request)
    {
        dump($request->query('product')); // получение query параметра с названием product
        dump($request->input('product')); // получение переданного поля с названием product
        dump($request->product); // аналогично предыдущему
        if ($request->has('product')) {
        } // проверка, что поле product обязательно должно быть передано
        if ($request->has(['size', 'quantity'])) {
        } // оба поля должны быть переданы
        if ($request->hasAny(['size', 'quantity'])) {
        } // хотя бы одно поле должно быть передано
        if ($request->filled('product')) {
        } // поле должно быть передано и заполнено
        if ($request->anyFilled(['product', 'size'])) {
        } // какое-то из полей должно быть заполнено
        if ($request->missing('product')) {
        } // поле должно отсутствовать
        dd($request->collect()); // получить коллекцию из всех полей
        dd($request->all()); // получить массив из всех полей
        dd($request->input()); // получить массив из всех полей
        dd($request->except(['_token'])); // получить массив из всех полей, кроме указанных
        dd($request->only(['product', 'quantity'])); // получить массив из указанных полей

        if ($request->product == '123') {
            return redirect('/request/cart')->withInput( // редирект на страницу со старыми значениями полей
                $request->except(['color']) // кроме указанных
            );
        }
    }

    /**
     * Метод для обработки данных с формы с валидацией внутри контроллера
     */
    public function createOrder2(Request $request)
    {
        // для валидации полей вызывается метод validate,
        // в который передается массив правил
        // ключ - название поля
        // значение - список правил
        // список правил можно задать строкой, разделяю правила вертикальной чертой
        // или задать массивом
        $request->validate([
            'product'  => [
                'required', // поле product обязательно должно быть передано
                'max:20', // длина значения не больше 20 символов
            ],
            'quantity' => 'required|integer', // поле quantity обязательно + должно быть целым числом
            'color'    => 'required',
        ]);

        // если увидели это сообщение, значит все данные прошли проверку
        echo 'Заказ создан!';
    }

    /**
     * Метод для обработки данных с формы с валидацией из отдельного класса
     * Первым параметром вместо стандартного Request указывается свой класс RequestForm
     * В этом случае полученные данные сперва обработаются этим классом,
     * а затем только, при успешной валидации, передадутся дальше в метод контроллера
     */
    public function createOrder3(CreateOrderRequest $request)
    {
        // если увидели это сообщение, значит все данные прошли проверку
        echo 'Заказ создан!';
    }
}