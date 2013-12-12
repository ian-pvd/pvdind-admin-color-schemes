<?php
/**
Plugin Name: Admin Color Schemes
Description: Even more admin color schemes
Version: 1.0
Author: WordPress Core Team
Author URI: http://wordpress.org/
Text Domain: admin_schemes
Domain Path: /languages
*/

/*
Copyright 2013 Kelly Dwan, Mel Choyce, Dave Whitley, Kate Whitley

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

class ACS_Color_Schemes {

	/**
	 * List of colors registered in this plugin.
	 *
	 * @since 1.0
	 * @access private
	 * @var array $colors List of colors registered in this plugin. 
	 *                    Needed for registering colors-fresh dependency.
	 */
	private $colors = array( 
		'vinyard', 'primary', '80s-kid', 'aubergine', 
		'cruise', 'flat', 'lawn', 'seashore' 
	);

	function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'load_default_css' ) );
		add_action( 'admin_init' , array( $this, 'add_colors' ) );
	}

	/**
	 * Register color schemes.
	 */
	function add_colors() {
		$suffix = is_rtl() ? '-rtl' : '';

		wp_admin_css_color( 
			'vinyard', __( 'Vinyard', 'admin_schemes' ), 
			plugins_url( "vineyard/colors$suffix.css", __FILE__ ),
			array( '#301D25', '#462b36', '#d3995d', '#eabe3f' ), 
			array( 'base' => '#f1f2f3', 'focus' => '#fff', 'current' => '#fff' )
		);

		wp_admin_css_color( 
			'primary', __( 'Primary', 'admin_schemes' ), 
			plugins_url( "primary/colors$suffix.css", __FILE__ ),
			array( '#282b48', '#35395c', '#f38135', '#e7c03a' ),
			array( 'base' => '#f1f2f3', 'focus' => '#fff', 'current' => '#fff' )
		);

		wp_admin_css_color( 
			'80s-kid', __( '80\'s Kid', 'admin_schemes' ), 
			plugins_url( "80s-kid/colors$suffix.css", __FILE__ ),
			array( '#0A3D80', '#0c4da1', '#ed5793', '#eb853b' ),
			array( 'base' => '#e4e5e7', 'focus' => '#fff', 'current' => '#fff' )
		);

		wp_admin_css_color( 
			'aubergine', __( 'Aubergine', 'admin_schemes' ), 
			plugins_url( "aubergine/colors$suffix.css", __FILE__ ),
			array( '#4c4b5f', '#585a61', '#e87162', '#da9b49' ),
			array( 'base' => '#e4e4e7', 'focus' => '#fff', 'current' => '#fff' )
		);

		wp_admin_css_color( 
			'cruise', __( 'Cruise', 'admin_schemes' ), 
			plugins_url( "cruise/colors$suffix.css", __FILE__ ),
			array( '#292B46', '#36395c', '#8bbc9f', '#d2ac1f' ),
			array( 'base' => '#f1f1f3', 'focus' => '#fff', 'current' => '#fff' )
		);

		wp_admin_css_color( 
			'flat', __( 'Flat', 'admin_schemes' ), 
			plugins_url( "flat/colors$suffix.css", __FILE__ ),
			array( '#1F2C39', '#2c3e50', '#1abc9c', '#f39c12' ),
			array( 'base' => '#f1f2f3', 'focus' => '#fff', 'current' => '#fff' )
		);

		wp_admin_css_color( 
			'lawn', __( 'Lawn', 'admin_schemes' ), 
			plugins_url( "lawn/colors$suffix.css", __FILE__ ),
			array( '#0F1515', '#1e2a29', '#5D824B', '#a7b145' ),
			array( 'base' => '#f1f3f3', 'focus' => '#fff', 'current' => '#fff' )
		);

		wp_admin_css_color( 
			'seashore', __( 'Seashore', 'admin_schemes' ), 
			plugins_url( "seashore/colors$suffix.css", __FILE__ ),
			array( '#F8F6F1', '#d5cdad', '#7D6B5C', '#456a7f' ),
			array( 'base' => '#533C2F', 'focus' => '#F8F6F1', 'current' => '#F8F6F1' )
		);

	}

	/**
	 * Make sure core's default `colors.css` gets enqueued, since we can't
	 * @import it from a plugin stylesheet. Also force-load the default colors 
	 * on the profile screens, so the JS preview isn't broken-looking.
	 */ 
	function load_default_css() {

		global $wp_styles, $_wp_admin_css_colors;

		$color_scheme = get_user_option( 'admin_color' );

		$scheme_screens = apply_filters( 'acs_picker_allowed_pages', array( 'profile', 'profile-network' ) );
		if ( in_array( $color_scheme, $this->colors ) || in_array( get_current_screen()->base, $scheme_screens ) ){
			$wp_styles->registered[ 'colors' ]->deps[] = 'colors-fresh';
		}

	}

}
global $acs_colors;
$acs_colors = new ACS_Color_Schemes;

