<!DOCTYPE html>
<html>
<head>
    <meta name="description"/>
    <meta name="author" content="page"/>
    <title>Page</title>
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
                        <th scope="col">Page Name</th>
                        <th scope="col">Page type</th>
                        <th scope="col">Page Edit</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Page Name</th>
                        <th scope="col">Page type</th>
                        <th scope="col">Page Edit</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM Page";
                    $result = $conn->query($query);
                    $id = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $Page_id=$row['Page_id'];
                        $Page_name = $row['Page_name'];
                        $Page_type = $row['Page_type'];
                        ?>
                        <tr id='tr_<?= $id ?>'>
                            <td><input type='checkbox' name='delete[]' value='<?= $Page_id ?>'></td>
                            <td><?= $Page_name ?></td>
                            <td><?= $Page_type ?></td>
                            <td><a href="editPage.php?id=<?= $Page_id; ?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <?php
                        $id++;
                    }
                    ?>
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">+Add Page</a>
                <input type="submit" class="btn btn-primary" name="Page_delete" id="but_delete" value="Delete Pages">
                <?php
                if (isset($_POST['Page_delete'])) {

                    if (isset($_POST['delete'])) {
                        foreach ($_POST['delete'] as $deleteid) {
                            $deleteOffer = $conn->prepare("DELETE from Page WHERE Page_id=?");
                            $deleteOffer->bind_param("s", $deleteid);
                            $deleteOffer->execute();
                        }
                        echo "<script>window.location.href='Page.php'</script>";
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
