<?php

// неймспейс отличен от других контроллеров, т.к. этот контроллер находится в отдельном каталоге
namespace App\Http\Controllers\View;

// поэтому нужен use, подсказывающий этому классу, где лежит класс Controller
use App\Http\Controllers\Controller;

// важно, чтобы название класса была таким же, как и название файла
class ViewController extends Controller
{
    /**
     * Метод возвращающий вьюшку test из папки blade
     * во вьюшку передается переменная $a со значением "Method"
     */
    public function first()
    {
        return view('blade.test', [
            'a' => 'Method'
        ]);
    }

    /**
     * Просто другой метод,
     * возвращающий другую вьюшку,
     * куда передаются другие переменные
     */
    public function if()
    {
        return view('blade.if', [
            'a'       => 'adf',
            'isAdmin' => false,
            'color'   => 'green',
        ]);
    }

    /**
     * Просто другой метод,
     * возвращающий другую вьюшку,
     * куда передаются другие переменные
     */
    public function loop()
    {
        return view('blade.loop', [
            'number' => 10,
            'names'  => ['Alex', 'Bob', 'JohnKey' => 'John', 'Bill'],
            'users'  => [],
            'b'      => 0,
        ]);
    }

    /**
     * Просто другой метод,
     * возвращающий другую вьюшку,
     * куда передаются другие переменные
     */
    public function style()
    {
        return view('blade.style', [
            'isActive' => false,
            'isRed'    => false,
            'isBlue'   => true,
            'checkbox' => true
        ]);
    }

    /**
     * Просто другой метод,
     * возвращающий другую вьюшку
     */
    public function include()
    {
        return view('blade.include');
    }

    /**
     * Просто другой метод,
     * возвращающий другую вьюшку
     */
    public function include2()
    {
        return view('blade.include2');
    }

    /**
     * Просто другой метод,
     * возвращающий другую вьюшку,
     * куда передаются другие переменные
     */
    public function other()
    {
        return view('blade.other', [
            'cards' => [
                ['name' => 'Product', 'price' => 1000],
                ['name' => 'Product 2', 'price' => 200],
                ['name' => 'Product 3', 'price' => 500],
                ['name' => 'Product 4', 'price' => 1500],
            ]
        ]);
    }
}
