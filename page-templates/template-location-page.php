<?php
/**
 * Template Name: Location Page
 * Template Post Type: page
 *
 * High-converting local landing page powered by ACF.
 *
 * ACF Field Group: "Location Page" — applied when template = "Location Page"
 * Fields:
 *   lp_location_name   (Text)      — e.g. "Preston"
 *   lp_county          (Text)      — e.g. "Lancashire"
 *   lp_hero_tagline    (Text)      — hero sub-headline
 *   lp_intro_text      (Textarea)  — opening paragraph (optional)
 *   lp_nearby_towns    (Text)      — comma-separated nearby towns
 *
 * @package Just_Phantoms
 */

get_header();

/* ── ACF data with safe fallbacks ── */
$location  = get_field( 'lp_location_name' ) ?: get_the_title();
$county    = get_field( 'lp_county' )         ?: 'Lancashire';
$tagline   = get_field( 'lp_hero_tagline' )   ?: 'Premium chauffeur-driven cars for Weddings, Proms and every special occasion.';
$intro     = get_field( 'lp_intro_text' )     ?: '';
$nearby_r  = get_field( 'lp_nearby_towns' )   ?: '';

$loc  = esc_html( $location );
$cty  = esc_html( $county );

$nearby = $nearby_r
  ? array_filter( array_map( 'trim', explode( ',', $nearby_r ) ) )
  : [ 'Preston', 'Blackburn', 'Burnley', 'Lancaster', 'Blackpool',
      'Chorley', 'Leyland', 'Accrington', 'Nelson', 'Colne',
      'Clitheroe', 'Morecambe', 'Fleetwood', 'Lytham St Annes' ];

/* ── URLs ── */
$wedding_url = esc_url( home_url( '/wedding-quote/' ) );
$prom_url    = esc_url( home_url( '/prom-quote/'    ) );
$quote_url   = esc_url( home_url( '/wedding-quote/' ) );
$fleet_url   = esc_url( home_url( '/our-fleet/'     ) );
$tel_href    = 'tel:+447504040407';
$tel_disp    = '07504 040 407';
?>

<?php /* ═══════════ HERO ═══════════ */ ?>
<section class="loc-pg-hero">
  <div class="loc-pg-hero-overlay" aria-hidden="true"></div>
  <div class="container loc-pg-hero-inner">

    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <span aria-hidden="true"> › </span>
      <a href="<?php echo esc_url( home_url( '/locations/' ) ); ?>">Locations</a>
      <span aria-hidden="true"> › </span>
      <span><?php echo $loc; ?></span>
    </nav>

    <p class="eyebrow">Luxury Car Hire · <?php echo $loc; ?>, <?php echo $cty; ?></p>
    <h1>Wedding &amp; Prom Car Hire<br><span class="loc-pg-gold"><?php echo $loc; ?></span></h1>
    <p class="loc-pg-sub"><?php echo esc_html( $tagline ); ?></p>

    <div class="loc-pg-trust">
      <span>&#9733;&#9733;&#9733;&#9733;&#9733; 5-Star Rated</span>
      <span class="loc-pg-sep" aria-hidden="true">|</span>
      <span>DBS-Checked Chauffeurs</span>
      <span class="loc-pg-sep" aria-hidden="true">|</span>
      <span>15-Min Early Arrival</span>
      <span class="loc-pg-sep" aria-hidden="true">|</span>
      <span>Price-Match Guarantee</span>
    </div>

    <div class="loc-pg-hero-btns">
      <a class="btn primary" href="<?php echo $wedding_url; ?>">Book Wedding Car &rarr;</a>
      <a class="btn btn-prom-quote" href="<?php echo $prom_url; ?>">Book Prom Limo &rarr;</a>
      <a class="btn btn-hero-tel" href="<?php echo $tel_href; ?>">Call <?php echo $tel_disp; ?></a>
    </div>

  </div>
</section>


<?php /* ═══════════ STAT BAR ═══════════ */ ?>
<div class="loc-pg-stats-bar">
  <div class="container loc-pg-stats-inner">
    <div class="loc-pg-stat">
      <span class="loc-pg-stat-num">500+</span>
      <span class="loc-pg-stat-lbl">Happy Customers</span>
    </div>
    <div class="loc-pg-stat-div" aria-hidden="true"></div>
    <div class="loc-pg-stat">
      <span class="loc-pg-stat-num">5&#9733;</span>
      <span class="loc-pg-stat-lbl">Google Rating</span>
    </div>
    <div class="loc-pg-stat-div" aria-hidden="true"></div>
    <div class="loc-pg-stat">
      <span class="loc-pg-stat-num">15 min</span>
      <span class="loc-pg-stat-lbl">Early Arrival Promise</span>
    </div>
    <div class="loc-pg-stat-div" aria-hidden="true"></div>
    <div class="loc-pg-stat">
      <span class="loc-pg-stat-num">Beat by 10%</span>
      <span class="loc-pg-stat-lbl">Price-Match Guarantee</span>
    </div>
  </div>
