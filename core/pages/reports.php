<?php
/**
 * Class ClientDash_Page_Reports
 *
 * Creates the toolbar submenu item and the page for Reports.
 *
 * @package WordPress
 * @subpackage Client Dash
 *
 * @since Client Dash 1.5
 */
class ClientDash_Page_Reports extends ClientDash {
	/**
	 * The main construct function.
	 *
	 * @since Client Dash 1.5
	 */
	function __construct() {
		// Add the menu item to the toolbar
		add_action( 'admin_menu', array( $this, 'add_submenu_page' ) );
	}

	/**
	 * Adds the sub-menu item to the toolbar.
	 *
	 * @since Client Dash 1.5
	 */
	public function add_submenu_page() {
		global $ClientDash;

		// Check to make sure there is a content block set, there aren't any filters disabling
		// the page, and the page isn't disabled in Settings
		if ( ! empty( $ClientDash->content_blocks['reports'] )
		     && apply_filters( 'cd_show_reports_page', true )
		     && ! get_option( 'cd_hide_page_reports' )
		) {
			add_submenu_page(
				'index.php',
				'Reports Information',
				'Reports',
				'publish_posts',
				'cd_reports',
				array( $this, 'page_output' )
			);
		}
	}

	/**
	 * The page content.
	 *
	 * @since Client Dash 1.5
	 */
	public function page_output() {
		?>
		<div class="wrap cd-reports">
			<?php
			$this->the_page_title( 'reports' );
			$this->create_tab_page();
			?>
		</div>
	<?php
	}
}