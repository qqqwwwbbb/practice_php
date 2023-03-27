
<h3><?= $message ?? ''; ?></h3>

<h4><?= app()->auth->user()->name ?? ''; ?></h4>
<?php
if (!app()->auth::check()):
    ?>
    <div class="modal modal-signin position-static d-block py-5" tabindex="-1" role="dialog" id="modalSignin"
         bis_skin_checked="1">
        <div class="modal-dialog" role="document" bis_skin_checked="1">
            <div class="modal-content rounded-5 shadow" bis_skin_checked="1">
                <div class="modal-header p-5 pb-4 border-bottom-0 d-flex justify-content-center" bis_skin_checked="1">
                    <h2 class="fw-bold mb-0 d-flex justify-content-center">Авторизация</h2>
                </div>
                <div class="modal-body p-5 pt-0" bis_skin_checked="1">
                    <form method="post">
                        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                        <div class="form-floating mb-3" bis_skin_checked="1">
                            <input type="text" class="form-control rounded-4" id="floatingInput"
                                   placeholder="Логин" name="login">
                            <label for="floatingInput">Логин</label>
                        </div>
                        <div class="form-floating mb-3" bis_skin_checked="1">
                            <input type="password" class="form-control rounded-4" id="floatingPassword"
                                   placeholder="Пароль" name="password">
                            <label for="floatingPassword">Пароль</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-4 btn-success" type="submit">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif;
?>

