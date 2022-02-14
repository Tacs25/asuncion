<?php
    include('header.php');
	include_once '../includes/dbh.inc.php';
	session_start();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">
	<?php $page = 'appointment'; include('navbar.php'); ?>

    <br />

	<div class="card">
		<span id="message"></span>
		<div class="card-header"><h4>My Appointment List</h4></div>
			<div class="card-body">
				<div class="table-responsive">
		      		<table class="table table-striped table-bordered" id="appointment_list_table">
		      			<thead>
			      			<tr>
							  	<th>Booking ID</th>
			      				<th>Appointment ID</th>
			      				<th>Appointment Date</th>
			      				<th>Appointment Start Time</th>
			      				<th>Appointment End Time</th>
			      				<th>Appointment Status</th>
			      				<th>Get Email</th>
			      				<th>Cancel</th>
			      			</tr>
			      		</thead>
						<?php
							$id = $_SESSION['id'];
							date_default_timezone_set('Asia/Manila');
							$date = date('Y-m-d');
							$time = date('H:i:s');
                        	$result = $conn->query("SELECT * FROM booked WHERE (User_ID = '$id' AND sched >= '$date' AND status = 'booked') OR (User_ID = '$id' AND sched >= '$date' AND status = 'doctorcanceled') order by id desc");
                          	while ($row = $result->fetch_assoc()){
                        ?>
						<form method="post" action="../includes/cancel.inc.php">
			      		<tbody>
						  <tr>
						  <td><input type="hidden" name="id" value="<?php echo $row['ID'];?>"><?php echo $row['ID'];?></td>
						  <td><input type="hidden" name="appid" value="<?php echo $row['Appointment_ID'];?>"><?php echo $row['Appointment_ID'];?></td>
                            <td><input type="hidden" name="sched" value="<?php echo $row['sched'];?>"><?php echo $row['sched'];?></td>
                            <td><input type="hidden" name="startt" value="<?php echo $row['start_time'];?>">
							<?php	$timee = date_create($row ['start_time']);
									echo date_format($timee, 'h:i:A');?></td>
                            <td><input type="hidden" name="endd" value="<?php echo $row['end_time'];?>">
							<?php 	$timeee = date_create($row ['end_time']);
									echo date_format($timeee, 'h:i:A');?></td>
                            <td><input type="hidden" name="stats" value="<?php echo $row['status'];?>"><?php echo $row['status'];?></td>
							<?php if($row['status'] === 'booked'){?>
							<td><input type="submit" name ="getmail" class="btn btn-primary" value ="Get Email"/></td>
							<td><button type="button" name ="cancel" class="btn btn-danger" value ="cancel" data-bs-toggle="modal" data-bs-target="#cancelmodal">Cancel</button></td>

							<div class="modal fade" tabindex="-1" id="cancelmodal">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title">You want to cancel your booked?</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
								<div class="modal-body">
									<p>Just click <strong>'confirm' </strong>below if you want to cancel.</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									<input type="submit" name ="cancel" class="btn btn-primary" value ="Confirm"/>
								</div>
						
							</div>

							<input type="hidden" name="User_ID" value="<?php echo $row['User_ID'];?>">
							<?php }
							else {}
							?>
                          </tr>
						</tbody>
							  </form>
						
						<?php
						if (isset($_GET["error"])){
							if($_GET["error"] === "none"){
								?>
									<script>
									swal("Nice", "Booked Successfully", "success");
									</script>
					  			<?php
							}
							
							else if($_GET["error"] === "getmailsuccess"){
								?>
									<script>
									swal("Email", "Sent Successfully", "success");
									</script>
					  			<?php
							}	
						}
					
						  }
						  ?>
			      	</table>
					 
			    </div>
			</div>
		</div>
	</div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
    $('#appointment_list_table').DataTable();
} );
</script>
<?php
include_once 'footer1.php';
?>
