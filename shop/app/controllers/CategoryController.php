<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use axross\App;

class CategoryController extends AppController
{
    

    public function viewAction()
    {
        $lang = App::$app->getProperty('language');
        $category = $this->model->get_category($this->route['slug'], $lang);
    
        if (!$category) {
            $this->error_404();
            return;
        }

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category['id']);
        
        
        $child_ids = $this->model->get_child_ids($category['id']);
        $child_ids = !$child_ids ? $category['id'] : $child_ids . $category['id'];
        var_dump($child_ids);
        $products = $this->model->get_products($child_ids, $lang);
        $this->setMeta($category['title'], $category['description'], $category['keywords']);
        $this->set(compact('products', 'category', 'breadcrumbs'));
    }

}