<?php
/**
 * Template Name: Fleet
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Our Wedding &amp; Prom Fleet</h1>
    <p>From Rolls Royce Wedding cars to luxury Limousines and vintage classics, our curated fleet supports Asian and English Weddings and Prom nights across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.</p>
  </div>
</section>

<section>
  <div class="container">

    <div class="grid g3" id="fleet-grid">

      <?php
      $vehicles = array(
        array( 'category' => 'luxury',      'badge' => 'Ultimate Luxury',    'href' => home_url('/our-fleet/rolls-royce-phantom/'),              'img' => 'fleet/rolls-royce-phantom/Rolls Royce Phantom.jpg',          'alt' => 'Rolls Royce Phantom',             'seats' => '4', 'name' => 'Rolls Royce Phantom',             'desc' => 'The pinnacle of luxury motoring &mdash; whisper-quiet elegance for Weddings and VIP occasions.', 'price' => 'From &pound;250 per hire' ),
        array( 'category' => 'party',       'badge' => 'Luxury Limousine',   'href' => home_url('/our-fleet/porsche-cayenne-limo/'),             'img' => 'fleet/porsche-cayenne-limo/Porsche Cayenne Limo.jpg',       'alt' => 'Porsche Cayenne Limo',            'seats' => '8', 'name' => 'Porsche Cayenne Limo',            'desc' => 'Striking Limousine conversion with sports car DNA &mdash; perfect for making a statement arrival.', 'price' => 'From &pound;250 per hire' ),
        array( 'category' => 'vintage',     'badge' => 'Vintage Style',      'href' => home_url('/our-fleet/regent-landaulette-convertible/'),   'img' => 'fleet/regent/regent-landaulette-convertible.png',          'alt' => 'Regent Landaulette Convertible',  'seats' => '6', 'name' => 'Regent Landaulette Convertible',  'desc' => 'Classic 1930s styling with modern reliability. Perfect for Weddings and open-top summer cruising.', 'price' => 'From &pound;250 per hire' ),
        array( 'category' => 'performance', 'badge' => 'Performance Beast',  'href' => home_url('/our-fleet/limited-edition-ford-mustang-gt500/'),               'img' => 'fleet/mustang-gt500/2.jpg',                                 'alt' => 'Limited Edition Ford Mustang GT500', 'seats' => '3', 'name' => 'Limited Edition Ford Mustang GT500', 'desc' => 'Raw American muscle with supercharged V8 power &mdash; ideal for music videos and photoshoots.', 'price' => 'From &pound;250 per hire' ),
        array( 'category' => 'party',       'badge' => 'Luxury Limousine',   'href' => home_url('/our-fleet/baby-bentley-chrysler-limo/'),       'img' => 'fleet/bentley-chrysler-limo/Baby Bentley Chrysler Limo.png','alt' => 'Baby Bentley Chrysler Limo',      'seats' => '8', 'name' => 'Baby Bentley Chrysler Limo',      'desc' => 'The &ldquo;Baby Bentley&rdquo; stretch Limousine. Sophisticated presence for bridal parties and executive groups.', 'price' => 'From &pound;195 per hire' ),
        array( 'category' => 'vintage',     'badge' => 'Classic Elegance',   'href' => home_url('/our-fleet/1930s-vintage-classic/'),            'img' => "fleet/vintage/1930's Vintage Classic Car.jpg",             'alt' => "1930's Vintage Classic Car",      'seats' => '3', 'name' => "1930&#39;s Vintage Classic Car",  'desc' => 'Timeless glamour and authentic period styling &mdash; creates stunning photos and cinematic moments.', 'price' => 'From &pound;195 per hire' ),
        array( 'category' => 'executive',   'badge' => 'Executive SUV',      'href' => home_url('/our-fleet/range-rover-executive/'),            'img' => 'fleet/range-rover/Range Rover Executive LWB SVO.jpg',      'alt' => 'Range Rover Executive LWB SVO',   'seats' => '4', 'name' => 'Range Rover Executive LWB SVO',  'desc' => 'Ultimate luxury SUV with extended wheelbase and bespoke SVO refinements for executive travel.', 'price' => 'From &pound;195 per hire' ),
      );

      foreach ( $vehicles as $v ) : ?>
        <article class="card" data-category="<?php echo esc_attr( $v['category'] ); ?>">
          <div class="imgwrap">
            <span class="badge"><?php echo esc_html( $v['badge'] ); ?></span>
            <a href="<?php echo esc_url( $v['href'] ); ?>" aria-label="View <?php echo esc_attr( strip_tags( $v['name'] ) ); ?> details">
              <img src="<?php echo esc_url( jp_assets( 'images/' . $v['img'] ) ); ?>" alt="<?php echo esc_attr( $v['alt'] ); ?>" loading="lazy">
            </a>
          </div>
          <div class="body">
            <h3><?php echo wp_kses_post( $v['name'] ); ?></h3>
            <div style="font-size:.85rem;color:#ccc;margin:.3rem 0 .4rem;"><?php echo esc_html( $v['seats'] ); ?> Passengers</div>
            <p><?php echo wp_kses_post( $v['desc'] ); ?></p>
            <div class="price"><?php echo wp_kses_post( $v['price'] ); ?></div>
            <a href="<?php echo esc_url( $v['href'] ); ?>" class="btn primary" style="font-size:.9rem">View Details &amp; Book</a>
          </div>
        </article>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php get_footer();
