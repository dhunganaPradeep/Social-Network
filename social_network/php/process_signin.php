<?php
// process the signin form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //get form values
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    //check for empty fields
    if (empty($email) || empty($password)) {

        header('Location: signin.php?error=All fields are required');
    } else {
        //check if email & passsword is valid, if not, redirect to signin page with error message
        include_once '../db/connect.php';
        $db = mysqli_select_db($connection, 'social_network');
        $query = "SELECT * FROM users WHERE `user_email` = '$email'";
        $result= mysqli_query($connection, $query);
        if(mysqli_num_rows($result)>0)
        {
            $row=mysqli_fetch_assoc($result);
            if(md5($password)==$row['user_password'])
            {
                session_start();
                $_SESSION['user_id']=$row['user_id'];
                header('Location: home.php');
            }
            else
            {
                header('Location: signin.php?error=Invalid password');  

            }
        }
        else
        {
            header('location: signin.php?error=Email not registerd');
        }
    }
} else {
    header("Location: signup.php");
}
?>