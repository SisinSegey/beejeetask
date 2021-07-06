<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1251" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<style type="text/css" media="all">
@import url("/css/style.css");
</style>
</head>
<body>

<div id="main1">
    <div id="up1">
        <div id="menu" class="left">    
            <ul>
                <li><a href="/tasks/view/">Задачи</a></li>
                <li><a href="/tasks/add/">Добавить</a></li>
                <li><a href="/auth/">Авторизация</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="main2">
    <div id="up2">
    <?php include 'app/views/'.$content_view; ?>
    </div>
</div>


</body>
</html>