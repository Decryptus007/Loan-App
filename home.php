<?php
ob_start();

 session_start();
 include_once('../db_connect.php');
 if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();
  } else{
    
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
        <link rel="stylesheet" href="./css/home.css">
    <title>SunPaid</title>
</head>

<body>
    <div class="home">
        <div class="header">
            <div class="nav">
                <h1>Home</h1>
          
                <?php 
                        // echo $_SESSION['email'];
                        echo "welcome back user: ". $_SESSION['email'];

                ?>
                <a href="logout.php">
                 Logout
                 </a>
            </div>
        </div>
    </div>
</body>

</html>

<?php  } ?>