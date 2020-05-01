<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/pelicula' => [[['_route' => 'add_pelicula', '_controller' => 'App\\Controller\\PeliculasController::add'], null, ['POST' => 0], null, false, false, null]],
        '/api/peliculas' => [[['_route' => 'get_all_peliculas', '_controller' => 'App\\Controller\\PeliculasController::getAll'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/pelicula/([^/]++)(?'
                    .'|(*:67)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        67 => [
            [['_route' => 'get_one_pelicula', '_controller' => 'App\\Controller\\PeliculasController::get'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'update_pelicula', '_controller' => 'App\\Controller\\PeliculasController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'delete_pelicula', '_controller' => 'App\\Controller\\PeliculasController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
