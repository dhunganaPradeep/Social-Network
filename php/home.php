<?php
require('../db/connect.php');
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    //get user info
    $db = mysqli_select_db($connection, 'social_network');
    $query = "SELECT * FROM users WHERE `user_id` = '$user_id'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['user_name'];
        $email = $row['user_email'];
        $image = $row['user_image'];
    }
    //user logged in show home page
?>

    <!-- Home Page -->
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="../css/home.css">
    </head>

    <body>
        <nav class="navbar">
            <a href="home.php"><button>Home</button></a>
            <a href="signout.php"><button>Logout</button></a>
        </nav>
        <div class="container">
            <div class="left_section">
                <!-- For user info -->
                <div class="profile_info">
                    <div class="user_image">
                        <img src="../files/<?php if($image!=='')
                        {
                            echo $image;
                        }
                        else
                        {
                            echo '8299_Hello_Codespeaks.png';
                        } ?>" alt="user_image">
                        <p><?php echo $name;?></p>
                    </div>

            </div>
            <div class="center_section">
                <!-- For user post -->
                <div class="form" style="width:100%;display:flex;justify-content:center;">
                        <form action="process_post.php" method="post" class="post_form">
                            <textarea name="post_text" id="post_text" placeholder="What's in your mind ?">

                            </textarea>
                            <input type="file" name="post_image" id="post_image">
                            <input type="button" id="post_submit" value="POST">
                        </form>

                </div>
                <div class="posts_section">

                </div>
            </div>
            <div class="right_section">
                <!-- For user post -->

            </div>
        </div>
    </body>

    </html>
<?php
}
else{
    //user not logged in show signin page
    header('Location: signin.php');
}
?>