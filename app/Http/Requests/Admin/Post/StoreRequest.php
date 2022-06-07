<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return
            [
                'title' => 'required|string',
                'content' => 'required|string',
                'preview_image' => 'required|file',
                'main_image' => 'required|file',
                'category_id' => 'required|integer|exists:categories,id',
                'tags_ids' => 'nullable|array',
                'tags_ids.*' => 'nullable|integer|exists:tags,id',
            ];
    }
    public function messages()
    {
        return [
            'required' => 'Это поле необходимо для заполнения',
            'category_id.exists' => 'Не надо так делать, дядя',
            // 'unique' => 'Такое значение поля «:attribute» уже используется',
            // 'min' => [
            //     'string' => 'Поле «:attribute» должно быть не меньше :min символов',
            //     'numeric' => 'Нужно выбрать категорию нового поста блога',
            //     'file' => 'Файл «:attribute» должен быть не меньше :min Кбайт'
            // ],
            // 'max' => [
            //     'string' => 'Поле «:attribute» должно быть не больше :max символов',
            //     'file' => 'Файл «:attribute» должен быть не больше :max Кбайт'
            // ],
            // 'mimes' => 'Файл «:attribute» должен иметь формат :values',
        ];
    }
}
