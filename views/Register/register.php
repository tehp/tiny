<?php
/**
 * Register View.
 */

$user = new User();
?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- General. -->
    <title>BCTHC | Register</title>
    <meta name="description" content="">

    <!-- Boiler Plate Tags. -->
    <?php View::head(); ?>

    <!-- Script Files -->
    <script src="/public/js/register-validate.js" type="text/javascript"></script>

    <!-- Style Files. -->
    <link rel="stylesheet" href="/public/css/register/register.css">

  </head>
  <body>


    <!-- Header Section -->
    <?php View::header_logged_out(); ?>

    <!-- Page Content Holder -->
    <div id="content">

      <div class="navbar-header row">
          <button type="button" style="background-color: #ffd000" id="sidebarCollapse" class="btn navbar-btn">
              <i class="glyphicon glyphicon-align-left"></i>
              <span></span>
          </button>
      </div>

      <!-- Register Area -->
      <section class="absolute-center">
        <div class="text-vertical-center">
          <div class="col-lg-4 col-lg-offset-4 text-center">
            <div class="absolute-center-form">

              <!-- Register Form -->
              <form method="post">

                <br><br><br>
                <h2 class="center">Register</h2>
                <hr>

                <div class="divider"></div>

                <!-- First and Last Name. -->
                <div class="row margin-bottom-15">

                  <!-- First Name -->
                  <div class="col-xs-6" style="padding-right: 6px;">
                    <div class="field">
                      <input style="margin-bottom: 10px;" required="true" type="text" name="user_first" class="form-control" placeholder="First Name" value="<?php echo escape(Input::get('user_first')); ?>" id="user_first">
                    </div>
                  </div>

                  <!-- Last Name -->
                  <div class="col-xs-6" style="padding-left: 6px;">
                    <div class="field">
                      <input style="margin-bottom: 10px;" required="true" type="text" name="user_last" class="form-control" placeholder="Last Name" value="<?php echo escape(Input::get('user_last')); ?>" id="user_last">
                    </div>
                  </div>

                </div>

                <!-- Email -->
                <div class="field margin-bottom-15">
                  <input style="margin-bottom: 10px;" required="true" type="email" name="user_email" class="form-control" placeholder="Email" id="user_email" value="<?php echo escape(Input::get('user_email')); ?>" autocomplete="off">
                </div>

                <!-- Password  -->
                <div class="field margin-bottom-15">
                  <input style="margin-bottom: 10px;" required="true" type="password" name="user_password" class="form-control" placeholder="Password" id="user_password">
                </div>

                <!-- Password Again -->
                <div class="field margin-bottom-15">
                  <input style="margin-bottom: 10px;" required="true" type="password" name="password_again" class="form-control" placeholder="Repeat Password" id="password_again">
                </div>

                <!-- Submit Button -->
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <input type="submit" class="btn btn-submit" value="Register">



              </form>

            <p class="dont-have-account-link text-center" style="margin-top: 15px;">
              By registering, you agree to our
              <a target="_blank" style="color: #ffd000" href="/tos.php">Terms and Services</a>
            </p>
            <div class="divider" style="margin-top: 10px; margin-bottom: 3px;"></div>
            <p class="dont-have-account-link text-center" style="margin-top: 15px; margin-bottom: 15px;">
              Already have an account? <a target="_blank" style="color: #ffd000" href="/login.php">Log In</a>
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
