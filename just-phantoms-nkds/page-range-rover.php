<?php
/**
 * Template Name: Range Rover
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';

$vehicle_title   = 'Range Rover Executive LWB SVO';
$vehicle_badge   = 'Ultimate Luxury SUV';
$vehicle_intro   = 'The prestige of a Range Rover paired with a custom SVO long-wheelbase interior – executive travel reimagined.';
$vehicle_image   = $img . '/fleet/Range%20Rover%20Executive%20LWB%20SVO.jpg';
$vehicle_image_alt = 'Range Rover Executive LWB SVO Chauffeur Car';
$price_from      = '£250';
$booking_title   = 'Book the Range Rover';

$vehicle_about = 'Our Range Rover Executive Long Wheelbase SVO is the definitive luxury SUV experience. Customised by the Special Vehicle Operations division, this bespoke vehicle combines the commanding road presence of a Range Rover with an extended, custom luxury cabin. With an additional 7.8 inches of rear legroom, massaging and climate-controlled seats, and a state-of-the-art entertainment system, it is perfect for executive airport transfers, corporate events, and high-profile occasions demanding both style and substance.';

$features = [
  ['title' => 'Sumptuous Interior', 'desc' => '7.8 additional inches of rear legroom in the long-wheelbase configuration, with fully reclining executive seats.'],
  ['title' => 'Massage & Climate Seats', 'desc' => 'Heated, cooled, and massaging rear seats with individual climate control for the perfect environment every journey.'],
  ['title' => 'Advanced Technology', 'desc' => '12.9-inch rear entertainment screen, 4G Wi-Fi, 360° surround cameras, and a premium Meridian sound system.'],
  ['title' => 'Refined Luxury', 'desc' => 'SVO-specification hand-stitched leather, brushed aluminium trim, and ambient lighting throughout the cabin.'],
];

$service_tags = ['Weddings', 'Executive Travel', 'Airport Transfers', 'Corporate Events', 'VIP Occasions', 'Special Events'];

$specs = [
  ['label' => 'Power',          'value' => '287 BHP'],
  ['label' => '0–60 mph',      'value' => '6.8 seconds'],
  ['label' => 'Top Speed',      'value' => '130 mph'],
  ['label' => 'Seating',        'value' => '4 Passengers'],
  ['label' => 'Colour',         'value' => 'Santorini Black'],
  ['label' => 'Screen',         'value' => '12.9" Rear Entertainment'],
  ['label' => 'Cameras',        'value' => '360° Surround View'],
];

$service_options = ['Wedding', 'Airport Transfer', 'Executive Travel', 'Corporate Event', 'VIP Occasion', 'Other'];

include get_stylesheet_directory() . '/template-parts/vehicle-detail.php';

get_footer();
