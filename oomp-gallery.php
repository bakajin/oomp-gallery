<?php

/*
 * Plugin Name: oomp-gallery
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: A clean gallery plugin, theme driven css.
 * Version: A1.0.0
 * Author: Olivier Oskamp - OOMP
 * Author URI: http://oomp.nl
 * Network: true
 * License: GPL2
 *
 */

/*  Copyright 2015  OOMP_OLIVIER_OSKAMP  (email : olivier.oskamp@oomp.nl)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

*/
//:: PSUEDO
    //:: add jquery

/*
 * Enqueue jQuery from Google
 */

function enqueue_jquery() {
   
	wp_enqueue_script('jquery');
   
}

// Only add the javascript if we are NOT on the admin screen
add_action("wp_enqueue_scripts", "enqueue_jquery", 11);

	//:: activate the plugin
function activate_oomp_gallery() {

}

// Hook into footer so gallery becomes active after page loads
add_action('wp_footer','activate_oomp_gallery');	

/*
 *	OOMP Gallery
*/

function oomp_gallery() {

		//globals
	global $post;

	$arguments = array(
		'post_parent'    => $post->ID,			// For the current post
		'post_type'      => 'attachment',		// Get all post attachments
		'post_mime_type' => 'image',			// Only grab images
		'order'			 => 'ASC',				// List in ascending order
		'orderby'        => 'menu_order',		// List them in their menu order
		'numberposts'    => -1, 				// Show all attachments
		'post_status'    => null,				// For any post status
		);

	// Query and retrieve items. Images and videos from the current post.
	echo "<p>.</p>";
    // get images
    // get captions
    // get video
    // get captions
 	$results = get_posts($arguments);

 		if($results) {
 			//init counter
 			$count = 1;
			$htmlstr = '<div class="gallery"><ul>';

 			//iterate through the list
 			foreach($results as $result) {
				$htmlstr .= '<li id="' . $count . '">';

 				$htmlstr .= '</li>';
 				
 				$count++;
 			}

			$htmlstr .='</ul></div>';

			echo $htmlstr;

 		}
}    // set sizes
    // preload

    // get environment, context
    // match template
    	//div container
    		//div list

    // randomise, orderise
    // show content
    // add interface
    // add animations

    // render to page
 		// add the shortcode
 add_shortcode('oomp_gallery', 'oomp_gallery');

?>