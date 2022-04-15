<?php include 'db_connect.php' ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Withdrawal List</b>
					
				</large>
				
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="loan-list">
					<colgroup>
						<col width="10%">
						<col width="20%">
						<col width="20%">
                        <col width="10%">
						<col width="20%">
						<col width="10%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Loan Ref</th>
							<th class="text-center">Account Name</th>
							<th class="text-center">Bank Name</th>
							<th class="text-center">Account Number</th>
                            <th class="text-center">Transaction Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(isset($_GET['id']))
                            {
                            $withid=$_GET['id'];
                            $msg=mysqli_query($conn,"DELETE FROM withdraw WHERE id='$withid'");
                            // if($msg)
                            // {
                            // echo "<script>alert('Data deleted');</script>";
                            // header('location:admin/index.php?page=withdrawal');
                            // ob_end_flush();
                            // }
                            }

                            $i=1;

                            $type = $conn->query("SELECT * FROM withdraw");
							while($row=$type->fetch_assoc()){

						 ?>
						 <tr>
						 	
						 	<td class="text-center"><?php echo $i++ ?></td>
						 	<td>
						 		<p><b><?php echo $row['Loan_ref'] ?></b></p>
						 	
						 	</td>
						 	<td>
                                <p><b><?php echo $row['acct_name'] ?></b></p>

						 	</td>
						 	<td>
                             <p><b><?php echo $row['bank_name'] ?></b></p>

						 	</td>
                             <td>
                             <p><b><?php echo $row['acct_num'] ?></b></p>

						 	</td>
						 	<td class="text-center">
						 		<?php if($row['transaction_status'] == 1): ?>
						 			<span class="badge badge-warning">Done</span>
						 		<?php elseif($row['transaction_status'] == 2): ?>
						 			<span class="badge badge-info">Pending</span>
					 			<?php elseif($row['transaction_status'] == 3): ?>
						 			<span class="badge badge-danger">Cancel</span>
						 		<?php endif; ?>
						 	</td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_loan" type="button" id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>

						 			<a href="withdrawal.php?id=<?php echo $row['id'];  ?>" onClick="return confirm('Do you really want to delete');">
                                     <button class="btn btn-outline-danger btn-sm delete_loan" type="button"> <i class="fa fa-trash"></i></button>
                                     </a>
                                    
						 	</td> 

						 </tr>

						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
</style>	
