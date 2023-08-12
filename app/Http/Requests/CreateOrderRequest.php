<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // должно быть true, чтобы запрос пошёл дальше
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // такие же правила, как и при валидации напрямую из контроллера
        return [
            'product'  => [
                'required', // поле product обязательно должно быть передано
                'max:20', // длина значения не больше 20 символов
            ],
            'quantity' => 'required|integer', // поле quantity обязательно + должно быть целым числом
            'color'    => 'required',
        ];
        // для перевода сообщений об ошибках валидации
        // нужно менять содержимое файла validation.php из папки языка в папке lang
        // для создания этой папки нужно вызвать команду:
        // php artisan lang:publish
        // в файле config/app.php поменять значение 'locale' на нужный язык
        // в папке lang переименовать или скопировать папку en в название локали нужного языка
    }
}
