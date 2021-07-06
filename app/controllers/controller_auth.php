<?php 
class Controller_Auth extends Controller
{
    function __construct()
	{
		$this->model = new Model_Auth();
		$this->view = new View();
	}
    
    function action_index()
    {
        // данные
        $data = $this->model->get_data();
        
        // визуализация
        $this->view->generate('auth_view.php', 'template_view.php', $data);
    }
    
    function action_logout() {
        $_SESSION['login'] = 0;
        $this->action_index();
    }
    
}
?>