<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/axross');
define("HELPERS", ROOT . '/vendor/axross/helpers');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", "shop");
define("PATH", "http://127.0.0.1");
define("ADMIN", "http://127.0.0.1:80/admin");
define("NO_IMAGE", "uploads/no_image.jpg");

require_once ROOT . '/vendor/autoload.php';