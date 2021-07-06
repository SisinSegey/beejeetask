
<h2>Список задач</h2>
        
<table>
    <tr class="header">
        <td><a href="/tasks/view/0/0/<?php echo (($data['order_col']==0) & ($data['order_type']==0))? "1" : "0"; ?>/"<?php if($data['order_col']==0) { ?> class="sort"<?php } ?>>Пользователь</a></td>
        <td><a href="/tasks/view/0/1/<?php echo (($data['order_col']==1) & ($data['order_type']==0))? "1" : "0"; ?>/"<?php if($data['order_col']==1) { ?> class="sort"<?php } ?>>E-mail</a></td>
        <td><a href="/tasks/view/0/2/<?php echo (($data['order_col']==2) & ($data['order_type']==0))? "1" : "0"; ?>/"<?php if($data['order_col']==2) { ?> class="sort"<?php } ?>>Статус</a></td>
        <td>Задача</td>
        <td>Редактирование</td>
    </tr>
<?php foreach($data as $key=>$value) { 
    if (gettype($key) == 'integer') { ?>
    <tr>
        <td><?php echo $value['author']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><?php echo ($value['isdone'] == 1) ? "+" : "-"; ?></td>
        <td><?php echo $value['text']; ?></td>
        <td><a href="/tasks/edit/<?php echo $key; ?>/">Правка</a></td>
    </tr>
<?php } 
    } ?>
</table>

<p class="right"><a href="/tasks/add/">Добавить задачу</a></p>

<?php if ($data['task_num'] > 3) { 
    if ($data['task_num']%3!=0) { $countpages = (($data['task_num']-$data['task_num']%3)/3)+1; }
	else { $countpages = $data['task_num']/3; }
    ?>
<p class="center">
Страницы: <?php if($data['page']!=0) { ?><a href="/tasks/view/0/<?php echo $data['order_col'].'/'.$data['order_type']; ?>/" title="">1</a><?php } else { ?><span>1</span><?php } ?>
<?php for ($i=1; $i<$countpages ; $i++ ) { ?>
    <?php if($data['page']!=$i) { ?> | <a href="/tasks/view/<?php echo $i.'/'.$data['order_col'].'/'.$data['order_type']; ?>/" title=""><?php echo ($i+1); ?></a><?php } else { ?> | <span><?php echo ($i+1); ?></span><?php } ?><?php } ?> 
    </p>
<?php } ?>

