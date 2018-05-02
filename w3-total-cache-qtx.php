<?php
/*
Plugin Name: W3 Total Cache qTranslate-X Extension
Description: W3 Total Cache qTranslate-X Extension
Version: 1.0
Plugin URI: https://github.com/cheplv/w3-total-cache-qtx
Author: Yuri Cherepanov
Author URI: https://github.com/cheplv
Network: True
*/

if ( !defined( 'ABSPATH' ) ) {
    die();
}

/**
 * Class autoloader
 *
 * @param string  $class Classname
 */
function w3tc_qtx_class_autoload( $class ) {
    if ( substr( $class, 0, 8 ) == 'W3TCQTX\\' ) {
        $filename = dirname( __FILE__ ) . DIRECTORY_SEPARATOR .
            substr( $class, 8 ) . '.php';

        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            if ( !file_exists( $filename ) ) {
                debug_print_backtrace();
            }
        }
        
        require $filename;
    }
}

spl_autoload_register( 'w3tc_qtx_class_autoload' );

add_action( 'w3tc_extensions', array(
        '\W3TCQTX\Extension_QTX_Admin',
        'w3tc_extensions'
    ), 10, 2 );
