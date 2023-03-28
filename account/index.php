<?php
session_start();
if(!isset($_SESSION['email'])) {
$msg = "Please Sign In Correctly or your Account will be De-activated Completely!";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh: 0, ../");
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
                    <!-- <img src="#" alt="..."> -->
                </a>
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
                            <a class="nav-link" href="../logout.php">
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
                                        <span>Transact</span>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#safari">Deposit</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#itinerary">Withdraw</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <li class="nav-item ">
                                <a href="./?all=<?php echo $_GET['p'];?>" class="nav-link active">All</a>
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
                                                                            include '../config.php';
                                                                            $bookings = mysqli_query($con, "SELECT count(*) as count FROM withdrawals");
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
                                                                            include '../config.php';
                                                                            $bookings = mysqli_query($con, "SELECT count(*) as count FROM deposits");
                                                                            while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                                                                echo $bookingsrows['count'];
                                                                            }
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
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date of transaction</th>
                                            <th scope="col">Type of transaction</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>





                                            <?php if (isset($_GET['p']) and $_GET['p'] == 'Dashboard') { 
                                            
                                            include '../config.php';
                                            $bookings = mysqli_query($con, "SELECT users.id, users.email, withdrawals.user_id, withdrawals.amount, withdrawals.withdrawal_time as time, withdrawals.transaction
                                            FROM users
                                            INNER JOIN withdrawals ON withdrawals.user_id = users.id 
                                            WHERE withdrawals.user_id = '".$_SESSION['user_id']."' 
                                            
                                            UNION ALL
                                            
                                            SELECT users.id, users.email, deposits.user_id, deposits.amount, deposits.deposit_time as time, deposits.transaction 
                                            FROM deposits 
                                            INNER JOIN users ON deposits.user_id = users.id 
                                            WHERE deposits.user_id = '".$_SESSION['user_id']."'");
                                            while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                            ?>    
                                            
                                            
                                    


                                                
                                            
                                            
                                            <tr>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['email']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['amount']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-envelope"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['time']; ?>.
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-envelope"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['transaction']; ?>.
                                                    </a>
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








                        <?php } }elseif (isset($_GET['p']) and $_GET['p'] == 'withdrawals') {








                                        include '../config.php';
                                        $bookings = mysqli_query($con, "SELECT users.id, users.email, withdrawals.user_id, withdrawals.amount, withdrawals.withdrawal_time, withdrawals.transaction
                                        FROM users
                                        INNER JOIN withdrawals ON withdrawals.user_id = users.id 
                                        WHERE withdrawals.user_id = '".$_SESSION['user_id']."'
                                        ORDER BY id DESC");
                                        while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                        ?>






                                            <tr>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['email']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['amount']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-envelope"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['withdrawal_time']; ?>.
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-envelope"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['transaction']; ?>.
                                                    </a>
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








                                            include '../config.php';
                                            $bookings = mysqli_query($con, "SELECT users.id, users.fullname, users.email, deposits.id AS did, deposits.user_id, deposits.deposit_time, deposits.transaction, deposits.amount 
                                            FROM deposits 
                                            INNER JOIN users ON deposits.user_id = users.id 
                                            WHERE deposits .user_id = '".$_SESSION['user_id']."'
                                            ORDER BY did DESC");
                                            while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                            ?>
                                            
                                            
                                            
                                            
                                            <tr>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['email']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['amount']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-envelope"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['deposit_time']; ?>.
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-envelope"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['transaction']; ?>.
                                                    </a>
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