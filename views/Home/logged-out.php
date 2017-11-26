<?php
/**
 * Logged out View.
 */

/** User to check logged in and get user data. */
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- General. -->
    <title>BCTHC</title>
    <meta name="description" content="">

    <!-- Boiler Plate Tags -->
    <?php View::head(); ?>

    <!-- Style Files -->
    <link rel="stylesheet" href="/public/css/home/home-out.css">


</head>
<body>

    <!-- Header Section -->
    <?php View::header_logged_out(); ?>

    <!-- Page Content Holder -->
    <div id="content">
                <div class="navbar-header">
                    <button type="button" style="background-color: #ffd000" id="sidebarCollapse" class="btn navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span></span>
                    </button>
                </div>

                <br><br><br>

                <script>
                setTimeout(function(){
                  document.getElementById("sidebarCollapse").click()
                }, 1200);
                </script>


                <img class="house-image center-block" src="public/img/house.png">
                <h1 class="house-title text-center">Go Tiny.</h1>

                <p class="join-btn text-center">
                <button type="button" style="background-color: #ffd000" class="btn navbar-btn">
                    <a href="/register.php">Join Our Community</a>
                </button>
              </p>

                <hr class="large-seperator">

                <p class="text-center">Join a community of friendly individuals buying and selling anything tiny house related!<br>Signing up an account is easy and only takes 30 seconds.</p>

                <hr class="large-seperator">

    </div>
    </div> <!-- end content -->
</div> <!-- end wrapper -->


</body>
</html>
