<?php

if ($_SESSION['islogin'] != true) {
    header("Location: index.php");
}
