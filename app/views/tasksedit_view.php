<h1>Изменить задачу</h1>
<?php if($data['step'] == 4) { ?>
<p>Задача успешно обновлена</p>
<p><a href="/tasks/view/">Вернуться к списку задач</a></p>
<?php } else { ?>
<?php if($data['step'] == 1) { ?>
<p class="err"><?php echo $data['error']; ?></p>
<?php } else { ?>
<?php if($data['error']!="") { ?><p class="err"><?php echo $data['error']; ?></p><?php } ?>
<form action="/tasks/edit/" id="tasks" method="post" name="task">
<fieldset>
<input name="task_id" type="hidden" value="<?php echo $data['id']; ?>" />

<?php if ($_SESSION['login']==1) { ?><label>Ваше имя:</label><?php } ?>
<input name="task_author" type="<?php echo ($_SESSION['login']!=1) ? "hidden" : "text"; ?>" value="<?php echo $data['author']; ?>" />
<?php if ($_SESSION['login']==1) { ?><label>Ваш e-mail:</label><?php } ?>
<input name="task_email" type="<?php echo ($_SESSION['login']!=1) ? "hidden" : "text"; ?>" value="<?php echo $data['email']; ?>" />
<?php if ($_SESSION['login']==1) { ?><label>Статус:</label><?php } ?>
<input name="task_isdone" type="<?php echo ($_SESSION['login']!=1) ? "hidden" : "checkbox"; ?>" value="1" <?php echo ($data['isdone'] == 1) ? "checked" : ""; ?> />

<label>Текст задачи:</label>
<textarea name="task_text"><?php echo $data['text']; ?></textarea>
<button type="reset">Отмена</button>
<button type="submit">Изменить</button>
</fieldset>
</form>
<?php } ?>
<?php } ?>


