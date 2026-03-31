<?php
/**
 * Template Name: Locations
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero loc-hero">
  <div class="container">
    <p class="eyebrow">Coverage Area</p>
    <h1>Locations We Cover</h1>
    <p class="hero-sub">Luxury Wedding and Prom car hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire &mdash; and beyond.</p>
  </div>
</section>

<!-- ── Towns & Cities ── -->
<section class="loc-section">
  <div class="container">

    <div class="loc-section-head">
      <p class="eyebrow">Towns &amp; Cities</p>
      <h2>Where We Travel</h2>
      <div class="gold-divider"></div>
    </div>

    <p class="loc-intro">Based in Lancashire, Just Phantoms regularly travels across the North of England and Midlands for Wedding and Prom bookings. Don&rsquo;t see your town listed? <a href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Get in touch</a> &mdash; we cover a wide area and will always do our best to accommodate you.</p>

    <?php
    $quote_url = esc_url( home_url( '/wedding-quote/' ) );
    $regions = array(
      'Lancashire' => array( 'Preston', 'Blackburn', 'Burnley', 'Lancaster', 'Blackpool', 'Chorley', 'Leyland', 'Accrington', 'Nelson', 'Colne', 'Clitheroe', 'Morecambe', 'Fleetwood', 'Lytham St Annes', 'Skelmersdale' ),
      'Greater Manchester' => array( 'Manchester', 'Salford', 'Bolton', 'Wigan', 'Bury', 'Rochdale', 'Oldham', 'Stockport', 'Tameside', 'Trafford' ),
      'Yorkshire' => array( 'Leeds', 'Bradford', 'York', 'Sheffield', 'Huddersfield', 'Halifax', 'Wakefield', 'Harrogate', 'Doncaster', 'Rotherham', 'Barnsley', 'Keighley', 'Dewsbury', 'Castleford', 'Skipton' ),
      'Cumbria' => array( 'Carlisle', 'Kendal', 'Penrith', 'Barrow-in-Furness', 'Whitehaven', 'Workington', 'Ulverston', 'Windermere', 'Keswick', 'Ambleside' ),
      'Derbyshire' => array( 'Derby', 'Chesterfield', 'Matlock', 'Buxton', 'Glossop', 'Ilkeston', 'Long Eaton', 'Swadlincote', 'Ripley', 'Alfreton' ),
      'Nottinghamshire' => array( 'Nottingham', 'Mansfield', 'Newark-on-Trent', 'Retford', 'Worksop', 'Arnold', 'Beeston', 'Hucknall', 'Kirkby-in-Ashfield', 'Eastwood' ),
    );
    ?>
    <div class="loc-regions">
      <?php foreach ( $regions as $name => $towns ) : ?>
      <div class="loc-region">
        <h3><?php echo esc_html( $name ); ?></h3>
        <ul class="loc-list">
          <?php foreach ( $towns as $town ) : ?>
          <li><a href="<?php echo $quote_url; ?>"><?php echo esc_html( $town ); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="loc-tag-cloud">
      <p>We also serve: Accrington &bull; Ashton-under-Lyne &bull; Bacup &bull; Barnoldswick &bull; Barrowford &bull; Brierfield &bull; Cheetham Hill &bull; Darwen &bull; Farnsworth &bull; Fulwood &bull; Great Harwood &bull; Haslingden &bull; Leigh &bull; Liverpool &bull; Middleton &bull; Old Trafford &bull; Padiham &bull; Prestwich &bull; Rawtenstall &bull; Rishton &bull; Southport &bull; St Helens &bull; Stretford &bull; Whalley &bull; Wythenshawe &bull; and many more.</p>
    </div>

  </div>
</section>

<!-- ── Vehicles by Location ── -->
<section class="loc-section">
  <div class="container">

    <div class="loc-section-head">
      <p class="eyebrow">Our Fleet</p>
      <h2>Vehicles &amp; Where We Cover</h2>
      <div class="gold-divider"></div>
    </div>

    <?php
    $vehicles = array(
      array(
        'name'  => 'Rolls Royce Phantom',
        'url'   => home_url( '/our-fleet/rolls-royce-phantom/' ),
        'desc'  => 'The ultimate Wedding and VIP transport &mdash; available across Lancashire, Yorkshire, Cumbria and Nationwide.',
        'areas' => array( 'Preston', 'Blackburn', 'Burnley', 'Manchester', 'Leeds', 'Bradford', 'York', 'Sheffield', 'Carlisle', 'Kendal', 'Nationwide' ),
      ),
      array(
        'name'  => 'Range Rover Executive LWB SVO',
        'url'   => home_url( '/our-fleet/range-rover-executive/' ),
        'desc'  => 'Luxury executive SUV for Weddings, Proms and airport transfers across the North of England.',
        'areas' => array( 'Preston', 'Manchester', 'Liverpool', 'Leeds', 'Sheffield', 'Bolton', 'Wigan', 'Stockport', 'Harrogate', 'Nationwide' ),
      ),
      array(
        'name'  => 'Porsche Cayenne Limo',
        'url'   => home_url( '/our-fleet/porsche-cayenne-limo/' ),
        'desc'  => 'Striking 8-passenger Limousine for Prom nights, hen parties and Wedding bridal groups.',
        'areas' => array( 'Blackpool', 'Burnley', 'Chorley', 'Manchester', 'Salford', 'Wigan', 'Bury', 'Rochdale', 'Oldham', 'Skipton' ),
      ),
      array(
        'name'  => 'Baby Bentley Chrysler Limo',
        'url'   => home_url( '/our-fleet/baby-bentley-chrysler-limo/' ),
        'desc'  => 'The &ldquo;Baby Bentley&rdquo; stretch Limo &mdash; 8 passengers, ideal for Prom and Wedding parties.',
        'areas' => array( 'Preston', 'Lancaster', 'Leyland', 'Nelson', 'Colne', 'Clitheroe', 'Morecambe', 'Fleetwood', 'Lytham St Annes', 'Skelmersdale' ),
      ),
      array(
        'name'  => 'Limited Edition Ford Mustang GT500',
        'url'   => home_url( '/our-fleet/limited-edition-ford-mustang-gt500/' ),
        'desc'  => 'Supercharged V8 performance car for music videos, photoshoots and Prom arrivals.',
        'areas' => array( 'Manchester', 'Salford', 'Bolton', 'Stockport', 'Leeds', 'Bradford', 'Sheffield', 'Huddersfield', 'Wakefield', 'Nationwide' ),
      ),
      array(
        'name'  => "1930's Vintage Classic Car",
        'url'   => home_url( '/our-fleet/1930s-vintage-classic/' ),
        'desc'  => 'Timeless period styling for vintage-themed Weddings and classic car photoshoots.',
        'areas' => array( 'Preston', 'Blackburn', 'Chorley', 'Lancaster', 'Burnley', 'Accrington', 'Nelson', 'Colne', 'Clitheroe', 'Nationwide' ),
      ),
      array(
        'name'  => 'Regent Landaulette Convertible',
        'url'   => home_url( '/our-fleet/regent-landaulette-convertible/' ),
        'desc'  => 'Classic open-top convertible &mdash; perfect for summer Weddings and outdoor ceremonies.',
        'areas' => array( 'Preston', 'Lancaster', 'Kendal', 'Windermere', 'Morecambe', 'Fleetwood', 'Lytham St Annes', 'Skipton', 'Harrogate', 'Nationwide' ),
      ),
    );
    ?>
    <div class="loc-vehicles-grid">
      <?php foreach ( $vehicles as $v ) : ?>
      <div class="loc-vehicle-card">
        <h3><a href="<?php echo esc_url( $v['url'] ); ?>"><?php echo esc_html( $v['name'] ); ?></a></h3>
        <p><?php echo $v['desc']; ?></p>
        <div class="loc-also-tags">
          <?php foreach ( $v['areas'] as $area ) : ?>
          <a href="<?php echo esc_url( $v['url'] ); ?>"><?php echo esc_html( $area ); ?></a>
          <?php endforeach; ?>
        </div>
        <a href="<?php echo esc_url( $v['url'] ); ?>" class="btn primary">View Vehicle</a>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ── Areas Covered (SEO) ── -->
<section class="promise-areas">
  <div class="container">

    <div class="loc-section-head">
      <p class="eyebrow">Coverage</p>
      <h2>Areas Covered</h2>
      <div class="gold-divider"></div>
    </div>

    <?php
    $areas = array( 'Lancashire', 'Yorkshire', 'Midlands', 'Cumbria', 'London', 'North Wales', 'Liverpool', 'Manchester', 'Kent', 'Nationwide' );
    $cols  = array(
      array( 'label' => 'Rolls Royce Hire',  'url' => home_url( '/our-fleet/rolls-royce-phantom/' ) ),
      array( 'label' => 'Phantom Hire',       'url' => home_url( '/our-fleet/rolls-royce-phantom/' ) ),
      array( 'label' => 'Wedding Car Hire',   'url' => home_url( '/wedding-quote/' ) ),
      array( 'label' => 'Luxury Car Hire',    'url' => home_url( '/our-fleet/' ) ),
      array( 'label' => 'Limo Hire',          'url' => home_url( '/our-fleet/porsche-cayenne-limo/' ) ),
      array( 'label' => 'Classic Car Hire',   'url' => home_url( '/our-fleet/baby-bentley-chrysler-limo/' ) ),
      array( 'label' => 'Vintage Car Hire',   'url' => home_url( '/our-fleet/1930s-vintage-classic/' ) ),
      array( 'label' => 'Event Car Hire',     'url' => home_url( '/services/' ) ),
    );
    ?>
    <div class="areas-grid">
      <?php foreach ( $cols as $col ) : ?>
      <div class="area-col">
        <h4><?php echo esc_html( $col['label'] ); ?></h4>
        <ul>
          <?php foreach ( $areas as $area ) : ?>
          <li><a href="<?php echo esc_url( $col['url'] ); ?>"><?php echo esc_html( $area ); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-section">
  <div class="container">
    <h3>Ready to secure your Wedding or Prom transport?</h3>
    <p>Get an instant quote for your Wedding or Prom car and Limousine package. We regularly cover Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.</p>
    <div class="cta-buttons">
      <a class="btn primary" href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Get Wedding Quote</a>
      <a class="btn btn-prom-quote" href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>">Get Prom Quote</a>
      <a class="btn btn-hero-tel" href="tel:+447504040407">Call 07504 040 407</a>
    </div>
  </div>
</section>

<?php get_footer();
