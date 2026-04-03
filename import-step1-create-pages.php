<?php
/**
 * Just Phantoms — Step 1: Create Location Service Pages
 *
 * Reads every .md file in location-content/ and creates 16 WordPress pages per
 * location — 13 unique service/vehicle slugs + 3 alt-slug duplicates for extra
 * SEO coverage (rolls-royce-hire, classic-car-hire, mustang-car-hire).
 *
 * URL pattern:  {slug-prefix}-{location}
 * Template:     page-templates/template-location-page.php
 *
 * WP-CLI:
 *   wp eval-file wp-content/themes/just-phantoms-nkds/import-step1-create-pages.php
 *
 * Safe to re-run — existing slugs are skipped, not overwritten.
 * Delete this file after use.
 */

if ( ! function_exists( 'wp_insert_post' ) ) {
    die( "Run via WP-CLI only.\n" );
}

$template  = 'page-templates/template-location-page.php';
$md_folder = __DIR__ . '/location-content/';

/*
 * Section heading keyword => primary slug prefix.
 * ORDER MATTERS — more specific keys must come before shorter ones
 * (e.g. "Rolls Royce Phantom Hire" before "Phantom Hire").
 */
$section_map = [
    'Rolls Royce Phantom Hire' => 'rolls-royce-phantom',
    'Range Rover'              => 'range-rover-executive-lwb-svo',
    'Porsche Cayenne'          => 'porsche-cayenne-limo',
    'Baby Bentley'             => 'baby-bentley-chrysler-limo',
    'Ford Mustang'             => 'limited-edition-ford-mustang-gt500',
    '1930'                     => '1930s-vintage-classic',
    'Regent Landaulette'       => 'regent-landaulette-convertible',
    'Birthday Limo'            => 'birthday-limo-hire',
    'Prom Limo'                => 'prom-limo-hire',
    'Wedding Car'              => 'wedding-car-hire',
    'Luxury Car'               => 'luxury-car-hire',
    'Phantom Hire'             => 'phantom-hire',
    'Limo Hire'                => 'limo-hire',
];

/*
 * Alt-slug duplicates — same content, extra URL for keyword coverage.
 * rolls-royce-hire-{loc}, mustang-car-hire-{loc}, classic-car-hire-{loc}
 */
$alt_slugs = [
    'Rolls Royce Phantom Hire' => 'rolls-royce-hire',
    'Ford Mustang'             => 'mustang-car-hire',
    '1930'                     => 'classic-car-hire',
];

function jp1_match_prefix( $heading, $map ) {
    foreach ( $map as $keyword => $prefix ) {
        if ( stripos( $heading, $keyword ) !== false ) {
            return $prefix;
        }
    }
    return null;
}

function jp1_create_page( $title, $slug, $template ) {
    if ( get_page_by_path( $slug, OBJECT, 'page' ) ) {
        echo "SKIP    : {$slug}\n";
        return false;
    }
    $id = wp_insert_post( [
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => '',
    ], true );
    if ( is_wp_error( $id ) ) {
        echo "ERROR   : {$slug} — " . $id->get_error_message() . "\n";
        return false;
    }
    update_post_meta( $id, '_wp_page_template', $template );
    echo "CREATED : {$slug} (ID: {$id})\n";
    return true;
}

$files = glob( $md_folder . '*.md' );
sort( $files );

$created = 0;
$skipped = 0;

foreach ( $files as $file ) {

    $loc = basename( $file, '.md' ); // e.g. "accrington"
    $raw = file_get_contents( $file );

    // Pull all ### section headings from this file
    preg_match_all( '/^### (.+)$/m', $raw, $hm );

    foreach ( $hm[1] as $heading ) {

        $prefix = jp1_match_prefix( $heading, $section_map );
        if ( ! $prefix ) {
            continue;
        }

        $slug  = "{$prefix}-{$loc}";
        $title = trim( $heading );

        if ( jp1_create_page( $title, $slug, $template ) ) {
            $created++;
        } else {
            $skipped++;
        }

        // Alt-slug duplicate
        $alt = jp1_match_prefix( $heading, $alt_slugs );
        if ( $alt ) {
            if ( jp1_create_page( $title, "{$alt}-{$loc}", $template ) ) {
                $created++;
            } else {
                $skipped++;
            }
        }
    }
}

echo "\n✓ Done. Created: {$created} | Skipped (already exist): {$skipped}\n";
echo "→ Now run import-step2-populate-fields.php\n";
