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
            <link rel="stylesheet" href="./css/repay.css">
            <link rel="stylesheet" href="./css/applyLoan.css">
        <title>SunPaid</title>
    </head>
<body>
    <div class="repay">
        <div class="header">
            
            <!-- DESKTOP NAV -->
            <div id="overlayS" class="overlay overlayS"></div>
            <div id="nav" class="nav">
                <h2 id="closeSide"><i class="fa-solid fa-xmark"></i></h2>
                <h1>SunPaid</h1>
                <div class="otherNavs">
                    <a href="./home.php"><p>Dashboard</p></a>
                    <a href="./repayment.php"><h2 class="pgName">Repayment</h2></a>
                    <a href="./settings.php"><p>Settings</p></a>
                    <a href="./support.php"><p>Support</p></a>
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
    </div>

    <div class="repayUI">

        <!-- DON'T TOUCH THIS -->
        <div class="custom-shape-divider-top-1649706673">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
        <!-- DON'T TOUCH THE ABOVE CODE -->

<!-- special code for fetching out data for repayment -->
<?php
							
	include_once('repay.php');
          
?>
        <div class="repayMain">
            <div class="repayCard">
                <p>Total Repayable Amount</p>
                <h2> ??? <?php               
                       
                echo number_format($total,2)  ?> </h2>
                <a href="#repays"><small>click to view all repayment plans</small></a>
            </div>
        </div>
    </div>

   


  






    <div id="repays">
            
        <!-- DON'T TOUCH THIS TOO -->
        <div class="custom-shape-divider-top-1649809915">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M602.45,3.86h0S572.9,116.24,281.94,120H923C632,116.24,602.45,3.86,602.45,3.86Z" class="shape-fill"></path>
            </svg>
        </div>
        <div id="trick"></div>
        <!-- DON'T TOUCH THE ABOVE CODE -->
 
        
<?php						
	include_once('repay_month.php');    
?>
        <div class="viewRepayment">
            <div>
                <p>Repayable Amount: ???<span>
                        <?php
                        echo number_format($amount,2);
                        ?>
                </span></p>
                <a href="initialize.php">Pay Now</a>
            </div>
            <p class="repayDtl">Repayment for loan collected at: <span>
                        <?php  
                            $qry = $conn->query("SELECT * from loan_list  WHERE borrower_id='$userid' AND status ='$status'");

                            while($row = $qry->fetch_assoc()){
                            ?>
                                    <p><small><b><?php 
                                    if(isset($row['date_released'])) {
                                        echo date("M d, Y",strtotime($row['date_released'])); }
                                    else{
                                    echo "Not Available Yet";
                                    }     
                                    ?></small></b></p>
                        <?php  }  ?>
       
            </span></p> 
            <p class="repayDtl">Next Repayment for loan: <br><span>
            <?php    
            
                if(isset($next)){
                echo date('M d, Y',strtotime($next));
                }else{
                    echo "Not Available Yet";
                }
            ?>

            </span></p> 	
        </div>

    </div>

    <script src="./js/app.js"></script>
</body>
</html>

<?php  } ?>