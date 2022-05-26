<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Download extends AppModel
{
    public function get_downloads($lang, $start, $perpage): array
    {
        return R::getAll("SELECT d.*, dd.* FROM download d JOIN download_description dd on d.id = dd.download_id WHERE dd.language_id = ? LIMIT $start, $perpage", [$lang['id']]);
    }

    public function download_delete($id): bool
    {
        $file_name = R::getCell("SELECT filename FROM download WHERE id = ?", [$id]);

        $file_path = WWW . "/downloads/{$file_name}";
        if (file_exists($file_path)) {
            R::begin();
            try {
                $download = R::findOne('download', 'id = ?', [$id]);
                R::exec("DELETE FROM download_description WHERE download_id = ?", [$id]);
                R::trash($download);
                R::commit();
                if (unlink($file_path)) {
                    return true;
                }
            } catch (\Exception $e) {
                R::rollback();
                debug($e, 1);
                return false;
            }
        }
        return false;
    }
}