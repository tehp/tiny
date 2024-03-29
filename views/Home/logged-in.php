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
    <!-- <script src="/public/js/homepage.js" type="text/javascript"></script> -->
    <script src="/public/js/search.js" type="text/javascript"></script>
    <script src="/public/js/filter.js" type="text/javascript"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

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
                <br><br><br>

                <!-- Main Content -->

                  <!-- Search Bar -->
                  <input class="nice-input center-block" type="text" class="main-search" placeholder="Search..." id="search-2" name="search-2" data-toggle="hideseek" data-list=".default_list_data" data-nodata="No Stores found" autocomplete="off">


                  <div style="margin-top: 10px; margin-bottom: 35px; background-color: #ebeff3; color: black; border-top-right-radius: 2px; border-top-left-radius: 2px; border-top: 4px solid #ffd000;" class="row center-block" id="filters">
                      <div class="radio">
                        <label class="radio-inline"><input id="rad0" type="radio" name="optradio">No Filter</label>
                        <label class="radio-inline"><input id="rad1" type="radio" name="optradio">Housing Sale</label>
                        <label class="radio-inline"><input id="rad2" type="radio" name="optradio">Housing Rental</label>
                        <label class="radio-inline"><input id="rad3" type="radio" name="optradio">Lot Sales</label>
                        <label class="radio-inline"><input id="rad4" type="radio" name="optradio">Lot Rental</label>
                        <label class="radio-inline"><input id="rad5" type="radio" name="optradio">Materials</label>
                        <label class="radio-inline"><input id="rad6" type="radio" name="optradio">Services</label>
                        <label class="radio-inline"><input id="rad7" type="radio" name="optradio">Community</label>
                    </div>
                  </div>


                <!-- Display Listings -->
                  <div class="container-fluid">

                    <!-- Recent Posts. -->

                      <?php /** Check whether the user had a successful post. */
                      if (Session::exists('successful_post')) { // Start
                      ?>
                          <div style="margin-left: 10px; margin-right: 10px;"class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo Session::flash('successful_post'); ?>
                          </div>
                          <br>
                      <?php

                      } // End

                      ?>

                      <!-- Display Grid For Posts. -->
                      <div class="grid">





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


                                // NOTE: USE {$image->post_image_url} instead of temp url to image
                                    echo "
                                    <a href='{$post_listing_url}'>
                                      <div class='thumbnail grid-item'>
                                      <img src='{$image->post_image_url}' alt='Post Image' style='border-radius: 3px;'>
                                      <div class='caption'>
                                        <h4 class='title' style='margin-top: 10px;'>
                                        {$post->post_title}
                                        </h4>
                                        <hr>
                                        <p class='description'>
                                          {$description}
                                          <a href='{$post_listing_url}' style='color: #68C5F8 !important; font-family: proximanova-regular; letter-spacing: 0.5px;'>read more</a>
                                        </p>
                                        <div class='form-divider' style='margin: 5px 0 9px;'></div>
                                        <small class='stats-text'>
                                            <img class='hidden-xs' id='user-post-profile-image' style='border-radius: 100px; width: 40px; height: 40px;' src='{$profile_image}' />
                                            <b>Posted: </b> {$post_date}
                                        </small>
                                        <tags style='display: none;'>{$post->post_tag}</tags>
                                      </div>
                                  </div>
                                  </a>
                                ";
                                }
                            } else {
                                echo 'There are no posts available.';
                            }
                            ?>

                    </div>
                  </div>

                  <script src="/public/js/isotope.js" type="text/javascript"></script>
                  <script>
                  var $grid = $('.grid').isotope({
                    itemSelector: '.grid-item',
                    transitionDuration: '2',
                    percentPosition: true,
                    layoutMode: 'masonry'
                  });
                  </script>


                </body>
                </html>
              </div>
    </div>
</div>
