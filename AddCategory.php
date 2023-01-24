<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Category | Add</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/be19cf8b62.js" crossorigin="anonymous"></script>
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
                    Add Category
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Category_id" name="Category_id" type="text" placeholder="Category Id" required/>
                            <label for="Category_id">Category Id</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Category_name" required>
                                <option selected>Saloon</option>
                                <option>SUV</option>
                                <option>CUV</option>
                                <option>Hatchback</option>
                            </select>
                            <label for="Category_name">Category Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Seats" required>
                                <option selected>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>
                            <label for="Seats">Seats</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Fuel" required>
                                <option selected>Petrol</option>
                                <option>CNG</option>
                                <option>Diesel</option>
                                <option>Electric</option>
                            </select>
                            <label for="Fuel">Fuel</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Laggage" required>
                                <option selected>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                            <label for="Laggage">Laggage</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Transmission" required>
                                <option selected>Manual</option>
                                <option>Automatic</option>
                            </select>
                            <label for="Transmission">Transmission</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit"  name="Categorysubmit" id="Categorysubmit" class="btn btn-primary btn-lg"  value="Add Category">
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST['Categorysubmit'])) {
                    $Category_id = $_POST['Category_id'];
                    $Category_name = $_POST['Category_name'];
                    $Seats = $_POST['Seats'];
                    $Fuel = $_POST['Fuel'];
                    $Laggage = $_POST['Laggage'];
                    $Transmission = $_POST['Transmission'];

                    $CheckP = "SELECT * FROM car_category WHERE Category_id = '$Category_id'";
                    $result = mysqli_query($conn, $CheckP);
                    $check = mysqli_fetch_array($result);
                    if (!isset($check)) {
                        $category = "INSERT INTO car_category VALUES ('$Category_id', '$Category_name', '$Seats', '$Fuel', '$Laggage', '$Transmission')";
                        if ($conn->query($category) === TRUE) {
                            echo "<script>window.location.href='CarCategory.php'</script>";
                        } else {
                             echo "<script> alert('$conn->error');</script>";
                        }
                    } else {
                         echo "<script>alert('This Category Id is already exist!');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
