<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    'admin_index' => [[], ['_controller' => 'App\\Controller\\Admin\\IndexController::index'], [], [['text', '/admin/index']], [], []],
    'admin_product_index' => [[], ['_controller' => 'App\\Controller\\Admin\\ProductController::index'], [], [['text', '/admin/product/']], [], []],
    'admin_product_new' => [[], ['_controller' => 'App\\Controller\\Admin\\ProductController::new'], [], [['text', '/admin/product/new']], [], []],
    'admin_product_show' => [['id'], ['_controller' => 'App\\Controller\\Admin\\ProductController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/product']], [], []],
    'admin_product_edit' => [['id'], ['_controller' => 'App\\Controller\\Admin\\ProductController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin/product']], [], []],
    'admin_product_delete' => [['id'], ['_controller' => 'App\\Controller\\Admin\\ProductController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/product']], [], []],
    'admin_purchase_index' => [[], ['_controller' => 'App\\Controller\\Admin\\PurchaseController::index'], [], [['text', '/admin/purchase/']], [], []],
    'admin_purchase_new' => [[], ['_controller' => 'App\\Controller\\Admin\\PurchaseController::new'], [], [['text', '/admin/purchase/new']], [], []],
    'admin_purchase_show' => [['id'], ['_controller' => 'App\\Controller\\Admin\\PurchaseController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/purchase']], [], []],
    'admin_purchase_edit' => [['id'], ['_controller' => 'App\\Controller\\Admin\\PurchaseController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin/purchase']], [], []],
    'admin_purchase_delete' => [['id'], ['_controller' => 'App\\Controller\\Admin\\PurchaseController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/purchase']], [], []],
    'admin_test' => [[], ['_controller' => 'App\\Controller\\Admin\\TestController::index'], [], [['text', '/admin/test']], [], []],
    'admin_show' => [[], ['_controller' => 'App\\Controller\\Admin\\TestController::show'], [], [['text', '/admin/show']], [], []],
    'admin_removes' => [[], ['_controller' => 'App\\Controller\\Admin\\TestController::remove'], [], [['text', '/admin/remove']], [], []],
    'homeindex' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/home/index']], [], []],
    'homehello' => [['name'], ['_controller' => 'App\\Controller\\HomeController::hello'], [], [['variable', '/', '[^/]++', 'name', true], ['text', '/home/hello']], [], []],
];
