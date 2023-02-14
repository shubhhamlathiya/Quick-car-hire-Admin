<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add | Car</title>
        <meta name="description" content="Add Car"/>
        <meta name="author" content="Add Car"/>

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
                    Add Car
                </div>
                <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="R_no" name="R_no" type="text" placeholder="MH03AH6414" REQUIRED>
                            <label for="R_no">Registration No</label>
                            <span id="RegistrationNo"> </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_name" name="Car_name" type="text"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33) || (event.charCode > 47 && event.charCode < 58)"
                                   placeholder="Car Name" REQUIRED>
                            <label for="Car_name">Car Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_brand" name="Car_brand" type="text"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                   placeholder="Car Brand" REQUIRED>
                            <label for="Car_brand">Car Brand</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" name="Image" id="Image" accept="image/*" class="form-control">
                            <label for="Image">Image</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="City" aria-label="Default select example" name="City" required>
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
                                    <?php
                                    $id++;
                                }
                                ?>
                            </select>
                            <label for="Category_id">Category Id</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_hire_cost" name="Car_hire_cost" type="text"
                                   onkeypress="return (event.charCode > 47 && event.charCode < 58)" placeholder="Car Hire Cost"
                                   required>
                            <label for="Car_hire_cost">Car Hire Cost</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="Car_Status" name="Car_Status">
                                <option selected>Active</option>
                                <option>InActive</option>
                            </select>
                            <label for="Car_Status">Car Status</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="Carsubmit" id="Carsubmit" class="btn btn-primary btn-lg" value="Add Car">
                        </div>
                    </form>
                </div>
                <script>
                    function alreadyexistRegistrationNo() {
                        $("#RegistrationNo").append("This Car Registration No is already exist!");
                        $("#RegistrationNo").css("color", "red");
                    }

                    $("#R_no").keyup(function (e) {
                        $("#ErrorR_no").html('');

                        var validstr = '';
                        var dInput = $(this).val();
                        var numpattern = /^\d+$/;
                        var alphapattern = /^[A-Z]+$/;

                        for (var i = 0; i < dInput.length; i++) {

                            if ((i == 2 || i == 3 || i == 6 || i == 7 || i == 8 || i == 9)) {
                                if (numpattern.test(dInput[i])) {
                                    // console.log('validnum' + dInput[i]);
                                    validstr += dInput[i];
                                } else {
                                    $("#ErrorR_no").html("Only Digits").show();

                                }
                            }

                            if ((i == 0 || i == 1 || i == 4 || i == 5)) {
                                if (alphapattern.test(dInput[i])) {
                                    // console.log('validword' + dInput[i]);
                                    validstr += dInput  [i];
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

                    $Img = $_FILES['Image']['name'];

                    $CheckP = $conn->prepare("SELECT * FROM car WHERE Registration_no = ?");
                    $CheckP->bind_param("s", $R_no);
                    $result = $CheckP->execute();
                    $result = $CheckP->get_result()->fetch_all(MYSQLI_ASSOC);

                    if (!count($result) > 0) {

                        $extension = pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION);
                        $imgname = $R_no . "." . $extension;

                        $car = $conn->prepare("INSERT INTO car VALUES (?,?,?,?,?,?,?,?)");
                        $car->bind_param("sssssssi", $R_no, $Car_name, $Car_brand, $imgname, $City, $Category_id, $Car_Status, $Car_hire_cost);
                        $Addcar = $car->execute();

                        if ($Addcar > 0) {
                            move_uploaded_file($_FILES["Image"]["tmp_name"], "CarImg/" . $imgname);
                            echo "<script>window.location.href='Car.php'</script>";
                        } else {
                            echo "<script> alert('$conn->error');</script>";
                        }
                    } else {
                        echo "<script>alreadyexistRegistrationNo();</script>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
