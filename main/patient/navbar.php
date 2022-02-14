<?php

if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$result = $conn->query("SELECT * FROM data WHERE ID = $id");
	$row = $result->fetch_assoc();
?>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark mt-4">
  		<!-- Brand -->
  		<a class="navbar-brand" href="#"><?php echo $row['First_Name']?> <?php echo $row['Last_Name']?></a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
		  <?php
			}
			else {
		  ?>
		  <a class="navbar-brand" href="#">USERNAME</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
			<?php
			}
			?>	
  		<!-- Links -->
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
			
	  	<ul class="navbar-nav">
	    	<li class="nav-item <?php if($page=='profile'){echo 'active';}?>">
	      		<a class="nav-link" href="profile.php">Profile</a>
	    	</li>
	    	<li class="nav-item nav-item <?php if($page=='book'){echo 'active';}?>">
	      		<a class="nav-link" href="bookappointment.php">Book Appointment</a>
	    	</li>
	    	<li class="nav-item <?php if($page=='appointment'){echo 'active';}?>">
	      		<a class="nav-link" href="myappointment.php">My Appointment</a>
	    	</li>
			<li class="nav-item	<?php if($page=='history'){echo 'active';}?>">
	      		<a class="nav-link" href="history.php">History</a>
	    	</li>
		  
              
	    	<li class="nav-item">
	      		<a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
	    	</li>
			
			<!--logout modal-->
			<div class="modal fade" tabindex="-1" id="logoutModal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Ready to sign out?</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
					<div class="modal-body">
						<p>Just click <strong>'Logout' </strong>below if you are ready to end your current session.</p>
					</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<a href="logout.php" type="button" class="btn btn-primary">Logout</a>
						</div>
						
				</div>
			</div>
	  	</ul>
	</div>

</nav>
    
