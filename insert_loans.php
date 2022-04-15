
     <?php
                if(isset($_POST['submit'])) 
                   
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
                                   echo "<script>alert('Check the Loan Status to Withdraw at the Loan Details');</script>";
                                   echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                                   }
                               
   
                     }