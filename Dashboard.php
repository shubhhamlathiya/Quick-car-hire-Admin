<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Dashborad" />
        <meta name="author" content="Dashborad" />
        <title>Dashboard - Admin</title>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';
        ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM Offer";
                        $offerresult = mysqli_query($conn, $sql);
                        $offer = mysqli_num_rows($offerresult);
                        ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Offer Available <div><h2 style="margin-left: 60%"><?php echo $offer; ?></h2></div></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Offers.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM customer";
                        $customer_result = mysqli_query($conn, $sql);
                        $customer = mysqli_num_rows($customer_result);
                        ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Total Customer<div><h2 style="margin-left: 60%"><?php echo $customer; ?></h2></div></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="User.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <!--                        <div class="col-xl-3 col-md-6">
                                                    <div class="card bg-success text-white mb-4">
                                                        <div class="card-body">Success Card</div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card bg-danger text-white mb-4">
                                                        <div class="card-body">Danger Card</div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                    <!--                    <div class="row">
                                            <div class="col-xl-6">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-chart-area me-1"></i>
                                                        Area Chart Example
                                                    </div>
                                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-chart-bar me-1"></i>
                                                        Bar Chart Example
                                                    </div>
                                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                                </div>
                                            </div>
                                        </div>-->
                    <!--                    <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-table me-1"></i>
                                                DataTable Example
                                            </div>
                                            <div class="card-body">
                    
                    
                    
                    
                    
                                            </div>
                                        </div>-->
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
