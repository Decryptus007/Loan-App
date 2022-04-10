<?php
ob_start();

 session_start();
 include_once('../db_connect.php');
 if (strlen($_SESSION['id']==0)) {
  
  header('location:logout.php');
  ob_end_flush();
  } else{
                // if(isset($_POST['result'])) {
                // echo "good";
                // $monthly = ($amount + ($amount * ($interest/100))) / $months;
                // $penalty = $monthly * ($penalty/100);

                // }
                if(isset($_POST['submit'])) {
                   
                    {
   
                        $plan=$_POST['plan_id'];
                        $type=$_POST['loan_type_id'];
                        $purpose=$_POST['purpose'];
                        $amount=$_POST['amount'];
                        $status= 0;
                        $borrowers = $_SESSION['id'];
                        $data = 0;
                                       
                                        $ref_no = mt_rand(1,99999999);
                                        $i= 1;

                                            while($i== 1){
                                                $check = mysqli_query($conn,"SELECT * FROM loan_list where ref_no ='$ref_no' ")->num_rows;
                                                if($check > 0){
                                                $ref_no = mt_rand(1,99999999);
                                                }else{
                                                    $i = 0;
                                                }
                                            }
                                            $data .= " , ref_no = '$ref_no' ";
                                        
                                      
                
                                        $msg=mysqli_query($conn,"INSERT into loan_list(loan_type_id, borrower_id, purpose, amount, plan_id, status,ref_no) VALUES('$type','$borrowers','$purpose','$amount','$plan','$status','$ref_no')");
                            
                                    if($msg)
                                    {
                                        echo "<script>alert('Loan successfully submitted');</script>";
                                        echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                                    }
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
            <div class="nav">
                <h1>SunPaid</h1>
                <div class="otherNavs">
                    <h2 class="pgName">Dashboard</h2>
                    <a href="#"><p>Repayment</p></a>
                    <a href="#"><p>Settings</p></a>
                    <a href="#"><p>About</p></a>
                    <a class="logOut" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
            </div>
        </div>
        <div class="pageUI">
        <div class="cards">
        <div class="card">
            <div class="cardHead">
                <p>Loan Amount: <span>NGN 0</span></p>
            </div>
            <div class="cardTail">
                <small id="showL">Loan Details</small>
                <span id="applyLoan" class="pay">Apply Loan</span>
            </div>
        </div>
        <div class="card">
            <div class="cardHead">
                <p>Repayable Amount: <span>NGN 0</span></p>
            </div>
            <div class="cardTail">
                <small>Repayment Details</small>
                <span class="pay">Pay Now</span>
            </div>
        </div>
        </div>
        </div>
    </div>

    <!-- APPLY LOAN FORM -->
    <div id="windowLoan" class="applyLoan">
        <div class="overlay" id="overlay"></div>
        <div class="applyForm">
            <h2>Apply Loan Form</h2>
            <form method="post">
               
                <?php
				$plan = $conn->query("SELECT * FROM loan_plan  ");
				?>
                <label>
                    <span>Select Loan Plan:</span>
                    <select name="plan_id" id="plan_id">
                    <option value="">---</option>
						<?php while($row = $plan->fetch_assoc()): ?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($plan_id) && $plan_id == $row['id'] ? "selected" : '' ?> data-months="<?php echo $row['months'] ?>" data-interest_percentage="<?php echo $row['interest_percentage'] ?>" data-penalty_rate="<?php echo $row['penalty_rate'] ?>"><?php echo $row['months'] . ' month/s [ '.$row['interest_percentage'].'%, '.$row['penalty_rate'].'% ]' ?></option>
						<?php endwhile; ?>
                    </select>
                    <small>months [ interest%,penalty% ]</small>
                </label>

                <?php
				$type = $conn->query("SELECT * FROM loan_types ");
				?>
                <label>
                    <span>Select Loan Type:</span>
                    <select name="loan_type_id" id="loan_plan_id">
                    <option value="">---</option>
						<?php while($row = $type->fetch_assoc()): ?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($loan_type_id) && $loan_type_id == $row['id'] ? "selected" : '' ?>><?php echo $row['type_name'] ?></option>
						<?php endwhile; ?>
                    </select>
                </label>

                <label>
                    <span>Purpose of Applying Loan:</span>
                    <textarea required name="purpose" id="" cols="30" rows="2" placeholder="Type Here..." ><?php echo isset($purpose) ? $purpose : '' ?></textarea>
                </label>

                <label>
                    <span>Amount:</span>
                    <input required type="number" name="amount" placeholder="Input Amount"  value="<?php echo isset($amount) ? $amount : '' ?>">
                    
                </label>
                <button type="submit"  name="result" id="calcBtn"> Calculate</button>

                

                <!-- CALCULATED WINDOW -->
                <div id="calcWindow">
                    
                        <label>
                            <span>Total Payable Amount:</span>
                            <input type="number" disabled value="<?php echo number_format($monthly * $months,2) ?>" />
                        </label>
                        <label>
                            <span>monthly Payable Amount:</span>
                            <input type="number" disabled value="<?php echo number_format($monthly,2) ?>" />
                        </label>
                        <label>
                            <span>Penalty Amount:</span>
                            <input type="number" disabled value="<?php echo number_format($penalty,2) ?>" />
                        </label>
                    <div class="otherCalcBtns">
                        <button type="submit" name="submit" >Submit</button>
                        <button id="cancelApply">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    

         
    <!-- LOAN DETAILS -->
    <div id="loanDetails" class="loanDetails">
        <div class="overlay" id="overlayL"></div>
        <div class="loanHolder">
            <h2>Loan Details</h2>
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
                while($row =mysqli_fetch_assoc($result))
                {
                  //  $emparray[] = $row;
                


                ?>
            <div class="loanDetail">
                    <!-- php loan details -->
                <p>Name: <span> <?php echo $_SESSION['fname'].' '. $_SESSION['lname']; ?> </span></p>
                <p>Reference No: <span><?php echo $row['ref_no']; ?></span></p>
                <p>Loan Type: <span>
                    <?php if($row['loan_type_id']=="1"){ 
                    echo "Small Business";}
                    elseif ($row['loan_type_id']=="2") {
                     echo "Mortgages";
                    }elseif($row['loan_type_id']=="3"){
                        echo "Personal Loans";
                    }else {
                        echo "Not Valid";
                    } ?>
                    </span></p>
                <p>Loan Plan: <span>
                     <?php if($row['plan_id']=="1"){ 
                    echo "36 Months";}
                    elseif ($row['plan_id']=="2") {
                     echo "24 Months";
                    }elseif($row['plan_id']=="3"){
                        echo "27 Months";
                    }else {
                        echo "Not Valid";
                    } ?></span></p>
                <p>Loan Purpose: <span> <?php echo $row['purpose']; ?></span></p>
                <p>Loan Amount: <span>NGN <?php echo $row['amount']; ?></span></p>
                <p>Date Released: <span>
                <?php if($row['date_released']=="0000-00-00 00:00:00"){ 
                    echo "Not Available Yet";
                    }else {
                        echo $row['date_released'];
                    } ?>
                    </span></p>
                <p>Loan Status: <span>
                <?php if($row['status'] == 0): ?>
						 			<span class="badge badge-warning">For Approval</span>
						 		<?php elseif($row['status'] == 1): ?>
						 			<span class="badge badge-info">Approved</span>
					 			<?php elseif($row['status'] == 2): ?>
						 			<span class="badge badge-primary">Released</span>
					 			<?php elseif($row['status'] == 3): ?>
						 			<span class="badge badge-success">Completed</span>
					 			<?php elseif($row['status'] == 4): ?>
						 			<span class="badge badge-danger">Denied</span>
						 		<?php endif; ?>
                </span></p>
            </div>
        <?php }       ?>
        </div>
    </div>
          
    <script src="./js/app.js"></script>
</body>

</html>

<?php  } ?>
