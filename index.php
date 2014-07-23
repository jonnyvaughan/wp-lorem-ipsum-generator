<?php
/*

Plugin Name: Lorem Ipsum Button
Plugin URI: http://www.github.com/jonnyvaughan/lorem-ipsum-generator
Description: Creates a button on the WordPress editor toolbar to insert a configurable amount of Lorem Ipsum placeholder text.
Version: 0.3

Author: Jonny Vaughan
Author URI: http://twitter.com/jonnyvaughan/
License: GPL2

Copyright 2014  Jonny Vaughan  (email : jonny@10degrees.uk)

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
*/

function lorem_ipsum_addbuttons() {
   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "lorem_ipsum_plugin", 0);
     add_filter('mce_buttons', 'register_lorem_ipsum_button');
   } 
}
 
function register_lorem_ipsum_button($buttons) {
   array_push($buttons, "separator", "loremipsum");
   return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function lorem_ipsum_plugin($plugin_array) {

	$plugin_array['loremipsum'] = plugins_url('/wp-lorem-ipsum-generator/lorem_plugin.js');

  	return $plugin_array;
}
 
// init process for button control
add_action('init', 'lorem_ipsum_addbuttons');

?>