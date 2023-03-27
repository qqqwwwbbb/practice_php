<h3><?= $message ?? ''; ?></h3>
<div class="modal modal-signin position-static d-block py-5" tabindex="-1" role="dialog" id="modalSignin"
     bis_skin_checked="1">
    <div class="modal-dialog" role="document" bis_skin_checked="1">
        <div class="modal-content rounded-5 shadow" bis_skin_checked="1">
            <div class="modal-header p-5 pb-4 border-bottom-0 d-flex justify-content-center" bis_skin_checked="1">
                <h2 class="fw-bold mb-0 d-flex justify-content-center">Регистрация</h2>
            </div>
            <div class="modal-body p-5 pt-0" bis_skin_checked="1">
                <form method="post">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <div class="form-floating mb-3" bis_skin_checked="1">
                        <input type="text" class="form-control rounded-4" id="floatingInput"
                               placeholder="Ваше имя" name="name">
                        <label for="floatingInput">Ваше имя</label>
                    </div>
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
                    <div class="form-floating mb-3" bis_skin_checked="1">
                        <select name="id_role" id="id_role">
                            <option value="1">Пользователь</option>
                            <option value="2">Администратор</option>
                            <option value="3">Читатель</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3" bis_skin_checked="1">
                        <p>Добавить аватар</p>
                    <input type="file" name="avatar">
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-success" type="submit">Войти</button>
                </form>
            </div>
        </div>
    </div>
</div>