</div>


<?php /* ═══════════ INTRO ═══════════ */ ?>
<section class="loc-pg-intro">
  <div class="container loc-pg-intro-inner">

    <div class="loc-pg-intro-text">
      <p class="eyebrow">About Our <?php echo $loc; ?> Service</p>
      <h2>Luxury Car Hire in <?php echo $loc; ?>, <?php echo $cty; ?></h2>
      <div class="gold-divider" style="margin:0 0 1.5rem;"></div>
      <?php if ( $intro ) : ?>
        <p><?php echo wp_kses_post( $intro ); ?></p>
      <?php else : ?>
        <p>Just Phantoms is <?php echo $cty; ?>'s premier Wedding and Prom car hire company, proudly serving <strong><?php echo $loc; ?></strong> and the surrounding areas. Whether you need a stunning <strong>Rolls Royce Phantom</strong> for your Wedding day, a <strong>stretch Limousine</strong> for Prom night, or any luxury vehicle for a special occasion — we have the perfect car and chauffeur for you.</p>
        <p>Every chauffeur arrives <strong>at least 15 minutes early</strong>, every vehicle is freshly valeted, and every booking comes with our <strong>Price-Match Guarantee</strong>. We have been trusted by hundreds of couples and families across <?php echo $cty; ?> and are proud of our 5-star reputation.</p>
      <?php endif; ?>
      <div class="loc-pg-intro-btns">
        <a class="btn primary"        href="<?php echo $wedding_url; ?>">Get Wedding Quote</a>
        <a class="btn btn-prom-quote" href="<?php echo $prom_url; ?>">Get Prom Quote</a>
        <a class="btn btn-ghost-gold" href="<?php echo $fleet_url; ?>">View Our Fleet</a>
      </div>
    </div>

    <div class="loc-pg-booking-cards">

      <a class="loc-pg-book-card loc-pg-book-wedding" href="<?php echo $wedding_url; ?>">
        <div class="loc-pg-book-body">
          <h3>Wedding Car Hire</h3>
          <p>Rolls Royce, vintage classics &amp; luxury fleet for your perfect Wedding day in <?php echo $loc; ?>.</p>
          <span class="loc-pg-book-cta">Get Free Quote &rarr;</span>
        </div>
      </a>

      <a class="loc-pg-book-card loc-pg-book-prom" href="<?php echo $prom_url; ?>">
        <div class="loc-pg-book-body">
          <h3>Prom Limo Hire</h3>
          <p>Porsche Limo, Mustang &amp; Baby Bentley stretch for an unforgettable Prom night near <?php echo $loc; ?>.</p>
          <span class="loc-pg-book-cta">Book Prom Limo &rarr;</span>
        </div>
      </a>

      <a class="loc-pg-book-card loc-pg-book-other" href="<?php echo $quote_url; ?>">
        <div class="loc-pg-book-body">
          <h3>Any Other Occasion</h3>
          <p>Birthdays, anniversaries, airport transfers, corporate events &amp; more across <?php echo $cty; ?>.</p>
          <span class="loc-pg-book-cta">Get a Quote &rarr;</span>
        </div>
      </a>

    </div>

  </div>
</section>


<?php /* ═══════════ WHY US ═══════════ */ ?>
<section class="loc-pg-why">
  <div class="container">

    <div style="text-align:center;margin-bottom:2.5rem;">
      <p class="eyebrow">Why Choose Us</p>
      <h2>Why <?php echo $loc; ?> Trusts Just Phantoms</h2>
      <div class="gold-divider" style="margin:.75rem auto 0;"></div>
    </div>

    <div class="loc-pg-why-grid">

      <div class="loc-pg-why-item">
        <h4>Always On Time</h4>
        <p>Every chauffeur arrives a minimum of 15 minutes early — never a moment of stress on your big day.</p>
      </div>

      <div class="loc-pg-why-item">
        <h4>Freshly Valeted</h4>
        <p>Every vehicle is professionally cleaned before your booking. You will always step into an immaculate car.</p>
      </div>

      <div class="loc-pg-why-item">
        <h4>Price-Match Guarantee</h4>
        <p>Found a better quote from a VAT-registered firm? We will beat it by 10%, guaranteed — no haggling needed.</p>
      </div>

      <div class="loc-pg-why-item">
        <h4>Professional Chauffeurs</h4>
        <p>Smart, DBS-checked and fully licensed. Our chauffeurs treat every journey with the respect it deserves.</p>
      </div>

      <div class="loc-pg-why-item">
        <h4>Complimentary Extras</h4>
        <p>Bottled water and ribbons included as standard — the small touches that make a big difference.</p>
      </div>

      <div class="loc-pg-why-item">
        <h4>5-Star Reputation</h4>
        <p>Hundreds of glowing reviews from real customers across <?php echo $cty; ?>. Our work truly speaks for itself.</p>
      </div>

    </div>

  </div>
