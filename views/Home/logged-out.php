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

    <!-- Script Files -->
    <script src="/public/js/libraries/typing.js" type="text/javascript"></script>
    <script src="/public/js/home/home-out.js" type="text/javascript"></script>

</head>
<body>

    <!-- Header Section -->
    <?php View::header_logged_out(); ?>


</body>
</html>
