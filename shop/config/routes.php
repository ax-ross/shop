<?php

use axross\Router;


Router::add('#^admin/?$#', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin']);

Router::add('#^admin/(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$#', ['admin_prefix' => 'admin']);

Router::add('#^product/(?<slug>[a-z0-9-]+)/?$#', ['controller' => 'Product', 'action' => 'view']);

Router::add('#^$#', ['controller' => 'Main']);

Router::add('#^(?<controller>[a-z-]+)/(?<action>[a-z-]+)/?$#');