<?php
/* Global Nav  */
	// Nav Walker
		class basic_walker_nav_menu extends Walker_Nav_Menu {
	    public function start_lvl( &$output, $depth = 0, $args = array() ) {
	      $output .= '<ul class="nav__list">';
	    }
	    public function end_lvl( &$output, $depth = 0, $args = array() ) {
	      $output .= '</ul>';
	    }
	    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	      $classes = array();
	      if( !empty( $item->classes ) ) {
	          $classes = (array) $item->classes;
	      }

	      $active_class = '';
	      if( in_array('current-menu-item', $classes) ) {
	          $active_class = ' class="active"';
	      } else if( in_array('current-menu-parent', $classes) ) {
	          $active_class = ' class="active-parent"';
	      } else if( in_array('current-menu-ancestor', $classes) ) {
	          $active_class = ' class="active-ancestor"';
	      }

	      $url = '';
	      if( !empty( $item->url ) ) {
	          $url = $item->url;
	      }

	      $output .= '<li'. $active_class . '><a href="' . $url . '">' . $item->title . '</a></li>';
	    }
	    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
	       $output .= '</li>';
	    }
		}// basic_walker_nav_menu

// Register - Global Nav
	function basic_nav() {
	  register_nav_menu('basic-nav-menu',__( 'Basic Nav' ));
	}
	add_action( 'init', 'basic_nav' );
?>
