<?php

Router::addRoute('^$', [
    'controller' => 'catalog',
    "action" => "index"
]);

Router::addRoute('^catalog$', [
    'controller' => 'catalog',
    "action" => "index"
]);


