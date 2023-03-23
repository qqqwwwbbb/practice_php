<h2 style="margin-left: 50px; margin-top: 30px">Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post" style="margin-left: 50px">
    <label>Имя <input type="text" name="name"></label>
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <label>
        Роль<br>
        <select name="id_role" id="id_role">
            <option value="1">Пользователь</option>
            <option value="2">Администратор</option>
        </select>
    </label><br>
    <input type="file" name="avatar">
    <button>Зарегистрироваться</button>
</form>
