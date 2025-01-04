<?php

function getMenuAccess()
{
    $role_id = session()->get('role_id');
    
    $menuAccess = [
        // Admin SIRS (role_id = 1)
        1 => [
            'pasien' => ['view', 'create', 'edit', 'delete'],
            'master_lab' => ['view', 'create', 'edit', 'delete'],
            'laboratorium' => ['view', 'create', 'edit', 'delete'],
            'master_rad' => ['view', 'create', 'edit', 'delete'],
            'radiologi' => ['view', 'create', 'edit', 'delete'],
            'pemeriksaan' => ['view', 'create', 'edit', 'delete'],
            'kesimpulan' => ['view', 'create', 'edit', 'delete'],
            'users' => ['view', 'create', 'edit', 'delete']
        ],
        // Loket (role_id = 2)
        2 => [
            'pasien' => ['view', 'create', 'edit', 'delete']
        ],
        // Dokter (role_id = 3)
        3 => [
            'pemeriksaan' => ['view', 'create', 'edit', 'delete'],
            'kesimpulan' => ['view', 'create', 'edit', 'delete']
        ],
        // User Lab (role_id = 4)
        4 => [
            'laboratorium' => ['view', 'create', 'edit', 'delete'],
            'master_lab' => ['view']
        ],
        // Admin Lab (role_id = 5)
        5 => [
            'master_lab' => ['view', 'create', 'edit', 'delete'],
            'laboratorium' => ['view']
        ],
        // User Radiologi (role_id = 6)
        6 => [
            'radiologi' => ['view', 'create', 'edit', 'delete'],
            'master_rad' => ['view']
        ],
        // Admin Radiologi (role_id = 7)
        7 => [
            'master_rad' => ['view', 'create', 'edit', 'delete'],
            'radiologi' => ['view']
        ]
    ];

    return $menuAccess[$role_id] ?? [];
}

function hasMenuAccess($menu, $action = 'view')
{
    $menuAccess = getMenuAccess();
    return isset($menuAccess[$menu]) && in_array($action, $menuAccess[$menu]);
}
