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
                <small>Loan Details</small>
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
            <form>
                <label>
                    <span>Select Loan Plan:</span>
                    <select>
                        <option>1 year</option>
                    </select>
                    <small>months [ interest%,penalty% ]</small>
                </label>
                <label>
                    <span>Select Loan Type:</span>
                    <select>
                        <option>Small Loan</option>
                    </select>
                </label>
                <label>
                    <span>Purpose of Applying Loan:</span>
                    <textarea placeholder="Type Here..."></textarea>
                </label>
                <label>
                    <span>Amount:</span>
                    <input type="number" placeholder="Input Amount" />
                </label>
                <button id="calcBtn">Calculate</button>

                <!-- CALCULATED WINDOW -->
                <div id="calcWindow">
                    <label>
                        <span>Total Payable Amount:</span>
                        <input type="number" disabled />
                    </label>
                    <label>
                        <span>monthly Payable Amount:</span>
                        <input type="number" disabled />
                    </label>
                    <label>
                        <span>Penalty Amount:</span>
                        <input type="number" disabled />
                    </label>
                    <div class="otherCalcBtns">
                        <button>Submit</button>
                        <button id="cancelApply">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- LOAN DETAILS -->
    <div id="loanDetails" class="loanDetails">
        <div class="overlay" id="overlayL"></div>

    </div>

    <script src="./js/app.js"></script>
</body>

</html>

<?php  } ?>