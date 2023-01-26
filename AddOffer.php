<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Offer | Add</title>
        <meta name="description" content="Add Offer" />
        <meta name="author" content="Add Offer" />  
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
                    Add Offer
                </div>
                <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_Code" name="Offer_Code" type="text" placeholder="Offer Code" required/>
                            <label for="Offer_Code">Offer Code</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_Name" name="Offer_Name" type="text" placeholder="Offer Name" required/>
                            <label for="Offer_Name">Offer Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_Amount" name="Offer_Amount" type="text" placeholder="Offer Amount" required/>
                            <label for="Offer_Amount">Offer Amount</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_Start_Date" name="Offer_Start_Date" type="text" placeholder="Offer Start Date" required/>
                            <label for="Offer_Start_Date">Offer Start Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_End_Date" name="Offer_End_Date" type="text" placeholder="Offer End Date" required/>
                            <label for="Offer_End_Date">Offer End Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Offer_Status" required>
                                <option selected>Active</option>
                                <option>InActive</option>
                            </select>
                            <label for="Offer_Status">Offer Status</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit"  name="Offersubmit" id="Offersubmit" class="btn btn-primary btn-lg"  value="Add Offer">
                        </div>
                    </form>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $("#Offer_Start_Date").datepicker({

                            onSelect: function (selected) {
                                var dt = new Date(selected);
                                dt.setDate(dt.getDate() + 1);
                                $("#Offer_End_Date").datepicker("option", "minDate", dt);
                            }
                        });
                        $("#Offer_End_Date").datepicker({
                            onSelect: function (selected) {
                                var dt = new Date(selected);
                                dt.setDate(dt.getDate() - 1);
                                $("#Offer_Start_Date").datepicker("option", "maxDate", dt);
                            }
                        });
                    });
                </script>
                <?php
                if (isset($_POST['Offersubmit'])) {
                    $offercode = $_POST['Offer_Code'];
                    $OfferName = $_POST['Offer_Name'];
                    $OfferAmount = $_POST['Offer_Amount'];
                    $startdate = $_POST['Offer_Start_Date'];
                    $enddate = $_POST['Offer_End_Date'];
                    $Status = $_POST['Offer_Status'];

                    $CheckP = "SELECT * FROM offer WHERE Offer_Code = '$offercode'";
                    $result = mysqli_query($conn, $CheckP);
                    $check = mysqli_fetch_array($result);
                    if (!isset($check)) {
                        $offer = "INSERT INTO offer VALUES ('$offercode', '$OfferName', '$OfferAmount', '$startdate', '$enddate', '$Status')";
                        if ($conn->query($offer) === TRUE) {
                            echo "<script>window.location.href='Offers.php'</script>";
                        } else {
                            echo "<script> alert('$conn->error');</script>";
                        }
                    } else {
                        echo "<script>alert('This Offer Code is already exist!');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
