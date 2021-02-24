<?php

Router::addRoute('^$', [
    'controller' => 'catalog',
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

