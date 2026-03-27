<?php
/**
 * Template Name: Porsche Cayenne Limo
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';

$vehicle_title   = 'Porsche Cayenne Limousine';
$vehicle_badge   = 'Luxury Limousine';
$vehicle_intro   = 'The world\'s most iconic sports SUV, stretched for the ultimate group luxury experience. Arrive in dramatic style.';
$vehicle_image   = $img . '/fleet/Porsche%20Cayenne%20Limo.jpg';
$vehicle_image_alt = 'Porsche Cayenne Limousine Party Car';
$price_from      = '£450';
$booking_title   = 'Book the Cayenne Limo';

$vehicle_about = 'The Porsche Cayenne Limousine is the ultimate statement vehicle – the iconic Porsche sports SUV DNA wrapped in a bespoke stretch limousine body. Capable of accommodating 8–10 passengers in a lavish extended cabin complete with a full entertainment system, fibre-optic lighting, a minibar, and premium sound, this vehicle is the centrepiece of any celebration. Whether it\'s a milestone birthday, a prom, or a hen night, the Cayenne Limo guarantees an unforgettable arrival.';

$features = [
  ['title' => 'Extended Interior', 'desc' => 'Bespoke stretch cabin seating 8–10 passengers with face-to-face seating, ambient lighting, and premium upholstery.'],
  ['title' => 'Entertainment System', 'desc' => 'Multi-zone sound system, LED and fibre-optic mood lighting, flat-screen TV, and a fully stocked minibar.'],
  ['title' => 'Sports Car Heritage', 'desc' => 'Porsche\'s legendary 4.8L V8 Turbo engine provides a thrilling, confident ride even in stretch configuration.'],
  ['title' => 'Statement Arrival', 'desc' => 'Turn heads wherever you go. The Cayenne Limo is unmistakably exclusive and guaranteed to impress.'],
];

$service_tags = ['Proms', 'Parties', 'Birthdays', 'Hen & Stag Nights', 'Special Events', 'Celebrations'];

$specs = [
  ['label' => 'Seating',       'value' => '8–10 Passengers'],
  ['label' => 'Engine',        'value' => '4.8L V8 Turbo'],
  ['label' => 'Transmission',  'value' => '8-Speed Tiptronic S'],
  ['label' => 'Colour',        'value' => 'Midnight Black'],
  ['label' => 'Entertainment', 'value' => 'Flat-Screen TV, Sound System, Fibre-Optic Lighting'],
  ['label' => 'Minibar',       'value' => 'Included'],
];

$service_options = ['Prom', 'Birthday Party', 'Hen Party', 'Stag Party', 'Celebration Event', 'Other'];

include get_stylesheet_directory() . '/template-parts/vehicle-detail.php';

get_footer();
