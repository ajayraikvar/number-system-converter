<?php
// admin/settings-page.php

function nsc_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Number System Converter Settings</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields('nsc_settings_group');
                do_settings_sections('nsc-settings');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

function nsc_register_settings() {
    register_setting('nsc_settings_group', 'nsc_enable_clipboard');
    register_setting('nsc_settings_group', 'nsc_enable_darkmode');

    add_settings_section('nsc_main_section', 'Main Settings', null, 'nsc-settings');

    add_settings_field(
        'nsc_enable_clipboard',
        'Enable Clipboard Copy',
        'nsc_checkbox_clipboard_callback',
        'nsc-settings',
        'nsc_main_section'
    );

    add_settings_field(
        'nsc_enable_darkmode',
        'Enable Dark Mode',
        'nsc_checkbox_darkmode_callback',
        'nsc-settings',
        'nsc_main_section'
    );
}
add_action('admin_init', 'nsc_register_settings');

function nsc_checkbox_clipboard_callback() {
    $checked = get_option('nsc_enable_clipboard') ? 'checked' : '';
    echo "<input type='checkbox' name='nsc_enable_clipboard' $checked />";
}

function nsc_checkbox_darkmode_callback() {
    $checked = get_option('nsc_enable_darkmode') ? 'checked' : '';
    echo "<input type='checkbox' name='nsc_enable_darkmode' $checked />";
}
