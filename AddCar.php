<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add | Car</title>
        <meta name="description" content="Add Car" />
        <meta name="author" content="Add Car" />

    </head>
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
                            <input class="form-control" id="R_no" name="R_no" type="text" placeholder="MH03AH6414" >
                            <label for="R_no">R No</label>
                            <span id="ErrorR_no" style="color: red"> </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_name" name="Car_name" type="text" placeholder="Car Name" >
                            <label for="Car_name">Car Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_brand" name="Car_brand" type="text" placeholder="Car Brand" >
                            <label for="Car_brand">Car Brand</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" name="Image" id="Image" class="form-control">
                            <label for="Image">Image</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="City" aria-label="Default select example" name="City" >
                                <option selected>Ahmedabad</option>
                                <option>Bharuch</option>
                                <option>Navsari</option>
                                <option>Surat</option>
                                <option>Vadodara</option>
                            </select>
                            <label for="Role">Role</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Category_id">
                                <?php
                                $query = "SELECT * FROM car_category";
                                $result = $conn->query($query);
                                $id = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $Category_id = $row['Category_id'];
                                    ?>
                                    <option id='tr_<?= $id ?>'>
                                        <?= $Category_id ?>
                                    </option>
    <!--                                <tr id='tr_--><?php //= $id  ?><!--'>-->
    <!--                                    <td><input type='checkbox' name='delete[]' value='--><?php //= $Category_id  ?><!--' ></td>-->
    <!--                                    <td></td>-->
                                    <!---->
                                    <!--                                </tr>-->
                                    <?php
                                    $id++;
                                }
                                ?>
                            </select>
                            <label for="Category_id">Category Id</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_hire_cost" name="Car_hire_cost" type="text" placeholder="Car Hire Cost" >
                            <label for="Car_hire_cost">Car Hire Cost</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="Car_Status" name="Car_Status" >
                                <option selected>Active</option>
                                <option>InActive</option>
                            </select>
                            <label for="Car_Status">Car Status</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit"  name="Carsubmit" id="Carsubmit" class="btn btn-primary btn-lg"  value="Add Car">
                        </div>
                    </form>
                </div>
                <script>
                    $("#R_no").keyup(function (e) {
                        $("#ErrorR_no").html('');

                        var validstr = '';
                        var dInput = $(this).val();
                        var numpattern = /^\d+$/;
                        var alphapattern = /^[A-Z]+$/;

                        for (var i = 0; i < dInput.length; i++) {

                            if ((i == 2 || i == 3 || i == 6 || i == 7 || i == 8 || i == 9)) {
                                if (numpattern.test(dInput[i])) {
                                    console.log('validnum' + dInput[i]);
                                    validstr += dInput[i];
                                } else {
                                    $("#ErrorR_no").html("Only Digits").show();

                                }
                            }

                            if ((i == 0 || i == 1 || i == 4 || i == 5)) {
                                if (alphapattern.test(dInput[i])) {
                                    console.log('validword' + dInput[i]);
                                    validstr += dInput[i];
                                } else {
                                    $("#ErrorR_no").html("Only Capital Alpahbets").show();

                                }
                            }

                        }

                        $(this).val(validstr);
                        return false;
                    });
                </script>
                <?php
                if (isset($_POST['Carsubmit'])) {
                    $R_no = $_POST['R_no'];
                    $Car_name = $_POST['Car_name'];
                    $Car_brand = $_POST['Car_brand'];
                    $City = $_POST['City'];
                    $Car_Status = $_POST['Car_Status'];
                    $Car_hire_cost = $_POST['Car_hire_cost'];
                    $Category_id = $_POST['Category_id'];
                    $Img = $_FILES['Image'];
                    echo
                    print_r($Img);
//                    exit();
//                    $CheckP = "SELECT * FROM car WHERE R_no = '$R_no'";
//                    $result = mysqli_query($conn, $CheckP);
//                    $check = mysqli_fetch_array($result);
//                    if (!isset($check)) {
//                        $admin = "INSERT INTO car VALUES ('$R_no', '$Car_name', '$Car_brand', '$Img', '$City','$Category_id','$Car_Status','$Car_hire_cost')";
//                        if ($conn->query($admin) === TRUE) {
//                            move_uploaded_file($_FILES["Image"]["tmp_name"],"CarImg/".$_FILES["Image"]["name"]);
//                            echo "<script>window.location.href='Car.php'</script>";
//                        } else {
//                            echo "<script> alert('$conn->error');</script>";
//                        }
//                    } else {
//                        echo "<script>alert('This Car R Number is already exist!');</script>";
//                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
