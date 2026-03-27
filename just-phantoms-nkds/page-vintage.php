<?php
/**
 * Template Name: 1930s Vintage Car
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';

$vehicle_title   = "1930s Vintage Car";
$vehicle_badge   = 'Classic Elegance';
$vehicle_intro   = 'Step back to the golden age of motoring. Our stunning 1930s-style classic car brings timeless elegance to your most special occasions.';
$vehicle_image   = $img . "/fleet/1930%27s%20Vintage%20Car.jpg";
$vehicle_image_alt = "1930s Vintage Chauffeur Car – Classic Elegance";
$price_from      = '£250';
$booking_title   = 'Book the Vintage Car';

$vehicle_about = "Our 1930s-inspired Vintage Car is the perfect blend of old-world elegance and modern reliability. Styled in the classic Badsworth Landaulette tradition, this stunning vehicle evokes the glamour and sophistication of a bygone era while offering a smooth, dependable modern drive. It is a dream wedding car, perfect for period-style photoshoots, classic-themed events, and any occasion where authentic vintage elegance is required. Step aboard and experience motoring as it once was – graceful, dignified, and utterly beautiful.";

$features_heading = 'Features & Character';

$features = [
  ['title' => 'Convertible Roof', 'desc' => 'The classic Landaulette-style convertible rear roof allows open-top travel in fine weather for a truly memorable experience.'],
  ['title' => 'Spacious Interior', 'desc' => 'Elegantly appointed interior with period-appropriate upholstery, providing surprising comfort for up to 4 passengers.'],
  ['title' => 'Classic Styling', 'desc' => 'Every curve, chrome detail, and running board is authentically styled to evoke the golden age of motoring.'],
  ['title' => 'Modern Reliability', 'desc' => 'Classic looks paired with a modern engine and drivetrain mean you can enjoy the vintage aesthetic with complete peace of mind.'],
];

$service_tags = ['Weddings', 'Photoshoots', 'Classic Events', 'Period Productions', 'Special Occasions', 'Themed Parties'];

$specs = [
  ['label' => 'Style',        'value' => 'Badsworth Landaulette'],
  ['label' => 'Seating',      'value' => '4 Passengers'],
  ['label' => 'Power',        'value' => '195 BHP'],
  ['label' => '0–60 mph',    'value' => '8.5 seconds'],
  ['label' => 'Top Speed',    'value' => '125 mph'],
  ['label' => 'Roof',         'value' => 'Convertible Landaulette'],
];

$service_options = ['Wedding', 'Photoshoot', 'Classic Event', 'Period Film / TV', 'Themed Party', 'Other'];

include get_stylesheet_directory() . '/template-parts/vehicle-detail.php';

get_footer();
