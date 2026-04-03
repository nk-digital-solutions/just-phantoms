<?php
/**
 * Just Phantoms — Step 2: Populate ACF Fields & Yoast SEO
 *
 * Reads every .md file in location-content/, finds each service page by slug
 * and writes all ACF + Yoast meta. Run AFTER import-step1-create-pages.php.
 *
 * ACF fields set per page:
 *   lp_location_name  — location name (e.g. "Accrington")
 *   lp_county         — county (e.g. "Lancashire")
 *   lp_hero_tagline   — service meta description (short, punchy hero byline)
 *   lp_intro_text     — service-specific intro paragraph
 *   lp_nearby_towns   — nearby towns (same for all pages in a location)
 *
 * Yoast meta set per page:
 *   _yoast_wpseo_focuskw  — focus keyphrase
 *   _yoast_wpseo_title    — SEO title
 *   _yoast_wpseo_metadesc — meta description
 *
 * WP-CLI:
 *   wp eval-file wp-content/themes/just-phantoms-nkds/import-step2-populate-fields.php
 *
 * Safe to re-run — overwrites values with correct ones.
 * Delete this file after use.
 */

if ( ! function_exists( 'get_page_by_path' ) ) {
    die( "Run via WP-CLI only.\n" );
}

$md_folder = __DIR__ . '/location-content/';

// Same ordering rules as Step 1
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

$alt_slugs = [
    'Rolls Royce Phantom Hire' => 'rolls-royce-hire',
    'Ford Mustang'             => 'mustang-car-hire',
    '1930'                     => 'classic-car-hire',
];

function jp2_match_prefix( $heading, $map ) {
    foreach ( $map as $keyword => $prefix ) {
        if ( stripos( $heading, $keyword ) !== false ) {
            return $prefix;
        }
    }
    return null;
}

/**
 * Extract a table-row field value from a Markdown section block.
 * Handles SEO Title rows that contain " | " inside the value.
 */
function jp2_get_field( $block, $field_name ) {
    $pattern = '/\*\*' . preg_quote( $field_name, '/' ) . '\*\*\s*\|\s*(.+)/m';
    if ( preg_match( $pattern, $block, $m ) ) {
        $value = rtrim( trim( $m[1] ), '|' );
        return trim( $value );
    }
    return '';
}

function jp2_populate( $slug, $loc_name, $county, $nearby, $hero, $intro, $kw, $seo_title, $seo_desc ) {
    $page = get_page_by_path( $slug, OBJECT, 'page' );
    if ( ! $page ) {
        echo "MISSING : {$slug} — run Step 1 first\n";
        return false;
    }
    $id = $page->ID;
    update_post_meta( $id, 'lp_location_name', $loc_name  );
    update_post_meta( $id, 'lp_county',         $county    );
    update_post_meta( $id, 'lp_hero_tagline',   $hero      );
    update_post_meta( $id, 'lp_intro_text',     $intro     );
    update_post_meta( $id, 'lp_nearby_towns',   $nearby    );
    update_post_meta( $id, '_yoast_wpseo_focuskw',  $kw        );
    update_post_meta( $id, '_yoast_wpseo_title',    $seo_title );
    update_post_meta( $id, '_yoast_wpseo_metadesc', $seo_desc  );
    echo "UPDATED : {$slug} (ID: {$id})\n";
    return true;
}

$files = glob( $md_folder . '*.md' );
sort( $files );

$updated = 0;
$missing = 0;

foreach ( $files as $file ) {

    $loc = basename( $file, '.md' );
    $raw = file_get_contents( $file );

    // Location-level fields (shared across all service pages for this location)
    $loc_name = '';
    $county   = '';
    $nearby   = '';
    if ( preg_match( '/\*\*Location Name\*\*\s*\|\s*(.+)/m',   $raw, $m ) ) $loc_name = rtrim( trim( $m[1] ), '|' );
    if ( preg_match( '/\*\*County\*\*\s*\|\s*(.+)/m',          $raw, $m ) ) $county   = rtrim( trim( $m[1] ), '|' );
    if ( preg_match( '/\*\*Nearby Towns\*\*\s*\|\s*(.+)/m',    $raw, $m ) ) $nearby   = rtrim( trim( $m[1] ), '|' );
    $loc_name = trim( $loc_name );
    $county   = trim( $county );
    $nearby   = trim( $nearby );

    // Split into per-section blocks at each ### heading
    $blocks = preg_split( '/(?=^### )/m', $raw, -1, PREG_SPLIT_NO_EMPTY );

    foreach ( $blocks as $block ) {

        if ( ! preg_match( '/^### (.+)$/m', $block, $hm ) ) {
            continue;
        }

        $heading = trim( $hm[1] );
        $prefix  = jp2_match_prefix( $heading, $section_map );
        if ( ! $prefix ) {
            continue;
        }

        $focus_kw  = jp2_get_field( $block, 'Focus Keyphrase' );
        $seo_title = jp2_get_field( $block, 'SEO Title' );
        $seo_desc  = jp2_get_field( $block, 'Meta Description' );
        $intro     = jp2_get_field( $block, 'Intro Text' );

        // hero tagline = meta description (concise, converts well in hero section)
        $hero = $seo_desc;

        $slug = "{$prefix}-{$loc}";

        if ( jp2_populate( $slug, $loc_name, $county, $nearby, $hero, $intro, $focus_kw, $seo_title, $seo_desc ) ) {
            $updated++;
        } else {
            $missing++;
        }

        // Alt-slug duplicate — same content, different URL
        $alt = jp2_match_prefix( $heading, $alt_slugs );
        if ( $alt ) {
            if ( jp2_populate( "{$alt}-{$loc}", $loc_name, $county, $nearby, $hero, $intro, $focus_kw, $seo_title, $seo_desc ) ) {
                $updated++;
            } else {
                $missing++;
            }
        }
    }
}

echo "\n✓ Done. Updated: {$updated} | Missing (not created yet): {$missing}\n";
if ( $missing > 0 ) {
    echo "→ Run import-step1-create-pages.php for any missing pages, then re-run this script.\n";
}
