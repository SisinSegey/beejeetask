<?php 

class Model_Tasks extends Model
{
	public function get_data()
	{
	   $data=array();
       
	   $page = 0;
       $task_num = 0;
       
       /*
       0 - author
       1 - email
       2 - status
       */
       $order_col = 0;
       /*
       0 - ASC
       1 - DESC
       */
       $order_type = 0;
       $order_str = " ORDER BY task_author";
       
       $routes = explode('/', $_SERVER['REQUEST_URI']);
       if ( !empty($routes[3]) ) {
            $page = $routes[3];
       }
       
       if ( !empty($routes[4]) ) {
            if(($routes[4] >=0) & ($routes[4] <= 2)) {
                $order_col = $routes[4];                    
            }
       }
       if ( !empty($routes[5]) ) {
            if(($routes[5] >=0) & ($routes[5] <= 1)) {
                $order_type = $routes[5];    
            }
       }
       
       switch ($order_col) {
            case '0':
                $order_str = " ORDER BY task_author";
                break;
            case '1':
                $order_str = " ORDER BY task_email";
                break;
            case '2':
                $order_str = " ORDER BY task_isdone";
                break;
       }
       switch ($order_type) {
            case '0':
                $order_str .= " ASC";
                break;
            case '1':
                $order_str .= " DESC";
                break;
       }
      
       
        $link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error()); 
        @mysql_select_db('tasks', $link) or die ('Can\'t use foo : ' . mysql_error());
        mysql_set_charset('cp1251', $link);
        
        $sql = "SELECT * FROM task".$order_str." LIMIT ".($page*3).",3";
        $res = mysql_query($sql) or die("Invalid query: " . mysql_error());
        
        while($f = mysql_fetch_array($res)){
            $data[$f['task_id']]['author'] = $f['task_author'];
            $data[$f['task_id']]['email'] = $f['task_email'];
            $data[$f['task_id']]['text'] = strip_tags($f['task_text']);
            $data[$f['task_id']]['isdone'] = $f['task_isdone'];
        }
        
        $sql = "SELECT * FROM task";
        $res = mysql_query($sql) or die("Invalid query: " . mysql_error());
        $task_num = mysql_num_rows($res);
        
        $data['page'] = $page;
        $data['order_col'] = $order_col;
        $data['order_type'] = $order_type;
        $data['task_num'] = $task_num;
       
        return $data;
	}
    
    public function insert_data() {
        $data=array();
        $data['author'] = "Ваше имя";
        $data['email'] = "Ваш e-mail";
        $data['text'] = "Текст задачи";
        
        $data['error'] = "";
        $data['step'] = 0;
        
        if (isset($_REQUEST['task_author'])) {
            // запрос данных на добавление, проверка данных
            if($_REQUEST['task_author'] != "") 
            {
                $data['author'] = strip_tags($_REQUEST['task_author']);             
            } else {
                $data['error'] = "Введите имя пользователя";                
            }
            if(isset($_REQUEST['task_email']) AND filter_var($_REQUEST['task_email'], FILTER_VALIDATE_EMAIL)) {
                $data['email'] = strip_tags($_REQUEST['task_email']);
            } else {
                $data['error'] = "Введите корректный e-mail";
            }
            if(isset($_REQUEST['task_text'])) {
                $data['text'] = strip_tags($_REQUEST['task_text']);
            }
            
            if($data['error'] == "") {
                // INSERT
                $link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error()); 
                @mysql_select_db('tasks', $link) or die ('Can\'t use foo : ' . mysql_error());
                mysql_set_charset('cp1251', $link);
              	$sql = "INSERT INTO task ( task_author, task_email, task_text, task_isdone ) VALUES ( '".$data['author']."', '".$data['email']."', '".$data['text']."', 0 )";
            	$res = mysql_query($sql) or die("Invalid query: " . mysql_error());
                $data['step'] = 2;
            } else {
                $data['step'] = 1;
            }
 
        }
        return $data;
    }
    
    public function update_data(){
        $data=array();
        $data['author'] = "";
        $data['email'] = "";
        $data['text'] = "";
        $data['isdone'] = 0;
        $data['error'] = "";
        $data['step'] = 0;
        
        $data['id'] = 0;
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if ( !empty($routes[3]) ) {
            $data['id'] = $routes[3];
        }
        
        if (isset($_REQUEST['task_author'])) {
            // есть запрос 
            if($_REQUEST['task_author'] != "") 
            {
                $data['author'] = strip_tags($_REQUEST['task_author']);             
            } else {
                $data['error'] = "Введите имя пользователя";                
            }
            if($_REQUEST['task_id'] != 0) 
            {
                $data['id'] = $_REQUEST['task_id'];             
            } else {
                $data['error'] = "Ошибка запроса к записи";                
            }
            if(isset($_REQUEST['task_email']) AND filter_var($_REQUEST['task_email'], FILTER_VALIDATE_EMAIL)) {
                $data['email'] = strip_tags($_REQUEST['task_email']);
            } else {
                $data['error'] = "Введите e-mail";
            }
            if(isset($_REQUEST['task_text'])) {
                $data['text'] = strip_tags($_REQUEST['task_text']);
            }
            if(isset($_REQUEST['task_isdone'])) {
                $data['isdone'] = 1;
            }
            
            if($data['error'] == "") {
                // UPDATE
                $link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error()); 
                @mysql_select_db('tasks', $link) or die ('Can\'t use foo : ' . mysql_error());
                mysql_set_charset('cp1251', $link);
                $sql = "UPDATE task SET task_author = '".$data['author']."', task_email = '".$data['email']."', task_text = '".$data['text']."', task_isdone = '".$data['isdone']."' WHERE task_id = '".$data['id']."'";
            	$res = mysql_query($sql) or die("Invalid query: " . mysql_error());
                $data['step'] = 4;
            } else {
                $data['step'] = 3;
            }
                        
        } else {
            // проверка наличия пользователя
            $link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error()); 
            @mysql_select_db('tasks', $link) or die ('Can\'t use foo : ' . mysql_error());
            mysql_set_charset('cp1251', $link);
            $sql = "SELECT * FROM task WHERE task_id = ".$data['id']."";
            $res = mysql_query($sql) or die("Invalid query: " . mysql_error());
            if(mysql_num_rows($res)==1) {
                $f = mysql_fetch_array($res);
                // загрузка данных
                $data['author'] = $f['task_author'];
                $data['email'] = $f['task_email'];
                $data['text'] = strip_tags($f['task_text']);
                $data['isdone'] = $f['task_isdone'];
                $data['step'] = 2;
            } else {
                $data['step'] = 1;    
                $data['error'] = "Ошибка запроса к данным";        
            }
            
        }
        return $data;  
    }

}

 ?>