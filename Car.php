<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Car</title>
    </head>
    <body>
    <?php
    include './DatabaseConnection.php';
    include './Sessionwithoutlogin.php';
    include './header.php';
    ?>
    <script>
        function Checkboxseleted() {
            alert('please Select any one check box!');
        }
    </script>
    <div id="layoutSidenav_content">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Admin
            </div>
            <form method="post">
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">R_no</th>
                            <th scope="col">Car_name</th>
                            <th scope="col">Car_brand</th>
                            <th scope="col">Image</th>
                            <th scope="col">City</th>
                            <th scope="col">Category_id</th>
                            <th scope="col">Car_Status</th>
                            <th scope="col">Car_hire_cost</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM car";
                        $result = $conn->query($query);
                        $id = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            $R_no = $row['R_no'];
                            $Car_name = $row['Car_name'];
                            $Car_brand = $row['Car_brand'];
                            $Image = $row['Image'];
                            $City = $row['City'];
                            $Category_id = $row['Category_id'];
                            $Car_Status = $row['Car_Status'];
                            $Car_hire_cost = $row['Car_hire_cost'];

                            ?>
                            <tr id='tr_<?= $id ?>'>
                                <td><input type='checkbox' name='delete[]' value='<?= $R_no ?>' ></td>
                                <td><?= $R_no ?></td>
                                <td><?= $Car_name ?></td>
                                <td><?= $Car_brand ?></td>
                                <td><?= $Image ?></td>
                                <td><?= $City ?></td>
                                <td><?= $Category_id ?></td>
                                <td><?= $Car_Status ?></td>
                                <td><?= $Car_hire_cost ?></td>
                                <td>

                                </td>
                            </tr>
                            <?php
                            $id++;
                        }
                        ?>
                        </tbody>
                    </table>

                    <a href="AddCar.php" class="btn btn-primary">+Add Car</a>
                    <input type="submit" class="btn btn-primary" name="Car_delete" id="but_delete" value="Delete Car">
                    <?php
                    if (isset($_POST['Admin_delete'])) {

                        if (isset($_POST['delete'])) {
                            foreach ($_POST['delete'] as $deleteid) {
//                                    echo $deleteid;
                                $deleteUser = "DELETE from car WHERE R_no='$deleteid'";
                                $conn->query($deleteUser);
                            }
                            echo "<script>window.location.href='car.php'</script>";
                        } else {
                            echo '<script>Checkboxseleted();</script>';
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>
