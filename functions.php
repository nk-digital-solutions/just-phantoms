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
 * 5. SMTP Mail Configuration (Plesk)
 * ───────────────────────────────────────── */
add_action( 'phpmailer_init', function( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host       = 'localhost';
	$phpmailer->Port       = 25;
	$phpmailer->SMTPAuth   = false;
	$phpmailer->From       = 'info@justphantoms.co.uk';
	$phpmailer->FromName   = 'Just Phantoms';
} );

add_filter( 'wp_mail_from',      function() { return 'info@justphantoms.co.uk'; } );
add_filter( 'wp_mail_from_name', function() { return 'Just Phantoms'; } );

/* ─────────────────────────────────────────
 * 6. Custom Image Sizes
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

/* ─────────────────────────────────────────
 * 8. Dynamic XML Sitemap  (/sitemap.xml)
 * ───────────────────────────────────────── */
add_action( 'init', function() {
	add_rewrite_rule( '^sitemap\.xml$', 'index.php?jp_sitemap=1', 'top' );
} );

add_filter( 'query_vars', function( $vars ) {
	$vars[] = 'jp_sitemap';
	return $vars;
} );

add_action( 'template_redirect', function() {
	if ( ! get_query_var( 'jp_sitemap' ) ) return;

	// Pages excluded from the sitemap entirely.
	$excluded = [
		'page-templates/template-thankyou.php',
	];

	// Main navigational pages — highest priority after homepage.
	$high_priority = [
		'page-templates/template-fleet.php',
		'page-templates/template-services.php',
		'page-templates/template-reviews.php',
		'page-templates/template-faq.php',
		'page-templates/template-locations.php',
		'page-templates/template-about.php',
		'page-templates/template-promise.php',
		'page-templates/template-quote.php',
		'page-templates/template-wedding-quote.php',
		'page-templates/template-prom-quote.php',
	];

	// Individual vehicle showcase pages.
	$vehicle_pages = [
		'page-templates/template-phantom.php',
		'page-templates/template-cayenne-limo.php',
		'page-templates/template-bentley-chrysler-limo.php',
		'page-templates/template-mustang-gt500.php',
		'page-templates/template-range-rover.php',
		'page-templates/template-regent-landaulette.php',
		'page-templates/template-vintage.php',
	];

	$pages = get_posts( [
		'post_type'      => 'page',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	] );

	header( 'Content-Type: application/xml; charset=UTF-8' );
	header( 'X-Robots-Tag: noindex, follow' );

	echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

	// Homepage.
	echo "\t<url>\n";
	echo "\t\t<loc>" . esc_url( trailingslashit( home_url() ) ) . "</loc>\n";
	echo "\t\t<changefreq>weekly</changefreq>\n";
	echo "\t\t<priority>1.0</priority>\n";
	echo "\t</url>\n";

	foreach ( $pages as $page_id ) {
		$template = get_post_meta( $page_id, '_wp_page_template', true );

		if ( in_array( $template, $excluded, true ) ) continue;

		// Set priority and changefreq based on page type.
		if ( in_array( $template, $high_priority, true ) ) {
			$priority   = '0.9';
			$changefreq = 'weekly';
		} elseif ( in_array( $template, $vehicle_pages, true ) ) {
			$priority   = '0.8';
			$changefreq = 'monthly';
		} elseif ( $template === 'page-templates/template-location-page.php' ) {
			$priority   = '0.7';
			$changefreq = 'monthly';
		} elseif ( $template === 'page-templates/template-privacy.php' ) {
			$priority   = '0.3';
			$changefreq = 'yearly';
		} else {
			$priority   = '0.6';
			$changefreq = 'monthly';
		}

		$permalink = get_permalink( $page_id );
		$modified  = get_post_modified_time( 'Y-m-d', false, $page_id );

		echo "\t<url>\n";
		echo "\t\t<loc>" . esc_url( $permalink ) . "</loc>\n";
		echo "\t\t<lastmod>" . esc_html( $modified ) . "</lastmod>\n";
		echo "\t\t<changefreq>" . esc_html( $changefreq ) . "</changefreq>\n";
		echo "\t\t<priority>" . esc_html( $priority ) . "</priority>\n";
		echo "\t</url>\n";
	}

	echo '</urlset>';
	exit;
} );

