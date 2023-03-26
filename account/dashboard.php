<?php
session_start();
if (!isset($_SESSION['email'])) {
    $msg = "Please Sign In Correctly or your Account will be De-activated Completely!";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    header("refresh: 0, ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Dashboard</title>
</head>

<body>
    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                    <img src="../forms/img/logo.jfif" alt="...">
                </a>
                <!-- User menu (mobile) -->
                <div class="navbar-user d-lg-none">
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <!-- Toggle -->
                        <!-- <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-parent-child">
                                <img alt="Image Placeholder" src="../img/avator.jpg" class="avatar avatar- rounded-circle">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            </div>
                        </a> -->
                        <!-- Menu -->
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                            <a href="#" class="dropdown-item">Profile</a>
                            <hr class="dropdown-divider">
                            <a href="../includes/logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=Dashboard">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=withdrawals">
                                <i class="bi bi-minecart-loaded"></i>Withdrawals
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=Deposits">
                                <i class="bi bi-chat"></i> Deposits
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-5 opacity-20">
                    <!-- Navigation -->
                    <div class="mt-auto"></div>
                    <!-- User (md) -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <li class="nav-item">
                            <a class="nav-link" href="#" class="dropdown-item" type="button" data-toggle="modal" data-target="#account">
                                <i class="bi bi-person-square"></i> Account
                            </a>
                            </li>
                            <a class="nav-link" href="../includes/logout.php">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <?php if (isset($_GET['p'])) {
                                    if ($_GET['p'] == 'withdrawals') { ?>
                                        <h1 class="h2 mb-0 ls-tight">withdrawals</h1>
                                    <?php } elseif ($_GET['p'] == 'Deposits') { ?>
                                        <h1 class="h2 mb-0 ls-tight">Deposits</h1>
                                    <?php  } elseif ($_GET['p'] == 'Dashboard') { ?>
                                       <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                               <?php }
                                } else { ?>
                                    <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                                <?php } ?>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">
                                    <a href="#" class="btn-primary d-inline-flex btn-sm mx-1" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Create</span>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#safari">Create new safari</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#itinerary">Add itinerary to safari</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#table">Add itinerary table</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#gateway">Add gateway(Incluives and Excluives)</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#prices">Add Prices</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#photo">Add an image</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#article">Add an article</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <li class="nav-item ">
                                <a href="./?p=safari" class="nav-link active">All</a>
                            </li>
                            <li class="nav-item">
                                <a href="./?p=safari&as=scheduledSafari" class="nav-link font-regular">Scheduled</a>
                            </li>
                            <li class="nav-item">
                                <a href="./?p=safari&as=pendingSafari" class="nav-link font-regular">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a href="./?p=safari&as=cancelledSafari" class="nav-link font-regular">Canceled</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row g-6 mb-6">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Withdrawals</span>
                                            <span class="h3 font-bold mb-0"><?php
                                                                            include '../includes/dbconfiq.php';
                                                                            $bookings = mysqli_query($con, "SELECT count(*) as count FROM tbl_bookings");
                                                                            while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                                                                echo $bookingsrows['count'];
                                                                            }
                                                                            ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                <i class="bi bi-minecart-loaded"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="text-nowrap text-xs text-muted">Withdrawal transactions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Deposits</span>
                                            <span class="h3 font-bold mb-0"><?php
                                                                            include '../includes/dbconfiq.php';
                                                                            $users = mysqli_query($con, "SELECT count(*) as count FROM tbl_bookings group by email");
                                                                            $num = mysqli_num_rows($users);
                                                                            echo $num;
                                                                            ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                <i class="bi bi-people"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="text-nowrap text-xs text-muted">Deposits transactions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>




                    <?php 
                    // include '../includes/create.php'; 
                    ?>




                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <?php if (isset($_GET['p']) and $_GET['p'] == 'Dashboard') { ?>
                                <h5 class="mb-0">Dashboard</h5>
                            <?php } elseif (isset($_GET['p']) and $_GET['p'] == 'withdrawals') { ?>
                                <h5 class="mb-0">Withdrawals</h5>
                            <?php } elseif (isset($_GET['p']) and $_GET['p'] == 'Deposits') { ?>
                                <h5 class="mb-0">Deposits</h5>
                            <?php } else { ?>
                                <h5 class="mb-0">Dashboard</h5>
                            <?php } ?>
                        </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Email</th>
                                            <th scope="col">Account No,</th>
                                            <th scope="col">Date of transaction</th>
                                            <th scope="col">Type of transaction</th>
                                            <th scope="col">Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>





                                        <?php if (isset($_GET['p']) and $_GET['p'] == 'Dashboard') { 



                                            include '../includes/dbconfiq.php';
                                            $bookings = mysqli_query($con, "SELECT * 
                                            FROM tbl_bookings 
                                            Where tbl_bookings.package = '" . $_GET['pid'] . "' AND '" . $_GET['p'] . "'  = 'safari' ORDER BY tbl_bookings.id DESC");
                                            while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <i class="bi bi-envelope"></i>
                                                        <a class="text-heading font-semibold" href="#">
                                                            <?php echo $bookingsrows['email']; ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <i class="bi bi-calendar"></i>
                                                        <?php echo $bookingsrows['dob']; ?>
                                                    </td>
                                                    <td>
                                                        <i class="bi bi-briefcase"></i>
                                                        <a class="text-heading font-semibold" href="#">
                                                            <?php echo $bookingsrows['package']; ?>(<?php echo $bookingsrows['safari']; ?>).
                                                        </a>
                                                    </td>
                                                    
                                                    <td>
                                                        <span class="badge badge-lg badge-dot">
                                                            <?php
                                                            if ($bookingsrows['status'] == 'scheduled') {
                                                                $color = 'success';
                                                            } elseif ($bookingsrows['status'] == 'Canceled') {
                                                                $color = 'danger';
                                                            } elseif ($bookingsrows['status'] == 'Not discussed') {
                                                                $color = 'dark';
                                                            } elseif ($bookingsrows['status'] == 'Payment approved') {
                                                                $color = 'primary';
                                                            } else {
                                                                $color = 'warning';
                                                            } ?>
                                                            <i class="bg-<?php echo $color; ?>"></i><?php echo $bookingsrows['status']; ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-end">
                                                        <?php if ($bookingsrows['status'] == 'Canceled') { ?>
                                                            <a href="#" style="cursor: no-drop;" class="btn btn-sm btn-neutral text-danger">Cancelled!</a>
                                                        <?php } else if ($bookingsrows['status'] == 'Payment approved') { ?>
                                                            <a href="#" style="cursor: no-drop;" class="btn btn-sm btn-neutral text-primary">Payment approved</a>
                                                        <?php } else if ($bookingsrows['status'] == 'scheduled') { ?>
                                                            <a href="../forms/update.php?paymentid=<?php echo $bookingsrows['id']; ?>" class="btn btn-sm btn-neutral text-warning">Approve Payment</a>
                                                        <?php } else { ?>
                                                            <a href="item.php?p=safari&bid=<?php echo $bookingsrows['id']; ?>" class="btn btn-sm btn-neutral">View</a>
                                                        <?php } ?>
                                                        <button type="button" onclick="delete<?php echo $bookingsrows['id']; ?>();" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                        <script>
                                                            function delete<?php echo $bookingsrows['id']; ?>() {
                                                                var action = window.confirm("Are you sure you want to delete <?php echo $bookingsrows['email']; ?> safari booking?");
                                                                if (action) {
                                                                    document.location.href = '../forms/delete.php?id=safari&bid=<?php echo $bookingsrows['id']; ?>';
                                                                } else {
                                                                    document.location.href = './?p=safari';
                                                                }
                                                            }
                                                        </script>
                                                    </td>
                                                </tr>


                                  









                        <?php  } }elseif (isset($_GET['p']) and $_GET['p'] == 'withdrawals') {








                                        include '../includes/dbconfiq.php';
                                        $bookings = mysqli_query($con, "SELECT * FROM tbl_bookings GROUP BY email ORDER BY id DESC");
                                        while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['firstname']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['lastname']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-envelope"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['email']; ?>.
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-phone"></i>
                                                    <?php echo $bookingsrows['phone']; ?>
                                                </td>
                                                <td class="text-end">
                                                    <a href="item.php?p=users&bid=<?php echo $bookingsrows['id']; ?>&userid=<?php echo $bookingsrows['email']; ?>" class="btn btn-sm btn-neutral">View</a>
                                                    <button type="button" onclick="delete<?php echo $bookingsrows['id']; ?>();" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                    <script>
                                                        function delete<?php echo $bookingsrows['id']; ?>() {
                                                            var action = window.confirm("Do not delete a user if its not necessary! Are you sure you want to delete <?php echo $bookingsrows['email']; ?>?");
                                                            if (action) {
                                                                document.location.href = '../forms/delete.php?id=user&uid=<?php echo $bookingsrows['id']; ?>';
                                                            } else {
                                                                document.location.href = './?p=users';
                                                            }
                                                        }
                                                    </script>
                                                </td>
                                            </tr>

















                                            <?php  } }elseif (isset($_GET['p']) and $_GET['p'] == 'Deposits') {








                                include '../includes/dbconfiq.php';
                                $bookings = mysqli_query($con, "SELECT * FROM tbl_bookings GROUP BY email ORDER BY id DESC");
                                while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                ?>
                                    <tr>
                                        <td>
                                            <i class="bi bi-person"></i>
                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo $bookingsrows['firstname']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <i class="bi bi-person"></i>
                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo $bookingsrows['lastname']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <i class="bi bi-envelope"></i>
                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo $bookingsrows['email']; ?>.
                                            </a>
                                        </td>
                                        <td>
                                            <i class="bi bi-phone"></i>
                                            <?php echo $bookingsrows['phone']; ?>
                                        </td>
                                        <td class="text-end">
                                            <a href="item.php?p=users&bid=<?php echo $bookingsrows['id']; ?>&userid=<?php echo $bookingsrows['email']; ?>" class="btn btn-sm btn-neutral">View</a>
                                            <button type="button" onclick="delete<?php echo $bookingsrows['id']; ?>();" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <script>
                                                function delete<?php echo $bookingsrows['id']; ?>() {
                                                    var action = window.confirm("Do not delete a user if its not necessary! Are you sure you want to delete <?php echo $bookingsrows['email']; ?>?");
                                                    if (action) {
                                                        document.location.href = '../forms/delete.php?id=user&uid=<?php echo $bookingsrows['id']; ?>';
                                                    } else {
                                                        document.location.href = './?p=users';
                                                    }
                                                }
                                            </script>
                                        </td>
                                    </tr>

















                                            <?php }} else { ?>
                            <h1 class="h2 mb-0 ls-tight p-4">Welcome Admin</h1>
                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>



                       


                        <div class="card-footer border-0 py-5">
                            <span class="text-muted text-sm">Showing all items out of results found</span>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>