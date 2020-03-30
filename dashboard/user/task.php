<?php
require('../../config/connect.php');
// require('../../config/session.php');
    if(isset($_POST['submit'])){
        $error = '';
        $task_day = mysqli_real_escape_string($conn, $_POST['task_day']);
        $track = mysqli_real_escape_string($conn, $_POST['track']);
       
        $sql = "SELECT url FROM task WHERE task_day = '$task_day' AND track = '$track'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count > 0){
            while($row = mysqli_fetch_assoc($result)) {
                header("location: {$row['url']}");
            }
        }else{
            $error =  "No task for the selected options";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, inistial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - 30 Days Of Code</title>
    <link rel="shortcut icon" type="image/jpg" href="https://30daysofcode.xyz/favicon.png"/>
    <link href="../../dist/css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">30DaysOfCode.xyz</a><button
            class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>-->
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
</ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">User</div>
                        <a class="nav-link" href="https://30daysofcode.xyz/dashboard/user/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading"></div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Download Tasks
                        </a>
                        <a class="nav-link collapsed" href="https://30daysofcode.xyz/dashboard/user/submit.php" >
                            <div class="sb-nav-link-icon"><i class="fas fa-book-close"></i></div>
                            Submit Tasks
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                    </div>
                </div>
               <!-- <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Geektutor
                </div>-->
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>View Task</div>
                    <div class="card-body">
                    
                     <?php if($error !== ''){ ?>
                        <div class="alert alert-primary alert-dismissable">
                            <?php echo $error?>
                        </div>
                    <?php }?>
                    <form method="POST">
                        <div class="form-group">
                          <label for="day">Day?</label>
                          <select name="task_day" class="form-control" value="">
                          <option value="Day 0">Day 0</option>
                          <option value="Day 1">Day 1</option>
                          <option value="Day 2">Day 2</option>
                          <option value="Day 3">Day 3</option>
                          <option value="Day 4">Day 4</option>
                          <option value="Day 5">Day 5</option>
                          <option value="Day 6">Day 6</option>
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="track">Track</label>
                          <select name="track" class="form-control" value="">
                            <option value="FrontEnd">Front End</option>
                            <option value="Backend">Back End</option>
                            <option value="Mobile">Mobile</option>
                            <option value="UIUX">UI/UX</option>
                            <option value="Python">Python</option>
                            <option value="Design">Engineering Design</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">View Task</button>
                      </form>
                    </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; 30DayOfCode 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../../dist/js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
</body>

</html>