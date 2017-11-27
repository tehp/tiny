<?php
/**
 * ToS page view.
 */

/** User to check logged in and get user data. */
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- General. -->
    <title>BCTHC</title>
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

    <div id="content">
                <div class="navbar-header">
                    <button type="button" style="background-color: #ffd000" id="sidebarCollapse" class="btn navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span></span>
                    </button>
                </div>
                <br><br><br>

                <!-- Main Content -->
                <section class="main">
                  <div class="container legal-area col-md-8 col-md-offset-2">
                     <h2 class="center">Terms of Service</h2>
                     <hr>
                     <br>
                     <h3>Conditions of Use</h3>
                     <p>Visiting or interacting with this website in any way you are subject to the following conditions. Please review them thoroughly.</p>
                     <br>
                     <h3>Privacy</h3>
                     <p>Please review the <a href="/privacy.php" style="color: #ffd000">Privacy Policy</a> for more information on privacy.</p>
                     <br>
                     <h3>Copyright</h3>
                     <p>All content included on this site, such as text, graphics, logos, images, digital downloads, data compilations, and software, is the property of its creators or its content suppliers and protected by international copyright laws.</p>
                     <br>
                     <h3>License and Access</h3>
                     <p>You are granted a limited license to access and make personal use of this site and not to download (other than page caching) or modify it, or any portion of it, except with express written consent of The BC Tiny House Collective. This license does not include any resale or commercial use of this site or its contents: any collection and use of any product listings, descriptions, or prices: any derivative use of this site or its contents: any downloading or copying of account information for the benefit of another merchant: or any use of data mining, robots, or similar data gathering and extraction tools.</p>
                     <hr>
                  </div>
                </section>

              </div>

  </body>
</html>
