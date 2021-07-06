<?php 
class Controller_Tasks extends Controller
{
    function __construct()
	{
		$this->model = new Model_Tasks();
		$this->view = new View();
	}
    
    function action_view()
    {
        
        $data = $this->model->get_data();
        $this->view->generate('tasks_view.php', 'template_view.php', $data);
    }
    
    function action_index()
    {
        $this->action_view();
    }
    
    function action_add()
	{	
	    $data = $this->model->insert_data();
        $this->view->generate('tasksadd_view.php', 'template_view.php', $data);
    }
    
    function action_edit()
	{	
        $data = $this->model->update_data();
        $this->view->generate('tasksedit_view.php', 'template_view.php', $data);
    }
}
?>