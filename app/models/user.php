<?php 

Class User 
{

	function login($POST)
	{
		$DB = new Database();

		$_SESSION['error'] = "";
		if(isset($POST['username']) && isset($POST['password']))
		{

			$arr['username'] = $POST['username'];
			$arr['password'] = $POST['password'];

			$query = "select * from users where username = :username && password = :password limit 1";
			$data = $DB->read($query,$arr);
			if(is_array($data))
			{
 				//logged in
 				$_SESSION['user_name'] = $data[0]->username;
				$_SESSION['user_url'] = $data[0]->url_address;

				header("Location:". ROOT . "home");
				die;

			}else{

				$_SESSION['error'] = "wrong username or password";
			}
		}else{

			$_SESSION['error'] = "please enter a valid username and password";
			$_SESSION['error'] = "or reset the password";
		}

	}

	function signup($POST)
	{

		$DB = new Database();

		$_SESSION['error'] = "";
		if(isset($POST['username']) && isset($POST['password']))
		{

			$arr['username'] = $POST['username'];
			$arr['password'] = $POST['password'];
			$arr['email'] = $POST['email'];
			$arr['url_address'] = get_random_string_max(60);
			$arr['date'] = date("Y-m-d H:i:s");

			$query = "insert into users (username,password,email,url_address,date) values (:username,:password,:email,:url_address,:date)";
			$data = $DB->write($query,$arr);
			if($data)
			{
				Mail::sendEmailNotif();
				
				header("Location:". ROOT . "login");
				die;
			}

		}else{

			$_SESSION['error'] = "please enter a valid username and password";
		}
	}

	function check_logged_in()
	{

		$DB = new Database();
		if(isset($_SESSION['user_url']))
		{

			$arr['user_url'] = $_SESSION['user_url'];

			$query = "select * from users where url_address = :user_url limit 1";
			$data = $DB->read($query,$arr);
			if(is_array($data))
			{
				//logged in
 				$_SESSION['user_name'] = $data[0]->username;
				$_SESSION['user_url'] = $data[0]->url_address;

				return true;
			}
		}

		return false;

	}

	function logout()
	{
		//logged in
		unset($_SESSION['user_name']);
		unset($_SESSION['user_url']);

		header("Location:". ROOT . "login");
		die;
	}

	function getTableUser()
	{
		$DB = new Database();
		$result = $DB->read("SELECT id, username, password , email, date FROM users");
		return $result;
	}

	function getUserById($id)
	{
		$DB = new Database();
		$result = $DB->read("SELECT id, username, password , email, date FROM users WHERE id=$id");
		return $result;
	}

	function forgot($email)
	{
		$DB = new Database();
		$result = $DB->read("SELECT * FROM users WHERE email='$email'");
		if ($result) {
			$token = $result[0]->url_address;
			$url = $_SERVER['HTTP_REFERER'] . "?token=" . $token;
			$body = 'Bonjour, <br> Pour le réinitialisation de votre mot de passe cliquer <a href="' . $url . '">ici</a>, <br> Cordialement,';
			$bool = Mail::sendEmailNotif($email, 'Réinitialisation Mot de passe', $body);
			return $bool;
		}
		return false;
	}

	function checkToken($token)
	{
		$DB = new Database();
		$result = $DB->read("SELECT * FROM users WHERE url_address='$token'");
		if ($result) {
			return $result;
		}
		return false;
	}
	
	function updateUserById($id, $username, $email, $password)
	{
		$DB = new Database();
		$sql = ("UPDATE `users` SET `username`='".$username."',`email`='".$email."',`password`= $password WHERE `id` = $id");
		// le model appele le Database (DAO) et pas mysqli
		if(false === $DB->write($sql)) {
			return mysql_error();
		}
		 
		return true;
	}

	function deleteUserById($id)
	{
		$DB = new Database();
		$sql = ("DELETE from users WHERE `id` = $id");
		if(false === $DB->write($sql)) {
			return mysql_error();
		}
		return true;
	}

	function resetUserById($id, $password)
	{
		$DB = new Database();
		$sql = ("UPDATE `users` SET `password`= $password WHERE `id` = $id");
		// le model appele le Database (DAO) et pas mysqli
		if(false === $DB->write($sql)) {
			return mysql_error();
		}
		 
		return true;
	}
	
}
