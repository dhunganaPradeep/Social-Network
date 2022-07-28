<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(empty($_POST['post_text']) && empty($_FILES['post_image']['name']))
        {
            echo "post cannot be empty";

        }
        else{
            $text =$_post['post_text'];
            $image='';
            $user_id=$_SESSION['user_id'];
            if($_FILES['post_image']['name']!=''){
                $image_name=$_FILES['post_image']['image'];
                $tmp=$FILES['post_image']['tmp_image'];
                //for type
                
            }
        }
    }

?>