</section>


<?php /* ═══════════ MID CTA ═══════════ */ ?>
<div class="loc-pg-mid-cta">
  <div class="container loc-pg-mid-cta-inner">
    <div>
      <h3>Ready to book in <?php echo $loc; ?>?</h3>
      <p>Dates fill fast — especially summer Saturdays. Secure your vehicle today.</p>
    </div>
    <div class="loc-pg-mid-cta-btns">
      <a class="btn primary"        href="<?php echo $wedding_url; ?>">Book Wedding Car &rarr;</a>
      <a class="btn btn-prom-quote" href="<?php echo $prom_url; ?>">Book Prom Limo &rarr;</a>
      <a class="btn btn-hero-tel"   href="<?php echo $tel_href; ?>">Call Us</a>
    </div>
  </div>
</div>


<?php /* ═══════════ FLEET ═══════════ */ ?>
<?php
$base       = get_template_directory_uri() . '/assets/images/fleet/';
$fleet_cars = [
  [
    'name' => 'Rolls Royce Phantom',
    'tag'  => 'Ultimate Luxury',
    'desc' => 'The world\'s most prestigious chauffeur car. Starlight headliner, V12 power and handcrafted British elegance — the definitive Wedding car in ' . $cty . '.',
    'img'  => $base . 'rolls-royce-phantom/Rolls Royce Phantom.jpg',
    'url'  => home_url( '/our-fleet/rolls-royce-phantom/' ),
  ],
  [
    'name' => 'Range Rover Executive LWB SVO',
    'tag'  => 'Executive SUV',
    'desc' => 'Long-wheelbase, commanding and supremely luxurious. Perfect for Wedding parties, corporate transfers and Prom nights near ' . $loc . '.',
    'img'  => $base . 'range-rover/Range Rover Executive LWB SVO.jpg',
    'url'  => home_url( '/our-fleet/range-rover-executive-lwb-svo/' ),
  ],
  [
    'name' => 'Porsche Cayenne Limo',
    'tag'  => '8-Passenger Limo',
    'desc' => 'The most striking stretch Limousine in our fleet. Seats up to 8 — ideal for Proms, hen parties and bridal groups in ' . $loc . '.',
    'img'  => $base . 'porsche-cayenne-limo/Porsche Cayenne Limo.jpg',
    'url'  => home_url( '/our-fleet/porsche-cayenne-limo/' ),
  ],
  [
    'name' => 'Limited Edition Ford Mustang GT500',
    'tag'  => 'Head-Turner',
    'desc' => 'Supercharged V8 power in a limited-edition body. One of the most sought-after Prom cars available in ' . $cty . '.',
    'img'  => $base . 'mustang-gt500/Limited Edition Mustang GT500.jpg',
    'url'  => home_url( '/our-fleet/limited-edition-ford-mustang-gt500/' ),
  ],
  [
    'name' => '1930s Vintage Classic Car',
    'tag'  => 'Vintage',
    'desc' => 'Timeless pre-war styling for vintage-themed Weddings and classic ceremonies. Truly one of a kind.',
    'img'  => $base . "vintage/1930's Vintage Classic Car.jpg",
    'url'  => home_url( '/our-fleet/1930s-vintage-classic/' ),
  ],
  [
    'name' => 'Baby Bentley Chrysler Limo',
    'tag'  => 'Stretch Limo',
    'desc' => 'Our iconic Baby Bentley stretch — glamorous, spacious and perfect for Proms and parties across ' . $cty . '.',
    'img'  => $base . 'bentley-chrysler-limo/Baby Bentley Chrysler Limo.png',
    'url'  => home_url( '/our-fleet/baby-bentley-chrysler-limo/' ),
  ],
  [
    'name' => 'Regent Landaulette Convertible',
    'tag'  => 'Open-Top Classic',
    'desc' => 'An elegant open-top Convertible with classic coachwork — a truly unique and romantic choice for summer Weddings in ' . $cty . '.',
    'img'  => $base . 'regent/regent-landaulette-convertible.png',
    'url'  => home_url( '/our-fleet/regent-landaulette-convertible/' ),
  ],
];
?>
<section class="loc-pg-fleet">
  <div class="container">

    <div style="text-align:center;margin-bottom:2.5rem;">
      <p class="eyebrow">Our Fleet</p>
      <h2>Vehicles Available Near <?php echo $loc; ?></h2>
      <div class="gold-divider" style="margin:.75rem auto 0;"></div>
    </div>

    <div class="loc-pg-fleet-grid">
      <?php foreach ( $fleet_cars as $car ) : ?>
      <div class="loc-pg-fleet-card">
        <figure class="loc-pg-fleet-img">
          <img src="<?php echo esc_url( $car['img'] ); ?>"
               alt="<?php echo esc_attr( $car['name'] ) . ' available for hire in ' . esc_attr( $loc ); ?>"
               loading="lazy" width="600" height="338">
          <span class="loc-pg-fleet-tag"><?php echo esc_html( $car['tag'] ); ?></span>
        </figure>
        <div class="loc-pg-fleet-body">
          <h3><?php echo esc_html( $car['name'] ); ?></h3>
          <p><?php echo esc_html( $car['desc'] ); ?></p>
          <div class="loc-pg-fleet-footer">
            <a class="btn ghost" href="<?php echo esc_url( $car['url'] ); ?>">View Car &rarr;</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center;margin-top:2.5rem;">
      <a class="btn ghost" href="<?php echo $fleet_url; ?>">View Full Fleet &rarr;</a>
    </div>

  </div>
