<?php
/**
 * Just Phantoms NKDS — functions.php
 * Theme setup, asset enqueuing, and WordPress integrations.
 */

defined( 'ABSPATH' ) || exit;

/* ─────────────────────────────────────────
 * 1. Theme Setup
 * ───────────────────────────────────────── */
function jp_theme_setup() {
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable post thumbnails.
	add_theme_support( 'post-thumbnails' );

	// HTML5 output.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
	) );

	// Wide/full alignment blocks.
	add_theme_support( 'align-wide' );

	// Custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 90,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Register navigation menus.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'just-phantoms' ),
		'footer'  => __( 'Footer Navigation', 'just-phantoms' ),
	) );

	// Make theme images available in editor.
	add_editor_style( 'assets/css/main.css' );
}
add_action( 'after_setup_theme', 'jp_theme_setup' );

/* ─────────────────────────────────────────
 * 2. Enqueue Styles & Scripts
 * ───────────────────────────────────────── */
function jp_enqueue_assets() {
	$ver = '2.0.0';
	$uri = get_template_directory_uri();

	// Google Fonts — Poppins.
	wp_enqueue_style(
		'jp-google-fonts',
		'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	// Main stylesheet.
	wp_enqueue_style(
		'jp-main',
		$uri . '/assets/css/main.css',
		array( 'jp-google-fonts' ),
		$ver
	);

	// Global JS (navigation, footer year, etc.).
	wp_enqueue_script(
		'jp-global',
		$uri . '/assets/js/global.js',
		array(),
		$ver,
		true // Load in footer.
	);

	// Page-specific scripts.
	if ( is_front_page() ) {
		wp_enqueue_script( 'jp-homepage', $uri . '/assets/js/homepage.js', array( 'jp-global' ), $ver, true );
	}

	if ( jp_is_page_template( 'fleet' ) ) {
		wp_enqueue_script( 'jp-fleet', $uri . '/assets/js/fleet.js', array( 'jp-global' ), $ver, true );
	}

	if ( jp_is_page_template( 'quote' ) || jp_is_page_template( 'wedding-quote' ) || jp_is_page_template( 'prom-quote' ) ) {
		wp_enqueue_script( 'jp-quote', $uri . '/assets/js/quote.js', array( 'jp-global' ), $ver, true );

		// Google Places API for address autocomplete.
		wp_enqueue_script(
			'google-places',
			'https://maps.googleapis.com/maps/api/js?key=AIzaSyCVxEnH2y-zmEp7bnvb5biffCZhiYDSDhM&libraries=places&callback=initGooglePlaces',
			array( 'jp-quote' ),
			null,
			true
		);

		// reCAPTCHA v3.
		wp_enqueue_script(
			'google-recaptcha',
			'https://www.google.com/recaptcha/api.js?render=' . JP_RECAPTCHA_SITE_KEY,
			array(),
			null,
			true
		);
	}

	if ( jp_is_page_template( 'reviews' ) ) {
		wp_enqueue_script( 'jp-reviews', $uri . '/assets/js/reviews.js', array( 'jp-global' ), $ver, true );
		wp_enqueue_script( 'jp-google-reviews', $uri . '/assets/js/google-reviews.js', array( 'jp-reviews' ), $ver, true );
	}

	if ( jp_is_page_template( 'faq' ) ) {
		wp_enqueue_script( 'jp-faq', $uri . '/assets/js/faq.js', array( 'jp-global' ), $ver, true );
	}

	// Vehicle gallery script (any vehicle page template).
	if ( jp_is_vehicle_page() ) {
		wp_enqueue_script( 'jp-gallery', $uri . '/assets/js/gallery.js', array( 'jp-global' ), $ver, true );
	}

	// Pass AJAX URL to scripts.
	wp_localize_script( 'jp-global', 'jpAjax', array(
		'ajaxUrl'         => admin_url( 'admin-ajax.php' ),
		'nonce'           => wp_create_nonce( 'jp_quote_nonce' ),
		'siteUrl'         => home_url(),
		'themeUri'        => $uri,
		'recaptchaSiteKey'=> JP_RECAPTCHA_SITE_KEY,
	) );
}
add_action( 'wp_enqueue_scripts', 'jp_enqueue_assets' );

/* ─────────────────────────────────────────
 * 3. Helper Functions
 * ───────────────────────────────────────── */

/**
 * Check if the current page uses a specific page template slug.
 */
function jp_is_page_template( string $slug ): bool {
	return is_page_template( "page-templates/template-{$slug}.php" );
}

/**
 * Check if we're on any vehicle page template.
 */
function jp_is_vehicle_page(): bool {
	$vehicle_templates = array(
		'template-phantom.php',
		'template-cayenne-limo.php',
		'template-bentley-chrysler-limo.php',
		'template-mustang-gt500.php',
		'template-range-rover.php',
		'template-regent-landaulette.php',
		'template-vintage.php',
	);
	foreach ( $vehicle_templates as $tpl ) {
		if ( is_page_template( "page-templates/{$tpl}" ) ) {
			return true;
		}
	}
	return false;
}

/**
 * Return the theme's assets directory URI.
 */
function jp_assets( string $path = '' ): string {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

/* ─────────────────────────────────────────
 * 4a. Quote Submissions Custom Post Type
 * ───────────────────────────────────────── */

// ── reCAPTCHA v3 keys — replace with your real keys from g.co/recaptcha ──
define( 'JP_RECAPTCHA_SITE_KEY',   '6Ld2pqIsAAAAAFuLMwV29FbIXdzfwmpxbEPrmYlf' );
define( 'JP_RECAPTCHA_SECRET_KEY', '6Ld2pqIsAAAAACDE6L-g9cQi5rEtTjGBaV-EMk_M' );
function jp_register_quote_cpt() {
	register_post_type( 'jp_quote', array(
		'label'               => 'Quote Submissions',
		'labels'              => array(
			'name'               => 'Quote Submissions',
			'singular_name'      => 'Quote Submission',
			'menu_name'          => 'Quote Submissions',
			'all_items'          => 'All Submissions',
			'view_item'          => 'View Submission',
			'search_items'       => 'Search Submissions',
			'not_found'          => 'No submissions found.',
			'not_found_in_trash' => 'No submissions in trash.',
		),
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-email-alt',
		'capability_type'     => 'post',
		'capabilities'        => array( 'create_posts' => 'do_not_allow' ),
		'map_meta_cap'        => true,
		'supports'            => array( 'title' ),
		'has_archive'         => false,
	) );
}
add_action( 'init', 'jp_register_quote_cpt' );

/* Admin list columns for Quote Submissions */
add_filter( 'manage_jp_quote_posts_columns', function( $cols ) {
	return array(
		'cb'         => $cols['cb'],
		'title'      => 'Name',
		'jp_email'   => 'Email',
		'jp_phone'   => 'Phone',
		'jp_type'    => 'Type',
		'jp_vehicle' => 'Vehicle',
		'jp_date'    => 'Event Date',
		'jp_email_ok'=> 'Email Sent',
		'date'       => 'Submitted',
	);
} );
add_action( 'manage_jp_quote_posts_custom_column', function( $col, $post_id ) {
	$map = array(
		'jp_email'   => '_jp_email',
		'jp_phone'   => '_jp_phone',
		'jp_type'    => '_jp_form_type',
		'jp_vehicle' => '_jp_vehicle',
		'jp_date'    => '_jp_event_date',
		'jp_email_ok'=> '_jp_email_sent',
	);
	if ( isset( $map[ $col ] ) ) {
		$val = get_post_meta( $post_id, $map[ $col ], true );
		if ( $col === 'jp_email_ok' ) {
			echo $val === 'yes' ? '<span style="color:#0a0">&#10003; Yes</span>' : '<span style="color:#c00">&#10007; No</span>';
		} else {
			echo esc_html( $val );
		}
	}
}, 10, 2 );
add_filter( 'manage_edit-jp_quote_sortable_columns', function( $cols ) {
	$cols['jp_date']    = '_jp_event_date';
	$cols['jp_email_ok']= '_jp_email_sent';
	return $cols;
} );

/* Dropdown filter by quote type */
add_action( 'restrict_manage_posts', function( $post_type ) {
	if ( $post_type !== 'jp_quote' ) return;
	$current = isset( $_GET['jp_filter_type'] ) ? sanitize_text_field( $_GET['jp_filter_type'] ) : '';
	echo '<select name="jp_filter_type">';
	echo '<option value="">All Types</option>';
	foreach ( array( 'wedding' => 'Wedding', 'prom' => 'Prom', 'general' => 'General' ) as $val => $label ) {
		printf( '<option value="%s"%s>%s</option>', esc_attr( $val ), selected( $current, $val, false ), esc_html( $label ) );
	}
	echo '</select>';
} );

add_action( 'pre_get_posts', function( $query ) {
	if ( ! is_admin() || ! $query->is_main_query() ) return;
	if ( $query->get( 'post_type' ) !== 'jp_quote' ) return;
	$type = isset( $_GET['jp_filter_type'] ) ? sanitize_text_field( $_GET['jp_filter_type'] ) : '';
	if ( $type ) {
		$query->set( 'meta_key', '_jp_form_type' );
		$query->set( 'meta_value', $type );
	}
} );

/* Show all submission fields in a meta box on the edit screen */
add_action( 'add_meta_boxes', function() {
	add_meta_box( 'jp_quote_details', 'Submission Details', function( $post ) {
		$fields = array(
			'_jp_form_type'  => 'Quote Type',
			'_jp_email'      => 'Email',
			'_jp_phone'      => 'Phone',
			'_jp_vehicle'    => 'Vehicle',
			'_jp_event_date' => 'Event Date',
			'_jp_pickup'     => 'Pickup',
			'_jp_destination'=> 'Destination',
			'_jp_notes'      => 'Notes',
			'_jp_email_sent' => 'Email Sent',
		);
		echo '<table style="width:100%;border-collapse:collapse">';
		foreach ( $fields as $key => $label ) {
			$val = get_post_meta( $post->ID, $key, true );
			echo '<tr><th style="text-align:left;padding:6px 8px;width:130px;color:#555">' . esc_html( $label ) . '</th>';
			echo '<td style="padding:6px 8px">' . nl2br( esc_html( $val ) ) . '</td></tr>';
		}
		echo '</table>';
	}, 'jp_quote', 'normal', 'high' );
} );

/* ─────────────────────────────────────────
 * 4. Quote Form AJAX Handler
 * ───────────────────────────────────────── */
function jp_handle_quote_submission() {
	// Verify nonce.
	if ( ! check_ajax_referer( 'jp_quote_nonce', 'jp_nonce', false ) ) {
		wp_send_json_error( array( 'message' => 'Security check failed.' ), 403 );
		return;
	}

	// Verify reCAPTCHA v3 token.
	$recaptcha_token = isset( $_POST['recaptcha_token'] ) ? sanitize_text_field( $_POST['recaptcha_token'] ) : '';
	if ( $recaptcha_token ) {
		$response = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', array(
			'body' => array(
				'secret'   => JP_RECAPTCHA_SECRET_KEY,
				'response' => $recaptcha_token,
				'remoteip' => $_SERVER['REMOTE_ADDR'],
			),
		) );
		if ( ! is_wp_error( $response ) ) {
			$body  = json_decode( wp_remote_retrieve_body( $response ), true );
			$score = isset( $body['score'] ) ? floatval( $body['score'] ) : 0;
			// Block if score below 0.4 (likely bot). Human = 1.0, bot = 0.0.
			if ( ! isset( $body['success'] ) || ! $body['success'] || $score < 0.4 ) {
				wp_send_json_error( array( 'message' => 'Spam check failed. Please try again or call us directly.' ), 403 );
				return;
			}
		}
	}

	// Sanitise input.
	$name        = sanitize_text_field( $_POST['fullName']    ?? '' );
	$email       = sanitize_email(      $_POST['email']       ?? '' );
	$phone       = sanitize_text_field( $_POST['phone']       ?? '' );
	$vehicle     = sanitize_text_field( $_POST['vehicleType'] ?? '' );
	$event_date  = sanitize_text_field( $_POST['eventDate']   ?? '' );
	$pickup      = sanitize_textarea_field( $_POST['pickupSearch'] ?? '' );
	$destination = sanitize_textarea_field( $_POST['destSearch']   ?? '' );
	$notes       = sanitize_textarea_field( $_POST['message']      ?? '' );
	$form_type   = sanitize_text_field( $_POST['quoteType']   ?? 'general' );

	// Basic validation.
	if ( ! $name || ! is_email( $email ) || ! $phone ) {
		wp_send_json_error( array( 'message' => 'Please fill in all required fields.' ), 422 );
		return;
	}

	// ── Save submission to database FIRST (backup regardless of email outcome) ──
	$post_id = wp_insert_post( array(
		'post_type'   => 'jp_quote',
		'post_status' => 'publish',
		'post_title'  => sanitize_text_field( $name . ' — ' . ucfirst( $form_type ) . ' — ' . $event_date ),
	) );

	if ( $post_id && ! is_wp_error( $post_id ) ) {
		update_post_meta( $post_id, '_jp_form_type',   $form_type );
		update_post_meta( $post_id, '_jp_email',       $email );
		update_post_meta( $post_id, '_jp_phone',       $phone );
		update_post_meta( $post_id, '_jp_vehicle',     $vehicle );
		update_post_meta( $post_id, '_jp_event_date',  $event_date );
		update_post_meta( $post_id, '_jp_pickup',      $pickup );
		update_post_meta( $post_id, '_jp_destination', $destination );
		update_post_meta( $post_id, '_jp_notes',       $notes );
		update_post_meta( $post_id, '_jp_email_sent',  'pending' );
	}

	// Build email body.
	$subject = sprintf( '[Just Phantoms] New %s Quote Request from %s', ucfirst( $form_type ), $name );
	$body    = "New quote enquiry received:\n\n";
	$body   .= "Name:        {$name}\n";
	$body   .= "Email:       {$email}\n";
	$body   .= "Phone:       {$phone}\n";
	$body   .= "Vehicle:     {$vehicle}\n";
	$body   .= "Event Date:  {$event_date}\n";
	$body   .= "Pickup:      {$pickup}\n";
	$body   .= "Destination: {$destination}\n";
	$body   .= "Notes:       {$notes}\n";
	$body   .= "\nSubmitted: " . current_time( 'mysql' );

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
		'Cc: naiyaab@nkds.co.uk',
	);

	$sent = wp_mail( 'info@justphantoms.co.uk', $subject, $body, $headers );

	// Update the DB record with email outcome.
	if ( $post_id && ! is_wp_error( $post_id ) ) {
		update_post_meta( $post_id, '_jp_email_sent', $sent ? 'yes' : 'no' );
	}

	// Also send confirmation to enquirer.
	if ( $sent ) {
		$confirm_subject = 'Just Phantoms — We\'ve received your enquiry!';
		$confirm_body    = "Hi {$name},\n\nThank you for your enquiry! We've received your quote request and will be in touch within a few hours.\n\nIf you need to speak to us urgently, please call: 07504 040 407\n\nKind regards,\nThe Just Phantoms Team";
		wp_mail( $email, $confirm_subject, $confirm_body );
	}

	if ( $sent ) {
		wp_send_json_success( array( 'message' => 'Quote request submitted successfully.' ) );
	} else {
		wp_send_json_error( array( 'message' => 'Failed to send. Please call us directly.' ), 500 );
	}
}
add_action( 'wp_ajax_jp_quote',        'jp_handle_quote_submission' );
add_action( 'wp_ajax_nopriv_jp_quote', 'jp_handle_quote_submission' );

/* ─────────────────────────────────────────
 * 5. Custom Image Sizes
 * ───────────────────────────────────────── */
add_image_size( 'jp-fleet-card',   800, 500, true );
add_image_size( 'jp-vehicle-hero', 1600, 700, true );
add_image_size( 'jp-gallery-thumb', 300, 188, true );

/* ─────────────────────────────────────────
 * 6. Remove Admin Bar padding (front-end)
 * ───────────────────────────────────────── */
add_action( 'get_header', function() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
} );

/* ─────────────────────────────────────────
 * 7. Disable WordPress Emoji (performance)
 * ───────────────────────────────────────── */
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles',     'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles',  'print_emoji_styles' );
