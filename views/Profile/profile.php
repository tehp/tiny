<?php
/**
 * Profile page view.
 */

/** User to check logged in and get user data. */
$user_current = new User();

/** For the current user on the profile. */
$user = new User();

// Error message if user doesn't exist.
$not_found = 'User does not exist!';

// Variable for the profile image URL.
$profile = null;

// Default Profile Image
$default_image = 'http://s3.amazonaws.com/cdn.roosterteeth.com/default/original/user_profile_female.jpg';

// Checks if user exists, all numbers/letters, and is 13 characters long.
if (isset($_GET["user"]) && ctype_alnum($_GET["user"]) && strlen($_GET["user"]) == 13) {

  // Add user_ prefix to ID.
  $user_id = 'user_' . $_GET["user"];

  // SELECT * FROM users WHERE user_id = 'user_590914d2a7062';
  $users = DB::getInstance()->get('users', array('user_id', '=', $user_id));

  // If the user exists.
  if ($users->count()) {
      $user = $users->first();

      // Get the profile image for the user.
      $user_profile = DB::getInstance()->get('users_profile', array('user_id', '=', $user->user_id));

      // Save image URL into a variable.
      if ($user_profile->count()) {
          $profile = $user_profile->first();
      }
  }
} else {
    Redirect::to('404.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- General. -->
    <title>BCTHC | Profile</title>
    <meta name="description" content="">

    <!-- Boiler Plate Tags. -->
    <?php View::head(); ?>

    <!-- Style Files. -->
    <link rel="stylesheet" href="/public/css/profile/profile.css">

    <!-- Script Files. -->
    <script src="/public/js/show-more.js" type="text/javascript"></script>
    <script src="/public/js/profile/profile.js" type="text/javascript"></script>

  </head>
  <body>

    <!-- Header Section -->
    <?php View::header_logged_in(); ?>

    <div id="content">
                <div class="navbar-header row">
                    <button type="button" style="background-color: #ffd000" id="sidebarCollapse" class="btn navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span></span>
                    </button>
                </div>
                <br><br><br>

                <!-- Profile Top // Start -->
                  <div class="profile-area">

                    <!-- Display Users Information -->
                    <div class="row">

                      <!-- Profile Image -->
                      <div id="user-profile-image">
                        <img class="center-block" src="
                        <?php
                        if ($profile->profile_image_url !== '') {
                            echo "{$profile->profile_image_url}";
                        } else {
                            echo "{$default_image}";
                        }
                        ?>
                        " style="width: 150px; height: width; border-radius: 10px;" alt="Profile Image">
                      </div>

</div>

                      <!-- Users Full Name -->
                      <div id="user-full-name">
                        <?php
                        echo "<div class='name'>";
                        echo ucfirst($user->user_first) . ' ' . ucfirst($user->user_last);
                        echo "</div>";
                        ?>
                      </div>

                      <!-- Users Location -->
                      <?php
                      if ($user->user_location !== '') {
                          echo "
                        <div id='user-location'>
                          <p>{$user->user_location}</p>
                        </div>
                        ";
                      }
                      ?>

                      <div class="form-divider" style="width: 35px; background-color: #ececec; border-radius: 16px;"></div>

                      <!-- Profile Description -->
                      <?php
                      if ($profile->profile_description !== '') {
                          echo "
                        <div id='profile-description'>
                          <p>{$profile->profile_description}</p>
                        </div>
                        ";
                      }
                      ?>


                  </div>
                  <hr>
                  <p>See recent posts by <?php echo ucfirst($user->user_first) ?>:</p>
                  <hr>

                <section id="users-posts">
                  <div class="container-fluid" id="users-posts-divider">
                    <!-- Middle Divider -->
                    <div class="row text-center" id="user-posts-divider">
                    </div>
                  </div>

                  <!-- All Of The Users Postings -->
                  <div class="container" id="users-posts-content">

                    <?php
                    $postings = DB::getInstance()->get('posts', array('user_id', '=', $user->user_id));

                    if ($postings->count()) {
                        foreach ($postings->results() as $post) {

                          // $post->post_title;
                          // $post->post_description;
                          // Convert the date.
                          $post_date = strtotime($post->post_date);
                            $post_date = date('Y-m-d', $post_date);

                          // Get the ID for the posting.
                          $post_listing_url = '/listing.php?post=' . substr($post->post_id, 5);

                            echo "
                          <!-- User Post -->
                          <div class='row item' style='margin-bottom: 20px;'>
                              <div class='user-post-display'>
                                <a href='{$post_listing_url}'>
                                  <h3 style='text-transform: capitalize;'>{$post->post_title}</h3>
                                  <div class='form-divider' style='margin: 10px 0 10px;'></div>
                                  <p id='post_description'>{$post->post_description}</p>
                                  <div class='form-divider' style='margin: 10px 0 10px;'></div>
                                  <p id='post-date'>Posted On {$post_date}</p>
                                  </a>
                            </div>
                          </div>
                          ";
                        }
                    } else {
                        echo "
                      <!-- User Post -->
                      <div class='row'>
                            <h3>This person hasn't made any posts yet. Shame!</h3>
                      </div>
                      ";
                    }
                    ?>

                  </div>
                </section>

              </div>
    </div>
</div>






  </body>
</html>
