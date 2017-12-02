<?php
/**
 * Logged out View.
 */

/** User to check logged in and get user data. */
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- General. -->
    <title>BCTHC</title>
    <meta name="description" content="">

    <!-- Boiler Plate Tags -->
    <?php View::head(); ?>

    <!-- Style Files -->
    <link rel="stylesheet" href="/public/css/home/home-out.css">


</head>
<body>

    <!-- Header Section -->
    <?php View::header_logged_out(); ?>

    <!-- Page Content Holder -->
    <div id="content">
                <div class="navbar-header">
                    <button type="button" style="background-color: #ffd000" id="sidebarCollapse" class="btn navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span></span>
                    </button>
                </div>

                <br><br><br>

                <script>
                if ($(window).width() > 764) {
                  setTimeout(function(){
                    document.getElementById("sidebarCollapse").click()
                  }, 700);
                }
                </script>


                <img class="house-image center-block" src="public/img/house.png">
                <h1 class="house-title text-center">Go Tiny.</h1>

                <p class="join-btn text-center">
                <button type="button" style="background-color: #ffd000" class="btn navbar-btn">
                    <a href="/register.php">Join Our Community</a>
                </button>
              </p>

                <hr class="large-seperator">

                <p class="text-center">Join a community of friendly individuals buying and selling anything tiny house related!<br>Signing up an account is easy and only takes 30 seconds.</p>

                <hr class="large-seperator">

                <img class="featured-image center-block" src="public/img/featured.png">

                <a href="/register.php">
                <div class="col-md-10 col-md-offset-1 grid">





                      <?php
                      $postings = DB::getInstance()->query("SELECT * FROM posts WHERE featured LIKE '1' ORDER BY post_date DESC");
                      $numPosts = 0;
                      if ($postings->count()) {
                          foreach ($postings->results() as $post) {
                            if ($numPosts < 3) {
                              $numPosts = $numPosts + 1;

                          // Get the image for the post.
                          $post_image = DB::getInstance()->get('post_image', array('post_id', '=', $post->post_id));
                              $image = '';

                          // Save into a variable.
                          if ($post_image->count()) {
                              $image = $post_image->first();
                          }

                          // Format the description.
                          $description = substr($post->post_description, 0, 200) . '';

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
                                <div class='thumbnail grid-item'>
                                <img src='{$image->post_image_url}' alt='Post Image'>
                                <div class='caption'>
                                  <h4 class='title' style='margin-top: 10px;'>
                                  {$post->post_title}
                                  </h4>
                                  <hr>
                                  <p class='description'>
                                    {$description}
                                  </p>
                                  <div class='form-divider' style='margin: 5px 0 9px;'></div>
                                  <small class='stats-text'>
                                      <img class='hidden-xs' id='user-post-profile-image' style='border-radius: 100px; width: 40px; height: 40px;' src='{$profile_image}' />
                                      <b>Posted: </b> {$post_date}
                                  </small>
                                  <tags style='display: none;'>{$post->post_tag}</tags>
                                </div>
                            </div>
                          ";
                          }
                        }
                      } else {
                          echo 'There are no posts available.';
                      }
                      ?>

              </div>
            </a>



    </div>
    </div> <!-- end content -->
</div> <!-- end wrapper -->

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
