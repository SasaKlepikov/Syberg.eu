<?php
/**
 * @package  IGthemes_Options_Framework
 */

/**
 * Sanitization for text input
 */
function igthemes_sanitize_text( $input ) {
    global $allowedtags;
    return wp_kses( $input , $allowedtags );
}
add_filter( 'igthemes_sanitize_text', 'igthemes_sanitize_text' );

/**
 * Sanitization for textarea field
 */
function igthemes_sanitize_textarea( $input ) {
    global $allowedposttags;
    $output = wp_kses( $input, $allowedposttags );
    return $output;
}
add_filter( 'igthemes_sanitize_textarea', 'igthemes_sanitize_textarea' );

/**
 * Sanitization for url field
 */
function igthemes_sanitize_url( $input ) {
    $output = esc_url_raw( $input );
    return $output;
}
add_filter( 'igthemes_sanitize_url', 'igthemes_sanitize_url' );

/**
 * Sanitization for checkbox input
 *
 * @param $input string (1 or empty) checkbox state
 * @return $output '1' or false
 */
function igthemes_sanitize_checkbox( $input ) {
    if ( $input ) {
        $output = '1';
    } else {
        $output = '0';
    }
    return $output;
}
add_filter( 'igthemes_sanitize_checkbox', 'igthemes_sanitize_checkbox' );


/**
 * File upload sanitization.
 *
 * Returns a sanitized filepath if it has a valid extension.
 */
function igthemes_sanitize_upload( $input ) {
    $output = '';
    $filetype = wp_check_filetype( $input );
    if ( $filetype["ext"] ) {
        $output = esc_url_raw( $input );
    }
    return $output;
}
add_filter( 'igthemes_sanitize_upload', 'igthemes_sanitize_upload' );

/**
 * Sanitization of input with allowed tags and wpautotop.
 *
 * Allows allowed tags in html input and ensures tags close properly.
 */
function igthemes_sanitize_allowedtags( $input ) {
    global $allowedtags;
    $output = wpautop( wp_kses( $input, $allowedtags ) );
    return $output;
}

/**
 * Validates that the categories select input
 */
function igthemes_sanitize_cat( $input ) {
    $categories = get_categories();
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    if ( array_key_exists( $input, $cats ) ){
        return $input;
    }
}

/**
 * Validates layout input
 */
function igthemes_sanitize_layout( $input) {
    $valid = array(
        '1col' => '1col',
        '2cl' => '2cl',
        '2cr' => '2cr',
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * Sanitize a color represented in hexidecimal notation.
 */
function igthemes_sanitize_hex( $input, $default = '' ) {
    if ( '' === $input ) {
        return '';
    }
    // 3 or 6 hex digits, or the empty string.
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $input ) ) {
        return $input;
    }
    return null;
}
add_filter( 'igthemes_sanitize_color', 'igthemes_sanitize_hex' );
