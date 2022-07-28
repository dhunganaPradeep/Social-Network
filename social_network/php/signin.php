<?php
session_start();
// if logged in go to home page
// else show signin page
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo '
        <script>
            alert("' . $error . '");           
        </script>
    ';
}
if (isset($_SESSION['user_id'])) {
    header('Location:home.php');
}
?>
<html>
<!-- sign in page -->

<head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
</head>

<body>
    <form action="process_signin.php" method="post">

        <div class="signin_box">
            <h1>SIGN IN</h1>
            <div class="form_row">
                <label> Email:</label>
                <input type="email" name="user_email" class="form_input">
            </div>
            <div class="form_row">
                <label> Password:</label>
                <input type="password" name="user_password" class="form_input">
            </div>
            <div class="form_row">
                <input type="submit" name="submit" class="form_submit">
            </div>
        </div>
    </form>

</html>
