<h1>�������� ������</h1>
<?php if($data['step'] == 2) { ?>
<p>������ ������� ���������</p>
<p><a href="/tasks/view/">��������� � ������ �����</a></p>
<?php } else { ?>
<?php if($data['error']!="") { ?><p class="err"><?php echo $data['error']; ?></p><?php } ?>
<form action="/tasks/add/" id="tasks" method="post" name="tasks">
<fieldset>
<label>���� ���:</label>
<input name="task_author" type="text" value="<?php echo $data['author']; ?>" />
<label>��� e-mail:</label>
<input name="task_email" type="text" value="<?php echo $data['email']; ?>" />
<label>����� ������:</label>
<textarea name="task_text"><?php echo $data['text']; ?></textarea>
<button type="reset">������</button>
<button type="submit">��������</button>
</fieldset>
</form>
<?php } ?>

