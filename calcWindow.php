<?php 
extract($_POST);

$monthly = ($amount + ($amount * ($interest/100))) / $months;
$penalty = $monthly * ($penalty/100);

?>


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
                