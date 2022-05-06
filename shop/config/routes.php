<?php

use axross\Router;


Router::add('#^admin/?$#', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin']);

Router::add('#^admin/(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$#', ['admin_prefix' => 'admin']);

Router::add('#^(?<lang>[a-z]+)?/?product/(?<slug>[a-z0-9-]+)/?$#', ['controller' => 'Product', 'action' => 'view']);

Router::add('#^(?<lang>[a-z]+)?/?category/(?<slug>[a-z0-9-]+)/?$#', ['controller' => 'Category', 'action' => 'view']);
Router::add('#^(?<lang>[a-z]+)?/?search/?$#', ['controller' => 'Search', 'action' => 'index']);
Router::add('#^(?<lang>[a-z]+)?/?wishlist/?$#', ['controller' => 'Wishlist', 'action' => 'index']);

Router::add('#^(?<lang>[a-z]+)?/?$#', ['controller' => 'Main']);

Router::add('#^(?<controller>[a-z-]+)/(?<action>[a-z-]+)/?$#');
Router::add('#^(?<lang>[a-z]+)/(?<controller>[a-z-]+)/(?<action>[a-z-]+)/?$#');