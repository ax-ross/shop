<?php

namespace axross;

class View
{

    public string $content = '';
     
    public function __construct(public $route, public $layout='', public $view = '', public $meta=[])
    {
        if ($this->layout !== false) $this->layout = $this->layout ?: LAYOUT;
    }

    public function render($data)
    {
        if (is_array($data)) extract($data);
        $prefix = str_replace('\\', '/', $this->route['admin_prefix']);
        $view_file = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php";
        if (file_exists($view_file)) {
            ob_start();
            require_once $view_file;
            $this->content = ob_get_clean();
        }
        else throw new \Exception("Не найден вид {$view_file}", 500);

        if ($this->layout !== false) {
            $layout_file = APP . "/views/layouts/{$this->layout}.php";
            if (file_exists($layout_file)) require_once $layout_file;
            else throw new \Exception("Не найден шаблон {$layout_file}", 500);
        }

    }

    public function getMeta()
    {
        
        $out = '<title>'. htmlspecialchars($this->meta['title'])  .'</title>' . PHP_EOL;
        $out .= '<meta name="description" content="' . htmlspecialchars($this->meta['description'])  . '">' . PHP_EOL;
        $out .= '<meta name="keywords" content="'. htmlspecialchars($this->meta['keywords'])  . '">' . PHP_EOL;
        return $out;
    }


}