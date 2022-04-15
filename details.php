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

       <button id="closeLoanD" class="closeLoanD">Close</button>
        
    </div>