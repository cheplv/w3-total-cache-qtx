<?php
namespace W3TCQTX;

/**
 * Backend functionality of an extension.
 * This class is loaded only for wp-admin/ requests
 */
class Extension_QTX_Admin {
    /**
     * w3tc_extensions filter handler
     *
     * @param array   $extensions array of extension descriptors to fill
     * @param Config  $config     w3-total-cache configuration
     * @return array
     */
    static public function w3tc_extensions( $extensions, $config ) {
        $requirements = [];
        $plugin_enabled = true;

        if (!defined('QTX_VERSION')) {
            error_log('qtranslate-x is not active' . ' - ' . defined('QTX_VERSION'));
            $requirements[] = 'Ensure "qTranslate-X" plugin availability, which is not currently active.';
            $plugin_enabled= false;
        }
        
        $extensions['qtx'] = array (
            'name' => 'qTranslate-X',
            'author' => 'Yuri Cherepanov',
            'description' => __( 'qTranslate-X support for w3 total cache' ),
            'author_uri' => 'https://github.com/cheplv/',
            'extension_uri' => 'https://github.com/cheplv/w3-total-cache-qtx/',
            'extension_id' => 'qtx',
            'settings_exists' => false,
            'version' => '1.0',
            'enabled' => $plugin_enabled,
            'requirements' => implode(', ', $requirements),
            'path' => 'w3-total-cache-qtx/Extension_QTX.php'
        );

        return $extensions;
    }



    /**
     * Entry point of extension for wp-admin/ requests
     */
    public function run() {
    }

}
