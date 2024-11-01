<?php
/**
 * Description Add Relation "UGC" Attributes to links in Comments
 *
 * @package WP_Add_Rel_UGC_To_Comments
 * @version 1.0.0
 */

/*
Plugin Name: WP Add Rel UGC to Comments
Plugin URI: http://wordpress.org/plugins/wp-add-rel-ugc-to-comments/
Description: Add rel="ugc" Attribute to links in Comments.
Version: 1.0.0
Author: Abhishek Deshpande
Author URI: https://www.whoisabhi.com/
License: GPLv2 or later

WP Add Rel UGC to Comments is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version.

WP Add Rel UGC to Comments is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with WP Add Rel UGC to Comments. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
**/

// Do not remove attributes from Admin Area.
if ( isset( $_SERVER['REQUEST_URI'] ) && strpos( wp_unslash( $_SERVER['REQUEST_URI'] ), 'wp-admin' ) === false ) {
	add_filter( 'comment_text', 'wpm_add_rel_ugc' );
	add_filter( 'get_comment_author_link', 'wpm_add_rel_ugc' );
}

/**
 * Replace's Nofollow with ugc.
 *
 * @param  string $text Link Tag.
 * @return string       Formated Link Tag.
 */
function wpm_add_rel_ugc( $text ) {
	$text = str_ireplace( 'nofollow', 'ugc', $text );

	// Check if has rel tag.
	if ( ! preg_match( '/rel=/', $text ) ) {
		$text = str_replace( 'href=', 'rel="ugc" href=', $text );
	}

	return $text;
}
