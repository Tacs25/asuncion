<?php
    include_once 'header.php';
	include_once 'includes/functions.inc.php';
    include_once 'includes/dbh.inc.php';
?>
<?php
session_start();
if(isset($_SESSION['id']))
{
	$id = $_SESSION['id']; 
	$result = $conn->query("SELECT * FROM data WHERE ID = $id");
	$row = $result->fetch_assoc();
?>

<div id="edit">
<div id ="main" >
<div class="container mt-4 " id="content">
	<div class="row content d-flex justify-content-center">
		<div class="col col-md-6">
			<span id="message"></span>
			<div class="card">
				<div class="card-header">Register</div>
				<div class="card-body">
					<form method="post" id="patient_register_form" action="includes/edit.inc.php">
						<div class="form-group">
							<label>Patient Email Address<span class="text-danger">*</span></label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required value="<?php echo $row['Email']; ?>" readonly/>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Patient First Name<span class="text-danger">*</span></label>
									<input type="text" name="patient_first_name" id="patient_first_name" class="form-control" required   value="<?php echo $row['First_Name']; ?>"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Patient Last Name<span class="text-danger">*</span></label>
									<input type="text" name="patient_last_name" id="patient_last_name" class="form-control" required   value="<?php echo $row['Last_Name']; ?>"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Patient Contact No.<span class="text-danger">*</span></label>
							<input type="tel"  name="patient_phone_no" id="patient_phone_no" class="form-control" placeholder="0912-3456-321" pattern="[0-9]{4}-[0-9]{4}-[0-9]{3}" required	 value="<?php echo $row['Contact']; ?>"/>
						</div>
						<div class="form-group">
							<label>Patient Complete Address<span class="text-danger">*</span></label>
							<textarea name="patient_address" id="patient_address" class="form-control" required ><?php echo $row['Home']; ?></textarea>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_register" />
							<input type="submit" name="edit_button" id="edit_button" class="btn btn-block btn-primary" value="Confirm" />
						</div>

						<div class="form-group text-center">
							<p><a href="patient/profile.php">Cancel</a></p>
						</div>
					</form>
				</div>
			</div>
			<br />
			<br />
		</div>
	</div>
</div> 
</div>
</div>  
<?php
}
?>

<?php
    include_once 'footer.php';    
?>