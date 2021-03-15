<?php
//----------------Main------------------------
Router::addRoute('^$', [
    'controller' => 'main',
    "action" => "index"
]);
Router::addRoute('^main$', [
    'controller' => 'main',
    "action" => "index"
]);

//----------------Catalog---------------------
Router::addRoute('^catalog$', [
    'controller' => 'catalog',
    "action" => "index"
]);
Router::addRoute('^catalog/addProduct$', [
    'controller' => 'catalog',
    "action" => "addProduct"
]);
Router::addRoute('^catalog/api$', [
    'controller' => 'catalog',
    "action" => "catalogApi"
]);
Router::addRoute('^catalog/descApi$', [
    'controller' => 'catalog',
    "action" => "catalogDescApi"
]);
Router::addRoute('^catalog/ascApi$', [
    'controller' => 'catalog',
    "action" => "catalogAscApi"
]);
Router::addRoute('^catalog/searchApi$', [
    'controller' => 'catalog',
    "action" => "catalogSearchApi"
]);

//----------------SignIn----------------------
Router::addRoute('^signin$', [
    'controller' => 'signIn',
    "action" => "index"
]);
Router::addRoute('^signin/auth$', [
    'controller' => 'signIn',
    "action" => "authentication"
]);

//----------------Register--------------------
Router::addRoute('^register$', [
    'controller' => 'register',
    "action" => "index"
]);
Router::addRoute('^register/reg$', [
    'controller' => 'register',
    "action" => "register"
]);

//----------------Member----------------------
Router::addRoute('^member$', [
    'controller' => 'member',
    "action" => "index"
]);
Router::addRoute('^member/ProductList/api$', [
    'controller' => 'member',
    "action" => "ProductListApi"
]);
Router::addRoute('^member/ProductList$', [
    'controller' => 'member',
    "action" => "ProductList"
]);

//----------------Bucket---------------------
Router::addRoute('^bucket$', [
    'controller' => 'bucket',
    "action" => "index"
]);
Router::addRoute('^bucket/setAmount$', [
    'controller' => 'bucket',
    "action" => "setAmount"
]);

Router::addRoute('^bucket/remove$', [
    'controller' => 'bucket',
    "action" => "remove"
]);
Router::addRoute('^bucket/makeOrder$', [
    'controller' => 'bucket',
    "action" => "makeOrder"
]);

//----------------Orders----------------------
Router::addRoute('^viewMyOrders$', [
    'controller' => 'viewMyOrders',
    "action" => "index"
]);
Router::addRoute('^purchaseDetails$', [
    'controller' => 'viewMyOrders',
    "action" => "purchaseDetails"
]);
Router::addRoute('^purchasePayment$', [
    'controller' => 'PurchasePayment',
    "action" => "pay"
]);



//----------------Admin-----------------------
Router::addRoute('^adminUsers$', [
    'controller' => 'adminUsers',
    "action" => "index"
]);
Router::addRoute('^adminOrders$', [
    'controller' => 'adminOrders',
    "action" => "index"
]);
Router::addRoute('^adminProducts$', [
    'controller' => 'adminProducts',
    "action" => "index"
]);
Router::addRoute('^adminPurchases$', [
    'controller' => 'adminPurchases',
    "action" => "index"
]);
Router::addRoute('^adminCrudProduct$', [
    'controller' => 'adminProducts',
    "action" => "adminCrudProductIndex"
]);
Router::addRoute('^adminCreateProduct$', [
    'controller' => 'adminProducts',
    "action" => "adminCreateProductIndex"
]);
Router::addRoute('^adminCreateProduct/create$', [
    'controller' => 'adminProducts',
    "action" => "adminCreateProduct"
]);
Router::addRoute('^adminDeleteProduct$', [
    'controller' => 'adminProducts',
    "action" => "adminDeleteProduct"
]);
Router::addRoute('^adminCreateProduct/create$', [
    'controller' => 'adminProducts',
    "action" => "adminCreateProduct"
]);
Router::addRoute('^adminUpdateProduct$', [
    'controller' => 'adminProducts',
    "action" => "adminUpdateProductIndex"
]);
Router::addRoute('^adminUpdateProduct/update$', [
    'controller' => 'adminProducts',
    "action" => "adminUpdateProduct"
]);
Router::addRoute('^adminCrudUser$', [
    'controller' => 'adminUsers',
    "action" => "adminCrudUserIndex"
]);
Router::addRoute('^adminDeleteUser$', [
    'controller' => 'adminUsers',
    "action" => "adminDeleteUser"
]);
Router::addRoute('^adminUpdateUser$', [
    'controller' => 'adminUsers',
    "action" => "adminUpdateUserIndex"
]);
Router::addRoute('^adminUpdateUser/update$', [
    'controller' => 'adminUsers',
    "action" => "adminUpdateUser"
]);
Router::addRoute('^adminGetUserPurchases$', [
    'controller' => 'adminUsers',
    "action" => "adminGetUserPurchases"
]);




