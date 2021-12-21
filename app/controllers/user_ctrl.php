<?php

Class User_ctrl extends Controller 
{
	function index()
	{
        if(isset($_SESSION['user_name'])==NULL){
			// Haven't log in
            header("Location: login");
            die();
        }

        $user = $this->loadModel("user");
        
        // comme kayen action edit w id f get donc yedkhol direct hna
        //donc kayen deux choix ndiro action f la balise form
        //deuxieme choix ndiro had la partie apres l post hab ykol ida kayen post joz direct liha
        // cette partie c'est pour evité d'utilise plusieur controller donc on va utiliser le user_ctrl
        if(isset($_GET['id']) && isset($_GET['action'])) {
            // pour verifie le type de l'action a executé
            if($_GET['action'] == 'edit') {
                // pour recuper que le user avec id
                $data = $user->getUserById($_GET['id']);
                $this->view("user_edit",$data);
                die();
            }
            
            // pour verifie le type de l'action a executé
            if($_GET['action'] == 'delete') {
                // pour recuper que le user avec id
                $data = $user->deleteUserById($_GET['id']);
                $data = $user->getTableUser();
                $this->view("user_list",$data);
                die();
            }
            
        }

        // ici aussi il faut metrre le traitment ta3 l post ta3 l formulaire edit
        //on peux debegi avec deux chose 
        //soit error_log sans arrete l'executon 
        // soit var_dump();die();
        // l post mafihch l id 
        if(isset($_POST['id']) && isset($_POST['action'])) {
            if($_POST['action'] == 'update') {   
                //tous les champs from POST donc le formulaire edit user doit avoir (id, username, email, password , action)   
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $id = $_POST['id'];
                // controler appele l model avec les params et pas la base
                $result = $user->updateUserById($id, $username, $email, $password);
            }
        }  
        
        // pour recuperer tout les user pour la liste
        $data = $user->getTableUser();
  
        $this->view("user_list",$data);
    }

}