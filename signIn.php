<?php
session_start();
// error_reporting(0);
include_once('../db_connect.php');
if(isset($_POST['login']))
{
$ret=mysqli_query($conn,"SELECT * FROM borrowers WHERE email='".$_POST['email']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

$_SESSION['id']=$num['id'];
$_SESSION['email']=$num['email'];
header("location:home.php");
ob_end_flush();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
    <title>SunPaid</title>
</head>

<body>
    <div class="loginUI">
        <section class="headTitle">
            <h1>SunPaid Loan App</h1>
            <p>Online loan, as fast as 5 minutes</p>
        </section>
        <main>
            <h2>Log In</h2>
            <form onsubmit="() => alert('Hi')" method="post" >
                <label><span>Email:</span><input type="email" placeholder="Input your Email" name="email" /></label>

                <label><span>Password:</span><input type="password" placeholder="Input your Password" name="password" /></label>

                <button type="submit" name="login">LOG IN </button>

            </form>
            <p class="signUp">Don't have an account? Create <a href="./signUp.php"
                    class="signUpLink">account</a></p>
        </main>
    </div>
</body>

</html>