<?php
/**
 * The index page is the featured page of the website.
 * @uses controllers/FeaturedController - Controls the featured page.
 * @uses views/Featured/featured            - For the pages UI.
 */

/** REQUIRED Import For App Initialization. */
require_once (getcwd() . "/core/init.php");

/** Load the pages controller. */
Controller::load('FeaturedController');

/** Load the pages view. */
View::load('Featured');
?>