/* ─────────────────────────────────────────
 * 9. SEO Enhancements — Yoast Filters + JSON-LD Schema
 * ───────────────────────────────────────── */

/**
 * Detect the service label for a location page from its post slug prefix.
 */
function jp_loc_service_label(): string {
	$slug = get_post_field( 'post_name', get_the_ID() );
	$map  = [
		'rolls-royce-phantom'                => 'Rolls Royce Phantom Hire',
		'range-rover-executive-lwb-svo'      => 'Range Rover Executive Hire',
		'porsche-cayenne-limo'               => 'Porsche Cayenne Limo Hire',
		'baby-bentley-chrysler-limo'         => 'Baby Bentley Limo Hire',
		'limited-edition-ford-mustang-gt500' => 'Ford Mustang GT500 Hire',
		'1930s-vintage-classic'              => '1930s Vintage Classic Car Hire',
		'regent-landaulette-convertible'     => 'Regent Landaulette Hire',
		'birthday-limo-hire'                 => 'Birthday Limo Hire',
		'prom-limo-hire'                     => 'Prom Limo Hire',
		'wedding-car-hire'                   => 'Wedding Car Hire',
		'luxury-car-hire'                    => 'Luxury Car Hire',
		'phantom-hire'                       => 'Phantom Hire',
		'limo-hire'                          => 'Limo Hire',
		'rolls-royce-hire'                   => 'Rolls Royce Hire',
		'mustang-car-hire'                   => 'Mustang Car Hire',
		'classic-car-hire'                   => 'Classic Car Hire',
	];
	foreach ( $map as $prefix => $label ) {
		if ( str_starts_with( $slug, $prefix . '-' ) ) return $label;
	}
	return 'Luxury Car Hire';
}

/**
 * Returns [title, desc, kw] for the current page/template.
 * Returns [] if no match (Yoast falls back to its own output).
 */
