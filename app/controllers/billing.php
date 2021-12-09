<?php

Class billing extends Controller 
{
	function index()
	{
        if(isset($_SESSION['user_name'])==NULL){
			// Haven't log in
            header("Location: login");
            die();
        }

        $user = $this->loadModel("user");
        $data = $user->getTableUser();
  
        $this->view("billing",$data);
    }

}