<?php
/**
 * Post page view.
 */

/** User to check logged in and get user data. */
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- General. -->
    <title>BCTHC | New Listing</title>
    <meta name="description" content="">

    <!-- Boiler Plate Tags. -->
    <?php View::head(); ?>

    <!-- Style Files. -->
    <link rel="stylesheet" href="/public/css/post/post.css">

    <!-- Script Files -->
    <script src="/public/js/post/post.js" type="text/javascript"></script>

  </head>
  <body>

    <!-- Header Section -->
    <?php View::header_logged_in(); ?>

    <!-- Main Content -->
    <?php View::component('Post/post-form.php'); ?>


    <!-- Footer Section -->
    <?php View::footer(); ?>

  </body>

</html>
