<?php

Class Single_post extends Controller 
{
	function index($link = '')
	{
 	 	
		if($link == "")
		{

			$data['page_title'] = "Image not found";
			$this->view("projet/not_found",$data);
		}else{

	 	 	$posts = $this->loadModel("posts");
	 	 	$result = $posts->get_one($link);

	 	 	$data['post'] = $result;
	 	 	
	 	 	$data['page_title'] = "Single Post";
			$this->view("projet/single_post",$data);
		}

	}

}