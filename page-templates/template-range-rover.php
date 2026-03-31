<?php
/**
 * Template Name: Vehicle - Range Rover Autobiography LWB
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header();

$vehicle = array(
  'name'      => 'Range Rover Autobiography LWB',
  'badge'     => 'Ultimate Luxury SUV',
  'seats'     => '4',
  'img_dir'   => 'images/fleet/range-rover/',
  'main_img'  => 'Range Rover Executive LWB SVO.jpg',
  'thumbs'    => array( 'Range Rover Executive LWB SVO.jpg', '2.jpg', '3.jpg', '4.jpg' ),
  'desc'      => array(
    'The Range Rover Autobiography Long Wheelbase represents the pinnacle of British luxury automotive engineering, combining timeless elegance with cutting-edge technology. This prestigious SUV offers an unparalleled experience for Weddings, executive travel, and VIP occasions across the UK. With its extended wheelbase providing an additional 7.8 inches of rear legroom, the Autobiography LWB delivers exceptional comfort with massage seats, heating and cooling functions, and sumptuous leather appointments.',
    'Featuring advanced technology including 12.9-inch entertainment screens, 360° cameras, and premium audio systems, this luxury chauffeur-driven vehicle ensures every journey is as refined as your destination. Especially popular for Asian and English Wedding party transport where comfort, space and punctuality are essential. Available across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire, including Preston, Leeds, Carlisle, Derby and Nottingham.',
  ),
  'features'  => array(
    array( 'title' => 'Sumptuous Interior', 'desc' => 'Additional 7.8 inches of rear legroom with premium leather, exquisite finishes, and executive-level comfort throughout the cabin.' ),
    array( 'title' => 'Massage &amp; Climate Seats', 'desc' => 'Reclining seats with heating, cooling, and massage functions ensuring maximum comfort on every journey.' ),
    array( 'title' => 'Advanced Technology', 'desc' => '12.9-inch screens, 360° cameras, sophisticated infotainment system, and premium sound for an enhanced experience.' ),
    array( 'title' => 'Refined Luxury', 'desc' => 'Wool carpets, signature Range Rover aesthetics, and commanding presence with sleek design and iconic floating roof.' ),
  ),
  'specs'     => array(
    'Model'         => 'Range Rover Autobiography LWB',
    'Capacity'      => '4 passengers (executive seating)',
    '0-60mph'       => '6.8 seconds',
    'Top Speed'     => '130 mph',
    'Power'         => '287 BHP',
    'Key Features'  => 'Massage Seats, Cooling &amp; Heating Seats, 12.9&quot; Screen, 360° Cameras, Wool Carpets',
    'Colour'        => 'Santorini Black',
  ),
  'services'  => array( 'Weddings', 'Executive Travel', 'Airport Transfers', 'Corporate Events', 'VIP Occasions', 'Special Events' ),
  'tagline'   => 'An executive SUV with extended-wheelbase comfort, ideal for Wedding party transfers and premium Prom night travel.',
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
    <p class="vehicle-hero-desc"><?php echo esc_html( $vehicle['tagline'] ); ?></p>
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
