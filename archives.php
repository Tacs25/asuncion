<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style1.css" />
    <title> ADMIN </title>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"> <img src="img/eyel.png" height="35" width="35">Asuncion Optical</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="main/patient/logout.php">Log out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1"  id="sidebar">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <a href="dashboard.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-1"><hr class="dropdown-divider bg-light" /></li>
            
            <li>
              <a href="loa.php" class="nav-link px-3 ">
                <span class="me-2"><i class="bi bi-person-lines-fill"></i></span>
                <span>List of accounts</span>
              </a>
            </li>
           
            <li>
              <a href="ds.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-calendar-fill"></i></i></span>
                <span>Schedule Management</span>
              </a>
            </li>
            <li class="my-1"><hr class="dropdown-divider bg-light" /></li>
            
            <li>
              <a href="app.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Appointment</span>
              </a>
            </li>
            <li>
              <a href="archives.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-archive-fill"></i></span>
                <span>Archives</span>
              </a>
            </li>
            
          </ul>
        </nav>
      </div>
    </div>
     <!-- offcanvas -->

     <main class="mt-5 pt-4">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12">
                  <h3 class="fw-bold text-uppercase p-4">APPOINTMENT MANAGEMENT</h3>
                </div>
            </div>
            <div class="col-md-12 mb-3 pt-3">
                <div class="card">
                  <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Archives
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="example"
                        class="table table-striped data-table"
                        style="width: 100%"
                      >
                        <thead>
                          <tr>
                            <th>Archive No.</th>
                            <th>Appointment ID</th>
                            <th>Booking ID</th>
                            <th>User ID</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <?php
                        include_once 'main/includes/dbh.inc.php';
                        $result = $conn->query("SELECT * FROM archive order by id desc");
                        while ($row = $result->fetch_assoc()){
                        ?>
                        <tbody>
                        <tr>
						                <td><input type="hidden" name="id" value="<?php echo $row['ID'];?>"><?php echo $row['ID'];?></td>
                            <td><input type="hidden" name="appid" value="<?php echo $row['Appointment_ID'];?>"><?php echo $row['Appointment_ID'];?></td>
                            <td><input type="hidden" name="bookid" value="<?php echo $row['Booking_ID'];?>"><?php echo $row['Booking_ID'];?></td>
                            <td><input type="hidden" name="User_ID" value="<?php echo $row['User_ID'];?>"><?php echo $row['User_ID'];?></td>
                            <td><input type="hidden" name="sched" value="<?php echo $row['sched'];?>"><?php echo $row['sched'];?></td>
                            <td><input type="hidden" name="startt" value="<?php echo $row['start_time'];?>">
                            <?php $timee = date_create($row ['start_time']);
                                  echo date_format($timee, 'h:i:A');?></td>
                            <td><input type="hidden" name="endd" value="<?php echo $row['end_time'];?>">
                            <?php $timeee = date_create($row ['end_time']);
                                  echo date_format($timeee, 'h:i:A');?></td>
							              <td><input type="hidden" name="stats" value="<?php echo $row['status'];?>"><?php echo $row['status'];?></td>
                            <td></td>
                          </tr>
                        </tbody>
                        <?php
							            }
					  	          ?>
                        </form>
                      </table>
                    </div>
                  </div>
                </div>
     
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
</script>
  </body>
</html>

