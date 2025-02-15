<?php
@include 'config.php';

if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact = mysqli_real_escape_string($conn, $_POST['num']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$institute = mysqli_real_escape_string($conn, $_POST['Institute']);
$password = md5($conn, $_POST['pass']);
$cpassword = md5($_POST['cpass']);

$select = "SELECT * FROM stuent_record WHERE email = '$email' && password = '$password'";

$result = mysqli_query($conn, $selcet);

if(mysqli_num_rows($result) > 0){
    
    $error[] ='user already exist';

}
else{

    if($password !=$cpassword){
        $error[] = 'password not matched!';
    }
    else{
        $insert ="INSERT INTO student_record(name, email, contact_number, location, institute, password) VALUES('$name', '$email', '$contact', '$location', '$institute', '$password')";
        mysqli_query($conn, $insert);
        header('location:studentlogin.php');
    }
}
};
?>