<?php
    include_once 'header.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div id="signup">
<div id ="main" >
<div class="container mt-5 ">
	<div class="row justify-content-md-center">
		<div class="col col-md-4">
			
			<span id="message"></span>
			<div class="card">
				<div class="card-header"><strong>Login</strong></div>
				<div class="card-body">
					<form method="post" id="patient_login_form" action="includes/login.inc.php">
						<div class="form-group">
							<label>Email Address</label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" />
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="patient_password" id="patient_password" class="form-control" required  data-parsley-trigger="keyup" />
						</div>

						<div class = "row">
							<div class="col-md-6">
								<div class="form-group text-center">
									<input type="hidden" name="action" value="patient_login" />
									<input type="submit" name="patient_login_button" id="patients_login_button" class="btn btn-block btn-primary" value="Login" />
								</div>
							</div>
				
							<div class="col-md-6">
								<div class="form-group text-center">
									
									<a href="signup.php" class="btn btn-block btn-outline-dark"> Sign up </a>
								</div>
							</div>
							</div>

							
						</div>

						<div class="form-group text-center">
							<p><a href="../forgotpass.php">Forgot Password?</a></p>
						</div>
						<?php
						if (isset($_GET["error"])){
							
								if ($_GET["error"] === "wronglogin"){
									?>
									<script>
									swal("Something went wrong", "Incorrect Login Info", "error");
									</script>
								<?php
								}
								else if ($_GET["error"] === "wrongpassword"){
									?>
									<script>
									swal("Something went wrong", "Wrong Password", "error");
									</script>
								<?php
								}
							}
							?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<?php
    include_once 'footer.php';    
?>