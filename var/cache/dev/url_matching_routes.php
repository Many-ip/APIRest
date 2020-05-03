<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'rootApp', '_controller' => 'App\\Controller\\AplicacioController::index'], null, null, null, false, false, null]],
        '/getAll' => [[['_route' => 'GET_all', '_controller' => 'App\\Controller\\AplicacioController::getAll'], null, null, null, false, false, null]],
        '/getSearch' => [[['_route' => 'GET_search', '_controller' => 'App\\Controller\\AplicacioController::getSearch'], null, null, null, false, false, null]],
        '/deleteSearch' => [[['_route' => 'DELETE_search', '_controller' => 'App\\Controller\\AplicacioController::deleteSearch'], null, null, null, false, false, null]],
        '/post' => [[['_route' => 'POST', '_controller' => 'App\\Controller\\AplicacioController::post'], null, null, null, false, false, null]],
        '/searchPut' => [[['_route' => 'PUT_search', '_controller' => 'App\\Controller\\AplicacioController::searchPut'], null, null, null, false, false, null]],
        '/api/pelicula' => [[['_route' => 'add_pelicula', '_controller' => 'App\\Controller\\PeliculasController::add'], null, ['POST' => 0], null, false, false, null]],
        '/api/peliculas' => [[['_route' => 'get_all_peliculas', '_controller' => 'App\\Controller\\PeliculasController::getAll'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/getOne(?:/([^/]++))?(*:63)'
                .'|/delete(?:/([^/]++))?(*:91)'
                .'|/put(?:/([^/]++))?(*:116)'
                .'|/api/pelicula/([^/]++)(?'
                    .'|(*:149)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        63 => [[['_route' => 'GET_one', 'id' => -1, '_controller' => 'App\\Controller\\AplicacioController::getOne'], ['id'], null, null, false, true, null]],
        91 => [[['_route' => 'DELETE', 'id' => -1, '_controller' => 'App\\Controller\\AplicacioController::delete'], ['id'], null, null, false, true, null]],
        116 => [[['_route' => 'PUT', 'id' => -1, '_controller' => 'App\\Controller\\AplicacioController::put'], ['id'], null, null, false, true, null]],
        149 => [
            [['_route' => 'get_one_pelicula', '_controller' => 'App\\Controller\\PeliculasController::get'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'update_pelicula', '_controller' => 'App\\Controller\\PeliculasController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'delete_pelicula', '_controller' => 'App\\Controller\\PeliculasController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
