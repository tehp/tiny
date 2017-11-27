<?php
/**
 * The listing page displays information
 * about a specific post given a post id.
 */

/** User to check logged in and get user data. */
$user = new User();

$cur_user_id = $user->data()->user_id;
$cur_user_role = $user->data()->user_type;

/* The posters information. */
$poster = null;

// Variable for the profile image URL.
$profile_image = null;

// Image variable.
$image = null;

// Get the link to a users profile.
$user_profile_url = null;

// Link for the new chat link.
$user_chat_url = null;

// Variable to store the psters location.
$posters_location = null;

// Checks if post exists, all numbers/letters, and is 13 characters long.
if (isset($_GET["post"]) && ctype_alnum($_GET["post"]) && strlen($_GET["post"]) == 13) {

  // Add post_ prefix to ID.
  $post_id = 'post_' . $_GET["post"];

  // SELECT * FROM posts WHERE post_id = 'id here';
  $posting = DB::getInstance()->get('posts', array('post_id', '=', $post_id));

  // If the post exists.
  if ($posting->count()) {
    $post = $posting->first();

    // Get the image for the post.
    $post_image = DB::getInstance()->get('post_image', array('post_id', '=', $post->post_id));

    // Save into a variable.
    $image = $post_image->first();

    // Get the profile image for the user.
    $user_profile = DB::getInstance()->get('users_profile', array('user_id', '=', $post->user_id));

    // Get the user that the post belongs to.
    $poster = DB::getInstance()->get('users', array('user_id', '=', $post->user_id));
    $poster = $poster->first();

    // Get profile image.
    $profile_image = DB::getInstance()->get('users_profile', array('user_id', '=', $post->user_id));
    $profile_image = $profile_image->first();

    // Get the link to a users profile.
    $user_profile_url = '/profile.php?user=' . substr($poster->user_id, 5);

    // Get the link to a users profile.
    $user_chat_url = '/newchat.php?user=' . substr($poster->user_id, 5);

    // TODO: add production url here
      $post_listing_url = 'http://localhost:8888/listing.php?post=' . substr($post->post_id, 5);
  }
} else {
    // No posting found, redirect.
  Redirect::to('404.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- TODO: Echo tags here -->
    <!-- <meta name="keywords" content=""> -->

    <!-- Boiler Plate Tags. -->
    <?php View::head(); ?>

    <!-- General. -->
    <title>BCTHC: <?php echo $post->post_title ?></title>
    <meta name="description" content="BCTCH: <?php echo $post->post_title ?>">


    <!-- Open Graph Meta Tags. -->
    <meta property="og:url" content="<?php echo $post_listing_url ?>">
    <meta property="og:title" content="<?php echo $post->post_title ?>">
    <meta property="og:description" content="<?php echo $post->post_description ?>">
    <meta property="og:site_name" content="">
    <meta property="og:image" content="">
    <meta property="og:type" content="website">

    <!-- Twitter Display Meta Tags. -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="<?php echo $post->post_title ?>">
    <meta name="twitter:creator" content="">
    <meta name="twitter:description" content="<?php echo $post->post_description ?>">
    <meta name="twitter:image:src" content="">

    <!-- Google Plus Meta Tags. -->
    <meta itemprop="name" content="<?php echo $post->post_title ?>">
    <meta itemprop="description" content="<?php echo $post->post_description ?>">
    <meta itemprop="image" content="">

    <!-- Styling Sheets. -->
    <link rel="stylesheet" href="/public/css/listing/listing.css">

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






                <!-- Main Posting Content -->
                <section class="main">
                  <div class="container" id="area">

                    <!-- Posting Information -->
                    <div class="col-md-10 col-md-offset-1">

                      <?php

                        if($profile_image->profile_image_url) {
                          $profile_image = $profile_image->profile_image_url;
                        } else {
                          $profile_image = 'http://s3.amazonaws.com/cdn.roosterteeth.com/default/original/user_profile_female.jpg';
                        }


                          echo "
                          <!-- Post Listing -->
                          <div class='col-md-8 col-md-offset-2' id='post-information'>

                            <div id='listing-title'>
                              <h3>{$post->post_title}</h3>
                            </div>

                            <div class='form-divider'></div>

                            <div id='listing-image'>
                              <img src='{$image->post_image_url}'>
                            </div>

                            <div class='form-divider'></div>

                            <div id='listing-poster-info'>
                              <img style='width: 100px; height: 100px;' src='{$profile_image}' id='profile-img' alt='Profile Image'/>
                              <p id='posted-by'>
                              Posted By
                              <a href='{$user_profile_url}'>{$poster->user_first} {$poster->user_last}</a><br>
                              <small>Lives In {$poster->user_location}</small>
                              </p>
                            </div>

                            <div class='form-divider'></div>

                            <p>{$post->post_description}</p>
                            <hr>

                            <small>
                              <b>Pickup Location:</b>
                              {$post->post_pickup_location}
                            </small>
                            <br>

                            <small>
                              <b>Tags:</b>
                              {$post->post_tag}
                            </small>
                            <br>

                            <small>
                              <b>Post Date:</b>
                              {$post->post_date}
                            </small>
                            <br><br>
                            <div class='share-buttons'>
                              <h6 style='padding-bottom: 10px;'>Share on: </h6>
                              <ul>
                                <li>
                                  <a href='https://twitter.com/intent/tweet?text={$post_listing_url}' class='twitter btn' title='Share on Twitter'><i class='fa fa-twitter'></i><span> Twitter</span></a>
                                </li>
                                <li>
                                  <a href='https://www.facebook.com/sharer/sharer.php?u={$post_listing_url}' class='facebook btn' title='Share on Facebook'><i class='fa fa-facebook'></i><span> Facebook</span></a>
                                </li>
                                <li>
                                  <a href='https://plus.google.com/share?url={$post_listing_url}' class='google-plus btn' title='Share on Google Plus'><i class='fa fa-google-plus'></i><span> Google+</span></a>
                                </li>
                              </ul>


                          </div>
                          ";

                          if ($cur_user_role == "mod") {
                            echo "<br>";
                            echo "<hr>Administration Tools:<br>";
                            echo "<form method='post'>
                            <input type='submit' name='feature_post' id='feature_post' value='FEATURE POST' /><br/>
                            <br>
                            <input type='submit' name='delete_post' id='delete_post' value='DELETE POST' /><br/>

                            </form>";
                          }

                          if ($poster->user_id == $cur_user_id) {
                            echo "<br>";
                            echo "<hr>My Post<br>";
                            echo "<form method='post'>
                            <input type='submit' name='delete_post' id='delete_post' value='DELETE POST' /><br/>
                            </form>";
                          }

                      ?>



                      <?php
                      if(array_key_exists('delete_post', $_POST)){
                        DB::getInstance()->delete('posts', array('post_id', '=', $post_id));
                        DB::getInstance()->delete('post_image', array('post_id', '=', $post_id));
                         echo "Post has been deleted. You can leave this page when you wish.";
                      }

                      ?>
                      <?php
                      if(array_key_exists('feature_post', $_POST)){
                       if(DB::getInstance()->updateFeatured('posts', '\'' . $post_id . '\'', array(
                       'featured' => '1'))) {
                        echo "Post has been featured. You can leave this page when you wish.";
                        }
                      }


                      ?>
                      <hr></div>
                      <br><br><br><br><br>

                    </div>

                  </div>
                </section>

        </div>
    </div>
</div>

  </body>
</html>
