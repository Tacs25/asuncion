<?php
include_once 'main/includes/dbh.inc.php'
?>
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
    <link rel="stylesheet" href="bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/style1.css" />

    
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

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
              <a href="ds.php" class="nav-link px-3 active">
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
              <a href="archives.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
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
                  <h3 class="fw-bold text-uppercase p-4">Schedule management</h3>
                </div>
            </div>
            <div class="col-md-12 mb-3 pt-3">
                <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col">
                            <span><i class="bi bi-table me-2"></i></span> SCHEDULE

                          </div>
                        <div class="col" align="right">
                   
                            <button type="button" name="add_exam" class="btn btn-success btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i></button>
                        </div>
                    </div>

                    <!--MODAL FORM-->
                    <form action="main/includes/appointment.inc.php" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Doctor Schedule</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                        <div class="form-group">
                                            <label>Schedule Date</label>
                                               
                                                <div class="input-group date" id="datepicker">
                                                    <input type="text" name="book_date" id="book_date" class="form-control" placeholder="YYYY-MM-DD" required readonly />
                                                    <div class="input-group-addon input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="bi bi-calendar-check-fill"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                        </div>									
                                    
                                        <div class="form-group">
                                            <label> Start Time</label>
                                                <div class="input-group date" id="datepicker1">
                                                    <input type="text" name="book_time" id="book_time" class="form-control" placeholder="Time" required readonly  />
                                                    <div class="input-group-addon input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="bi bi-clock-fill"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label> End Time</label>
                                                <div class="input-group date" id="datepicker2">
                                                    <input type="text" name="book_two" id="book_two" class="form-control"  required readonly  />
                                                    <div class="input-group-addon input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="bi bi-clock-fill"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="status" value="available"/>
                                        </div>
                                        
                                    
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <input type="submit" name ="booking" class="btn btn-primary" value ="Save changes"/>
                            </div>
                          </div>
                        </div>
                      </div>
                  </form>

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
                            <th>Appointment No.</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Action</th>
                            
                            
                          </tr>
                        </thead>
                        <?php
                        date_default_timezone_set('Asia/Manila');
                        $date = date('Y-m-d');
                        $time = date('H:i:s');
                        $result = $conn->query("SELECT * FROM appointment WHERE sched >= '$date'");
                          while ($row = $result->fetch_assoc()){
                        ?>
                        <tbody>
                          <tr>
                            <td><?php echo $row['ID'];?></td>
                            <td><?php echo $row['sched'];?></td>
                            <td><?php echo $row['start_time'];?>-<?php echo $row['end_time'];?></td>
                            <td></td>
                          </tr>
                          
                        </tbody>
                        <?php
                          }
                        ?>
                        <tfoot>
                          <tr>
                            <th>Appointment No.</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
                <div>

    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script> 
    <script src="./js/script.js"></script>

    
    
        
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    
    <script>
        $(function () {
            $.extend(true, $.fn.datetimepicker.defaults, {
                icons: {
                    time: 'far fa-clock',
                    date: 'far fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'far fa-calendar-check-o',
                    clear: 'far fa-trash',
                    close: 'far fa-times'
                }
            });
        });
        </script>
	<script type="text/javascript">

    var dateToday = new Date(); 
    $(function(){
        
        $('#datepicker').datetimepicker({
        	format: 'YYYY-MM-DD',
          minDate: dateToday,
        	ignoreReadonly: true,
          minDate: dateToday
        });

        $(function () {
        $('#datepicker1, #datepicker2').datetimepicker({
            stepping: 5, 
            enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
            format: 'HH:mm ',
            ignoreReadonly: true
        });

    
});
}
);
</script>
  </body>
</html>
