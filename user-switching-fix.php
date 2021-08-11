<?php
/**
 * Plugin Name:  User Switching when Wordpress is in subdirectory
 * Plugin URI:   https://github.com/roots/bedrock-autoloader
 * Description:  Fix: Switch back fails when Wordpress is in subdirectory and using custom login page. See: https://github.com/johnbillion/user-switching/issues/14
 * Version:      1.0.0
 * Author:       Smeedijzer Internet
 * Author URI:   https://www.smeedijzer.net
 * License:      MIT License
 */

add_action('wp_die_handler', function($handler) {
    parse_str($_SERVER['QUERY_STRING'], $query);

    if ( $query['action'] === 'switch_to_olduser' ) {
        wp_redirect(get_bloginfo('wpurl') . $_SERVER['REQUEST_URI']);
        exit;
    }

    if ( $query['action'] === 'switch_to_user' ) {
        wp_redirect(get_bloginfo('wpurl') . $_SERVER['REQUEST_URI']);
        exit;
    }

    return $handler;
});