</section>


<?php /* ═══════════ HOW IT WORKS ═══════════ */ ?>
<section class="loc-pg-hiw">
  <div class="container">

    <div style="text-align:center;margin-bottom:2.5rem;">
      <p class="eyebrow">Simple Process</p>
      <h2>How to Book Your <?php echo $loc; ?> Car Hire</h2>
      <div class="gold-divider" style="margin:.75rem auto 0;"></div>
    </div>

    <div class="loc-pg-hiw-grid">
      <div class="step-card">
        <div class="step-num">1</div>
        <div class="step-info">
          <h4>Choose &amp; Enquire</h4>
          <p>Pick your vehicle and request a free, no-obligation quote online or call us on <?php echo $tel_disp; ?>.</p>
        </div>
      </div>
      <div class="step-card">
        <div class="step-num">2</div>
        <div class="step-info">
          <h4>Confirm Your Date</h4>
          <p>Review your personalised quote, confirm with a deposit, and your date is locked exclusively for you.</p>
        </div>
      </div>
      <div class="step-card">
        <div class="step-num">3</div>
        <div class="step-info">
          <h4>Arrive in Style</h4>
          <p>Your chauffeur arrives 15 minutes early in an immaculate vehicle. Relax and enjoy every moment.</p>
        </div>
      </div>
    </div>

    <div style="text-align:center;margin-top:2.5rem;">
      <a class="btn primary" href="<?php echo $wedding_url; ?>">Get Your Free Quote &rarr;</a>
    </div>

  </div>
</section>


<?php /* ═══════════ NEARBY ═══════════ */ ?>
<section class="loc-pg-nearby">
  <div class="container">

    <div style="text-align:center;margin-bottom:1.5rem;">
      <p class="eyebrow">Coverage</p>
      <h2>Also Serving Areas Near <?php echo $loc; ?></h2>
    </div>

    <div class="loc-pg-nearby-pills">
      <?php foreach ( $nearby as $town ) : ?>
      <span class="loc-pg-nearby-pill"><?php echo esc_html( $town ); ?></span>
      <?php endforeach; ?>
    </div>

    <p class="loc-pg-nearby-note">Don&rsquo;t see your exact town? <a href="<?php echo $quote_url; ?>">Get in touch</a> &mdash; we travel across the North of England and beyond.</p>

  </div>
</section>


<?php /* ═══════════ FINAL CTA ═══════════ */ ?>
<section class="cta-section loc-pg-final-cta">
  <div class="container">
    <h2>Book Luxury Car Hire in <?php echo $loc; ?> Today</h2>
    <p>Free quotes &middot; No obligation &middot; Fast response &middot; Price-Match Guarantee</p>
    <div class="cta-buttons">
      <a class="btn primary"        href="<?php echo $wedding_url; ?>">Book Wedding Car &rarr;</a>
      <a class="btn btn-prom-quote" href="<?php echo $prom_url; ?>">Book Prom Limo &rarr;</a>
      <a class="btn btn-hero-tel"   href="<?php echo $tel_href; ?>">Call <?php echo $tel_disp; ?></a>
    </div>
  </div>
</section>


<?php /* ═══════════ SCHEMA ═══════════ */ ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Just Phantoms",
  "description": "Luxury Wedding and Prom car hire in <?php echo esc_js( $location ); ?>, <?php echo esc_js( $county ); ?>.",
  "url": "<?php echo esc_url( get_permalink() ); ?>",
  "telephone": "+447504040407",
  "email": "info@justphantoms.com",
  "areaServed": { "@type": "City", "name": "<?php echo esc_js( $location ); ?>" },
  "aggregateRating": { "@type": "AggregateRating", "ratingValue": "5", "bestRating": "5", "ratingCount": "150" }
}
</script>

<?php get_footer();
