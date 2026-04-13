<?php
/**
 * Template Name: Vehicle - Regent Landaulette Convertible
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header();

$vehicle = array(
  'name'      => 'Regent Landaulette Convertible',
  'badge'     => 'Vintage Elegance',
  'seats'     => '6',
  'img_dir'   => 'images/fleet/regent/',
  'main_img'  => 'regent-landaulette-convertible.png',
  'thumbs'    => array(
    'regent-landaulette-convertible.png',
    'regent-landaulette-convertible-2.png',
    'regent-landaulette-convertible-3.png',
    'regent-landaulette-convertible-4.png',
    'regent-landaulette-convertible-5.png',
    'regent-landaulette-convertible-6.png',
  ),
  'desc'      => array(
    'The Regent Landaulette Convertible is a stunning modern interpretation of 1930s-era vintage elegance, perfectly designed for unforgettable Wedding arrivals and special occasions across the UK. Unlike authentic vintage cars, this beautiful vehicle combines classic period styling with modern mechanics, ensuring reliability, smooth acceleration, and contemporary braking and steering for a comfortable journey.',
    'Accommodating up to 5–6 passengers plus chauffeur, the Regent features spacious leg and headroom with large wide-opening doors ideal for Wedding attire and formal dress. The semi-convertible rear roof section can be adjusted to suit your needs, making it perfect for creating stunning Wedding photography moments. With its cream leather interior, Wilton wool carpeting, twin running boards, and spare wheel mounted in the front wing, every angle provides a picturesque setting for your special day. The Classic Ivory coachwork with Gloss Black hood, walnut surrounds, and chrome features create timeless elegance that photographs beautifully. Available for chauffeur-driven Wedding hire across Preston, Blackburn, Leeds, York, Carlisle, Derby, Nottingham and surrounding towns.',
  ),
  'features'  => array(
    array( 'title' => 'Semi-Convertible Roof', 'desc' => 'Adjustable rear roof section for open-air elegance on sunny days with full weather protection when needed.' ),
    array( 'title' => 'Spacious &amp; Comfortable', 'desc' => 'Seats 5–6 passengers plus chauffeur with cream leather interior, Wilton wool carpeting, and ample legroom.' ),
    array( 'title' => 'Classic 1930s Styling', 'desc' => 'Twin running boards, chrome features, spare wheel mounting, and authentic period aesthetics for stunning photos.' ),
    array( 'title' => 'Modern Reliability', 'desc' => 'Contemporary mechanics with modern acceleration, steering, and braking for smooth, dependable performance.' ),
  ),
  'specs'     => array(
    'Model'         => 'Regent Landaulette Convertible',
    'Capacity'      => '5–6 passengers plus chauffeur',
    '0-60mph'       => '9.4 seconds',
    'Top Speed'     => '95 mph',
    'Power'         => '120 BHP',
    'Style'         => '1930s Landaulette (Semi-Convertible)',
    'Key Features'  => 'Cream Leather Interior, Wilton Wool Carpeting, Chrome Features, Heater for Rear, Twin Running Boards',
    'Colour'        => 'Classic Ivory with Gloss Black',
  ),
  'services'  => array( 'Weddings', 'Summer Events', 'Romantic Trips', 'Photoshoots', 'Anniversaries' ),
  'tagline'   => 'Classic 1930s styling with modern reliability &mdash; perfect for Weddings and open-top summer cruising.',
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
