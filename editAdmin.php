<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Add</title>
        <meta name="description" content="Add Admin"/>
        <meta name="author" content="Add admin"/>
    </head>
    <body>
        <?php
// put your code here
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';

        $id = strval($_GET['id']);
        $query = $conn->prepare("SELECT * FROM admin where Admin_email_id=?");
        $query->bind_param("s", $id);
        $result = $query->execute();
        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
        foreach ($result as $row) {
            $Admin_name = $row['Admin_name'];
            $Admin_email_id = $row['Admin_email_id'];
            $Status = $row['Status'];
            $Role = $row['Role'];
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
                                <input class="form-control" id="Admin_name" name="Admin_name" type="text" placeholder="Full Name"
                                       onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)"
                                       value="<?php echo $Admin_name; ?>" required>
                                <label for="Adminname">Admin Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="Admin_email_id" name="Admin_email_id" type="email"
                                       disabled="disabled" value="<?php echo $Admin_email_id; ?>" placeholder="Admin email id" required>
                                <label for="Adminemail">Admin email id</label>
                                <span id="Email"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" name="Status" required>
                                    <?php
                                    if ($Status == 'Deactive') {
                                        echo "<option>Active</option><option selected>Deactive</option>";
                                    } else {
                                        echo "<option selected>Active</option><option>Deactive</option>";
                                    }
                                    ?>
                                </select>
                                <label for="Status">Status</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" name="Role" required>
                                    <?php
                                    if($Role == 'admin'){
                                        echo "<option selected>Admin</option><option>Manager</option><option>Employee</option>";
                                    }elseif ($Role == 'manager'){
                                        echo "<option>Admin</option><option selected>Manager</option><option>Employee</option>";
                                    }else{
                                        echo "<option>Admin</option><option>Manager</option><option selected>Employee</option>";
                                    }
                                    ?>
                                </select>
                                <label for="Role">Role</label>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" name="Adminsubmit" id="Adminsubmit" class="btn btn-primary btn-lg"
                                       value="Update Admin">
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <script>
                    function Name() {
                        $("#Fname").append("Only letters allowed.");
                        $("#Fname").css("color", "red");
                    }

                    function pass() {
                        $(document).ready(function () {
                            $("#pass").append("Password must be at least 8 characters and contain at least one number and one special symbol.");
                            $("#pass").css("color", "red");
                        });
                    }

                    function Email() {
                        $("#Email").append("Plase enter any valid email address.");
                        $("#Email").css("color", "red");
                    }

                    function alreadyexistEmail() {
                        $("#Email").append("This Admin Email Id is already exist!");
                        $("#Email").css("color", "red");
                    }
                </script>
                <?php
                if (isset($_POST['Adminsubmit'])) {
                    $Admin_name = $_POST['Admin_name'];
                    $Status = $_POST['Status'];
                    $Role = $_POST['Role'];


                            $admin = $conn->prepare("UPDATE admin SET Admin_name=?,Status=?,Role=? WHERE Admin_email_id=?");
                            $admin->bind_param("ssss", $Admin_name, $Status, $Role,$Admin_email_id);
                            $AddAdmin = $admin->execute();
                            if ($AddAdmin == 1) {
                                echo "<script>window.location.href='Admin.php'</script>";
                            } else {
                                echo "<script> alert('$conn->error');</script>";
                            }
                }
                $conn->close();
                ?>
            </div>
        </div>
    </body>
</html>
