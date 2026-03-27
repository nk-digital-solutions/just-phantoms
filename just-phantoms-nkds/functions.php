<?php
/**
 * Just Phantoms - NKDS Child Theme Functions
 */

/* -------------------------------------------------------
 * 1. Enqueue styles
 * ----------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'just_phantoms_nkds_enqueue_styles' );

function just_phantoms_nkds_enqueue_styles() {
    $uri = get_stylesheet_directory_uri();
    $v   = wp_get_theme()->get( 'Version' );

    // Google Fonts
    wp_enqueue_style(
        'jp-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Core stylesheet
    wp_enqueue_style(
        'jp-global',
        $uri . '/assets/css/global.css',
        array( 'jp-google-fonts' ),
        $v
    );

    // Page-specific stylesheets — loaded only on matching templates
    $template = get_page_template_slug();

    $page_styles = array(
        'page-home.php'              => 'homepage',
        'page-fleet.php'             => 'fleet',
        'page-services.php'          => 'services',
        'page-reviews.php'           => 'reviews',
        'page-faq.php'               => 'faq',
        'page-quote.php'             => 'quote',
    );

    foreach ( $page_styles as $tmpl => $handle ) {
        if ( $template === $tmpl ) {
            wp_enqueue_style(
                'jp-' . $handle,
                $uri . '/assets/css/' . $handle . '.css',
                array( 'jp-global' ),
                $v
            );
        }
    }
}

/* -------------------------------------------------------
 * 2. Enqueue scripts
 * ----------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'just_phantoms_nkds_enqueue_scripts' );

function just_phantoms_nkds_enqueue_scripts() {
    $uri = get_stylesheet_directory_uri();
    $v   = wp_get_theme()->get( 'Version' );

    // Global JS (always loaded)
    wp_enqueue_script(
        'jp-global',
        $uri . '/assets/js/global.js',
        array(),
        $v,
        true
    );

    $template = get_page_template_slug();

    // Homepage extras
    if ( $template === 'page-home.php' ) {
        wp_enqueue_script( 'jp-homepage', $uri . '/assets/js/homepage.js', array( 'jp-global' ), $v, true );
        wp_enqueue_script( 'jp-google-reviews', $uri . '/assets/js/google-reviews.js', array( 'jp-global' ), $v, true );
    }

    // Fleet page
    if ( $template === 'page-fleet.php' ) {
        wp_enqueue_script( 'jp-fleet', $uri . '/assets/js/fleet.js', array( 'jp-global' ), $v, true );
    }

    // FAQ page
    if ( $template === 'page-faq.php' ) {
        wp_enqueue_script( 'jp-faq', $uri . '/assets/js/faq.js', array( 'jp-global' ), $v, true );
    }

    // Reviews page
    if ( $template === 'page-reviews.php' ) {
        wp_enqueue_script( 'jp-reviews', $uri . '/assets/js/reviews.js', array( 'jp-global' ), $v, true );
        wp_enqueue_script( 'jp-google-reviews', $uri . '/assets/js/google-reviews.js', array( 'jp-global' ), $v, true );
    }

    // Quote page
    if ( $template === 'page-quote.php' ) {
        wp_enqueue_script( 'jp-quote', $uri . '/assets/js/quote.js', array( 'jp-global' ), $v, true );
    }

    // Vehicle detail pages (gallery)
    $vehicle_templates = array(
        'page-phantom.php', 'page-range-rover.php', 'page-cayenne-limo.php',
        'page-mustang.php', 'page-vintage.php', 'page-regent.php', 'page-bentley-limo.php',
    );
    if ( in_array( $template, $vehicle_templates, true ) ) {
        wp_enqueue_script( 'jp-gallery', $uri . '/assets/js/gallery.js', array( 'jp-global' ), $v, true );
    }
}

/* -------------------------------------------------------
 * 3. Theme support
 * ----------------------------------------------------- */
add_action( 'after_setup_theme', 'just_phantoms_nkds_setup' );

function just_phantoms_nkds_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    // Register a primary nav menu (optional — nav is currently hardcoded)
    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'just-phantoms-nkds' ),
    ) );
}

/* -------------------------------------------------------
 * 4. Quote form AJAX handler
 * ----------------------------------------------------- */
add_action( 'wp_ajax_nopriv_jp_submit_quote', 'jp_handle_quote_submission' );
add_action( 'wp_ajax_jp_submit_quote',        'jp_handle_quote_submission' );

function jp_handle_quote_submission() {
    // Verify nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'jp_quote_nonce' ) ) {
        wp_send_json_error( array( 'message' => 'Security check failed.' ), 403 );
    }

    // Collect and sanitize fields
    $name    = sanitize_text_field( wp_unslash( $_POST['fullName']    ?? '' ) );
    $email   = sanitize_email(      wp_unslash( $_POST['email']       ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['phone']       ?? '' ) );
    $vehicle = sanitize_text_field( wp_unslash( $_POST['vehicleType'] ?? '' ) );
    $date    = sanitize_text_field( wp_unslash( $_POST['eventDate']   ?? '' ) );
    $pickup  = sanitize_text_field( wp_unslash( $_POST['pickupAddress'] ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['notes']   ?? '' ) );

    if ( ! $name || ! is_email( $email ) || ! $phone ) {
        wp_send_json_error( array( 'message' => 'Please fill in all required fields.' ) );
    }

    $to      = 'info@justphantoms.com';
    $subject = 'New Quote Request — ' . $vehicle;
    $body    = "Name: $name\nEmail: $email\nPhone: $phone\nVehicle: $vehicle\nDate: $date\nPickup: $pickup\nNotes: $message";
    $headers = array( 'Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email );

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( array( 'message' => 'Your quote request has been sent!' ) );
    } else {
        wp_send_json_error( array( 'message' => 'There was a problem sending your request. Please call us directly.' ) );
    }
}
