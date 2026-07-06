<?php

namespace App\Http\Requests\Categories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Update
 *
 * Validación para la actualización de una categoría existente.
 * - Verifica autenticación
 * - Valida los mismos campos que en la creación
 */
class Update extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     *
     * Solo usuarios autenticados pueden modificar categorías.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Reglas de validación para actualizar una categoría.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'parent_id' => ['nullable', 'exists:categories,id'],

            'contexts'   => ['required', 'array', 'min:1'],
            'contexts.*' => ['in:' . implode(',', config('categories.contexts'))],
        ];
    }
}