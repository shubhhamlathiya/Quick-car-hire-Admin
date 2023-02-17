<!DOCTYPE html>
<html>
    <head>
        <meta name="description" content="Offer Page to show all Offer"/>
        <meta name="author" content="Offer"/>
        <title>Offer</title>
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            .succWrap{
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
        </style>
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

                <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) {
                    ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

                <form method="post">
                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Offer Code</th>
                                    <th scope="col">Offer Name</th>
                                    <th scope="col">Offer Image</th>
                                    <th scope="col">Offer Amount</th>
                                    <th scope="col">Offer Start Date</th>
                                    <th scope="col">Offer End Date</th>
                                    <th scope="col">Offer Status</th>
                                    <th scope="col">Offer Edit</th>
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Offer Code</th>
                                <th scope="col">Offer Name</th>
                                <th scope="col">Offer Image</th>
                                <th scope="col">Offer Amount</th>
                                <th scope="col">Offer Start Date</th>
                                <th scope="col">Offer End Date</th>
                                <th scope="col">Offer Status</th>
                                <th scope="col">Offer Edit</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM offer";
                                $result = $conn->query($query);
                                $id = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $Oid = $row['Offer_id'];
                                    $Offer_Code = $row['Offer_code'];
                                    $Offer_Name = $row['Offer_name'];
                                    $Image=$row['Offer_img'];
                                    $Offer_Amount = $row['Offer_amount'];
                                    $Offer_Start_Date = $row['Offer_start_date'];
                                    $Offer_End_Date = $row['Offer_end_date'];
                                    $Offer_Status = $row['Status'];
                                    ?>
                                    <tr id='tr_<?= $id ?>'>
                                        <td><input type='checkbox' name='delete[]' value='<?= $Offer_Code ?>'></td>
                                        <td><?= $Offer_Code ?></td>
                                        <td><?= $Offer_Name ?></td>
                                        <td>
                                            <img src="Offerimg/<?php echo $Image; ?>" width="100px" height="100px"><br/>
                                            <?php echo $Image ?>
                                        </td>
                                        <td><?= $Offer_Amount ?></td>
                                        <td><?= $Offer_Start_Date ?></td>
                                        <td><?= $Offer_End_Date ?></td>
                                        <td><?= $Offer_Status ?></td>
                                        <td><a href="editOffers.php?id=<?= $Offer_Code; ?>"><i class="fa fa-edit"></i></a></td>
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
                                    $deleteOffer = $conn->prepare("DELETE from offer WHERE Offer_Code=?");
                                    $deleteOffer->bind_param("s", $deleteid);
                                    $deleteOffer->execute();
                                }
                                echo "<script>window.location.href='Offers.php'</script>";
                                $msg = "Vehicle  record deleted successfully";
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
