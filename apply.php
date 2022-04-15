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
                    <textarea id="purpose" required name="purpose" cols="30" rows="2" placeholder="Type Here..." ><?php echo isset($purpose) ? $purpose : '' ?></textarea>
                </label>

                <label>
                    <span>Amount:</span>
                    <input id="amount" required type="number" name="amount" placeholder="Input Amount"  value=""<?php echo isset($amount) ? $amount : '' ?>">
                    
                </label>
                <button type="submit"  name="result" id="calcBtn"> Calculate</button>

                
                <!-- CALCULATED WINDOW -->
                <div id="calcWindow">
                    
                        <label>
                            <span>Total Payable Amount:</span>
                            <input id="totalAmt" type="number" name ="tpa"  disabled value="" />
                        </label>
                        <label>
                            <span>monthly Payable Amount:</span>
                            <input id="mnthlyAmt" type="number" name="mpa" disabled value="" />
                        </label>
                        <label>
                            <span>Penalty Amount:</span>
                            <input id="penAmt" type="number" name="pa" disabled value="" />
                        </label>
                    <div class="otherCalcBtns">
                        <button type="submit" name="submit" >Submit</button>
                        <button id="cancelApply">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>