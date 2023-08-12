<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showPageAbout()
    {
        echo '<h1>Это страница О нас</h1>';
        echo '
        <form action="/contacts" method="POST">
            <input name="phone" placeholder="Телефон">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <button type="submit">
                Отправить заявку
            </button>
        </form>';
    }

    /**
     * Любой метод может принимать первым параметром
     * объект класса Request, в котором будет находиться запрос пользователя
     * (куки, заголовки, переданные поля и т.п.)
     */
    public function showContactsForm(Request $request)
    {
        echo 'Вы успешно отправили заявку!';
        echo 'Ваш номер телефона: ' . $request->phone; // phone - переданное из формы поле
    }

    /**
     * Метод возвращающий представление hello.blade.php
     * передаем в нее переменную $a со значением 2
     */
    public function showViewHelloWorld()
    {
        return view('hello', ['a' => 2]);
    }

    /**
     * Если в маршруте есть параметры, то их можно принимать в методе
     * Сколько параметров в маршруте - столько можно принимать параметров в методе
     */
    public function findForMe($search)
    {
        if ($search == 12) {
            echo '<h1>12</h1>';
        } else {
            echo 'Вы ищите ' . $search;
        }
    }

    /**
     * Если помимо параметров из маршрута нужно принимать также данные от пользователя,
     * то можно также самым первым параметром по-прежнему принимать объект Request,
     * а дальше столько параметров сколько нужно из маршрута
     */
    public function searchHard(Request $request, $category, $search)
    {
        if ($search == $request->search) {
            // return redirect('/school13'); // редирект на конкретный юрл
            return redirect()->route('itschool'); // редирект на юрл именованного роутера
        } else {
            echo 'Вы ищите ' . $search . ' из категории ' . $category;
        }
    }

    public function showArticlePage($page = 1)
    {
        echo 'Новости со страницы ' . $page;
    }

    public function error404()
    {
        return view('404');
    }
}
