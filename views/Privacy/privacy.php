<?php
/**
 * Privacy policy page view.
 */
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- General. -->
    <title>BCTHC | Privacy</title>
    <meta name="description" content="">

    <!-- Boiler Plate Tags. -->
    <?php View::head(); ?>

    <!-- Style Files. -->
    <link rel="stylesheet" href="/public/css/legal/legal.css">

  </head>
  <body>

    <?php

    /** User to check logged in and get user data. */
    $user = new User();

    if ($user->is_logged_in()) {
        View::header_logged_in();
    } else {
        View::header_logged_out();
    }
    ?>

    <!-- Main Content -->
    <section class="main">
       <div class="container legal-area">
         <h2 class="center">Privacy Policy</h2>
      </div>
    </section>

    <!-- Footer Section -->
    <?php View::footer(); ?>

  </body>
</html>
