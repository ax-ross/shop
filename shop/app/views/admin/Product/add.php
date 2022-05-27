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
                    'tpl' => APP . '/widgets/menu/admin_select_tpl.php',
                ]); ?>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="price" class="required">Цена</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Цена"
                               value="<?= get_field_value('price') ?: 0 ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="old_price">Старая цена</label>
                        <input type="text" name="old_price" class="form-control" id="old_price"
                               placeholder="Старая цена"
                               value="<?= get_field_value('old_price') ?: 0 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="status" name="status" checked>
                    <label for="status" class="custom-control-label">Показать на сайте</label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="hit" name="hit">
                    <label for="hit" class="custom-control-label">Хит</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="is_download">Прикрепите загружаемый файл, чтобы товар стал цифровым</label>
                        <select name="is_download" id="is_download" class="form-control select2 is-download"
                                id="is_download" style="width: 100%"></select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Основное фото</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" id="add-base-img" onclick="popupBaseImage(); return false;">
                                Загрузить
                            </button>
                            <div id="base-img-output" class="upload-images base-image"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Дополнительные фото</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" id="add-gallery-img"
                                    onclick="popupGalleryImage(); return false;">Загрузить
                            </button>
                            <div id="gallery-img-output" class="upload-images gallery-image"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-info card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <?php foreach (\axross\App::$app->getProperty('languages') as $k => $lang): ?>
                            <li class="nav-item">
                                <a href="#<?= $k ?>" class="nav-link <?php if ($lang['base']) echo 'active' ?>"
                                   data-toggle="pill"><img
                                            src="<?= PATH ?>/assets/img/lang/<?= $k ?>.png" alt=""></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <?php foreach (\axross\App::$app->getProperty('languages') as $k => $lang): ?>
                            <div class="tab-pane fade <?php if ($lang['base']) echo 'active show' ?>" id="<?= $k ?>">

                                <div class="form-group">
                                    <label class="required" for="title">Наименование</label>
                                    <input type="text" name="product_description[<?= $lang['id'] ?>][title]"
                                           class="form-control" id="title" placeholder="Наименование товара"
                                           value="<?= get_field_array_value('product_description', $lang['id'], 'title') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Мета-описание</label>
                                    <input type="text" name="product_description[<?= $lang['id'] ?>][description]"
                                           class="form-control" id="description" placeholder="Мета-описание"
                                           value="<?= get_field_array_value('product_description', $lang['id'], 'description') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="keywords">Ключевые слова</label>
                                    <input type="text" name="product_description[<?= $lang['id'] ?>][keywords]"
                                           class="form-control" id="keywords" placeholder="Ключевые слова"
                                           value="<?= get_field_array_value('product_description', $lang['id'], 'keywords') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="excerpt" class="required">Краткое описание</label>
                                    <input type="text" name="product_description[<?= $lang['id'] ?>][excerpt]"
                                           class="form-control" id="excerpt" placeholder="Краткое описание"
                                           value="<?= get_field_array_value('product_description', $lang['id'], 'excerpt') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="content" class="required">Описание товара</label>
                                    <textarea name="product_description[<?= $lang['id'] ?>][content]"
                                              class="form-control editor" id="content" rows="3"
                                              placeholder="Описание товара"><?= get_field_array_value('product_description', $lang['id'], 'content') ?></textarea>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

        <?php if (isset($_SESSION['form_data'])) {
            unset($_SESSION['form_data']);
        }
        ?>
    </div>
</div>

<script>
    function popupBaseImage() {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    const baseImgOutput = document.getElementById('base-img-output');
                    baseImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="img" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                });
                finder.on('file:choose:resizedImage', function (evt) {
                    const baseImgOutput = document.getElementById('base-img-output');
                    baseImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + evt.data.resizedUrl + '"><input type="hidden" name="img" value="' + evt.data.resizedUrl + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                });
            }
        });
    }
</script>

<script>
    function popupGalleryImage() {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    const galleryImgOutput = document.getElementById('gallery-img-output');

                    if (galleryImgOutput.innerHTML) {
                        galleryImgOutput.innerHTML += '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    } else {
                        galleryImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    }

                });
                finder.on('file:choose:resizedImage', function (evt) {
                    const baseImgOutput = document.getElementById('base-img-output');

                    if (galleryImgOutput.innerHTML) {
                        galleryImgOutput.innerHTML += '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    } else {
                        galleryImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"><input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                    }

                });
            }
        });
    }
</script>

<script>
    window.editors = {};
    document.querySelectorAll('.editor').forEach((node, index) => {
        ClassicEditor
            .create(node, {
                language: 'ru',
                ckfinder: {
                    uploadUrl: '<?= PATH ?>/adminlte/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                },
                toolbar: ['ckfinder', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo', '|', 'link', 'bulletedList', 'numberedList', 'insertTable', 'blockQuote'],
                image: {
                    toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight'],
                    styles: [
                        'alignLeft',
                        'alignCenter',
                        'alignRight'
                    ]
                }
            })
            .then(newEditor => {
                window.editors[index] = newEditor
            })
            .catch(error => {
                console.error(error);
            });
    });

</script>