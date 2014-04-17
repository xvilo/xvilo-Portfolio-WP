<?php
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

add_action( 'init', 'register_my_menu' );
add_theme_support( 'post-thumbnails' ); 

function allow_more_pubs( $limit ) {
    return 30;
}
add_filter( 'wppa_list_limit', 'allow_more_pubs' );

?>