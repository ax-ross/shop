<!-- Default box -->
<div class="card">
    <div class="card-body">

        <form method="POST">
            <div class="form-group">
                <label class="required" for="parent_id">Родительская Категория</label>
                <?php new \app\widgets\menu\Menu([
                    'cache' => 0,
                    'cacheKey' => 'admin_menu_select',
                    'class' => 'form-control',
                    'container' => 'select',
                    'attrs' => [
                        'name' => 'parent_id',
                        'id' => 'parent_id',
                        'required' => 'required',
                    ],
                    'prepand' => '<option value="0">Самостоятельная категория</option>',
                    'tpl' => APP . '/widgets/menu/admin_select_tpl.php',
                ]); ?>
            </div>

            <div class="card card-info card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <?php foreach (\axross\App::$app->getProperty('languages') as $k => $lang) : ?>
                            <li class="nav-item">
                                <a href="#<?= $k ?>" class="nav-link <?php if ($lang['base']) echo 'active' ?>" data-toggle="pill">
                                    <img src="<?= PATH ?>/assets/img/lang/<?= $k ?>.png" alt="">
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <?php foreach (\axross\App::$app->getProperty('languages') as $k => $lang): ?>
                            <div class="tab-pane fade <?php if ($lang['base']) echo 'active show' ?>" id="<?= $k ?>">
                                <div class="form-group">
                                    <label for="title" class="requried">Наименование</label>
                                    <input type="text" name="category_description[<?= $lang['id'] ?>][title]" class="form-control" id="title" placeholder="Наименование категории" value="<?= $category[$lang['id']]['title'] ? htmlspecialchars($category[$lang['id']]['title']) : '' ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Мета-описание</label>
                                    <input type="text" name="category_description[<?= $lang['id'] ?>][description]" class="form-control" id="description" placeholder="Мета-описание" value="<?= $category[$lang['id']]['description'] ? htmlspecialchars($category[$lang['id']]['description']) : '' ?>">
                                </div>

                                <div class="form-group">
                                    <label for="keywords">Ключевые слова</label>
                                    <input type="text" name="category_description[<?= $lang['id'] ?>][keywords]" class="form-control" id="keywords" placeholder="Ключевые слова" value="<?= $category[$lang['id']]['keywords'] ? htmlspecialchars($category[$lang['id']]['keywords']) : '' ?>">
                                </div>

                                <div class="form-group">
                                    <label for="content">Описание категории</label>
                                    <textarea type="text" name="category_description[<?= $lang['id'] ?>][content]" class="form-control editor" id="content" placeholder="Описание категории"><?= $category[$lang['id']]['content'] ? htmlspecialchars($category[$lang['id']]['content']) : '' ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
</div>
<!-- /.card -->
<script>
    window.editors = {};
    document.querySelectorAll( '.editor' ).forEach( ( node, index ) => {
        ClassicEditor
            .create( node, {
                language: 'ru',
                ckfinder: {
                    uploadUrl: '<?= PATH ?>/adminlte/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                },
                toolbar: [ 'ckfinder', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo', '|', 'link', 'bulletedList', 'numberedList', 'insertTable', 'blockQuote' ],
                image: {
                    toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight' ],
                    styles: [
                        'alignLeft',
                        'alignCenter',
                        'alignRight'
                    ]
                }
            } )
            .then( newEditor => {
                window.editors[ index ] = newEditor
            } )
            .catch( error => {
                console.error( error );
            } );
    });
</script>