function jp_seo_data(): array {
	if ( is_front_page() ) {
		return [
			'title' => 'Luxury Wedding & Prom Car Hire | Just Phantoms',
			'desc'  => '5-star rated luxury chauffeur-driven Wedding and Prom car hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire. Rolls Royce Phantom, stretch Limousines and vintage classics. Price-match guaranteed.',
			'kw'    => 'wedding car hire Lancashire',
		];
	}
	$map = [
		'fleet' => [
			'title' => 'Luxury Wedding & Prom Vehicle Fleet | Just Phantoms',
			'desc'  => 'Our fleet includes the Rolls Royce Phantom, Porsche Cayenne Limo, Baby Bentley, Ford Mustang GT500, Range Rover SVO, Regent Landaulette and 1930s Vintage Classic. Available for Weddings and Proms across the North of England.',
			'kw'    => 'luxury wedding car hire fleet',
		],
		'services' => [
			'title' => 'Wedding & Prom Car Hire Services | Just Phantoms',
			'desc'  => 'Chauffeur-driven Wedding transport, Prom Limousines, airport transfers, VIP executive hire and music video vehicles. Tailored chauffeur services across Lancashire, Yorkshire and beyond.',
			'kw'    => 'wedding car hire services Lancashire',
		],
		'reviews' => [
			'title' => 'Customer Reviews | 5-Star Wedding Car Hire | Just Phantoms',
			'desc'  => '5-star reviews from real Wedding and Prom customers. Rated 4.9 stars by 500+ happy clients across Lancashire, Yorkshire and the North of England.',
			'kw'    => 'wedding car hire reviews',
		],
		'faq' => [
			'title' => 'Wedding Car Hire FAQ | Frequently Asked Questions | Just Phantoms',
			'desc'  => 'Common questions about booking Wedding and Prom car hire — pricing, coverage areas, what is included, timings and payment. Get answers or call us directly.',
			'kw'    => 'wedding car hire FAQ',
		],
		'locations' => [
			'title' => 'Wedding & Prom Car Hire Locations | Just Phantoms',
			'desc'  => 'Luxury Wedding and Prom car hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire. Browse 70+ locations and book your chauffeur-driven vehicle today.',
			'kw'    => 'wedding car hire locations',
		],
		'about' => [
			'title' => 'About Just Phantoms | Luxury Car Hire Since 1996',
			'desc'  => 'Just Phantoms — luxury car hire established in 1996 with offices in Lancashire and London. 500+ events, 7 premium vehicles and a 4.9-star rated chauffeur service.',
			'kw'    => 'about Just Phantoms chauffeur hire',
		],
		'promise' => [
			'title' => 'Our Promise | Just Phantoms Luxury Car Hire',
			'desc'  => '15-minute early arrival, price-match guarantee, freshly valeted vehicles and DBS-checked chauffeurs — our commitment to every client for every single booking.',
			'kw'    => 'just phantoms promise guarantee',
		],
		'wedding-quote' => [
			'title' => 'Get a Free Wedding Car Quote | Just Phantoms',
			'desc'  => 'Request a free Wedding car quote. We beat any like-for-like quote by 10%. Rolls Royce, vintage classics and luxury vehicles across the North of England.',
			'kw'    => 'wedding car hire quote',
		],
		'prom-quote' => [
			'title' => 'Get a Free Prom Limo Quote | Just Phantoms',
			'desc'  => 'Request your free Prom Limo quote. Porsche Cayenne Limo, Mustang GT500 and Baby Bentley available. Group bookings welcome across Lancashire and Yorkshire.',
			'kw'    => 'prom limo hire quote',
		],
		'quote' => [
			'title' => 'Get a Free Car Hire Quote | Just Phantoms',
			'desc'  => 'Request your free luxury car hire quote. Fast response, price-match guarantee and 5-star chauffeur service across Lancashire, Yorkshire and the North.',
			'kw'    => 'luxury car hire quote',
		],
		'phantom' => [
			'title' => 'Rolls Royce Phantom Hire | Wedding & Prom Car | Just Phantoms',
			'desc'  => 'Hire a chauffeur-driven Rolls Royce Phantom for your Wedding, Prom or VIP event. Snow White with Starlight Headliner. Serving Lancashire, Yorkshire and beyond. From £250.',
			'kw'    => 'Rolls Royce Phantom hire Lancashire',
		],
		'cayenne-limo' => [
			'title' => 'Porsche Cayenne Limo Hire | Prom Limo | Just Phantoms',
			'desc'  => '8-passenger Porsche Cayenne stretch Limousine for hire. Perfect for Proms, Weddings and parties across Lancashire and Yorkshire. Luxury limo from £250.',
			'kw'    => 'Porsche Cayenne Limo hire',
		],
		'bentley-chrysler-limo' => [
			'title' => 'Baby Bentley Chrysler Limo Hire | Stretch Limo | Just Phantoms',
			'desc'  => 'Hire the iconic Baby Bentley Chrysler stretch Limousine. Seats 8 passengers for Proms, Weddings and parties across the North of England. From £195.',
			'kw'    => 'Baby Bentley limo hire',
		],
		'mustang-gt500' => [
			'title' => 'Ford Mustang GT500 Hire | Prom & Music Video Car | Just Phantoms',
			'desc'  => 'Limited edition Ford Mustang GT500 for hire — supercharged V8 Prom car also available for music videos and photoshoots across Lancashire and Yorkshire.',
			'kw'    => 'Ford Mustang GT500 hire prom',
		],
		'range-rover' => [
			'title' => 'Range Rover Executive LWB SVO Hire | Just Phantoms',
			'desc'  => 'Hire the Range Rover Executive Long-Wheelbase SVO for Weddings, corporate events and VIP transfers. Commanding luxury across the North of England.',
			'kw'    => 'Range Rover hire Lancashire',
		],
		'vintage' => [
			'title' => '1930s Vintage Classic Car Hire | Wedding Car | Just Phantoms',
			'desc'  => 'Hire a genuine 1930s Vintage Classic car for your Wedding. Timeless period styling for couples seeking classic elegance across Lancashire and Yorkshire.',
			'kw'    => '1930s vintage car hire wedding',
		],
		'regent-landaulette' => [
			'title' => 'Regent Landaulette Convertible Hire | Wedding Car | Just Phantoms',
			'desc'  => 'Open-top Regent Landaulette Convertible hire for summer Weddings. Classic coachwork, modern reliability and unforgettable photos across Lancashire and Yorkshire.',
			'kw'    => 'Regent Landaulette hire',
		],
	];
	foreach ( $map as $tpl => $data ) {
		if ( jp_is_page_template( $tpl ) ) return $data;
	}
	if ( jp_is_page_template( 'location-page' ) ) {
		$loc = get_field( 'lp_location_name' ) ?: get_the_title();
		$cty = get_field( 'lp_county' )         ?: 'Lancashire';
		$svc = jp_loc_service_label();
		return [
			'title' => "{$svc} {$loc}, {$cty} | Just Phantoms",
			'desc'  => "Book {$svc} in {$loc}, {$cty} with Just Phantoms. 5-star rated, DBS-checked chauffeurs, price-match guaranteed. Call 07504 040 407.",
			'kw'    => strtolower( "{$svc} {$loc}" ),
		];
	}
	return [];
}

