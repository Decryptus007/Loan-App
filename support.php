<?php
ob_start();

session_start();
include_once('admin/db_connect.php');
if (strlen($_SESSION['id']==0)) {
 
 header('location:logout.php');
 ob_end_flush();
 } else{

if(isset($_POST['submits']))
{
            $message=$_POST['message'];
            $useremail=$_SESSION['email'];

            $message = mysqli_real_escape_string($conn, $message);
            $useremail = mysqli_real_escape_string($conn, $useremail);


                $msg=mysqli_query($conn,"INSERT into support(user,message) VALUES('$useremail','$message')");
    
                    if($msg)
                    {
                        echo "<script>alert('Message Submit, Support will reach you via Email');</script>";
                        echo "<script type='text/javascript'> document.location = 'support.php'; </script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/applyLoan.css">
    <link rel="stylesheet" href="./css/support.css">
    <title>SunPaid</title>
</head>

<body>
    <div class="support">
        <div class="header">

            <!-- DESKTOP NAV -->
            <div id="overlayS" class="overlay overlayS"></div>
            <div id="nav" class="nav">
                <h2 id="closeSide"><i class="fa-solid fa-xmark"></i></h2>
                <h1>SunPaid</h1>
                <div class="otherNavs">
                    <a href="./home.php">
                        <p>Dashboard</p>
                    </a>
                    <a href="./repayment.php">
                        <p>Repayment</p>
                    </a>
                    <a href="./settings.php">
                        <p>Settings</p>
                    </a>
                    <a href="./support.php">
                        <h2 class="pgName">Support</h2>
                    </a>
                    <a href="./about.php">
                        <p>About</p>
                    </a>
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

        <div class="supportUI">
            <h2>Encountering an issue acquiring a loan?</h2>
            <p>Get in touch with our team now and we will get back to you as fast as we can.</p>
            <form method="post">
                <textarea name="message" placeholder="Type your issue here..."></textarea>
                <button type="submit" name="submits"><i class="fa-regular fa-paper-plane"></i> Send</button>
            </form>
        </div>
    </div>
    <script src="./js/sideBar.js"></script>
</body>

</html>
<?php } ?>