<?php
/**
 * Template Name: Vehicle - 1930s Vintage Classic Car
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header();

$vehicle = array(
  'name'      => "1930's Vintage Classic Car",
  'badge'     => 'Classic Elegance',
  'seats'     => '3',
  'img_dir'   => 'images/fleet/vintage/',
  'main_img'  => "1930's Vintage Classic Car.jpg",
  'thumbs'    => array( "1930's Vintage Classic Car.jpg", '1.png', '2.png' ),
  'desc'      => array(
    "Our 1930's Vintage Classic Car represents the pinnacle of vintage car hire excellence, expertly crafted to fuse the timeless allure of a 1930s vintage automobile with the reliability and comfort of modern vehicles. This stunning Badsworth Landaulette-style Wedding car is recognised as one of the finest choices for vintage car hire, offering distinctive charm that creates captivating contrasts in Wedding photography. The generously sized doors swing open widely, effortlessly accommodating even the fullest Wedding dresses, while extra interior space ensures your attire remains undisturbed throughout your journey.",
    "Featuring a convertible roof option, you can enjoy open-air travel on sunny days while still benefiting from the shelter of the main roof — a thoughtful design that provides protection without sacrificing the sensation of fresh air. With wool carpets, LED lights, decorative lighting around the back, and a classic Rolls Royce-style emblem, every detail exudes sophistication and vintage glamour. Available for Wedding hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire, this vintage car combines authentic 1930s aesthetics with modern comfort for ceremonies, receptions and photoshoots.",
  ),
  'features'  => array(
    array( 'title' => 'Convertible Roof', 'desc' => 'Open-air travel option for sunny days with a protective main roof, offering fresh air without strong winds.' ),
    array( 'title' => 'Spacious Interior', 'desc' => 'Generously sized doors and extra space to accommodate full Wedding dresses, wool carpets, and heater for comfort.' ),
    array( 'title' => 'Classic Styling', 'desc' => "1930s vintage aesthetics with Rolls Royce emblem, chrome details, LED lights, and distinctive appearance for stunning photos." ),
    array( 'title' => 'Modern Reliability', 'desc' => 'Combines timeless 1930s charm with the reliability and comfort of contemporary vehicles for a worry-free journey.' ),
  ),
  'specs'     => array(
    'Model'         => "1930's Vintage Classic Car (Badsworth Landaulette Style)",
    'Capacity'      => '3 passengers',
    '0-60mph'       => '8.5 seconds',
    'Top Speed'     => '125 mph',
    'Power'         => '195 BHP',
    'Era'           => '1930s Vintage Styling with Modern Mechanics',
    'Key Features'  => 'Convertible Roof, Wool Carpets, LED Lights, Rolls Royce Emblem, Heater, Chrome Details',
    'Colour'        => 'Classic Ivory with Gloss Black',
  ),
  'services'  => array( 'Weddings', 'Photoshoots', 'Classic Events', 'Period Productions', 'Special Occasions', 'Themed Parties' ),
  'tagline'   => 'Timeless glamour and authentic period styling &mdash; creates stunning photos and cinematic moments.',
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
