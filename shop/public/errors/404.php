<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/style.css">
</head>


<body>
<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center not-found">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead"><?php et('tpl_error_404_text') ?></div>
                <a href="<?= PATH ?>"><button type="button" class="btn btn-404-home"><?php et('tpl_error_404_go_home') ?></button></a>
            </div>
        </div>
    </div>
</div>
</body>

<script src="<?= PATH ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= PATH ?>/assets/js/main.js"></script>
</html>

