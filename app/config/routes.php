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


