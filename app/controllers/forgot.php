<?php

Class Forgot extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "Forgot";
		  
		$user = $this->loadModel("user");
 	 	
		if(isset($_POST['email']))
 	 	{
			$email = $_POST['email'];
 	 		$user->forgot($email);
 	 	}

		if(isset($_GET['token']))
 	 	{
			$token = $_GET['token'];
 	 		$data = $user->checkToken($token);
			if ($data) {
				$this->view("reset", $data);die();
			}
 	 	}

		if (isset($_POST['action'])) {
			if ($_POST['action'] == 'reset') {  
				$password = $_POST['password'];
				$id = $_POST['id'];
				// controler appele l model avec les params et pas la base
				$result = $user->resetUserById($id, $password);
				$this->view("login", $data);die();
			}
		}
		  
		$this->view("forgot", $data);
	}

}