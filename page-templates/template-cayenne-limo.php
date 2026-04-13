<?php
/**
 * Template Name: Vehicle - Porsche Cayenne Limo
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header();

$vehicle = array(
  'name'      => 'Porsche Cayenne Limo',
  'badge'     => 'Luxury Limousine',
  'seats'     => '8',
  'img_dir'   => 'images/fleet/porsche-cayenne-limo/',
  'main_img'  => 'Porsche Cayenne Limo.jpg',
  'thumbs'    => array( 'Porsche Cayenne Limo.jpg', '2.jpg', '3.jpg', '4.jpg' ),
  'desc'      => array(
    'The Porsche Cayenne Limo is a spectacular stretch Limousine conversion that combines the prestige of a Porsche with the party atmosphere of a luxury Limousine. Seating up to 8 passengers in style, this head-turning vehicle is the perfect choice for Proms, Birthdays, Hen Nights, and celebrations across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.',
    'With its premium sound system, vibrant LED lighting, champagne bar with crystal glassware, and plush seating, the Cayenne Limo transforms every journey into an unforgettable party experience. The striking Ibis White with Black Roof exterior commands attention wherever it goes, guaranteeing the kind of dramatic arrival that makes memories last a lifetime.',
  ),
  'features'  => array(
    array( 'title' => 'Extended Interior', 'desc' => 'Stretch Limousine conversion with plush seating, mood lighting, and party atmosphere amenities for up to 8 passengers.' ),
    array( 'title' => 'Entertainment System', 'desc' => 'Premium sound system, LED lighting, champagne bar, and party features for the ultimate celebration journey.' ),
    array( 'title' => 'Sports Car Heritage', 'desc' => 'Unique Porsche styling and presence combined with Limousine luxury and space for a truly distinctive experience.' ),
    array( 'title' => 'Statement Arrival', 'desc' => 'Head-turning design that guarantees memorable entrances and perfect photo opportunities at any venue.' ),
  ),
  'specs'     => array(
    'Capacity'      => '8 passengers',
    'Engine'        => '4.8L V8 Turbo',
    'Transmission'  => '8-Speed Tiptronic',
    'Key Features'  => 'Stretch Conversion, LED Lighting, Premium Audio, Champagne Bar',
    'Colour'        => 'Ibis White with Black Roof',
  ),
  'services'  => array( 'Proms', 'Parties', 'Birthdays', 'Hen/Stag Nights', 'Special Events', 'Celebrations' ),
  'tagline'   => 'Striking Limousine conversion with sports car DNA &mdash; perfect for making a statement arrival.',
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
