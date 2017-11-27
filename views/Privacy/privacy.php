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
                     <h2 class="center">Privacy Policy</h2>
                     <hr>
                     <p>The developers of this site take privacy very seriously.</p>
                     <p>We collect your information only with your consent; we only collect the minimum amount of personal information that is necessary to fulfill the purpose of your interaction with us; we don't sell it to third parties.</p>
                     <br>
                     <h3>Information Collection</h3>
                     <p>The information that we require users to enter includes First Name, Last Name, Email Address, and Password. Users passwords are never stored in plain text, and are both encrypted and salted. Optional information such as bio, location, and post descriptions and locations are stored, but are only entered at the will of the user.</p>
                     <br>
                     <h3>What We Don't Collect</h3>
                     <p>We do not and will never collect any personal information that is not essential to the use of the site. Personal information such as location and bio are optional, and are not required to participate in the site. We do not and will never collect payment information from users for any reason.</p>
                     <hr>
                  </div>
                </section>

              </div>



  </body>
</html>
