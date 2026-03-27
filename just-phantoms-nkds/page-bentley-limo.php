<?php
/**
 * Template Name: Bentley Chrysler Limo
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';

$vehicle_title   = 'Bentley Chrysler Limousine';
$vehicle_badge   = 'Luxury Limousine';
$vehicle_intro   = 'The legendary Baby Bentley-styled stretch limousine – a premium party vehicle combining Bentley prestige with limousine extravagance.';
$vehicle_image   = $img . '/fleet/Bentley%20Chrysler%20Limo.png';
$vehicle_image_alt = 'Bentley Chrysler Limousine Party Hire';
$price_from      = '£395';
$booking_title   = 'Book the Bentley Limo';

$vehicle_about = 'The Bentley Chrysler Limousine – affectionately known as the Baby Bentley Limo – is one of the most sought-after party vehicles in our fleet. Based on a Chrysler stretch platform and styled to evoke the prestige of a Bentley Continental, this approximately 30-foot limousine accommodates up to 8 passengers in an opulent, entertainment-focused cabin. Available in both Black and White, it features a full entertainment system complete with star and disco lighting, a Bluetooth sound system, and a minibar. Whether it\'s a wedding, prom, or a birthday night out, this limousine delivers glamour in abundance.';

$features = [
  ['title' => 'Spacious Luxury Interior', 'desc' => 'Over 30 feet of pure limousine luxury seating 8 passengers in face-to-face configuration with premium leather upholstery throughout.'],
  ['title' => 'Entertainment System', 'desc' => 'Star ceiling lighting, colour-change disco floor, flat-screen TV, Bluetooth surround sound, and full mood lighting for the perfect atmosphere.'],
  ['title' => 'Comfort & Privacy', 'desc' => 'Darkened windows for complete privacy, individual climate control, and generous legroom ensure the ultimate comfort for every passenger.'],
  ['title' => 'Minibar & Amenities', 'desc' => 'Integrated minibar with champagne flute storage, ice cooler, and complimentary refreshment setup on request.'],
];

$service_tags = ['Weddings', 'Proms', 'Birthdays', 'Hen & Stag Parties', 'Corporate Events', 'Nights Out'];

$specs = [
  ['label' => 'Style',         'value' => 'Chrysler Stretch Limo (Baby Bentley)'],
  ['label' => 'Seating',       'value' => '8 Passengers'],
  ['label' => 'Power',         'value' => '300 BHP'],
  ['label' => '0–60 mph',     'value' => '7.9 seconds'],
  ['label' => 'Top Speed',     'value' => '100 mph'],
  ['label' => 'Length',        'value' => 'Approx. 30ft Stretch'],
  ['label' => 'Colour',        'value' => 'Black or White'],
];

$service_options = ['Wedding', 'Prom', 'Birthday Party', 'Hen Party', 'Stag Night', 'Night Out', 'Corporate Event', 'Other'];

include get_stylesheet_directory() . '/template-parts/vehicle-detail.php';

get_footer();
