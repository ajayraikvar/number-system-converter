<?php
// admin/admin-menu.php

function nsc_register_admin_menu() {
    add_menu_page(
        'Number Converter Settings',
        'Number Converter',
        'manage_options',
        'nsc-settings',
        'nsc_render_settings_page',
        'dashicons-calculator',
        100
    );
}
add_action('admin_menu', 'nsc_register_admin_menu');
