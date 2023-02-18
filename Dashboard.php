<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Dashborad"/>
        <meta name="author" content="Dashborad"/>
        <title>Dashboard - Admin</title>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/be19cf8b62.js" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <style type="text/css">
            body{
                margin-top:20px;
                background:#FAFAFA;
            }
            .order-card {
                color: #fff;
            }

            .bg-c-blue {
                background: linear-gradient(45deg,#4099ff,#73b4ff);
            }

            .bg-c-green {
                background: linear-gradient(45deg,#2ed8b6,#59e0c5);
            }

            .bg-c-yellow {
                background: linear-gradient(45deg,#FFB64D,#ffcb80);
            }

            .bg-c-pink {
                background: linear-gradient(45deg,#FF5370,#ff869a);
            }


            .card {
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
                box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
                border: none;
                margin-bottom: 30px;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            .card .card-block {
                padding: 25px;
            }

            .order-card i {
                font-size: 26px;
            }

            .f-left {
                float: left;
            }

            .f-right {
                float: right;
            }
        </style>
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
                     <div class="row">
                         <?php
                         $sql = "SELECT * FROM customer";
                         $customer_result = mysqli_query($conn, $sql);
                         $customer = mysqli_num_rows($customer_result);
                         ?>
                            <div class="col-6 col-xl-3">
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Customer</h6>
                                        <h2 class="text-right"><i style="margin-right: 14rem" class="fa-regular fa-user"></i><span><?php echo $customer; ?></span></h2>
                                        <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                                    </div>
                                </div>
                            </div>
                         <?php
                         $sql = "SELECT * FROM car";
                         $car_result = mysqli_query($conn, $sql);
                         $car = mysqli_num_rows($car_result);
                         ?>
                            <div class="col-6 col-xl-3">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Orders Received</h6>
                                        <h2 class="text-right"><i style="margin-right: 200px" class="fa-solid fa-car"></i><span><?php echo $car; ?></span></h2>
                                        <p class="m-b-0">Completed Orders<span
                                                    class="f-right">351</span></p>
                                    </div>
                                </div>
                            </div>
                         <?php
                         $sql = "SELECT * FROM Offer";
                         $offerresult = mysqli_query($conn, $sql);
                         $offer = mysqli_num_rows($offerresult);
                         ?>
                            <div class="col-md-2 col-xl-3">
                                <div class="card bg-c-yellow order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Orders Received</h6>
                                        <h2 class="text-right"><i class="fa fa-refresh
                                    f-left"></i><span>486</span></h2>
                                        <p class="m-b-0">Completed Orders<span
                                                    class="f-right">351</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-xl-3">
                                <div class="card bg-c-pink order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Orders Received</h6>
                                        <h2 class="text-right"><i class="fa fa-credit-card
                                    f-left"></i><span>486</span></h2>
                                        <p class="m-b-0">Completed Orders<span
                                                    class="f-right">351</span></p>
                                    </div>
                                </div>
                            </div>
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
                        <div class="text-muted">Copyright &copy; Quick Car Hire 2023</div>
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
