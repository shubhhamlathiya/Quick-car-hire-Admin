<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Add</title>
        <meta name="description" content="Add Admin" />
        <meta name="author" content="Add admin" /> </head>
    <body>
        <?php
        // put your code here
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';
        ?>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add Admin
                </div>
                <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Admin_name" name="Admin_name" type="text" placeholder="Full Name"  required>
                            <label for="Adminname">Admin Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Admin_email_id" name="Admin_email_id" type="email" placeholder="Admin email id" required>
                            <label for="Adminemail">Admin email id</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Admin_password" name="Admin_password" type="password" placeholder="Admin password" required>
                            <label for="Adminpassword">Admin password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="Status" required>
                                <option selected>Active</option>
                                <option>InActive</option>
                            </select>
                            <label for="Status">Status</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="Role" required>
                                <option selected>Admin</option>
                                <option>Manager</option>
                                <option>Employee</option>
                            </select>
                            <label for="Role">Role</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit"  name="Adminsubmit" id="Adminsubmit" class="btn btn-primary btn-lg"  value="Add Admin">
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST['Adminsubmit'])) {
                    $Admin_name = $_POST['Admin_name'];
                    $Admin_email_id = $_POST['Admin_email_id'];
                    $Admin_password = $_POST['Admin_password'];
                    $Status = $_POST['Status'];
                    $ROle = $_POST['Role'];

                    $CheckP = "SELECT * FROM admin WHERE Admin_email_id = '$Admin_email_id'";
                    $result = mysqli_query($conn, $CheckP);
                    $check = mysqli_fetch_array($result);
                    if (!isset($check)) {
                        $admin = "INSERT INTO admin VALUES ('$Admin_name', '$Admin_email_id', '$Admin_password', '$Status', '$ROle')";
                        if ($conn->query($admin) === TRUE) {
                            echo "<script>window.location.href='Admin.php'</script>";
                        } else {
                            echo "<script> alert('$conn->error');</script>";
                        }
                    } else {
                        echo "<script>alert('This Admin Email Id is already exist!');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
