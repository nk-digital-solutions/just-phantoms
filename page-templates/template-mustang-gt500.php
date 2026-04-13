<?php
/**
 * Template Name: Vehicle - Ford Mustang GT500
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header();

$vehicle = array(
  'name'      => 'Limited Edition Ford Mustang GT500',
  'badge'     => 'American Muscle',
  'seats'     => '3',
  'img_dir'   => 'images/fleet/mustang-gt500/',
  'main_img'  => '2.jpg',
  'thumbs'    => array( '2.jpg', '1.jpg', '3.jpg', '4.jpg' ),
  'desc'      => array(
    'The Limited Edition Ford Mustang GT500 has been an iconic American sports car for over five decades, renowned for its powerful engine, classic design, and unmistakable road presence. Our Limited Edition Ford Mustang GT500 hire combines the legendary muscle car style with modern performance and comfort features, making it the perfect choice for Proms, music videos, photoshoots, and special occasions across the UK. This RHD (Right-Hand Drive) version is specifically configured for UK roads, powered by a high-performance V8 engine producing over 412 horsepower, delivering the acceleration, speed, and thunderous exhaust note that GT500 enthusiasts expect.',
    'Inside, you\'ll find a sleek modern interior with heated and cooling seats, sat-nav touchscreen, premier sound system, multimedia connectivity, and keyless GO for ultimate convenience. With impressive acceleration of 0–60mph in just 4.8 seconds and a top speed of 155mph, this GT500 offers thrilling performance while remaining comfortable for Prom transfers, ceremony-to-reception travel, and evening celebration arrivals. Available for chauffeur-driven hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.',
  ),
  'features'  => array(
    array( 'title' => 'Powerful V8 Engine', 'desc' => 'Over 412 horsepower from a V8 engine with 0–60mph in 4.8 seconds and the iconic Mustang exhaust sound.' ),
    array( 'title' => 'Modern Comfort', 'desc' => 'Heated and cooling seats, sat-nav, premier sound system, multimedia connectivity, and keyless GO.' ),
    array( 'title' => 'RHD UK Version', 'desc' => 'Right-hand drive configuration specifically designed for UK roads with automatic transmission.' ),
    array( 'title' => 'Iconic Styling', 'desc' => 'Classic American muscle car design that commands attention and photographs beautifully for any occasion.' ),
  ),
  'specs'     => array(
    'Model'         => 'Limited Edition Ford Mustang GT500',
    'Capacity'      => '3 passengers',
    '0-60mph'       => '4.8 seconds',
    'Top Speed'     => '155 mph',
    'Power'         => '412 BHP',
    'Engine'        => 'V8',
    'Transmission'  => 'Automatic (RHD)',
    'Key Features'  => 'RHD Version, Sat Nav, Heated Seats, Cooling Seats, Premier Sound, Multimedia, Keyless GO',
    'Colour'        => 'Shadow Black',
  ),
  'services'  => array( 'Proms', 'Music Videos', 'Photoshoots', 'Special Events', 'Promotional Events', 'Film Production' ),
  'tagline'   => 'Raw American muscle with supercharged V8 power &mdash; ideal for music videos and photoshoots.',
  'quote_url' => '/wedding-quote/',
  'prom_url'  => '/prom-quote/',
);
?>

<section class="vehicle-hero">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <span>/</span>
      <a href="<?php echo esc_url( home_url( '/our-fleet/' ) ); ?>">Our Fleet</a>
      <span>/</span>
      <span><?php echo esc_html( $vehicle['name'] ); ?></span>
    </nav>
    <div class="vehicle-title">
      <h1><?php echo esc_html( $vehicle['name'] ); ?></h1>
      <span class="badge-large"><?php echo esc_html( $vehicle['badge'] ); ?></span>
      <span class="seats">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Seats <?php echo esc_html( $vehicle['seats'] ); ?> passengers
      </span>
    </div>
    <p class="vehicle-hero-desc"><?php echo wp_kses_post( $vehicle['tagline'] ); ?></p>
  </div>
</section>

<section>
  <div class="container">
    <div class="content-grid">

      <div class="main">
        <div class="gallery">
          <div class="gallery-display">
            <img src="<?php echo esc_url( jp_assets( $vehicle['img_dir'] . $vehicle['main_img'] ) ); ?>" alt="<?php echo esc_attr( $vehicle['name'] ); ?>" loading="eager">
          </div>
          <div class="gallery-thumbnails">
            <?php foreach ( $vehicle['thumbs'] as $i => $thumb ) : ?>
              <div class="gallery-thumbnail<?php echo $i === 0 ? ' active' : ''; ?>">
                <img src="<?php echo esc_url( jp_assets( $vehicle['img_dir'] . $thumb ) ); ?>"
                     alt="<?php echo esc_attr( $vehicle['name'] . ' - View ' . ( $i + 1 ) ); ?>"
                     loading="lazy">
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="about">
          <h2>About the <?php echo esc_html( $vehicle['name'] ); ?></h2>
          <?php foreach ( $vehicle['desc'] as $para ) : ?>
            <p><?php echo esc_html( $para ); ?></p>
          <?php endforeach; ?>
        </div>

        <div class="features-grid">
          <?php foreach ( $vehicle['features'] as $feat ) : ?>
            <div class="feature-card">
              <h4><?php echo wp_kses_post( $feat['title'] ); ?></h4>
              <p><?php echo esc_html( $feat['desc'] ); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <aside>
        <div class="services-section">
          <h3>Perfect for these services:</h3>
          <div class="service-tags">
            <?php foreach ( $vehicle['services'] as $svc ) : ?>
              <span class="service-tag"><?php echo esc_html( $svc ); ?></span>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="booking-card">
          <h3 class="specs-heading">Vehicle Specifications</h3>
          <table class="specs-table">
            <tbody>
              <?php foreach ( $vehicle['specs'] as $label => $value ) : ?>
                <tr>
                  <th><?php echo esc_html( $label ); ?></th>
                  <td><?php echo wp_kses_post( $value ); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class="cta-buttons" style="margin-top:1.5rem">
            <a href="<?php echo esc_url( home_url( $vehicle['quote_url'] ) ); ?>" class="btn primary" style="width:100%;text-align:center;margin-bottom:.75rem;display:block">Get Wedding Quote</a>
            <a href="<?php echo esc_url( home_url( $vehicle['prom_url'] ) ); ?>" class="btn btn-prom-quote" style="width:100%;text-align:center;margin-bottom:.75rem;display:block">Get Prom Quote</a>
            <a href="tel:+447504040407" class="btn btn-hero-tel" style="width:100%;text-align:center;display:block">Call 07504 040 407</a>
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>

<?php get_footer();
