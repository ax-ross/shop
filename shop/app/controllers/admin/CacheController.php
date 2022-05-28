<?php

namespace app\controllers\admin;

use axross\App;
use axross\Cache;

class CacheController extends AppController
{
    public function indexAction()
    {
        $title = 'Управление кэшем';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title'));
    }

    public function deleteAction()
    {
        $langs = App::$app->getProperty('languages');
        $cacheKey = isset($_GET['cache']) ? (string)$_GET['cache'] : '';
        $cache = Cache::getInstance();
        if ($cacheKey === 'category') {
            foreach ($langs as $lang => $item) {
                $cache->delete("shop_menu_{$lang}");
            }
        }
        if ($cacheKey === 'page') {
            foreach ($langs as $lang => $item) {
                $cache->delete("shop_page_menu_{$lang}");
            }
        }
        $_SESSION['success'] = 'Выбранный кэш удалён';
        redirect();
    }
}