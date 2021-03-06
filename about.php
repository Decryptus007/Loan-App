<?php
ob_start();

 session_start();
 include_once('admin/db_connect.php');
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
            href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
            rel="stylesheet">
            <link rel="stylesheet" href="./css/home.css">
            <link rel="stylesheet" href="./css/applyLoan.css">
            <link rel="stylesheet" href="./css/about.css">
        <title>SunPaid</title>
    </head>
<body>
    <div class="about">
        <div class="header">
            
            <!-- DESKTOP NAV -->
            <div id="overlayS" class="overlay overlayS"></div>
            <div id="nav" class="nav">
                <h2 id="closeSide"><i class="fa-solid fa-xmark"></i></h2>
                <h1>SunPaid</h1>
                <div class="otherNavs">
                    <a href="./home.php"><p>Dashboard</p></a>
                    <a href="./repayment.php"><p>Repayment</p></a>
                    <a href="./settings.php"><p>Settings</p></a>
                    <a href="./support.php"><p>Support</p></a>
                    <a href="./about.php"><h2 class="pgName">About</h2></a>
                    <a class="logOut" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
            </div>

            <!-- MOBILE NAV -->
            <div class="mNav">
                <div class="mNavHead">
                    <span id="openSide"><i class="fa-solid fa-sliders"></i></span>
                    <h2>SunPaid</h2>
                    <a class="logOut" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
            </div>

        </div>

        <div class="aboutUI">
            <div>
                <p>Head of Project</p>
                <h2>Ogbeni Ayeni</h2>
            </div>
            <div>
                <p>Project Leader</p>
                <h2>Adepegba Lekan</h2>
            </div>
            <div>
                <p>Project Member</p>
                <h2>Black Camaru</h2>
            </div>
            <div>
                <p>Project Member</p>
                <h2>Juice WRLD</h2>
            </div>
        </div>

    </div>


    <script src="./js/sideBar.js"></script>
</body>
</html>

<?php }?>