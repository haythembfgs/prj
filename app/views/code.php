<?php 

if (isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) 
    {
        echo "saved";
    }
    else
    {
        echo "not saved";
    }
}


?>