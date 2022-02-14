<?php
include_once 'header1.php';
require_once 'main/includes/functions.inc.php';
require_once 'main/includes/dbh.inc.php';
session_start();
if(isset($_GET['error'])){
    $email = $_GET['error'];
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div id="edit">
<div id ="main" >
<div class="container mt-4 " id="content">
	<div class="row content d-flex justify-content-center">
		<div class="col col-md-6">
			<span id="message"></span>
			<div class="card">
				<div class="card-header">Register</div>
				<div class="card-body">
					<form method="post" id="patient_register_form" action="change.process.php">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>New Password<span class="text-danger"></label>
									<input type="password" name="new_password" id="new_password" class="form-control" required   />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Confirm Password<span class="text-danger"></label>
									<input type="password" name="repeat_password" id="repeat_password" class="form-control" required   />
								</div>
							</div>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="email" value="<?php echo $email ?>" />
							<input type="submit" name="change" id="change" class="btn btn-primary btn-block" value="Confirm" />
						</div>

						<div class="form-group text-center">
							<p><a href="main/login.php">Cancel</a></p>
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
else{
    echo "Something Went Wrong";
}
?>