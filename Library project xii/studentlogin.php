<?php
session_start();
@include 'config.php';

if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($connection, $_POST['username']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = md5($_POST['pass']);

$select = "SELECT * FROM stuent_record WHERE email = '$email' && password = '$password'";

$result = mysqli_query($connection, $select);

if(mysqli_num_rows($result) > 0){
    
$row = mysqli_fetch_array($result);
$_SESSION['user_id'] = $row['id'];
$_SESSION['email'] = $row['email'];
$_SESSION['name'] = $row['name'];


header('location: studentwelcome.php');
exit();
}else{
    $error = "Invalid email or password";
}
};
?>


<html>
    <head>
        <title>LBMS/loginpage</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="studentlogin12.css">
    </head>
    <body>
        <header>
        <nav class="navbar">
            <div class="navdiv">
            <div class="logo">Login/Register</div>
            <ul>
                <li><a href="adminlogin.php">Admin</a></li>
                <li><a href="studentlogin.php">Student</a></li>
            </ul>
            </div>
        </nav>
        </header>
        <section>
            <div class="left-part">
                <img src="loginst.jpg" alt="Student login">
            </div>
            <div class="right-part">
                <form method="post">
                    <h2>Student Login</h2>
                    <?php
                    if(isset($error)){
                        echo "<p style='color:red;'>$error</p>";
                    }
                    ?>
                    <label for="username">Enter your username</label><br>
                    <input type="text" name="username" required placeholder="enter your username "><br>
                    <label for="email">Enter your Email </label><br>
                    <input type="email" name="email" required placeholder="enter your email "><br>
                    <label for="contact no">Enter your password </label><br>
                    <input type="password" name="pass" required placeholder="enter your password "><br>
                    <input type="submit" name="submit" value="LogIn" class="login-button"><br>
                    <p>haven't registered yet?<a href="studentregister.php"> click here</a></p>

            </div>
        </section>
    </body>
</html>