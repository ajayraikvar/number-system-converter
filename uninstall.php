<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package NumberSystemConverter
 */

// If uninstall not called from WordPress, exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

// Delete plugin options from the database
delete_option('nsc_enable_clipboard');
delete_option('nsc_enable_darkmode');
