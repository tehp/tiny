<?php
/**
 * Update View.
 */

$user = new User();
$user_description = DB::getInstance()->get('users_profile', array('user_id', '=', $user->data()->user_id));
$description = '';

if ($user_description->count()) {
    $description = $user_description->first()->profile_description;
}
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
    <link rel="stylesheet" href="/public/css/update/update.css">

  </head>
  <body>

    <!-- Header Section -->
    <?php View::header_logged_in(); ?>


    <div id="content">
                <div class="navbar-header">
                    <button type="button" style="background-color: #ffd000" id="sidebarCollapse" class="btn navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span></span>
                    </button>
                </div>


                <!-- Update Profile Information // Start -->
                <section class="main">
                  <div class="container update-area">

                    <!-- Update Form Header -->
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3" id="update-form-header">
                        <h3 class="center" id="update-page-title">Edit Your Profile</h3>
                      </div>
                    </div>

                    <!-- Update Form -->
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3" id="update-info-form">

                        <?php
                        /** Check whether the user had a information update. */
                        if (Session::exists('updated')) { // Start
                        ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <span class="ss-icon" id="update-success-icon"></span> <?php echo Session::flash('updated'); ?>
                            </div>
                        <?php

                        } // End

                        if (Session::exists('validation_errors')) {
                            $form_errors = Session::flash('validation_errors');

                            foreach ($form_errors as $error) {
                                $error = explode('/', $error);
                                $error_message = $error[1];

                                echo "
                                <div class='alert alert-danger alert-dismissible' role='alert' style='padding-top: 6px; padding-bottom: 5px;'>
                                  <span class='ss-icon' style='position: relative; top: 2px; right: 2px;'>Alert</span>
                                  <span class='sr-only'>Error:</span>
                                  {$error_message}
                                </div>
                                ";
                            }
                        }
                        ?>

                        <form method="post">

                          <!-- Profile Description -->
                          <div class="form-group" style="margin-bottom: -20px;">
                            <a href="/profileimage.php" style="text-decoration: none !important;">
                              <?php
                              $profile_image = DB::getInstance()->get('users_profile', array('user_id', '=', $user->data()->user_id));
                              $profile_image = $profile_image->first();

                              if($profile_image->profile_image_url) {
                                echo "
                                <div class='row'>
                                  <div class='col-sm-4 col-sm-offset-4'>
                                    <img style='height: 75px; width: 75px; display: block; margin: auto; border-radius: 100px; margin-bottom: 25px; object-fit: cover;' src='{$profile_image->profile_image_url}'>
                                  </div>
                                </div>
                                ";
                              } else {
                                echo "
                                <div class='row'>
                                  <div class='col-sm-4 col-sm-offset-4'>
                                    <img style='height: 75px; width: 75px; display: block; margin: auto; border-radius: 100px; margin-bottom: 25px; object-fit: cover;' src='http://s3.amazonaws.com/cdn.roosterteeth.com/default/original/user_profile_female.jpg'>
                                  </div>
                                </div>
                                ";
                              }
                              ?>
                            </a>
                          </div>

                          <hr>

                          <!-- First Name -->
                          <div class="form-group">
                            <label for="user_first">First Name</label>
                            <input type="text" name="user_first" class="form-control" id="user_first" placeholder="First Name" value="<?php echo escape($user->data()->user_first); ?>">
                          </div>

                          <hr>

                          <!-- Last Name -->
                          <div class="form-group">
                            <label for="user_last">Last Name</label>
                            <input type="text" name="user_last" class="form-control" id="user_last" placeholder="Last Name" value="<?php echo escape($user->data()->user_last); ?>">
                          </div>

                          <hr>

                          <!-- Email Address -->
                          <div class="form-group">
                            <label for="user_email">Email Address</label>
                            <input type="email" name="user_email" class="form-control" id="user_email" placeholder="Email Address" value="<?php echo escape($user->data()->user_email); ?>">
                          </div>

                          <hr>

                          <!-- Profile Description -->
                          <div class="form-group">
                            <label for="profile_description">Profile Description</label>
                            <textarea rows="4" class="form-control post_input" name="profile_description" placeholder="Profile Description" class="form-control" id="profile_description" placeholder="Profile Description"><?php echo escape($description); ?></textarea>
                          </div>

                          <hr>

                          <?php
                            // Get the location of the user.
                            $location = $user->data()->user_location;
                          ?>

                          <div class="form-group">
                            <label for="user_location">Vancouver Location:</label>
                            <select class="form-control" name="user_location" id="user_location">
                              <option <?php if($location === 'Vancouver') { echo 'selected'; } ?> disabled>Choose Location</option>
                              <option <?php if($location === 'Downtown Vancouver') { echo 'selected'; } ?> value="Downtown Vancouver">Downtown Vancouver</option>
                              <option <?php if($location === 'East Side') { echo 'selected'; } ?> value="East Side">East Side</option>
                              <option <?php if($location === 'Burnaby') { echo 'selected'; } ?> value="Burnaby">Burnaby</option>
                              <option <?php if($location === 'New Westminster') { echo 'selected'; } ?> value="New Westminster">New Westminster</option>
                              <option <?php if($location === 'Richmond') { echo 'selected'; } ?> value="Richmond">Richmond</option>
                              <option <?php if($location === 'North Shore') { echo 'selected'; } ?> value="North Shore">North Shore</option>
                              <option <?php if($location === 'Tri-Cities') { echo 'selected'; } ?> value="Tri-Cities">Tri-Cities</option>
                              <option <?php if($location === 'Delta') { echo 'selected'; } ?> value="Delta">Delta</option>
                              <option <?php if($location === 'Surrey') { echo 'selected'; } ?> value="Surrey">Surrey</option>
                            </select>
                          </div>

                          <hr>

                          <!-- Submit Buttons -->
                          <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                          <input type="submit" class="btn btn-default update-btn" id="update-btn" name="submit" value="Update">
                        </form>
                      </div>
                    </div>

                  </div>
                </section>

              </div>
    </div>
</div>



  </body>
</html>
