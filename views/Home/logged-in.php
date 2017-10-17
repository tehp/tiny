<?php
/**
 * Logged in page view.
 */

/** User to check logged in and get user data. */
$user = new User();

// Get the link to a users profile.
$user_profile_url = '/profile.php?user=' . substr($user->data()->user_id, 5);
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- General. -->
    <title>Welcome, <?php echo escape($user->data()->user_first) ?></title>
    <meta name="description" content="">

    <!-- Boiler Plate Tags. -->
    <?php View::head(); ?>

    <!-- Style Files. -->
    <link rel="stylesheet" href="/public/css/home-in/home-in.css">

    <!-- Script Files -->
    <script src="/public/js/masonry.js" type="text/javascript"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="/public/js/loading.js" type="text/javascript"></script>
    <script src="/public/js/search.js" type="text/javascript"></script>
    <script src="/public/js/filter.js" type="text/javascript"></script>

  </head>
  <body>

    <?php
    $user = new User();

    // Get the link to a users profile.
    $user_profile_url = '/profile.php?user=' . substr($user->data()->user_id, 5);
    ?>
    <!-- Header Section -->
    <?php View::header_logged_in(); ?>



    <div id="content">
                <div class="navbar-header">
                    <button type="button" style="background-color: #ffd000" id="sidebarCollapse" class="btn navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span></span>
                    </button>
                </div>

                <!-- Main Content -->
                <section class="main">

                  <div class="container">
                    <!-- Search Bar -->
                    <div class="row" id="search-bar-area">
                      <div class="col-md-10 col-md-offset-1">
                        <input type="text" class="main-search" placeholder="Search..." id="search-2" name="search-2" data-toggle="hideseek" data-list=".default_list_data" data-nodata="No Stores found" autocomplete="off">
                        <span class="ss-icon search-icon">search</span>
                      </div>
                    </div>

                  </div>
                </section>

                <!-- Display Listings -->
                <section class="listings">
                  <div class="container-fluid">

                    <!-- Recent Posts. -->
                    <div class="row" id="listing-rows">

                      <?php /** Check whether the user had a successful post. */
                      if (Session::exists('successful_post')) { // Start
                      ?>
                          <div class="alert alert-success alert-dismissible col-lg-10 col-lg-offset-1" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo Session::flash('successful_post'); ?>
                          </div>

                      <?php

                      } // End

                      ?>

                      <!-- Display Grid For Posts. -->
                      <div class="col-md-10 col-md-offset-1 grid">

                        <div class="grid-sizer"></div>

                            <?php
                            $postings = DB::getInstance()->query("SELECT * FROM posts ORDER BY post_date DESC");

                            if ($postings->count()) {
                                foreach ($postings->results() as $post) {

                                // Get the image for the post.
                                $post_image = DB::getInstance()->get('post_image', array('post_id', '=', $post->post_id));
                                    $image = '';

                                // Save into a variable.
                                if ($post_image->count()) {
                                    $image = $post_image->first();
                                }

                                // Format the description.
                                $description = substr($post->post_description, 0, 100) . '...';

                                // Convert the date.
                                $post_date = strtotime($post->post_date);
                                $post_date = date('Y-m-d', $post_date);

                                // Get profile image.
                                $profile_image = DB::getInstance()->get('users_profile', array('user_id', '=', $post->user_id));
                                $profile_image = $profile_image->first();

                                if($profile_image->profile_image_url) {
                                  $profile_image = $profile_image->profile_image_url;
                                } else {
                                  $profile_image = 'http://s3.amazonaws.com/cdn.roosterteeth.com/default/original/user_profile_female.jpg';
                                }

                                // Get the ID for the posting.
                                $post_listing_url = '/listing.php?post=' . substr($post->post_id, 5);

                                    echo "
                                  <div class='thumbnail grid-item'>
                                    <a href='{$post_listing_url}'>
                                      <img src='{$image->post_image_url}' class='img-responsive' alt='Post Image'>
                                      <div class='caption'>
                                        <p class='title'>
                                        {$post->post_title}
                                        </p>
                                        <p class='description'>
                                          {$description}
                                          <a href='{$post_listing_url}' style='color: #50ba4a !important; font-family: proximanova-regular; letter-spacing: 0.5px;'>read more</a>
                                        </p>
                                        <div class='form-divider' style='margin: 5px 0 9px;'></div>
                                        <small class='stats-text'>
                                            <b>Posted: </b> {$post_date}
                                            <img class='hidden-xs' id='user-post-profile-image' src='{$profile_image}' />
                                        </small>
                                        <tags style='display: none;'>{$post->post_tag}</tags>
                                      </div>
                                    </a>
                                  </div>
                                ";
                                }
                            } else {
                                echo 'There are no posts available.';
                            }
                            ?>

                        </div>
                    </div>
                  </div>
                </section>
                </body>
                </html>



              </div>
    </div>
</div>
