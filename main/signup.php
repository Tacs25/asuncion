<?php
    include_once 'header.php';
	include_once 'includes/functions.inc.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</div>  
<div id="signup">
<div id ="main" >
<div class="container mt-4 " id="content">
	<div class="row content d-flex justify-content-center">
		<div class="col col-md-6">
			<span id="message"></span>
			<div class="card">
				<div class="card-header"><strong>Register</strong></div>
				<div class="card-body">
					<form method="post" id="patient_register_form" action="../signup.inc.php">
						<div class="form-group">
							<label>Patient Email Address<span class="text-danger"></label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Patient Password<span class="text-danger"></label>
							<input type="password" name="patient_password" id="patient_password" class="form-control" required  />
						</div>
						<div class="form-group">
							<label>Confirm Password<span class="text-danger"></label>
							<input type="password" name="patient_passwordrp" id="patient_passwordrp" class="form-control" required  />
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Patient First Name<span class="text-danger"></label>
									<input type="text" name="patient_first_name" id="patient_first_name" class="form-control" required   />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Patient Last Name<span class="text-danger"></label>
									<input type="text" name="patient_last_name" id="patient_last_name" class="form-control" required   />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Patient Gender<span class="text-danger"></label>
								<select name="patient_gender" id="patient_gender" class="form-control">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
						</div>
						<div class="form-group">
							<label>Patient Contact No.<span class="text-danger"></label>
							<input type="tel"  name="patient_phone_no" id="patient_phone_no" class="form-control" placeholder="0912-3456-321" pattern="[0-9]{4}-[0-9]{4}-[0-9]{3}"required   />
						</div>
						<div class="form-group">
							<label>Patient Complete Address<span class="text-danger"></label>
							<textarea name="patient_address" id="patient_address" class="form-control" required ></textarea>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_register" />
							<input type="submit" name="patient_register_button" id="patient_register_button" class="btn btn-block btn-primary" value="Register" />
						</div>

						<div class="form-group text-center">
							<p><a href="login.php">Login</a></p>
						</div>
						<?php 
							if (isset($_GET["error"])){
								if ($_GET["error"] === "emptyinput"){
									?>
									<script>
									swal("Something went wrong", "Fill Empty Field", "error");
									</script>
								<?php
								}
								
								else if ($_GET["error"] === "invalidemail"){
									?>
									<script>
									swal("Something went wrong", "Invalid Email", "error");
									</script>
								<?php
								}
								
								else if($_GET["error"] === "passworddontmatch"){
									?>
									<script>
									swal("Something went wrong", "Password don't match", "error");
									</script>
								<?php
								}
								
								else if ($_GET["error"] === "somethingwentwrong"){
									?>
									<script>
									swal("Something went wrong", "Error", "error");
									</script>
								<?php
								}
								
								else if ($_GET["error"] === "emailtaken"){
									?>
									<script>
									swal("Something went wrong", "Email Already Exist", "error");
									</script>
								<?php
								}
								
								
							}
							?>
							
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
    include_once 'footer.php';    
?>