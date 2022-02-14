<?php
    include_once 'header.php';
	include_once '../includes/dbh.inc.php';
	session_start();
	
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">
	<?php $page = 'book'; include('navbar.php'); ?>

    <br />

	<div class="card">
		<span id="message"></span>
		<div class="card-header"><h4>BOOK APPOINTMENT</h4></div>
			<div class="card-body">
				<div class="table-responsive">
		      		<table class="table table-striped table-bordered" id="appointment_list_table">
		      			<thead>
			      			<tr>
							  	<th>Appointment ID</th>
								<th>Appointment Date YY/M/D</th>
								<th>Appointment Start Time</th>
								<th>Appointment End Time</th>
								<th>Status</th>
								<th>Action</th>
			      			</tr>
			      		</thead>
						<?php
						date_default_timezone_set('Asia/Manila');
						$date = date('Y-m-d');
						$time = date('H:i:s');
                        $result = $conn->query("SELECT * FROM appointment WHERE sched >= '$date' AND status = 'available' order by id desc");
                          while ($row = $result->fetch_assoc()){
                        ?>
						<form method="post" action="../includes/booking.inc.php">
			      		<tbody>
						  <tr>
						  <td><input type="hidden" name="id" value="<?php echo $row['ID'];?>"><?php echo $row['ID'];?></td>
                            <td><input type="hidden" name="sched" value="<?php echo $row['sched'];?>"><?php echo $row['sched'];?></td>
                            <td><input type="hidden" name="start_time" value="<?php echo $row['start_time'];?>">
							<?php 	$timee = date_create($row ['start_time']);
									echo date_format($timee, 'h:i:A');?></td>
                            <td><input type="hidden" name="end_time" value="<?php echo $row['end_time'];?>">
							<?php 	$timeee = date_create($row ['end_time']);
									echo date_format($timeee, 'h:i:A');?></td>
							<td><input type="hidden" name="status" value="<?php echo $row['status'];?>"><?php echo $row['status'];?></td>
							<td><button type="button" name ="booking" class="btn btn-primary" value ="Book" data-bs-toggle="modal" data-bs-target="#bookmodal">Book</button></td>

							<div class="modal fade" tabindex="-1" id="bookmodal">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title">Ready to book?</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
								<div class="modal-body">
									<p>Just click <strong>'book' </strong>below if you want to book.</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									<input type="submit" name ="booking" class="btn btn-primary" value ="Book"/>
								</div>
						
							</div>
                          </tr>
						  </form>
						</tbody>
						<?php
							if (isset($_GET["error"])){
								if ($_GET["error"] === "alreadybookedforthisday"){
								?>
									<script>
									swal("Oops!", "You already booked for this day", "warning");
									</script>
					  			<?php
					 		 }
							else if($_GET["error"] === "canceled"){
								?>
									<script>
									swal("Cancel", "Successfully", "success");
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>


<script>
    $(document).ready(function() {
    $('#appointment_list_table').DataTable();
} );
</script>
<!--<script>
	setInterval(
	function()
	{
		$('#appointment_list_table').load('bookappointment.php');
	} 3000);
</script>
-->

<?php
include_once "footer1.php";
?>

