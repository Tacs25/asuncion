<?php
    include_once 'header.php';
	include_once '../includes/functions.inc.php';
	include_once '../includes/dbh.inc.php';

session_start();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">
	<?php $page = 'profile'; include('navbar.php'); ?>
    
    <!-- edit 
    <div class="row justify-content-md-center">
        <div class="col col-md-6">
			<br />
            <div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							Edit Profile Details
						</div>
						<div class="col-md-6 text-right">
							<a href="profile.php" class="btn btn-secondary btn-sm">View</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="edit_profile_form">
						<div class="form-group">
							<label>Patient Email Address<span class="text-danger">*</span></label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" readonly />
						</div>
						<div class="form-group">
							<label>Patient Password<span class="text-danger">*</span></label>
							<input type="password" name="patient_password" id="patient_password" class="form-control" required  data-parsley-trigger="keyup" />
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Patient First Name<span class="text-danger">*</span></label>
									<input type="text" name="patient_first_name" id="patient_first_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Patient Last Name<span class="text-danger">*</span></label>
									<input type="text" name="patient_last_name" id="patient_last_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
						</div>
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label>Patient Gender<span class="text-danger">*</span></label>
									<select name="patient_gender" id="patient_gender" class="form-control">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Patient Contact No.<span class="text-danger">*</span></label>
									<input type="text" name="patient_phone_no" id="patient_phone_no" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label>Patient Complete Address<span class="text-danger">*</span></label>
							<textarea name="patient_address" id="patient_address" class="form-control" required data-parsley-trigger="keyup"></textarea>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="edit_profile" />
							<input type="submit" name="edit_profile_button" id="edit_profile_button" class="btn btn-primary" value="Edit" />
						</div>
					</form>
				</div>
			</div>

			<br />
			<br />
             
-->
        <div class="row justify-content-md-center mt-4">
        <div class="col col-md-6">
            <div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
                            <h5 class="card-title "> User Information </h5>
						</div>
						
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped">
					<?php
    					if(isset($_SESSION['id']))
						{
							$id = $_SESSION['id']; 
							$result = $conn->query("SELECT * FROM data WHERE ID = $id");
							$row = $result->fetch_assoc();
							
					?>
						<tr >
							<th class="text-right" width="40%">Patient First Name :</th>
							<td><?php echo $row['First_Name']; ?></td>
						</tr>
						<tr >
							<th class="text-right" width="40%">Patient Last Name :</th>
							<td><?php echo $row['Last_Name']; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Email Address : </th>
							<td><?php echo $row['Email']; ?></td>
						</tr>
						
						<tr>
							<th class="text-right" width="40%">Address : </th>
							<td><?php echo $row['Home']; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Contact No. :</th>
							<td><?php echo $row['Contact']; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Gender :</th>
							<td><?php echo $row['Gender']; ?></td>
						</tr>
						<?php
						}
						?>
						
					</table>
					<div class="col-12 text-right">
							<a href="../edit.php" class="btn btn-secondary btn-sm ">Edit Details</a>
							<a href="update.php" class="btn btn-secondary btn-sm ">Change Password</a>
						</div>					
				</div>
			</div>
        </div>
        </div>
			<br />
			<br />
		
			<?php 
				if (isset($_GET["error"])){
					if ($_GET["error"] === "none"){
            ?>

            <script>
            swal("Password", "Successfully Changed", "success");
            </script>
          <?php
          }
		  if (isset($_GET["error"])){
			if ($_GET["error"] === "success"){
			?>
			<script>
			swal("Edit", "Successfully Changed", "success");
			</script>
  			<?php
  			}
		}		
      }

      ?>


