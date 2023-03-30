
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../account/index.css">
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
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0 text-underline" href="#">
                    <!-- <img src="#" alt="..."> --> <b><i>SMART ATM</i></b> 
                </a>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=Dashboard">
                                <i class="bi bi-house"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=withdrawals">
                            <i class="bi bi-cash"></i>Withdrawals
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=Deposits">
                            <i class="bi bi-cash"></i>Deposits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=Users">
                            <i class="bi bi-person-square""></i>Users
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
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0 d-flex">
                                <!-- Title -->
                                <?php if (isset($_GET['p'])) {
                                    if ($_GET['p'] == 'withdrawals') { ?>
                                        <h1 class="h2 mb-0 ls-tight m-2">withdrawals</h1>
                                    <?php } elseif ($_GET['p'] == 'Deposits') { ?>
                                        <h1 class="h2 mb-0 ls-tight m-2">Deposits</h1>
                                    <?php  } elseif ($_GET['p'] == 'Dashboard') { ?>
                                        <h1 class="h2 mb-0 ls-tight m-2">Dashboard</h1>
                                    <?php }
                                } else { ?>
                                    <h1 class="h2 mb-0 ls-tigh m-2t">Dashboard</h1>
                                <?php } ?>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">
                                    <a href="#" class="btn-primary d-inline-flex btn-sm mx-1" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>Transact</span>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#deposit">Deposit</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#withdraw">Withdraw</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0 d-flex justify-content-between">
                            <li class="nav-item ">
                                <a href="./?all=<?php echo $_GET['p']; ?>" class="nav-link active">All</a>
                            </li>
                            <li class="nav-item ">
                                <h4>Balance: <span style="background-color:grey;color:white;border-radius:5px;padding:5px;"> KES <?php
                                                                                                                                    include '../config.php';
                                                                                                                                    $query = mysqli_query($con, "SELECT * FROM bal");
                                                                                                                                    $row = mysqli_fetch_assoc($query);
                                                                                                                                    $balance = $row['amount'];
                                                                                                                                    echo $balance;
                                                                                                                                    ?></span></h4>
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
                                                                            $bookings = mysqli_query($con, "SELECT count(*) as count FROM withdrawals ORDER BY id DESC");
                                                                            while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                                                                echo $bookingsrows['count'];
                                                                            }
                                                                            ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <span class="mb-1">&larr;</span><i class="bi bi-cash"></i>
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
                                                                            $bookings = mysqli_query($con, "SELECT count(*) as count FROM deposits ORDER BY id DESC");
                                                                            while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                                                                echo $bookingsrows['count'];
                                                                            }
                                                                            ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <span class="mb-1">&rarr;</span><i class="bi bi-cash"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="text-nowrap text-xs text-muted">Deposit transactions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Users</span>
                                            <span class="h3 font-bold mb-0"><?php
                                                                            include '../config.php';
                                                                            $bookings = mysqli_query($con, "SELECT count(*) as count FROM users ORDER BY id DESC");
                                                                            while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                                                                echo $bookingsrows['count'];
                                                                            }
                                                                            ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-success text-white text-lg rounded-circle">
                                            <i class="bi bi-people"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="text-nowrap text-xs text-muted">Registered Users</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>




                    




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
                                        <th scope="col">phone</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date of transaction</th>
                                        <th scope="col">Type of transaction</th>
                                    </tr>
                                </thead>
                                <tbody>





                                    <?php if (isset($_GET['p']) and $_GET['p'] == 'Dashboard') {

                                        include '../config.php';
                                        $bookings = mysqli_query($con, "SELECT users.id, users.phone, withdrawals.user_id, withdrawals.amount, withdrawals.withdrawal_time as time, withdrawals.transaction
                                            FROM users
                                            INNER JOIN withdrawals ON withdrawals.user_id = users.id 
                                            
                                            UNION ALL
                                            
                                            SELECT users.id, users.phone, deposits.user_id, deposits.amount, deposits.deposit_time as time, deposits.transaction 
                                            FROM deposits 
                                            INNER JOIN users ON deposits.user_id = users.id 
                                            ");
                                        while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                    ?>








                                            <tr>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['phone']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    KES
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['amount']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-calendar"></i>
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
                                            </tr>








                                        <?php }
                                    } elseif (isset($_GET['p']) and $_GET['p'] == 'withdrawals') {








                                        include '../config.php';
                                        $bookings = mysqli_query($con, "SELECT users.id, users.phone, withdrawals.user_id, withdrawals.amount, withdrawals.withdrawal_time as time, withdrawals.transaction
                                        FROM users
                                        INNER JOIN withdrawals ON withdrawals.user_id = users.id 
                                        ORDER BY id DESC");
                                        while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                        ?>






                                            <tr>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['phone']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    KES
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['amount']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-calendar"></i>
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
                                            </tr>


















                                        <?php  }
                                    } elseif (isset($_GET['p']) and $_GET['p'] == 'Deposits') {








                                        include '../config.php';
                                        $bookings = mysqli_query($con, "SELECT users.id, users.fullname, users.phone, deposits.id AS did, deposits.user_id, deposits.deposit_time as time, deposits.transaction, deposits.amount 
                                            FROM deposits 
                                            INNER JOIN users ON deposits.user_id = users.id
                                            ORDER BY did DESC");
                                        while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                        ?>




                                            <tr>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['phone']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    KES
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['amount']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-calendar"></i>
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
                                            </tr>





                                            <?php  }
                                    } elseif (isset($_GET['p']) and $_GET['p'] == 'Users') {

                                        include '../config.php';
                                        $bookings = mysqli_query($con, "SELECT * FROM  users ORDER BY id DESC");
                                        while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                        ?>










                                        <tr>
                                        <td>
                                            <i class="bi bi-user-square"></i>
                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo $bookingsrows['fullname']; ?>.
                                            </a>
                                        </td>
                                        <td>
                                            <i class="bi bi-envelope"></i>
                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo $bookingsrows['email']; ?>.
                                            </a>
                                        </td>
                                        <td>
                                            <i class="bi bi-person"></i>
                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo $bookingsrows['phone']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <i class="bi bi-card-checklist"></i>
                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo $bookingsrows['accountno']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <i class="bi bi-card-checklist"></i>
                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo $bookingsrows['cardno']; ?>.
                                            </a>
                                        </td>
                                    </tr>







                                        











                                        <?php }
                                    } else {


                                        include '../config.php';
                                        $bookings = mysqli_query($con, "SELECT users.id, users.phone, withdrawals.user_id, withdrawals.amount, withdrawals.withdrawal_time as time, withdrawals.transaction
                                            FROM users
                                            INNER JOIN withdrawals ON withdrawals.user_id = users.id
                                            
                                            UNION ALL
                                            
                                            SELECT users.id, users.phone, deposits.user_id, deposits.amount, deposits.deposit_time as time, deposits.transaction 
                                            FROM deposits 
                                            INNER JOIN users ON deposits.user_id = users.id");
                                        while ($bookingsrows = mysqli_fetch_array($bookings)) {
                                        ?>








                                            <tr>
                                                <td>
                                                    <i class="bi bi-person"></i>
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['phone']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    KES
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo $bookingsrows['amount']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-calendar"></i>
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
                                            </tr>

                                    <?php }
                                    } ?>

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