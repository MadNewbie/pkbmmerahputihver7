<?php

$menus = [
    [
        'title' => 'Dashboard',
        'route' => 'backyard.home',
        'icon' => 'centos',
        'type_icon' => 'fab',
    ],
    [
        'title' => 'News',
        'route' => 'backyard.news.index',
        'icon' => 'newspaper',
        'type_icon' => 'fas',
    ],
    [
        'title' => 'Event',
        'route' => 'backyard.event.index',
        'icon' => 'calendar-check',
        'type_icon' => 'fas',
    ],
    [
        'title' => 'User',
        'route' => 'backyard.user.index',
        'icon' => 'user',
        'type_icon' => 'fas',
    ],
    [
        'title' => 'Role',
        'route' => 'backyard.role.index',
        'icon' => 'user-tag',
        'type_icon' => 'fas',
    ],
];

return $menus;