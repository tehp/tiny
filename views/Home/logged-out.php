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
                <p>todo: make this page :)</p>
                <p>big login and register buttons somewhere on this page</p>


    </div>
    </div> <!-- end content -->
</div> <!-- end wrapper -->


</body>
</html>
