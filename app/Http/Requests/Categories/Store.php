<?php

namespace App\Http\Requests\Categories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Store
 *
 * Validación para la creación de una nueva categoría.
 * - Verifica autenticación
 * - Valida nombre, categoría padre opcional y contextos requeridos
 */
class Store extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     *
     * Solo usuarios autenticados pueden crear categorías.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Reglas de validación para almacenar una categoría.
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