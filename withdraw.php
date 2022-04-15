<?php
    //  Query to insert acct details start here
                        if(isset($_POST['withdraw'])){

                        $ref=$_POST['refrNo'];
                        // $ref=65046386;
                        $name=$_POST['name'];
                        $bank=$_POST['bank'];
                        $acct=$_POST['acct'];
                       

                    
                                    $test=mysqli_query($conn,"SELECT Loan_ref FROM withdraw where Loan_ref='$ref'");
                                    $row=mysqli_fetch_array($test);
                                                if($row>0){
                                                echo "<script>alert('Account Detail Already Submitted');</script>";
                                                } else{
                                                $msg=mysqli_query($conn,"INSERT into withdraw(Loan_ref,acct_name,bank_name,acct_num) VALUES('$ref','$name','$bank','$acct')");
                                                        if($msg){
                                                            echo "<script>alert('Account Details successfully Submitted');</script>";
                                                            echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                                                        }
    
                                                }
                            
                         }
          // Query to insert acct details ends here
        ?>
           

    <!-- FILL BANK DETAILS MODAL -->
    <div id="fillDetails" class="fillDetails">
        <div class="overlay" id="overlayB"></div>
        <div class="bankForm">
            <h2>Fill Bank Details To Process Loan Withdrawal</h2>
            <form method="post">
                <input type="text" name ="name" placeholder="Account Name" required />
                
                        <select  name="bank" id="">
                            <option value="">    Bank Name</option>
                            <option value="Access Bank Plc">    Access Bank Plc  </option></option>
                            <option value="Fidelity Bank Plc">    Fidelity Bank Plc</option>
                            <option value="First City Monument Bank Limited">    First City Monument Bank Limited</option>
                            <option value="First Bank of Nigeria Limited">    First Bank of Nigeria Limited</option>
                            <option value="Guaranty Trust Holding Company Plc">    Guaranty Trust Holding Company Plc</option>
                            <option value="Union Bank of Nigeria Plc">    Union Bank of Nigeria Plc</option>
                            <option value="United Bank for Africa Plc">    United Bank for Africa Plc</option>
                            <option value="Zenith Bank Plc">    Zenith Bank Plc</option>
                            <option value="Sparkle Bank">    Sparkle Bank</option>
                            <option value="Kuda Bank">    Kuda Bank</option>
                            <option value="Rubies Bank">    Rubies Bank</option>
                            <option value="VFD MFB">   VFD MFB </option>
                            <option value="Mint Finex MFB">    Mint Finex MFB</option>
                            <option value="Mkobo MFB">    Mkobo MFB</option>
                            <option value="Citibank Nigeria Limited">    Citibank Nigeria Limited</option>
                            <option value="Ecobank Nigeria">    Ecobank Nigeria</option>
                            <option value="Heritage Bank Plc">    Heritage Bank Plc</option>
                            <option value=" Keystone Bank Limited">    Keystone Bank Limited</option>
                            <option value="Polaris Bank Limited">    Polaris Bank Limited</option>
                            <option value=" Stanbic IBTC Bank Plc">    Stanbic IBTC Bank Plc</option>
                            <option value="Standard Chartered">    Standard Chartered</option>
                            <option value="Sterling Bank Plc">    Sterling Bank Plc</option>
                            <option value="Titan Trust Bank Limited">    Titan Trust Bank Limited</option>
                            <option value="Unity Bank Plc">    Unity Bank Plc</option>
                            <option value="Wema Bank Plc">    Wema Bank Plc</option>
                        </select>
                <input type="number" name="acct" placeholder="Account Number" required/>
                <input id="refrNo" type="number" name="refrNo" placeholder="Reference Number"  />
                        
              
                <button type="submit" id="wthdrwBtn" name="withdraw">Withdraw</button>
            </form>
        </div>                            
    </div>

       <!-- FILL BANK DETAILS MODAL ends -->