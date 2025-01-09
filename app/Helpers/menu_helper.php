<?php

function getMenuAccess()
{
    $role_id = session()->get('role_id');
    
    $menuAccess = [
        // Admin SIRS (role_id = 1)
        1 => [
            'Pasien' => ['view', 'create', 'edit', 'delete'],
            'MasterLab' => ['view', 'create', 'edit', 'delete'],
            'Laboratorium' => ['view', 'create', 'edit', 'delete'],
            'MasterRad' => ['view', 'create', 'edit', 'delete'],
            'Radiologi' => ['view', 'create', 'edit', 'delete'],
            'Periksa' => ['view', 'create', 'edit', 'delete'],
            'Kesimpulan' => ['view', 'create', 'edit', 'delete'],
            
        ],
        // Loket (role_id = 2)
        2 => [
            'Pasien' => ['view', 'create', 'edit', 'delete']
        ],
        // Dokter (role_id = 3)
        3 => [
            'Periksa' => ['view', 'create', 'edit', 'delete'],
            'Kesimpulan' => ['view', 'create', 'edit', 'delete']
        ],
        // User Lab (role_id = 4)
        4 => [
            'Laboratorium' => ['view', 'create', 'edit', 'delete'],
            'MasterLab' => ['view']
        ],
        // Admin Lab (role_id = 5)
        5 => [
            'MasterLab' => ['view', 'create', 'edit', 'delete'],
            'Laboratorium' => ['view']
        ],
        // User Radiologi (role_id = 6)
        6 => [
            'Radiologi' => ['view', 'create', 'edit', 'delete'],
            'MasterRad' => ['view']
        ],
        // Admin Radiologi (role_id = 7)
        7 => [
            'MasterRad' => ['view', 'create', 'edit', 'delete'],
            'Radiologi' => ['view']
        ]
    ];

    return $menuAccess[$role_id] ?? [];
}

function hasMenuAccess($menu, $action = 'view')
{
    $menuAccess = getMenuAccess();
    return isset($menuAccess[$menu]) && in_array($action, $menuAccess[$menu]);
}
