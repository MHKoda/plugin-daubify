<?php 
/*
 * Plugin Name: Daubify
 * Version: 1.1
 */

include_once (plugin_dir_path(__FILE__) . 'vendor/advanced-custom-fields/acf.php');

/*
 * Intégration du plugin ACF
 */

//  1. Customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');

    function my_acf_settings_path ($path){
        //update path
        $path = plugin_dir_path(__FILE__) . 'vendor/advanced-custom-fields/';

        //return
        return $path;
    }

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir ($dir){
    //update path
    $dir = plugin_dir_url(__FILE__) . 'vendor/advanced-custom-fields/';

    //return
    return $dir;
}

// 3. Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');

include 'acf_base_function.php';

include 'call_albums.php';