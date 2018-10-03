<?php
/**
 * Plugin Name: PVD Industrial WP Admin Colors
 * Plugin URI: https://github.com/ian-pvd/pvdind-admin-color-schemes/
 * Author: PVD Industrial
 * Description: Another 16 additional color schemes for your WP admin
 * Version: 0.1
 * Author URI: http://pvdind.com
 * Text Domain: pvd_colors
 * Domain Path: /languages
 */

/*
No Copyright 2018 PVD Industrial

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

class PVD_Color_Schemes {

	/**
	 * List of colors registered in this plugin.
	 *
	 * @since 1.0
	 * @access private
	 * @var array $colors List of colors registered in this plugin.
	 *                    Needed for registering colors-fresh dependency.
	 */
	private $colors = array(
		'industrial',
		'industrial-dark',
	);

	function __construct() {
		add_action( 'admin_init' , array( $this, 'add_colors' ) );
	}

	/**
	 * Register color schemes.
	 */
	function add_colors() {
		$suffix = is_rtl() ? '-rtl' : '';

		wp_admin_css_color(
			'industrial', __( 'Industrial', 'pvd_colors' ),
			plugins_url( "themes/industrial/colors$suffix.css", __FILE__ ),
			array( '#242824', '#386F38', '#3FA63F', '#F1F2F1' ),
			array( 'base' => '#F1F2F1', 'focus' => '#FFF', 'current' => '#FFF' )
		);

		wp_admin_css_color(
			'industrial-dark', __( 'Industrial Dark', 'pvd_colors' ),
			plugins_url( "themes/industrial-dark/colors$suffix.css", __FILE__ ),
			array( '#090a09', '#181A18', '#3F693F', '#A2A8A2' ),
			array( 'base' => '#A2A8A2', 'focus' => '#FFF', 'current' => '#FFF' )
		);

	}

}
global $pvd_colors;
$pvd_colors = new PVD_Color_Schemes;

