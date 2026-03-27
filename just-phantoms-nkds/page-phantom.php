<?php
/**
 * Template Name: Rolls Royce Phantom
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';

$vehicle_title   = 'Rolls Royce Phantom';
$vehicle_badge   = 'Ultimate Luxury';
$vehicle_intro   = 'The pinnacle of automotive excellence. Experience the world\'s finest motor car for your most prestigious occasions.';
$vehicle_image   = $img . '/fleet/Rolls%20Royce%20Phantom.jpg';
$vehicle_image_alt = 'Rolls Royce Phantom – Ultimate Luxury Chauffeur Car';
$price_from      = '£500';
$booking_title   = 'Book the Phantom';

$vehicle_about = 'The Rolls-Royce Phantom represents the absolute pinnacle of automotive engineering and craftsmanship. Every detail, from the iconic Spirit of Ecstasy bonnet ornament to the hand-stitched leather interior, speaks of unparalleled quality. Perfect for weddings, VIP events, and occasions that demand nothing less than the finest. Our Phantom is chauffeur-driven by a professionally trained, fully licensed driver ensuring you arrive at your destination in supreme comfort, style, and sophistication.';

$features = [
  ['title' => 'Starlight Headliner', 'desc' => 'Hand-crafted headliner with thousands of fibre-optic lights creating a bespoke constellation ceiling above your journey.'],
  ['title' => 'Massage & Climate Seats', 'desc' => 'Heated, cooled, and massaging rear seats upholstered in the finest hand-stitched leather for ultimate passenger comfort.'],
  ['title' => 'Premium Sound & Technology', 'desc' => 'Bespoke audio system, ambient lighting, and cutting-edge entertainment technology for the discerning passenger.'],
  ['title' => 'Handcrafted Excellence', 'desc' => 'Over 450 hours of skilled craftmanship go into every Phantom – wood veneers, hand-polished metal, and artisan leather.'],
];

$service_tags = ['Weddings', 'Proms', 'Funerals', 'VIP Events', 'Red Carpet', 'Special Occasions'];

$specs = [
  ['label' => 'Engine',        'value' => '6.75L V12 Twin-Turbocharged'],
  ['label' => 'Transmission',  'value' => '8-Speed Automatic'],
  ['label' => 'Seating',       'value' => '4 Passengers'],
  ['label' => 'Colour',        'value' => 'Diamond Black'],
  ['label' => 'Wheelbase',     'value' => 'Extended Wheelbase'],
  ['label' => 'Finish',        'value' => 'Custom Bespoke Interior'],
];

$service_options = ['Wedding', 'Funeral', 'Prom', 'Airport Transfer', 'VIP Event', 'Red Carpet Event', 'Other Special Occasion'];

include get_stylesheet_directory() . '/template-parts/vehicle-detail.php';

get_footer();
