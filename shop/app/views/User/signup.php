<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb  bg-light p-2">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bi bi-house-door-fill"></i></a></li>
            <li class="breadcrumb-item"><?php et('tpl_signup') ?></li>
        </ol>
    </nav>
</div>

<div class="conteiner py-3">
    <div class="row">
        <div class="col-lg-12 category-content">
            <h1 class="section-title"><?php et('tpl_signup') ?></h1>

            <form class="row g-3" method="POST">
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                        <label class="required" for="email"><?php et('tpl_signup_email_input'); ?></label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="password">
                        <label class="required" for="password"><?php et('tpl_signup_password_input'); ?></label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                        <label class="required" for="name"><?php et('tpl_signup_name_input'); ?></label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="adress" class="form-control" id="adress" placeholder="Adress">
                        <label class="required" for="adress"><?php et('tpl_signup_address_input'); ?></label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-signup"><?php et('user_signup_signup_btn') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>