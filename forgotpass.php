<?php
include_once 'header1.php';
include_once 'main/includes/functions.inc.php';
include_once 'main/includes/dbh.inc.php';
session_start();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div id="edit">
<div id ="main" >
<div class="container mt-4 " id="content">
	<div class="row content d-flex justify-content-center">
		<div class="col col-md-6">
			<span id="message"></span>
			<div class="card">
				<div class="card-header">Input Your Email</div>
				<div class="card-body">
					<form method="post" action="forgot.php">
						<div class="form-group">
							<label>Email<span class="text-danger"></label>
							<input type="Email" name="email" id="email" class="form-control" required  />
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_register" />
							<input type="submit" name="forgot" id="forgot" class="btn btn-primary btn-block" value="Confirm" />
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
				if (isset($_GET["error"])){
					if ($_GET["error"] === "passnotmatch"){
            			?>
            			<script>
            			swal("Something Went Wrong", "Password didn't match", "error");
            			</script>
          				<?php
          			}
					else if ($_GET["error"] === "wrongpassword1"){
            			?>
            			<script>
            			swal("Something Went Wrong", "Wrong Password", "error");
            			</script>
          				<?php
          			}
      			}