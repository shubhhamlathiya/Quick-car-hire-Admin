<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/be19cf8b62.js" crossorigin="anonymous"></script>
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
                                    <th scope="col">Admin name</th>
                                    <th scope="col">Admin emailId</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM admin";
                                $result = $conn->query($query);
                                $id = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $Admin_name = $row['Admin_name'];
                                    $Admin_email_id = $row['Admin_email_id'];
                                    $Status = $row['Status'];
                                    $Role = $row['Role'];
                                    ?>
                                    <tr id='tr_<?= $id ?>'>
                                        <td><input type='checkbox' name='delete[]' value='<?= $Admin_email_id ?>' ></td>
                                        <td><?= $Admin_name ?></td>
                                        <td><?= $Admin_email_id ?></td>
                                        <td><?= $Status ?></td>
                                        <td><?= $Role ?></td>
                                    </tr>
                                    <?php
                                    $id++;
                                }
                                ?>
                            </tbody>
                        </table>

                        <a href="AddAdmin.php" class="btn btn-primary">+Add Admin</a>
                        <input type="submit" class="btn btn-primary" name="Admin_delete" id="but_delete" value="Delete Admin">
                        <?php
                        if (isset($_POST['Admin_delete'])) {

                            if (isset($_POST['delete'])) {
                                foreach ($_POST['delete'] as $deleteid) {
//                                    echo $deleteid;
                                    $deleteUser = "DELETE from admin WHERE Admin_email_id='$deleteid'";
                                    $conn->query($deleteUser);
                                }
                                echo "<script>window.location.href='Admin.php'</script>";
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
