<?php
$user = new User();

// Get the link to a users profile.
$user_profile_url = '/profile.php?user=' . substr($user->data()->user_id, 5);
?>

<!--
<nav class="navbar navbar-default" role="navigation">
          <a href="login.php"  class="btn btn-default navbar-btn" > sign in </a>
          <a href="register.php" class="btn btn-default navbar-btn" > register </a>
</nav>
-->

<div class="wrapper">
    <!-- Sidebar Holder -->
    <div id="sidebar-style">
    <nav id="sidebar">
        <div class="sidebar-header">
          <br>
					<h3><a href="/">Tiny House Marketplace</a></h3>
            <br>
        </div>

        <ul class="list-unstyled components">
            <p>Welcome, <?php echo ucfirst(escape($user->data()->user_first)) ?>!</p>
						<li>
                <a href="/post.php">New Post</a>

            </li>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Account</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li><a href="/logout.php">Sign Out</a></li>
                    <li><a href="<?php echo escape($user_profile_url); ?>">View Profile</a></li>
										<li><a href="/update.php">Update Info</a></li>
                    <li><a href="/changepassword.php">Change Password</a></li>
                    <li><a href="/profileimage.php">Profile Image</a></li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="/featured.php">Featured</a>
            </li>
            <li>
                <a href="#">Categories</a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Legal Stuff</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms Of Service</a></li>
                    <li><a href="#">User Agreement</a></li>
                </ul>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li><a href="#" class="download">Contact Us</a></li>
            <li><a href="#" class="article">Help</a></li>
        </ul>
    </nav>


		<!-- THIS CODE GOES ON EVERY PAGE
		    <div id="content">
		                <div class="navbar-header">
		                    <button type="button" style="background-color: #ffd000" id="sidebarCollapse" class="btn navbar-btn">
		                        <i class="glyphicon glyphicon-align-left"></i>
		                        <span></span>
		                    </button>
		                </div>
		              </div>
		    </div>
		</div>
		-->



<!-- jQuery CDN -->
 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <!-- Bootstrap Js CDN -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- jQuery Nicescroll CDN -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

 <script type="text/javascript">
     $(document).ready(function () {
         $("#sidebar").niceScroll({
             cursorcolor: '#ffffff',
             cursorwidth: 0,
             cursorborder: 'none'
         });

         $('#sidebarCollapse').on('click', function () {
             $('#sidebar, #content').toggleClass('active');
             $('.collapse.in').toggleClass('in');
             $('a[aria-expanded=true]').attr('aria-expanded', 'false');
         });
     });
 </script>
