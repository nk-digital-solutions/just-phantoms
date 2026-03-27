<?php
/**
 * Template Name: Mustang GT500
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';

$vehicle_title   = 'Mustang GT500';
$vehicle_badge   = 'American Muscle';
$vehicle_intro   = 'A limited-edition icon of American muscle. Raw power meets head-turning style for an unforgettable experience.';
$vehicle_image   = $img . '/fleet/Limited%20Edition%20Mustang%20GT500.jpg';
$vehicle_image_alt = 'Limited Edition Mustang GT500 Hire Car';
$price_from      = '£250';
$booking_title   = 'Book the Mustang GT500';

$vehicle_about = 'The Limited Edition Mustang GT500 is one of the most recognisable and viscerally exciting cars on the road today. With 412 BHP delivered through a thundering V8 engine, a lightning-quick 4.8-second 0–60 sprint, and that iconic Mustang roar, it\'s the star of any shoot, prom, or event. Crucially, our Mustang is right-hand drive and automatic, making it perfectly suited to UK roads. This is the car for those who want to make an unforgettable impression.';

$features = [
  ['title' => 'Powerful V8 Engine', 'desc' => '412 bhp Ford Mustang V8 – hear, feel, and experience the thunderous sound and acceleration that defines this icon.'],
  ['title' => 'Modern Comfort', 'desc' => 'Despite its performance focus, the Mustang GT500 features premium comfort tech, climate control, and modern infotainment.'],
  ['title' => 'RHD UK Version', 'desc' => 'One of only a handful of right-hand drive Mustang GT500s in the UK – fully road-legal and automatic for UK use.'],
  ['title' => 'Iconic Styling', 'desc' => 'Timeless Mustang fastback lines, dual racing stripes, and muscular stance guarantee maximum visual impact.'],
];

$service_tags = ['Proms', 'Music Videos', 'Photoshoots', 'Special Events', 'Promotional Events', 'Film Production'];

$specs = [
  ['label' => 'Make / Model',  'value' => 'Ford Mustang V8'],
  ['label' => 'Power',         'value' => '412 BHP'],
  ['label' => '0–60 mph',     'value' => '4.8 seconds'],
  ['label' => 'Top Speed',     'value' => '155 mph'],
  ['label' => 'Drive',         'value' => 'RHD Automatic'],
  ['label' => 'Seating',       'value' => '4 Passengers'],
];

$service_options = ['Prom', 'Music Video', 'Photoshoot', 'Film / TV Production', 'Promotional Event', 'Other'];

include get_stylesheet_directory() . '/template-parts/vehicle-detail.php';

get_footer();
