<?php if($_SESSION['login'] == 1) { ?>
<p><a href="/auth/logout/">Выйти</a></p>
<?php } else { ?>
<?php if($data['auth_error']!="") { ?><p class="err"><?php echo $data['auth_error']; ?></p><?php } ?>
<form action="/auth/" id="auth" method="post" name="auth">
<fieldset>
<label>Логин</label>
<input name="login" type="text" value="" />
<label>Пароль</label>
<input name="pass" type="password" />
<button type="reset">Отмена</button>
<button type="submit">Войти</button>
</fieldset>
</form>
<?php } ?>