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
            $(document).ready(function () {
                $('#Car').DataTable();
            });
        </script>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Car
                </div>
                <form method="post">
                    <div class="card-body">

                        <table  id="Car" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <tr   style=" position: sticky;">
                                    <th scope="col"></th>
                                    <th scope="col">Registration no</th>
                                    <th scope="col">Car name</th>
                                    <th scope="col">Car brand</th>
                                    <th scope="col">Model Year</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Category id</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Car hire cost</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr   style=" position: sticky;">
                                    <th scope="col"></th>
                                    <th scope="col">Registration no</th>
                                    <th scope="col">Car name</th>
                                    <th scope="col">Car brand</th>
                                    <th scope="col">Model Year</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Category id</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Car hire cost</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $car="Car";
//                                $deleteCar = $conn->prepare("SELECT * FROM ?");
//                                foreach ($result as $row) {
//                                    $car ="SELECT * FROM Car";
//                                    $result
                                          $query = "SELECT * FROM Car";
                                $result = $conn->query($query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $R_no = $row['Registration_no'];
                                    $Car_name = $row['Car_name'];
                                    $Car_brand = $row['Car_brand'];
                                    $ModelYear=$row['ModelYear'];
                                    $Image = $row['Image'];
                                    $City = $row['City'];
                                    $Category_id = $row['Category_id'];
                                    $Car_Status = $row['Status'];
                                    $Car_hire_cost = $row['Car_hire_cost'];
                                    ?>
                                    <tr id='tr_<?= $id ?>'>
                                        <td><input type='checkbox' name='delete[]' value='<?= $R_no ?>'></td>
                                        <td><?= $R_no ?></td>
                                        <td><?= $Car_name ?></td>
                                        <td><?= $Car_brand ?></td>
                                        <td><?= $ModelYear ?></td>
                                        <td>
                                            <img src="CarImg/<?php echo $Image; ?>" width="100px" height="100px"><br/>
                                            <?php echo $Image ?>
                                        </td>
                                        <td><?= $City ?></td>
                                        <td><?= $Category_id ?></td>
                                        <td>
                                            <?php
                                            if ($Car_Status == 'Deactive') {
                                                echo   "<span class='badge badge-secondary'>$Car_Status</span>";
                                            }else{
                                                echo "<span class='badge badge-success'>$Car_Status</span>";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $Car_hire_cost ?></td>
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
                        if (isset($_POST['Car_delete'])) {

                            if (isset($_POST['delete'])) {
                                foreach ($_POST['delete'] as $deleteid) {
                                    $query = "SELECT Image FROM car";
                                    $result = $conn->query($query);
                                    $Image = $row['Image'];

                                    unlink("CarImg/$Image");

                                    $deleteCar = $conn->prepare("DELETE from car WHERE Registration_no=?");
                                    $deleteCar->bind_param("s", $deleteid);
                                    $deleteCar->execute();
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
