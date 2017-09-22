<?php
$user = new User();

// Get the link to a users profile.
$user_profile_url = '/profile.php?user=' . substr($user->data()->user_id, 5);
?>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">


		</div>

		<!-- Collapsable navbar and regular nav items. -->
		<div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="bs-example-navbar-collapse-1">

			<!-- Side bar menu items -->
			<ul class="nav navbar-nav visible-xs">



				<?php
                $profile_image = DB::getInstance()->get('users_profile', array('user_id', '=', $user->data()->user_id));
                $profile_image = $profile_image->first();

                if ($profile_image->profile_image_url) {
                    echo '
					<li>
						<img src=" ' . $profile_image->profile_image_url . '" id="side-bar-profile-image" alt="Profile Image">
						<p id="side-bar-name">' . escape($user->data()->user_first) . ' ' . escape($user->data()->user_last) . '</p>
						<a href="' . escape($user_profile_url) . '" id="side-bar-profile">view profile</a>
					</li>
					';
                } else {
                    echo '
					<li>
						<img src="https://static1.squarespace.com/static/56ba4348b09f95db7f71a726/t/58d7f267ff7c50b172895560/1490547315597/justin.jpg" id="side-bar-profile-image" alt="Profile Image">
						<p id="side-bar-name">' . escape($user->data()->user_first) . ' ' . escape($user->data()->user_last) . '</p>
						<a href="' . escape($user_profile_url) . '" id="side-bar-profile">view profile</a>
					</li>
					';
                }
                ?>

				<li>
					<a href="post.php" class="side-bar-link">
						<span class="side-bar-link-text">NEW LISTING</span>
					</a>
				</li>

				<li>
					<a href="update.php" class="side-bar-link">
						<span class="side-bar-link-text">EDIT PROFILE</span>
					</a>
				</li>

				<li>
					<a href="changepassword.php" class="side-bar-link">
						<span class="side-bar-link-text">CHANGE PASSWORD</span>
					</a>
				</li>

				<li>
					<a href="mailto:hello@maccraig.net" class="side-bar-link">
						<span class="side-bar-link-text">CONTACT US</span>
					</a>
				</li>


				<li>
					<a href="logout.php" id="side-bar-logout">
						<span class="side-bar-link-text">LOGOUT</span>
					</a>
				</li>

			</ul>

			<!-- Large view items -->
			<ul class="nav navbar-nav navbar-right hidden-xs">

					<li><a href="<?php echo escape($user_profile_url); ?>">Profile</a></li>
					<li><a href="/messages.php">Messages</a></li>
					<li><a href="mailto:hello@maccraig.net">Support</a></li>


			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
