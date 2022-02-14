<?php
    include('header.php');
	include_once '../includes/dbh.inc.php';
	session_start();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">
	<?php $page = 'history'; include('navbar.php'); ?>

    <br />

	<div class="card">
		<span id="message"></span>
		<div class="card-header"><h4>My Appointment History</h4></div>
			<div class="card-body">
				<div class="table-responsive">
		      		<table class="table table-striped table-bordered" id="appointment_list_table">
		      			<thead>
			      			<tr>
			      				<th>History No.</th>
								<th>Appointment ID</th>
								<th>Booking ID</th>
			      				<th>Appointment Date</th>
			      				<th>Appointment Start Time</th>
			      				<th>Appointment End Time</th>
			      				<th>Appointment Status</th>
			      			</tr>
			      		</thead>
						<?php
							$id = $_SESSION['id'];
                        	$result = $conn->query("SELECT * FROM archive WHERE User_ID = '$id'");
                          	while ($row = $result->fetch_assoc()){
                        ?>
						<form method="post" action="../includes/cancel.inc.php">
			      		<tbody>
						  <tr>
						  	<td><input type="hidden" name="id" value="<?php echo $row['ID'];?>"><?php echo $row['ID'];?></td>
						  	<td><?php echo $row['Appointment_ID'];?></td>
						  	<td><?php echo $row['Booking_ID'];?></td>
                            <td><?php echo $row['sched'];?></td>
                            <td><?php echo $row['start_time'];?></td>
                            <td><?php echo $row['end_time'];?></td>
                            <td><?php echo $row['status'];?></td>
                          </tr>
						</tbody>
							  </form>
                              <?php
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