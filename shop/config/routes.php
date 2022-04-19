<?php

use axross\Router;


Router::add('#^admin/?$#', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin']);

Router::add('#^admin/(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$#', ['admin_prefix' => 'admin']);

Router::add('#^$#', ['controller' => 'Main', 'action' => 'index']);

Router::add('#^(?<controller>[a-z-]+)/(?<action>[a-z-]+)/?$#');