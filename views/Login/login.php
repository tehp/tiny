<?php
/**
 * Login View.
 */

$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- General. -->
    <title>BCTHC | Log in</title>

    <meta name="description" content="">

    <!-- Boiler Plate Tags. -->
    <?php View::head(); ?>

    <!-- Style Files. -->
    <link rel="stylesheet" href="/public/css/login/login.css">

  </head>
  <body>

    <!-- Header Section -->
    <?php View::header_logged_out(); ?>

    <!-- Page Content Holder -->
    <div id="content">

      <div class="navbar-header">
          <button type="button" style="backgr
          ound-color: #ffd000" id="sidebarCollapse" class="btn navbar-btn">
              <i class="glyphicon glyphicon-align-left"></i>
              <span></span>
          </button>
      </div>

      <!-- Header -->
      <section class="absolute-center">
          <div class="text-vertical-center">
            <div class="col-lg-4 col-lg-offset-4">

              <!-- Sign In Form -->
              <div class="absolute-center-form">
              <form method="post">

                <div class="divider"></div>

                <!-- User Email -->
                <div class="input-group input-group-sm margin-bottom-15">
                  <input style="margin-bottom: 10px;" required="true" type="email" name="user_email" class="input-centered" placeholder="Email Address" id="user_email">
                </div>

                <!-- User Password -->
                <div class="input-group input-group-sm margin-bottom-20">
                  <input style="margin-bottom: 10px;" required="true" type="password" name="user_password" placeholder="Password" id="user_password">
                  </a>
                </div>

                <div class="divider"></div>

                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <input type="submit" class="btn btn-submit" value="Sign In">
                <div class="divider" style="margin-top: 15px; margin-bottom: 15px;"></div>
              </form>

              <p class="dont-have-account-link text-center">
                Don't have an account?
                <a target="_blank" href="/register.php">Sign Up</a>
              </p>

            </div>

      <!-- Form Error Display -->
      <?php

        if (Session::exists('form_errors')) {
            $form_errors = Session::flash('form_errors');

            foreach ($form_errors as $error) {
                $error = explode('/', $error);
                $error_form = $error[0];
                $error_message = $error[1];

                echo "
            <script type='text/javascript'>
              var error_form = '$error_form';
              var error_message = '{$error_message}';

              // Add/check for error on email input.
              if(error_form === 'user_email') {
                $('#user_email').css('border-color', '#ff9b9b');
                $('#user_email').attr('placeholder', error_message);
                $('#user_email').addClass('error-placeholder');
                $('#login-addon').css('border-color', '#ff9b9b');
                $('#login-addon').css('color', '#ff9b9b');
              }

              // Add/check for error on password input.
              if(error_form === 'user_password') {
                $('#user_password').css('border-color', '#ff9b9b');
                $('#user_password').attr('placeholder', error_message);
                $('#user_password').addClass('error-placeholder');
                $('#password-addon-1').css('border-color', '#ff9b9b');
                $('#password-addon-1').css('color', '#ff9b9b');
              }
            </script>
            ";
            }
        }

      ?>

          </div>
        </div>
      </section>




    </div>
    </div> <!-- end content -->
</div> <!-- end wrapper -->



  </body>
</html>
