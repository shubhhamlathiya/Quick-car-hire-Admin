<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Offer</title>
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
        <script>
            function Checkboxseleted() {
                alert('please Select any one check box!');
            }
        </script>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Offer
                </div>
                <form method="post">
                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Offer Code</th>
                                    <th scope="col">Offer Name</th>
                                    <th scope="col">Offer Amount</th>
                                    <th scope="col">Offer Start Date</th>
                                    <th scope="col">Offer End Date</th>
                                    <th scope="col">Offer Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM offer";
                                $result = $conn->query($query);
                                $id = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $Offer_Code = $row['Offer_Code'];
                                    $Offer_Name = $row['Offer_Name'];
                                    $Offer_Amount = $row['Offer_Amount'];
                                    $Offer_Start_Date = $row['Offer_Start_Date'];
                                    $Offer_End_Date = $row['Offer_End_Date'];
                                    $Offer_Status = $row['Offer_Status'];
                                    ?>
                                    <tr id='tr_<?= $id ?>'>
                                        <td><input type='checkbox' name='delete[]' value='<?= $Offer_Code ?>' ></td>
                                        <td><?= $Offer_Code ?></td>
                                        <td><?= $Offer_Name ?></td>
                                        <td><?= $Offer_Amount ?></td>
                                        <td><?= $Offer_Start_Date ?></td>
                                        <td><?= $Offer_End_Date ?></td>
                                        <td><?= $Offer_Status ?></td>
                                    </tr>
                                    <?php
                                    $id++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="AddOffer.php" class="btn btn-primary">+Add Offer</a>
                        <input type="submit" class="btn btn-primary" name="Offers_delete" id="but_delete" value="Delete Offers">
                        <?php
                        if (isset($_POST['Offers_delete'])) {

                            if (isset($_POST['delete'])) {
                                foreach ($_POST['delete'] as $deleteid) {
//                                    echo $deleteid;
                                    $deleteUser = "DELETE from offer WHERE Offer_Code='$deleteid'";
                                    $conn->query($deleteUser);
                                }
                                echo "<script>window.location.href='Offers.php'</script>";
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
