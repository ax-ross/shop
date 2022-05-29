<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Page extends AppModel
{
    public function get_pages($lang, $start, $perpage): array
    {
        return R::getAll("SELECT p.*, pd.title FROM page p JOIN page_description pd on p.id = pd.page_id WHERE pd.language_id = ? LIMIT $start,$perpage", [$lang['id']]);
    }

    public function delete_page($id): bool
    {
        R::begin();
        try {
            $page = R::load('page', $id);
            if (!$page) {
                return false;
            }
            R::exec("DELETE FROM page_description WHERE page_id = ?", [$id]);
            R::trash($page);
            R::commit();
            return true;
        } catch (\Exception) {
            R::rollback();
            return false;
        }
    }
}