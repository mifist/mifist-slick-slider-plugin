<?php
/**
 * Created by PhpStorm.
 * User: avant
 * Date: 10.02.17
 * Time: 1:43
 */

echo '<div class="row mifist-plugin">';
echo '<br /><h1 class="mif-admin-title">' . get_admin_page_title() . '</h1>';
echo '<div class="small-12 medium-12 large-6 columns">	
		<h3>'. _x("This plugin is an alternative free variant to this plugin of", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'
			<a href="http://maxgalleria.com/downloads/slick-slider-for-wordpress/" target="_blank">MaxGlleria</a>.
		</h3>
		<h3> '. _x("His possibility with examples can look", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'
			<a href="http://kenwheeler.github.io/slick/" target="_blank">here</a>.
		</h3>
			<h4>'. _x("Features of Slick Slider", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</h4>
			<p>Для проверки шорткодов:<br />
			Ajax shortcode - [mifist_ajax_guest_book]<br />
			Guest Book shortcode - [mifist_guest_book]<br />
			</p>
<ul class="features">
 	<li>'. _x("Fully responsive. Scales with its container.", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</li>
 	<li>'. _x("Separate settings per breakpoint", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</li>
 	<li>'. _x("Uses CSS3 when available. Fully functional when not.", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</li>
 	<li>'. _x("Swipe enabled. Or disabled, if you prefer.", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</li>
 	<li>'. _x("Desktop mouse dragging", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</li>
 	<li>'. _x("Infinite looping.", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</li>
 	<li>'. _x("Fully accessible with arrow key navigation", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</li>
 	<li>'. _x("Add, remove, filter unfilter slides", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</li>
 	<li>'. _x("Autoplay, dots, arrows, callbacks, etc...", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</li>
</ul>


	</div>
	<div class="small-12 medium-12 large-6 columns">
	<h4>'. _x("In version 1.0 implemented:", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</h4>
	<p>'. _x("output with do_shortcode fields \"Title\", \"Description\" and \"Text\".", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</p>
	<h4>'. _x("The result of the plug-in:", MIFISTSLICK_PlUGIN_TEXTDOMAIN) .'</h4> '.
	do_shortcode('
		[mifshortcode]
			[mifdescription title="Some title 1" description="Some description 1"]Some content 1[/mifdescription]
			[mifdescription title="Some title 2" description="Some description 2"]Some content 2[/mifdescription]
		[/mifshortcode] 
	') .'</div></div>';

	




