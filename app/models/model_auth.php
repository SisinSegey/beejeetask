<?php 

class Model_Auth extends Model
{
	public function get_data()
	{
        $data=array();
        $data['auth_error'] = "";
	   
        if (isset($_REQUEST['login']) AND strlen($_REQUEST['login']) >= 3) $login = strip_tags($_REQUEST['login']); else $login = "";
        if (isset($_REQUEST['pass']) AND $_REQUEST['pass'] != "") $pass = strip_tags($_REQUEST['pass']); else $pass = "";

        $data['login'] = $login;
        $data['pass'] = $pass;
        
        // обработка
        if($_SESSION['login']!=1) {
            if($data['login'] != '') {
                if(($data['login'] == 'admin') & ($data['pass'] == '123')) {
                    $_SESSION['login'] = 1;            
                } else {
                    $data['auth_error'] = "Неверный логин или пароль";        
                }                
                
            } else {
                $data['auth_error'] = "Логин не введен";
            }
            
        }
        
        return $data;
	}
}

 ?>