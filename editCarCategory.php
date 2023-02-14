<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Category | Add</title>
        <meta name="description" content="Add Category"/>
        <meta name="author" content="Add Category"/>
    </head>
    <body>
        <?php
// put your code here
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';

        $Category_id = strval($_GET['id']);
        echo $Category_id;
        exit();
        $query = $conn->prepare("SELECT * FROM car_category where Category_id=?");
        $query->bind_param("s", $Category_id);
        $result = $query->execute();
        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        foreach ($result as $row) {
            $id = $row['Category_id'];
            $name = $row['Category_name'];
            $categorySeats = $row['Seats'];
            $categoryFuel = $row['Fuel'];
            $categoryLaggage = $row['Laggage'];
            $categoryTransmission = $row['Transmission'];
            ?>
            <div id="layoutSidenav_content">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Add Category
                    </div>
                    <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="Category_id" name="Category_id" type="text"
                                       placeholder="Category Id"
                                       onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 47 && event.charCode < 58)"
                                       MAXLENGTH="10" value="<?php echo $Category_id; ?>" disabled="disabled" required/>
                                <label for="Category_id">Category Id</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="Category_name" required>
                                    <option>Saloon</option>
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
                                <input type="submit" name="UpdateCategory" id="UpdateCategory" class="btn btn-primary btn-lg"
                                       value="Update Category">
                            </div>
                        </form>
                    </div>
    <?php }
?>
                <?php
                if (isset($_POST['UpdateCategory'])) {
                    $Category_id = $_POST['Category_id'];
                    $Category_name = $_POST['Category_name'];
                    $Seats = $_POST['Seats'];
                    $Fuel = $_POST['Fuel'];
                    $Laggage = $_POST['Laggage'];
                    $Transmission = $_POST['Transmission'];

                    $UpdateCategory = $conn->prepare("UPDATE car_category SET Category_name=?,Seats=?,Fuel=?,Laggage=?,Transmission=? WHERE Category_id=?");
                    $UpdateCategory->bind_param("ssssss", $Category_name, $Seats, $Fuel, $Laggage, $Transmission, $Category_id);
                    $Update = $UpdateCategory->execute();
                    if ($Update > 0) {
                        echo "<script>window.location.href='CarCategory.php'</script>";
                    } else {
                        echo "<script> alert('$conn->error');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
