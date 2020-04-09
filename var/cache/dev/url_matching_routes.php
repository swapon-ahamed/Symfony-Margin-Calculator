<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin/index' => [[['_route' => 'admin_index', '_controller' => 'App\\Controller\\Admin\\IndexController::index'], null, null, null, false, false, null]],
        '/admin/product' => [[['_route' => 'admin_product_index', '_controller' => 'App\\Controller\\Admin\\ProductController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/product/new' => [[['_route' => 'admin_product_new', '_controller' => 'App\\Controller\\Admin\\ProductController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/purchase' => [[['_route' => 'admin_purchase_index', '_controller' => 'App\\Controller\\Admin\\PurchaseController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/purchase/new' => [[['_route' => 'admin_purchase_new', '_controller' => 'App\\Controller\\Admin\\PurchaseController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/test' => [[['_route' => 'admin_test', '_controller' => 'App\\Controller\\Admin\\TestController::index'], null, null, null, false, false, null]],
        '/admin/show' => [[['_route' => 'admin_show', '_controller' => 'App\\Controller\\Admin\\TestController::show'], null, null, null, false, false, null]],
        '/admin/remove' => [[['_route' => 'admin_removes', '_controller' => 'App\\Controller\\Admin\\TestController::remove'], null, null, null, false, false, null]],
        '/home/index' => [[['_route' => 'homeindex', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/admin/p(?'
                    .'|roduct/([^/]++)(?'
                        .'|(*:71)'
                        .'|/edit(*:83)'
                        .'|(*:90)'
                    .')'
                    .'|urchase/([^/]++)(?'
                        .'|(*:117)'
                        .'|/edit(*:130)'
                        .'|(*:138)'
                    .')'
                .')'
                .'|/home/hello/([^/]++)(*:168)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        71 => [[['_route' => 'admin_product_show', '_controller' => 'App\\Controller\\Admin\\ProductController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        83 => [[['_route' => 'admin_product_edit', '_controller' => 'App\\Controller\\Admin\\ProductController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        90 => [[['_route' => 'admin_product_delete', '_controller' => 'App\\Controller\\Admin\\ProductController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        117 => [[['_route' => 'admin_purchase_show', '_controller' => 'App\\Controller\\Admin\\PurchaseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        130 => [[['_route' => 'admin_purchase_edit', '_controller' => 'App\\Controller\\Admin\\PurchaseController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        138 => [[['_route' => 'admin_purchase_delete', '_controller' => 'App\\Controller\\Admin\\PurchaseController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        168 => [
            [['_route' => 'homehello', '_controller' => 'App\\Controller\\HomeController::hello'], ['name'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
