<?php
// includes/functions.php

function nsc_convert_number($input, $from_base) {
    $from_base = strtolower($from_base);
    
    switch ($from_base) {
        case 'binary':
            $dec = bindec($input);
            break;
        case 'decimal':
            $dec = intval($input);
            break;
        case 'octal':
            $dec = octdec($input);
            break;
        case 'hex':
            $dec = hexdec($input);
            break;
        default:
            return false;
    }

    return [
        'binary' => decbin($dec),
        'decimal' => (string) $dec,
        'octal' => decoct($dec),
        'hex' => strtoupper(dechex($dec))
    ];
}

// AJAX handler (optional future enhancement)
add_action('wp_ajax_nsc_convert', 'nsc_handle_conversion');
add_action('wp_ajax_nopriv_nsc_convert', 'nsc_handle_conversion');

function nsc_handle_conversion() {
    $number = sanitize_text_field($_POST['number']);
    $base = sanitize_text_field($_POST['base']);

    $result = nsc_convert_number($number, $base);
    wp_send_json_success($result);
}
