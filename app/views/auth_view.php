<?php if($_SESSION['login'] == 1) { ?>
<p><a href="/auth/logout/">�����</a></p>
<?php } else { ?>
<?php if($data['auth_error']!="") { ?><p class="err"><?php echo $data['auth_error']; ?></p><?php } ?>
<form action="/auth/" id="auth" method="post" name="auth">
<fieldset>
<label>�����</label>
<input name="login" type="text" value="" />
<label>������</label>
<input name="pass" type="password" />
<button type="reset">������</button>
<button type="submit">�����</button>
</fieldset>
</form>
<?php } ?>