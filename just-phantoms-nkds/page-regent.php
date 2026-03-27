<?php
/**
 * Template Name: Regent Landaulette
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';

$vehicle_title   = 'Regent Landaulette';
$vehicle_badge   = 'Vintage Elegance';
$vehicle_intro   = 'The semi-convertible Regent Landaulette – a unique blend of open-top romance and classic British elegance for life\'s finest moments.';
$vehicle_image   = $img . '/fleet/Regent.png';
$vehicle_image_alt = 'Regent Landaulette Classic Hire Car';
$price_from      = '£350';
$booking_title   = 'Book the Regent';

$vehicle_about = 'The Regent Landaulette is a truly unique and special vehicle. Its signature semi-convertible roof can be opened at the rear, allowing passengers to travel in the open air while maintaining the privacy and elegance of an enclosed front cabin. Finished in a stunning Old English White and Ivory coachwork with a black mohair hood, the Regent is the quintessential choice for weddings, romantic anniversary journeys, summer events, and any occasion where you wish to travel in a manner befitting royalty. Chauffeur-driven for the complete classic experience.';

$features_heading = 'Features & Character';

$features = [
  ['title' => 'Semi-Convertible Roof', 'desc' => 'The iconic Landaulette roof opens at the rear, offering an open-top travel experience in fine weather – perfect for wedding arrivals.'],
  ['title' => 'Spacious & Comfortable', 'desc' => 'Seats up to 5–6 passengers plus chauffeur, with a gracious, airy interior and period-inspired upholstery for a truly regal experience.'],
  ['title' => 'Classic 1930s Styling', 'desc' => 'Authentic classic styling with sweeping lines, chrome accents, running boards, and a bespoke Old English White and Ivory colour scheme.'],
  ['title' => 'Modern Reliability', 'desc' => 'Classic elegance with modern mechanical reliability – you\'ll arrive in style without compromise.'],
];

$service_tags = ['Weddings', 'Summer Events', 'Romantic Trips', 'Photoshoots', 'Anniversaries', 'VIP Arrivals'];

$specs = [
  ['label' => 'Style',        'value' => 'Regent Landaulette'],
  ['label' => 'Seating',      'value' => '5–6 Passengers + Chauffeur'],
  ['label' => 'Power',        'value' => '120 BHP'],
  ['label' => '0–60 mph',    'value' => '9.4 seconds'],
  ['label' => 'Top Speed',    'value' => '95 mph'],
  ['label' => 'Exterior',     'value' => 'Old English White / Ivory'],
  ['label' => 'Hood',         'value' => 'Black Mohair Convertible'],
];

$service_options = ['Wedding', 'Anniversary', 'Summer Event', 'Photoshoot', 'Romantic Occasion', 'Other'];

include get_stylesheet_directory() . '/template-parts/vehicle-detail.php';

get_footer();
