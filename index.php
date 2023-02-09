<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quick car hire-admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <?php
        include './DatabaseConnection.php';
        ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Email" name="Email" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
<!--                                            <div class="form-check mb-3">-->
<!--                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />-->
<!--                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>-->
<!--                                            </div>-->
                                            <div class="d-grid gap-2">
                                                <!--<a class="small" href="password.html">Forgot Password?</a>-->
                                                <input type="submit"  name="submit" id="submit" class="btn btn-primary btn-lg"  value="Login">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script>
            function myFunction() {
                alert('please enter valid Email Id and Password!');
            }
        </script>
        <?php
        if (isset($_POST['submit'])) {
            $Admin_email_id = $_POST['Email'];
            $Admin_password = $_POST['password'];

            $sql = $conn->prepare("SELECT * FROM admin WHERE Admin_email_id = ? AND Admin_password = ? ");
            $sql->bind_param("ss", $Admin_email_id, $Admin_password);
            $sql->execute();
            $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
//            echo "<pre>";
//            print_r($result);
//            echo "</pre>";
//            exit();

            if (count($result) > 0) {
                $_SESSION['Admin_name'] = $result[0]['Admin_name'];
                $_SESSION['islogin'] = true;
                header('Location: Dashboard.php');
            } else {
                echo '<script>myFunction();</script>';
            }
        }
        $conn->close();
        session_close();
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
