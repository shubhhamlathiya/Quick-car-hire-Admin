<?php ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <?php
// put your code here
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';

        $id = intval($_GET['id']);

        $query = $conn->prepare("SELECT * FROM Page where Page_id=?");
        $query->bind_param("s", $id);
        $result = $query->execute();
        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        foreach ($result as $row) {
            $Page_id = $row['Page_id'];
            $Page_name = $row['Page_name'];
            $Page_type = $row['Page_type'];
            $Page_details = $row['Page_details'];
            ?>
            <div id="layoutSidenav_content">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Edit Offer
                    </div>
                    <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                        <form method="post" enctype="multipart/form-data">

                            <div class="form-floating mb-3">
                                <input class="form-control" id="Page_name" name="Page_name" type="text" placeholder="Page Name"
                                       onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)"
                                       value="<?php echo $Page_name; ?>" required>
                                <label for="Page_name">Page Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="Page_type" name="Page_type" type="text" placeholder="Page Type"
                                       onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)"
                                       value="<?php echo $Page_type; ?>" required>
                                <label for="Page_type">Page Type</label>
                            </div>
                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample1" rows="14">
    <!--                        --><?php //echo "$Page_details"; ?>
    <?php
//                        $pagetype = $_GET['type'];
    $query = $conn->prepare("SELECT Page_details from Page where Page_id=?");
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
//                        print_r($result);
//                        exit();
    $cnt = 1;
    if (!$query->rowCount() > 0) {
        foreach ($result as $result) {
            echo htmlentities($result->Page_details);
        }
    }
    ?>
                                </textarea>
                                <label class="form-label" for="textAreaExample">Message</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php } ?>
    </body>
</html>