/* ── Yoast: inject SEO title when no custom title is set on the page ── */
add_filter( 'wpseo_title', function( $title ) {
	if ( get_post_meta( get_the_ID(), '_yoast_wpseo_title', true ) ) return $title;
	$data = jp_seo_data();
	return $data['title'] ?? $title;
} );

/* ── Yoast: inject meta description when none is set on the page ── */
add_filter( 'wpseo_metadesc', function( $desc ) {
	if ( get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ) ) return $desc;
	$data = jp_seo_data();
	return $data['desc'] ?? $desc;
} );

/* ── Yoast: fallback Open Graph image ── */
add_filter( 'wpseo_opengraph_image', function( $img ) {
	if ( $img ) return $img;
	return get_template_directory_uri() . '/assets/images/fleet/rolls-royce-phantom/Rolls%20Royce%20Phantom.jpg';
}, 20 );

/* ── JSON-LD Schema markup ── */
add_action( 'wp_head', 'jp_schema_output', 99 );
function jp_schema_output(): void {
	$schemas = [];

	// ── LocalBusiness — output on every page ──
	$schemas[] = [
		'@context'        => 'https://schema.org',
		'@type'           => [ 'LocalBusiness', 'AutoRental' ],
		'@id'             => home_url( '/#business' ),
		'name'            => 'Just Phantoms',
		'description'     => '5-star rated luxury Wedding and Prom chauffeur car hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.',
		'url'             => home_url( '/' ),
		'telephone'       => '+447504040407',
		'email'           => 'info@justphantoms.co.uk',
		'priceRange'      => '££',
		'logo'            => get_template_directory_uri() . '/assets/images/logos/nav-logo.png',
		'image'           => get_template_directory_uri() . '/assets/images/fleet/rolls-royce-phantom/Rolls Royce Phantom.jpg',
		'address'         => [
			'@type'          => 'PostalAddress',
			'addressRegion'  => 'Lancashire',
			'addressCountry' => 'GB',
		],
		'areaServed' => [
			[ '@type' => 'AdministrativeArea', 'name' => 'Lancashire' ],
			[ '@type' => 'AdministrativeArea', 'name' => 'Yorkshire' ],
			[ '@type' => 'AdministrativeArea', 'name' => 'Cumbria' ],
			[ '@type' => 'AdministrativeArea', 'name' => 'Derbyshire' ],
			[ '@type' => 'AdministrativeArea', 'name' => 'Nottinghamshire' ],
		],
		'sameAs' => [
			'https://www.tiktok.com/@justphantoms',
			'https://www.instagram.com/justphantoms',
		],
		'aggregateRating' => [
			'@type'       => 'AggregateRating',
			'ratingValue' => '4.9',
			'reviewCount' => '500',
			'bestRating'  => '5',
			'worstRating' => '1',
		],
	];

	// ── Vehicle schemas ──
	$vehicle_map = [
		'phantom' => [
			'name'  => 'Rolls Royce Phantom', 'brand' => 'Rolls-Royce', 'model' => 'Phantom',
			'seats' => 4, 'color' => 'Snow White',
			'desc'  => 'Chauffeur-driven Rolls Royce Phantom hire for Weddings, Proms and VIP events. Features Starlight Headliner, V12 engine and handcrafted British interior.',
		],
		'cayenne-limo' => [
			'name'  => 'Porsche Cayenne Limo', 'brand' => 'Porsche', 'model' => 'Cayenne Limousine',
			'seats' => 8,
			'desc'  => '8-passenger Porsche Cayenne stretch Limousine hire for Proms, Weddings and parties.',
		],
		'bentley-chrysler-limo' => [
			'name'  => 'Baby Bentley Chrysler Limo', 'brand' => 'Chrysler', 'model' => 'Baby Bentley Limousine',
			'seats' => 8,
			'desc'  => 'Baby Bentley Chrysler stretch Limousine hire for Proms, Weddings and special occasions.',
		],
		'mustang-gt500' => [
			'name'  => 'Limited Edition Ford Mustang GT500', 'brand' => 'Ford', 'model' => 'Mustang GT500',
			'seats' => 3,
			'desc'  => 'Limited edition Ford Mustang GT500 hire for Proms, music videos and photoshoots.',
		],
		'range-rover' => [
			'name'  => 'Range Rover Executive LWB SVO', 'brand' => 'Land Rover', 'model' => 'Range Rover LWB SVO',
			'seats' => 4,
			'desc'  => 'Range Rover Executive Long-Wheelbase SVO hire for Weddings, corporate and VIP events.',
		],
		'vintage' => [
			'name'  => '1930s Vintage Classic Car', 'brand' => 'Vintage', 'model' => '1930s Classic',
			'seats' => 3,
			'desc'  => 'Genuine 1930s Vintage Classic car hire for Weddings and special occasions.',
		],
		'regent-landaulette' => [
			'name'  => 'Regent Landaulette Convertible', 'brand' => 'Regent', 'model' => 'Landaulette Convertible',
			'seats' => 6,
			'desc'  => 'Regent Landaulette open-top Convertible hire for summer Weddings and special occasions.',
		],
	];
	foreach ( $vehicle_map as $tpl => $v ) {
		if ( jp_is_page_template( $tpl ) ) {
			$schema = [
				'@context'               => 'https://schema.org',
				'@type'                  => 'Vehicle',
				'name'                   => $v['name'],
				'brand'                  => [ '@type' => 'Brand', 'name' => $v['brand'] ],
				'model'                  => $v['model'],
				'vehicleSeatingCapacity' => $v['seats'],
				'description'            => $v['desc'],
				'offers'                 => [
					'@type'         => 'Offer',
					'seller'        => [ '@type' => 'Organization', 'name' => 'Just Phantoms' ],
					'areaServed'    => 'North of England',
					'availability'  => 'https://schema.org/InStock',
					'priceCurrency' => 'GBP',
				],
			];
			if ( ! empty( $v['color'] ) ) $schema['color'] = $v['color'];
			$schemas[] = $schema;
			break;
		}
	}

	// ── FAQPage schema ──
	if ( jp_is_page_template( 'faq' ) ) {
		$schemas[] = [
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => [
				[ '@type' => 'Question', 'name' => 'How far in advance should I book?',
				  'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'We recommend booking 2-4 weeks in advance for peak dates such as summer weekends and Prom season (April-July). Last-minute bookings can often be accommodated.' ] ],
				[ '@type' => 'Question', 'name' => 'What areas do you cover?',
				  'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Our core coverage includes Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire — including Preston, Blackburn, Burnley, Leeds, Bradford, York, Sheffield, Carlisle, Derby and Nottingham.' ] ],
				[ '@type' => 'Question', 'name' => 'What is included in the hire price?',
				  'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Every hire includes a professional uniformed chauffeur, freshly valeted vehicle, complimentary bottled water and 15-minute early arrival. Wedding bookings include ribbon decoration.' ] ],
				[ '@type' => 'Question', 'name' => 'Do you offer a price-match guarantee?',
				  'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Yes. We will beat any like-for-like quote from a VAT-registered company by 10%, guaranteed within 7 days of your booking.' ] ],
				[ '@type' => 'Question', 'name' => 'Can I make extra stops or adjust timings on the day?',
				  'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Yes. Minor timing adjustments and extra stops can usually be accommodated on the day. For major changes we recommend discussing these at booking for transparent pricing.' ] ],
			],
		];
	}

	// ── AggregateRating on Reviews page ──
	if ( jp_is_page_template( 'reviews' ) ) {
		$schemas[] = [
			'@context'        => 'https://schema.org',
			'@type'           => 'LocalBusiness',
			'name'            => 'Just Phantoms',
			'aggregateRating' => [
				'@type'       => 'AggregateRating',
				'ratingValue' => '4.9',
				'reviewCount' => '500',
				'bestRating'  => '5',
				'worstRating' => '1',
			],
		];
	}

	// ── Service schema on Services page ──
	if ( jp_is_page_template( 'services' ) ) {
		$schemas[] = [
			'@context'    => 'https://schema.org',
			'@type'       => 'Service',
			'name'        => 'Wedding & Prom Car Hire',
			'provider'    => [ '@type' => 'LocalBusiness', 'name' => 'Just Phantoms', 'url' => home_url( '/' ) ],
			'areaServed'  => 'Lancashire, Yorkshire, Cumbria, Derbyshire, Nottinghamshire',
			'serviceType' => [ 'Wedding Car Hire', 'Prom Limousine Hire', 'Chauffeur Service', 'Airport Transfer', 'VIP Executive Transfer' ],
			'description' => 'Chauffeur-driven Wedding, Prom and VIP car hire across the North of England.',
		];
	}

	// ── Location page Service schema ──
	if ( jp_is_page_template( 'location-page' ) ) {
		$loc = get_field( 'lp_location_name' ) ?: get_the_title();
		$cty = get_field( 'lp_county' )         ?: 'Lancashire';
		$svc = jp_loc_service_label();
		$schemas[] = [
			'@context'    => 'https://schema.org',
			'@type'       => 'Service',
			'name'        => "{$svc} {$loc}",
			'description' => "Book {$svc} in {$loc}, {$cty} with Just Phantoms. 5-star rated, DBS-checked chauffeurs, price-match guaranteed.",
			'provider'    => [ '@type' => 'LocalBusiness', 'name' => 'Just Phantoms', 'url' => home_url( '/' ), 'telephone' => '+447504040407' ],
			'areaServed'  => [ '@type' => 'City', 'name' => $loc, 'containedInPlace' => [ '@type' => 'AdministrativeArea', 'name' => $cty ] ],
			'serviceType' => $svc,
			'url'         => get_permalink(),
			'offers'      => [
				'@type'         => 'Offer',
				'priceCurrency' => 'GBP',
				'availability'  => 'https://schema.org/InStock',
				'areaServed'    => $loc . ', ' . $cty,
			],
		];
	}

	// ── BreadcrumbList ──
	$crumbs = [ [ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url( '/' ) ] ];
	if ( jp_is_vehicle_page() ) {
		$crumbs[] = [ '@type' => 'ListItem', 'position' => 2, 'name' => 'Our Fleet', 'item' => home_url( '/our-fleet/' ) ];
		$crumbs[] = [ '@type' => 'ListItem', 'position' => 3, 'name' => get_the_title(), 'item' => get_permalink() ];
	} elseif ( jp_is_page_template( 'location-page' ) ) {
		$crumbs[] = [ '@type' => 'ListItem', 'position' => 2, 'name' => 'Locations', 'item' => home_url( '/locations/' ) ];
		$crumbs[] = [ '@type' => 'ListItem', 'position' => 3, 'name' => get_the_title(), 'item' => get_permalink() ];
	} elseif ( ! is_front_page() && is_page() ) {
		$crumbs[] = [ '@type' => 'ListItem', 'position' => 2, 'name' => get_the_title(), 'item' => get_permalink() ];
	}
	if ( count( $crumbs ) > 1 ) {
		$schemas[] = [
			'@context'        => 'https://schema.org',
			'@type'           => 'BreadcrumbList',
			'itemListElement' => $crumbs,
		];
	}

	// Output all schemas
	foreach ( $schemas as $schema ) {
		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}
}
