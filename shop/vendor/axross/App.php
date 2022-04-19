<?php

namespace axross;

class App
{
    public static $app;

    public function __construct()
    {
        $url = trim(urldecode($_SERVER['REQUEST_URI']), '/');
        new ErrorHandler;
        self::$app = Registry::getInstance();
        $this->getParams();
        Router::dispatch($url);
    }

    protected function getParams()
    {
        $filename = CONFIG . '/params.php';
        if (file_exists($filename)) {
            $params = require_once $filename;
        } else {
            exit("$filname does not exist");
        }

        if (!empty($params)){
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }

    }

}
