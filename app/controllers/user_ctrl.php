<?php

Class User_ctrl extends Controller 
{
	function index()
	{
 	 	
        $user = $this->loadModel("user");
        $data = $user->getTableUser();
  
        $this->view("projet/user_list",$data);
    }

}