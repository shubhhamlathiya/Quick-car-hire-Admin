<!DOCTYPE html>
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
                            <input class="form-control" id="Admin_name" name="Admin_name" type="text" placeholder="Full Name" onkeypress="return (event.charCode > 64 &&
                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"  required>
                            <label for="Adminname">Admin Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Admin_email_id" name="Admin_email_id" type="email" placeholder="Admin email id" required>
                            <label for="Adminemail">Admin email id</label>
                            <span id="Email"></span>
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
                <script>
                    function Name() {
                        $("#Fname").append("Only letters allowed.");
                        $("#Fname").css("color", "red");
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
                    $Admin_email_id = $_POST['Admin_email_id'];
                    $Admin_password = $_POST['Admin_password'];
                    $Status = $_POST['Status'];
                    $ROle = $_POST['Role'];

//                    if (!preg_match("/^[a-zA-Z ]*$/", $Admin_name)) {
//                        echo "<script>Name();</script>";
//                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//                        echo "<script>Email();</script>";
//                    }

                    $CheckP = $conn->prepare("SELECT * FROM admin WHERE Admin_email_id = ?");
                    $CheckP->bind_param("s",$Admin_email_id);
                    $CheckP->execute();
                    $result = $CheckP->get_result()->fetch_all(MYSQLI_ASSOC);
                    if (!count($result)>0) {
                        $admin=$conn->prepare("INSERT INTO admin VALUES (?,?,?,?,?)");
                        $admin->bind_param("sssss",$Admin_name,$Admin_email_id,$Admin_password,$Status,$ROle);
                        $admin->execute();
                        $AddAdmin = $admin->get_result()->fetch_all(MYSQLI_ASSOC);
                        if (count($AddAdmin)>0) {
//                            echo "<script>window.location.href='Admin.php'</script>";
                            header('Location: Admin.php');
                            mysqli_close($AddAdmin);
                        } else {
                            echo "<script> alert('$conn->error');</script>";
                        }
                    } else {
                        echo "<script>alreadyexistEmail();</script>";
                    }
                }
                $conn->close();
                ?>
            </div>
        </div>
    </body>
</html>
