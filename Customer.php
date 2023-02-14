<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer</title>
    <meta name="description" content="Customer"/>
    <meta name="author" content="Customer"/>
</head>
<body>
<?php
// put your code here
include './DatabaseConnection.php';
include './Sessionwithoutlogin.php';
include './header.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Customer
            </div>
            <form method="post">
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Driving Licence</th>
                            <th scope="col">AadharCard Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM customer";
                        $result = $conn->query($query);
                        $id = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            $Name = $row['Name'];
                            $Email = $row['Email'];
                            $mobile = $row['MobileNo'];
                            $DOB = $row['Date_of_birth'];
                            $DL = $row['Driving_licence'];
                            $AN = $row['AadharCard_no'];
                            ?>
                            <tr id='tr_<?= $id ?>'>
                                <td><input type='checkbox' name='delete[]' value='<?= $Email ?>'></td>
                                <td><?= $Name ?></td>
                                <td><?= $Email ?></td>
                                <td><?= $mobile ?></td>
                                <td><?= $DOB ?></td>
                                <td><?= $DL ?></td>
                                <td><?= $AN ?></td>
                            </tr>
                            <?php
                            $id++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <input type="submit" class="btn btn-primary" name="customer_delete" id="but_delete"
                           value="Delete Customer">
                    <?php
                    if (isset($_POST['customer_delete'])) {

                        if (isset($_POST['delete'])) {
                            foreach ($_POST['delete'] as $deleteid) {
                                $deleteCustomer = $conn->prepare("DELETE from customer WHERE Email=?");
                                $deleteCustomer->bind_param("s", $deleteid);
                                $deleteCustomer->execute();
                            }
                            echo "<script>window.location.href='Customer.php'</script>";
                        } else {
                            echo '<script>Checkboxseleted();</script>';
                        }
                    }
                    ?>
                </div>
            </form>
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
