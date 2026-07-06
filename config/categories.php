<?php

/**
 * Configuración de Categorías
 * 
 * Define los contextos disponibles donde una categoría puede ser visible.
 * Estos valores se utilizan en la tabla 'category_contexts' para filtrar
 * categorías por módulo (comunidad, servicios, empleos, marketplace).
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Contextos de Categorías
    |--------------------------------------------------------------------------
    |
    | Lista de contextos permitidos para categorizar contenido en los
    | distintos módulos de la aplicación. Cada elemento se corresponde
    | con un valor válido en la columna 'context' de category_contexts.
    |
    */
    'contexts' => [
        'community',    // Comunidad / Foros
        'services',     // Servicios
        'employments',  // Empleos
        'marketplace'   // Marketplace / Productos
    ],
];