<?php
namespace W3TCQTX;

use W3TC\Dispatcher;

class Extension_QTX {
    private $_config;
    
    function __construct() {
        $this->_config = Dispatcher::config();
    }
    
    public function run() {
        add_filter( 'w3tc_url_to_docroot_filename',
            array( $this, 'w3tc_url_to_docroot_filename' ) );
    }
    
    
    
    public function w3tc_url_to_docroot_filename( $data ) {
        $home_url = $data['home_url'];
        if ( substr( $data['url'], 0, strlen( $home_url ) ) != $home_url ) {
            $data['home_url'] = get_option( 'home' );
        }
        
        return $data;
    }
}


/*
This file is simply loaded by W3 Total Cache in a case if extension is active.
Its up to extension what will it do or which way will it do.
*/
$p = new Extension_QTX();
$p->run();

if ( is_admin() ) {
    $p = new Extension_QTX_Admin();
    $p->run();
}
