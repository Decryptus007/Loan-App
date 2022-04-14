<?php


$i=1;
$type = $conn->query("SELECT * FROM loan_types where id in (SELECT loan_type_id from loan_list) ");
while($row=$type->fetch_assoc()){
    $type_arr[$row['id']] = $row['type_name'];
}
$plan = $conn->query("SELECT *,concat(months,' month/s [ ',interest_percentage,'%, ',penalty_rate,' ]') as plan FROM loan_plan where id in (SELECT plan_id from loan_list) ");
while($row=$plan->fetch_assoc()){
    $plan_arr[$row['id']] = $row;
}

$userid=$_SESSION['id'];
$status=2;

$qry = $conn->query("SELECT * from loan_list  WHERE borrower_id='$userid' AND status ='$status'");
$tot=0;
while($row = $qry->fetch_assoc()){
    
    $monthly = ($row['amount'] + ($row['amount'] * ($plan_arr[$row['plan_id']]['interest_percentage']/100))) / $plan_arr[$row['plan_id']]['months'];
    $penalty = $monthly * ($plan_arr[$row['plan_id']]['penalty_rate']/100);
    $payments = $conn->query("SELECT * from payments where loan_id =".$row['id']);
    $paid = $payments->num_rows;
    $offset = $paid > 0 ? " offset $paid ": "";
    if($row['status'] == 2):
        $next = $conn->query("SELECT * FROM loan_schedules where loan_id = '".$row['id']."'  order by date(date_due) asc limit 1 $offset ")->fetch_assoc()['date_due'];
    endif;
    $sum_paid = 0;
    while($p = $payments->fetch_assoc()){
        $sum_paid += ($p['amount'] - $p['penalty_amount']);
    }
   
    // $sum = $monthly ;
    // $tot +=  $sum ;
    // $tot--; 
    echo $next;
    }   










?>