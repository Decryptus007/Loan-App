<?php
ob_start();

 session_start();
 include_once('admin/db_connect.php');
 if (strlen($_SESSION['id']==0)) {
  
  header('location:logout.php');
  ob_end_flush();
  } else{

            // Query to update email address start here
                        if(isset($_POST['updemail'])){

                        $cemail=$_POST['cemail'];
                        $nemail=$_POST['nemail'];
                       

                            $sql=mysqli_query($conn,"SELECT email FROM borrowers where email='$cemail'");
                            $num=mysqli_fetch_array($sql);
                                if($num>0)
                                {
                                $userid=$_SESSION['id'];
                                $ret=mysqli_query($conn,"update borrowers set email='$nemail' where id='$userid'");
                                echo "<script>alert('Email Changed Successfully !!');</script>";
                                echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
                                }
                                else
                                {
                                echo "<script>alert('Current Email does not match !!');</script>";
                                echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
                                }
                         }
             // Query to update email address ends here

             // Query to update name  start here
             if(isset($_POST['updnin'])){

                $cnin=$_POST['cnin'];
                $newnin=$_POST['newnin'];

                    $sql=mysqli_query($conn,"SELECT nin_id FROM borrowers where nin_id='$cnin'");
                    $num=mysqli_fetch_array($sql);
                        if($num>0)
                        {
                        $userid=$_SESSION['id'];
                        $ret=mysqli_query($conn,"update borrowers set nin_id='$newnin' where id='$userid'");
                        echo "<script>alert('NIN Changed Successfully !!');</script>";
                        echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
                        }
                        else
                        {
                        echo "<script>alert('Current NIN does not match !!');</script>";
                        echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
                        }
                 }

            //  Query to update name ends here

                // Query to update password  start here
            
                if(isset($_POST['change-password'])) {

                        $oldpassword=md5($_POST['currentpassword']); 
                        $newpassword=md5($_POST['newpassword']);

                        $sql=mysqli_query($conn,"SELECT password FROM borrowers where password='$oldpassword'");
                        $num=mysqli_fetch_array($sql);
                            if($num>0)
                            {
                            $userid=$_SESSION['id'];
                            $ret=mysqli_query($conn,"update borrowers set password='$newpassword' where id='$userid'");
                            echo "<script>alert('Password Changed Successfully !!');</script>";
                            echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
                            }
                            else
                            {
                            echo "<script>alert('Old Password not match !!');</script>";
                            echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
                            }
                 }
    
                // Query to update password ends here



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
            <link rel="stylesheet" href="./css/settings.css">
        <title>SunPaid</title>
    </head>
<body>
    <div class="settings">
        <div class="header">
            
            <!-- DESKTOP NAV -->
            <div id="overlayS" class="overlay overlayS"></div>
            <div id="nav" class="nav">
                <h2 id="closeSide"><i class="fa-solid fa-xmark"></i></h2>
                <h1>SunPaid</h1>
                <div class="otherNavs">
                    <a href="./home.php"><p>Dashboard</p></a>
                    <a href="./repayment.php"><p>Repayment</p></a>
                    <a href="./repayment.php"><h2 class="pgName">Settings</h2></a>
                    <a href="./support.html"><p>Support</p></a>
                    <a href="./about.php"><p>About</p></a>
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
        <div class="settingUI">
            <div id="updateEmail"><i class="icon fa-regular fa-envelope"></i>Change/Update Email Address</div>
            <div id="updateName"><i class="icon fa-solid fa-person"></i>Change/Update NIN</div>
            <div id="updatePass"><i class="icon fa-solid fa-key"></i>Change Password</div>
        </div>

        <div id="upForm" class="upForm">
            <div class="overlay" id="overlayEmail"></div>
            <form class="popForm" method="post">
                <label>
                    <span>Current Email</span>
                    <input type="email" name="cemail" placeholder="your current email">
                </label>
                <label>
                    <span>New Email</span>
                    <input type="email" name="nemail" placeholder="your new email">
                </label>
                <button type="submit" name="updemail">Update Email</button>
            </form>
        </div>

        <div id="upName" class="upForm">
            <div class="overlay" id="overlayName"></div>
            <form class="popForm" method="post">
                <label>
                    <span>Current NIN Number</span>
                    <input type="text" name="cnin" placeholder="your current NIN">
                </label>
                <label>
                    <span>New NIN Number</span>
                    <input type="text" name="newnin" placeholder="your new NIN">
                </label>
                <button type="submit" name="updnin">Update Data</button>
            </form>
        </div>



        <div id="upPass" class="upForm">
            <div class="overlay" id="overlayPass"></div>
            <form class="popForm" method="post">
                <label>
                    <span>Current Password</span>
                    <input type="password" name="currentpassword" placeholder="your current Password">
                </label>
                <label>
                    <span>New Password</span>
                    <input type="password" name="newpassword" placeholder="your new Password">
                </label>
                <button type="submit" name="change-password">Update Password</button>
            </form>
        </div>
    </div>
    <script src="./js/sideBar.js"></script>
    <script src="./js/settings.js"></script>
</body>
</html>

<?php } ?>