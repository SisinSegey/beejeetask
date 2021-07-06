<h1>Добавить задачу</h1>
<?php if($data['step'] == 2) { ?>
<p>Задача успешно добавлена</p>
<p><a href="/tasks/view/">Вернуться к списку задач</a></p>
<?php } else { ?>
<?php if($data['error']!="") { ?><p class="err"><?php echo $data['error']; ?></p><?php } ?>
<form action="/tasks/add/" id="tasks" method="post" name="tasks">
<fieldset>
<label>Ваше имя:</label>
<input name="task_author" type="text" value="<?php echo $data['author']; ?>" />
<label>Ваш e-mail:</label>
<input name="task_email" type="text" value="<?php echo $data['email']; ?>" />
<label>Текст задачи:</label>
<textarea name="task_text"><?php echo $data['text']; ?></textarea>
<button type="reset">Отмена</button>
<button type="submit">Добавить</button>
</fieldset>
</form>
<?php } ?>

