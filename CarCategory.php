<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Car Category</title>
        <meta name="description" content="Car Category"/>
        <meta name="author" content="Car Category"/>
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
                $('#CarCategory').DataTable();
            });

        </script>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Car Category
                </div>
                <form method="post">
                    <div class="card-body">

                        <table id="CarCategory" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Category Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Seats</th>
                                    <th scope="col">Fuel</th>
                                    <th scope="col">Laggage</th>
                                    <th scope="col">Transmission</th>
                                    <th scope="col">Edit Category</th>
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Category Id</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Seats</th>
                                <th scope="col">Fuel</th>
                                <th scope="col">Laggage</th>
                                <th scope="col">Transmission</th>
                                <th scope="col">Edit Category</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM car_category";
                                $result = $conn->query($query);
                                $id = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $Category_id = $row['Category_id'];
                                    $Category_name = $row['Category_name'];
                                    $Seats = $row['Seats'];
                                    $Fuel = $row['Fuel'];
                                    $Laggage = $row['Laggage'];
                                    $Transmission = $row['Transmission'];
                                    ?>
                                    <tr id='tr_<?= $id ?>'>
                                        <td><input type='checkbox' name='delete[]' value='<?= $Category_id ?>'></td>
                                        <td><?= $Category_id ?></td>
                                        <td><?= $Category_name ?></td>
                                        <td><?= $Seats ?></td>
                                        <td><?= $Fuel ?></td>
                                        <td><?= $Laggage ?></td>
                                        <td><?= $Transmission ?></td>
                                        <td><a href="editCarCategory.php?id=<?= $Category_id; ?>"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                    <?php
                                    $id++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="AddCategory.php" class="btn btn-primary">+Add Category</a>
                        <input type="submit" class="btn btn-primary" name="Category_delete" id="Category_delete"
                               value="Delete Category">
                               <?php
                               if (isset($_POST['Category_delete'])) {

                                   if (isset($_POST['delete'])) {
//                                       $deleteid=$_POST['delete'];
                                       foreach ($_POST['delete'] as $deleteid) {
                                           $deleteCategory = $conn->prepare("DELETE from car_category WHERE Category_id=?");
                                           $deleteCategory->bind_param("s", $deleteid);
                                           $Category=$deleteCategory->execute();
                                           echo $Category;
                                       if ($Category < 0) {
                                           echo "<script>window.location.href='Admin.php'</script>";
                                       } else {
                                           echo "<script> alert('this Car Category not be deleted!');  </script>";

                                       }

                                       }
                                       echo "<script>window.location.href='CarCategory.php'</script>";
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
