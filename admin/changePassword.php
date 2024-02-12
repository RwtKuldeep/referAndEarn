<?php
require 'pack/config.php';
if ($Admin) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/home.css" />
    <title>Admin Dashboard</title>
    <?php include("pack/header.php"); ?>
  </head>

  <body>

    <?php include 'pack/SideNav.php'; ?>

    <div class="main">
      <div class="container-fluid family">
        <?php include("pack/nav.php"); ?>
        <div class="row">
          <div class="col-md-12 ">

            <div class="row mt-2">
              <div class="col-md-12">


                <!-- Setting -->
                <form action="php/changePasswordBack.php" method="post">

                  <h2 class="center">Update Password</h2>

                  <div class="setting">
                    <div class="new">
                      <label for="new">Enter New Password</label>
                      <input type="text" name="setNewPassword" id="new">
                    </div>
                  </div>

                  <div class="saveBox">
                    <input type="submit" value="Update Password" class="save">
                  </div>

                </form>
                <!-- Setting -->


              </div>
            </div>

          </div>
        </div>
      </div>
    </div> <!-- Add Student Modal -->
    <div id="snackbar"></div>
    <?php include("pack/footer.php"); ?>


  </body>

  </html>
<?php
} else {
  header("location:index.php");
}
?>