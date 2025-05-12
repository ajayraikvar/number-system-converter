<?php
// includes/update-checker.php

function nsc_check_for_updates() {
    $remote_json_url = 'https://raw.githubusercontent.com/ajayraikvar/number-system-converter/92e51effc9b59688bb5b5dc004646f0a27f7e797/nsc-update.json'; // Replace with actual URL
    $current_version = '1.0.0'; // Current plugin version

    // Fetch remote version info
    $response = wp_remote_get($remote_json_url);

    if (is_wp_error($response)) {
        return;
    }

    $body = wp_remote_retrieve_body($response);
    $update_data = json_decode($body, true);

    if (isset($update_data['version']) && version_compare($current_version, $update_data['version'], '<')) {
        // New version available
        nsc_display_update_notification($update_data);
    }
}

function nsc_display_update_notification($update_data) {
    echo '<div class="updated"><p>';
    echo 'A new version of the Number System Converter plugin is available. <a href="' . esc_url($update_data['download_url']) . '" target="_blank">Click here to download it.</a>';
    echo '</p></div>';
}

add_action('admin_init', 'nsc_check_for_updates');
