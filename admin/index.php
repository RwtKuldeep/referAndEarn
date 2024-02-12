<?php
require 'pack/config.php';
if ($Admin) {
    // header("location: request.php");
    header("location: dashboard.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../img/idigitallogo.png">
        <script src="https://kit.fontawesome.com/9ece19e5d7.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/snackbar.css">
        <title>Admin login</title>
    </head>

    <body class="bg-light">
        <div class=container>

            <div class="row"><div class="col-12"></div></div>

            <form action="php/login.php" method="post">
                <div style="height:90vh;" class="row justify-content-center align-items-center">
                    <div class="col-md-5 col-11 p-5 shadow-lg">
                        <div class="text-center mb-4">
                            <h1 class="h3 mb-3 font-weight-bold">Admin Login</h1>
                        </div>

                        <div class="form-label-group">
                            <label for="AdminUsername">User Name</label>
                            <input type="text" class="form-control mb-4" name="admin_user" placeholder="User Name" id="AdminUsername" required>
                        </div>
                        <div class="form-label-group mb-4">
                            <label for="AdminPassword">Password</label>
                            <input type="password" class="form-control" name="admin_password" placeholder="Password" id="AdminPassword" required>

                        </div>
                        <button class="btn btn-lg  btn-block btn-primary text-white" type="submit" id="AdminLogin">Login</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="snackbar"></div>
        <?php include("pack/footer.php"); ?>

        <!-- JS and jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php
}
?>