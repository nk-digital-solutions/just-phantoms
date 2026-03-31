<?php
/**
 * Template Name: Vehicle - Baby Bentley Chrysler Limo
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header();

$vehicle = array(
  'name'      => 'Baby Bentley Chrysler Limo',
  'badge'     => 'Luxury Limousine',
  'seats'     => '8',
  'img_dir'   => 'images/fleet/bentley-chrysler-limo/',
  'main_img'  => 'Baby Bentley Chrysler Limo.png',
  'thumbs'    => array(
    'Baby Bentley Chrysler Limo.png',
    'Baby Bentley Chrysler Limo 2.png',
    'Baby Bentley Chrysler Limo 3.png',
    'Baby Bentley Chrysler Limo 4.png',
  ),
  'desc'      => array(
    'The Chrysler Limo, affectionately known as the \'Baby Bentley\', is one of the most popular luxury Limousine choices for Weddings, Proms, parties, and corporate events across the UK. This stunning stretch Limousine offers unparalleled comfort and entertainment, accommodating up to 8 passengers in a spacious interior designed for celebration. Featuring plush leather seating, ambient mood lighting, and a state-of-the-art entertainment system that creates an atmosphere reminiscent of a high-end nightclub, this Limo ensures your journey is as enjoyable as your destination.',
    'The high-quality sound system with Bluetooth connectivity, multimedia features, xenon lights, and customisable disco lights transform every ride into a memorable experience. With a minibar, full air conditioning, privacy partition, and sat-nav, the Chrysler Limo combines luxury with practical comfort for any season. Ideal for Asian and English Wedding group transport, including ceremonies, reception moves, and evening celebrations. Available with professional chauffeurs across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.',
  ),
  'features'  => array(
    array( 'title' => 'Spacious Luxury Interior', 'desc' => 'Seating for up to 8 passengers with plush leather seats, ample space, and J-seat configuration perfect for socialising.' ),
    array( 'title' => 'Entertainment System', 'desc' => 'Premium sound system, Bluetooth, multimedia connectivity, star lights, and disco lights creating a nightclub atmosphere.' ),
    array( 'title' => 'Comfort &amp; Privacy', 'desc' => 'Full air conditioning, privacy partition, xenon lights, and sat-nav for a comfortable exclusive journey.' ),
    array( 'title' => 'Minibar &amp; Amenities', 'desc' => 'On-board minibar with crystal glassware and ice buckets for refreshments throughout your ride.' ),
  ),
  'specs'     => array(
    'Model'         => 'Baby Bentley Chrysler Limo',
    'Capacity'      => '8 passengers',
    '0-60mph'       => '7.9 seconds',
    'Top Speed'     => '100 mph',
    'Power'         => '300 BHP',
    'Length'        => 'Stretch Limousine (30ft approx)',
    'Key Features'  => 'Bluetooth, Xenon Lights, Sat Nav, Star Lights, Multimedia, Disco Lights, Minibar, Privacy Partition',
    'Colour'        => 'Available in Black or White',
  ),
  'services'  => array( 'Weddings', 'Proms', 'Birthdays', 'Hen/Stag Parties', 'Corporate Events', 'Nights Out' ),
  'tagline'   => 'The &ldquo;Baby Bentley&rdquo; stretch Limousine &mdash; sophisticated presence for bridal parties and executive groups.',
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
