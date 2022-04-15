<?php
ob_start();

 session_start();
 include_once('admin/db_connect.php');
 if (strlen($_SESSION['id']==0)) {
  
  header('location:logout.php');
  ob_end_flush();
  } else{

    include_once('insert_loans.php');
    
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
    <title>SunPaid</title>
</head>

<body>
    <div class="home">
        <div class="header">
            
            <!-- DESKTOP NAV -->
            <div id="overlayS" class="overlay overlayS"></div>
            <div id="nav" class="nav">
                <h2 id="closeSide"><i class="fa-solid fa-xmark"></i></h2>
                <h1>SunPaid</h1>
                <div class="otherNavs">
                    <a href="./home.php"><h2 class="pgName">Dashboard</h2></a>
                    <a href="./repayment.php"><p>Repayment</p></a>
                    <a href="./settings.php"><p>Settings</p></a>
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

        <div class="pageUI">
        <div class="cards">
        <div class="card">
            <div class="cardHead">
      <!--  start here for fetching the amount user borrow -->
                    <?php


            $userid = $_SESSION['id'];
            $query=mysqli_query($conn,"SELECT * FROM borrowers WHERE id='$userid'");
            while($result=mysqli_fetch_array($query))
            {
                $_SESSION['fname']= $result['firstname'];
                $_SESSION['lname']= $result['lastname'];
                $_SESSION['email']= $result['email'];

            } 
            $result = $conn->query("SELECT * FROM loan_list WHERE borrower_id = '$userid'");
            //  $emparray = array();
            $tamount = 0;
            while($row =mysqli_fetch_assoc($result))
            {    
                $tamount+= $row['amount'];
            }
                    ?>
                <p>Loan Amount: <span>
      <!--  ends here for fetching the amount user borrow -->

            ₦<?php echo number_format($tamount,2);  ?>
                </span></p>

            </div>
            <div class="cardTail">
                <small id="showL">Loan Details</small>
                <span id="applyLoan" class="pay">Apply Loan</span>
            </div>
        </div>

            <?php   include_once('repay.php');  ?>
            
        <div class="card">
            <div class="cardHead">
                <p>Repayable Amount: <span>
                ₦<?php  echo number_format($total,2); ?>
                </span></p>
            </div>
            <div class="cardTail">
                <a href="./repayment.php#repays"><small>Repayment Details</small></a>
                <a href="./repayment.php"><span class="pay">Pay Now</span></a>
            </div>
        </div>
        </div>
        </div>
    </div>

            <!-- APPLY LOAN FORM start -->
        
            <?php  include_once('apply.php'); ?>

            <!-- APPLY LOAN FORM ends-->

         
            <!-- LOAN DETAILS start-->
        
            <?php  include_once('details.php'); ?>

            <!-- LOAN DETAILS ends-->


            <!-- FILL BANK DETAILS MODAL start -->
            <?php  include_once('withdraw.php');  ?>
            <!-- FILL BANK DETAILS MODAL ends -->


    <script src="./js/app.js"></script>
</body>

</html>

<?php  } ?>
