<?php

Router::addRoute('^$', [
    'controller' => 'main',
    "action" => "index"
]);

Router::addRoute('^catalog$', [
    'controller' => 'catalog',
    "action" => "index"
]);
Router::addRoute('^signin$', [
    'controller' => 'signIn'
    , "action" => "index"
]);

Router::addRoute('^register$', [
    'controller' => 'register',
    "action" => "index"
]);

Router::addRoute('^member$', [
    'controller' => 'member',
    "action" => "index"
]);

Router::addRoute('^register/reg$', [
    'controller' => 'register',
    "action" => "register"
]);

Router::addRoute('^signin/auth$', [
    'controller' => 'signIn',
    "action" => "authentication"
]);

Router::addRoute('^bucket$', [
    'controller' => 'bucket',
    "action" => "index"
]);

Router::addRoute('^catalog/addProduct$', [
    'controller' => 'catalog',
    "action" => "addProduct"
]);

Router::addRoute('^bucket/setAmount$', [
    'controller' => 'bucket',
    "action" => "setAmount"
]);

Router::addRoute('^bucket/remove$', [
    'controller' => 'bucket',
    "action" => "remove"
]);

Router::addRoute('^bucket/setAmount$', [
    'controller' => 'bucket',
    "action" => "setAmount"
]);

Router::addRoute('^main$', [
    'controller' => 'main',
    "action" => "index"
]);

