<?php

return [
    'genders' => [
        'masculino' => 'Masculino',
        'femenino' => 'Femenino',
    ],

    'marital_status' => [
        'soltero' => 'Soltero',
        'casado' => 'Casado',
        'viudo' => 'Viudo',
        'divorciado' => 'Divorciado',
    ],

    /*
    |--------------------------------------------------------------------------
    | Church Ministries
    |--------------------------------------------------------------------------
    |
    | List of all ministries available in the church.
    |
    */
    'ministries' => [
        'alabanza' => 'Alabanza',
        'jóvenes' => 'Jóvenes',
        'niños' => 'Niños',
        'líderes' => 'Líderes',
        'intercesión' => 'Intercesión',
        'ujieres' => 'Ujieres',
        'diaconía' => 'Diaconía',
        'multimedia' => 'Multimedia',
        'damas_dorcas' => 'Damas Dorcas',
        'escuela_dominical' => 'Escuela Dominical',
        'evangelismo' => 'Evangelismo',
        'ninguno' => 'Ninguno',
    ],

    /*
    |--------------------------------------------------------------------------
    | Church Roles (General)
    |--------------------------------------------------------------------------
    |
    | General roles for members within the church structure.
    |
    */
    'role_groups' => [
        'Roles Ministeriales' => [
            'pastor_principal', 'pastor_asociado', 'evangelista'
        ],
        'Junta Local' => [
            'secretario', 'tesorero', 'miembro_junta'
        ],
        'Comité Damas Dorcas' => [
            'presidenta_dorcas', 'vicepresidenta_dorcas', 'secretaria_dorcas', 'tesorera_dorcas'
        ],
        'Comité Jóvenes' => [
            'presidente_jovenes', 'vicepresidente_jovenes', 'secretario_jovenes', 'tesorero_jovenes'
        ],
        'Escuela Dominical' => [
            'director_escuela_dominical', 'subdirector_escuela_dominical', 'secretario_escuela_dominical'
        ],
        'Otros Roles' => [
            'líder', 'diácono', 'miembro', 'visitante'
        ],
    ],

    'roles' => [
        // Roles Ministeriales
        'pastor_principal' => 'Pastor Principal',
        'pastor_asociado' => 'Pastor Asociado',
        'evangelista' => 'Evangelista',
        
        // Junta Local
        'secretario' => 'Secretario (Junta Local)',
        'tesorero' => 'Tesorero (Junta Local)',
        'miembro_junta' => 'Miembro de Junta Local',
        
        // Comité Damas Dorcas
        'presidenta_dorcas' => 'Presidenta Damas Dorcas',
        'vicepresidenta_dorcas' => 'Vicepresidenta Damas Dorcas',
        'secretaria_dorcas' => 'Secretaria Damas Dorcas',
        'tesorera_dorcas' => 'Tesorera Damas Dorcas',
        
        // Comité Jóvenes
        'presidente_jovenes' => 'Presidente Jóvenes',
        'vicepresidente_jovenes' => 'Vicepresidente Jóvenes',
        'secretario_jovenes' => 'Secretario Jóvenes',
        'tesorero_jovenes' => 'Tesorero Jóvenes',
        
        // Escuela Dominical
        'director_escuela_dominical' => 'Director Escuela Dominical',
        'subdirector_escuela_dominical' => 'Subdirector Escuela Dominical',
        'secretario_escuela_dominical' => 'Secretario Escuela Dominical',
        
        // Otros
        'líder' => 'Líder',
        'diácono' => 'Diácono',
        'miembro' => 'Miembro',
        'visitante' => 'Visitante',
    ],

    /*
    |--------------------------------------------------------------------------
    | Ministry-Specific Roles
    |--------------------------------------------------------------------------
    |
    | Roles that are specific to a ministry.
    |
    */
    'ministry_roles' => [
        'damas_dorcas' => [
            '' => 'Sin rol específico',
            'presidenta' => 'Presidenta',
            'vicepresidenta' => 'Vicepresidenta',
            'secretaria' => 'Secretaria',
            'tesorera' => 'Tesorera',
        ],
        'jóvenes' => [
            '' => 'Sin rol específico',
            'presidente' => 'Presidente',
            'vicepresidente' => 'Vicepresidente',
            'secretario' => 'Secretario',
            'tesorero' => 'Tesorero',
        ],
        'escuela_dominical' => [
            '' => 'Sin rol específico',
            'director' => 'Director',
            'subdirector' => 'Subdirector',
            'secretario' => 'Secretario',
            'maestro' => 'Maestro',
        ],
        'alabanza' => [
            '' => 'Sin rol específico',
            'director' => 'Director',
            'vocalista' => 'Vocalista',
            'músico' => 'Músico',
        ],
        'líderes' => [
            '' => 'Sin rol específico',
            'coordinador' => 'Coordinador',
            'asistente' => 'Asistente',
        ],
        'intercesión' => [
            '' => 'Sin rol específico',
            'coordinador' => 'Coordinador',
            'intercesor' => 'Intercesor',
        ],
        'ujieres' => [
            '' => 'Sin rol específico',
            'coordinador' => 'Coordinador',
            'ujier' => 'Ujier',
        ],
        'diaconía' => [
            '' => 'Sin rol específico',
            'coordinador' => 'Coordinador',
            'diácono' => 'Diácono',
        ],
        'multimedia' => [
            '' => 'Sin rol específico',
            'coordinador' => 'Coordinador',
            'técnico' => 'Técnico',
        ],
        'evangelismo' => [
            '' => 'Sin rol específico',
            'coordinador' => 'Coordinador',
            'evangelista' => 'Evangelista',
        ],
        'niños' => [
            '' => 'Sin rol específico',
            'coordinador' => 'Coordinador',
            'maestro' => 'Maestro',
        ],
    ],
];
