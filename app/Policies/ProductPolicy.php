<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Products\Product;

class ProductPolicy
{
    /**
     * Determina si el usuario puede ver cualquier producto.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determina si el usuario puede ver un producto.
     */
    public function view(?User $user, Product $product): bool
    {
        if ($product->status === 'active') {
            return true;
        }

        return $user?->id === $product->user_id;
    }

    /**
     * Determina si el usuario puede crear productos.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determina si el usuario puede actualizar el producto.
     */
    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    /**
     * Determina si el usuario puede eliminar el producto.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    /**
     * Restaurar producto.
     */
    public function restore(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    /**
     * Eliminar permanentemente.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }
}
