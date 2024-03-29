<?php
/**
 * The post form is used to get
 * the data to create a new post.
 */

// To hold all errors in the input form.
$errors = null;
$image_error = null;

// If a flash success message exists, print the message.
if (Session::exists('errors')) {
    $errors = Session::flash('errors');
}

// If a flash success message exists, print the message.
if (Session::exists('image_error')) {
    $image_error = Session::flash('image_error');
    if ($image_error === '') {
        $image_error = null;
    }
}
?>

<section class="main">
  <div class="container">
    <br><br><br>

    <!-- New Post Header -->
    <div class="row">
      <div class="text-center col-sm-6 col-sm-offset-3" id="post-form-header">
        <h3 id="new-post-title">Create a New Listing</h3>
      </div>
    </div>

    <!-- New Post Form -->
    <div class="row">

      <div class="col-sm-6 col-sm-offset-3" id="post-form">

          <form method="POST" enctype="multipart/form-data">

            <!-- Display Input Form Errors -->
            <div class="form-group has-error">
              <?php
              if (isset($errors)) {
                  foreach ($errors as $error) {
                      echo '<span class="help-block">* ' . $error . '</span>';
                  }
              }

              if (isset($image_error)) {
                  echo '<span class="help-block">* ' . $image_error . '</span>';
              }
              ?>
            </div>

            <!-- Title -->
            <div class="form-group">
              <label for="post_title">Title <span class="require">*</span></label>
              <input required="true" tabindex="0" type="text" class="form-control post_input" name="post_title" id="post_title" autocomplete="off" placeholder="Wood, a house, your skills..." />
              <small id="title-count" class="form-count-display"><span id="title-counter">0</span>/50</small>
            </div>
            <hr>

            <!-- Pickup Location -->
            <div class="form-group">
              <label for="post_pickup_location">Location <span class="require">*</span></label>
              <input required="true" tabindex="0" type="text" class="form-control post_input" name="post_pickup_location" id="post_pickup_location" placeholder="4908 North Broadway St." />
              <small id="pickup-count" class="form-count-display"><span id="pickup-counter">0</span>/80</small>
            </div>
            <hr>

            <!-- Description -->
            <div class="form-group">
              <label for="post_description">Description <span class="require">*</span></label>
              <textarea required="true" tabindex="0" rows="5" class="form-control post_input" name="post_description" id="post_description" placeholder="Describe your post in as much detail as you can!"></textarea>
              <small id="description-count" class="form-count-display"><span id="description-counter">0</span>/500</small>
            </div>
            <hr>

            <!-- Image Upload -->
            <div class="form-group">
              <label for="post_image">Post Image <span class="require">*</span></label>
              <label class="btn btn-default btn-file">
                  Upload Image
                  <input class="form-control post_input" type="file" name="post_image" id="post_image" required="true" accept="image/jpeg,image/x-png,image/png,/image/jpg"/>
              </label>
            </div>

            <hr>

            <!-- Tags -->
            <div class="form-group">
              <label for="post_tag" style="padding-bottom: 5px;">Select All That Apply</label>
              <br>
              <div class="btn-group col-md-12" data-toggle="buttons">

                  <label class="btn btn-default post-tags">
                      <input type="checkbox" name="post_tag[]" id="post_tag" value="Housing Sale">Housing Sale
                  </label>

                  <label class="btn btn-default post-tags">
                      <input type="checkbox" name="post_tag[]" id="post_tag" value="Housing Rent">Housing Rental
                  </label>

                  <label class="btn btn-default post-tags">
                      <input type="checkbox" name="post_tag[]" id="post_tag" value="Lot Sale">Lot Sales
                  </label>

                  <label class="btn btn-default post-tags">
                      <input type="checkbox" name="post_tag[]" id="post_tag" value="Lot Rent">Lot Rental
                  </label>

                  <label class="btn btn-default post-tags">
                      <input type="checkbox" name="post_tag[]" id="post_tag" value="Materials">Materials
                  </label>

                  <label class="btn btn-default post-tags">
                      <input type="checkbox" name="post_tag[]" id="post_tag" value="Services">Services
                  </label>

                  <label class="btn btn-default post-tags">
                      <input type="checkbox" name="post_tag[]" id="post_tag" value="Community">Community
                  </label>


              </div>
            </div>

            <br class="hidden-xs"><br class="hidden-xs">
            <hr>

            <!-- Required Field Reminder -->
            <div class="form-group">
              <small><span class="require">*</span> required fields</small>
            </div>

            <!-- Submit/Cancel Buttons -->
            <div class="form-group">
              <input type="hidden" name="token" value="<?php echo escape(Token::generate()); ?>">
              <button type="submit" value="upload" id="post-btn" class="btn" style="background-color: #ffd300">Create Listing</button>
            </div>
            <p class="disclaimer text-center">
              By posting, you agree to our
              <a href="/tos.php">Terms and Services</a>
            </p>
        </form>

      </div>
    </div>
  </div>
</section>
