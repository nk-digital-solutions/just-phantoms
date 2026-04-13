<?php
/**
 * Front Page — Homepage Template
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<!-- HERO -->
<section class="hero">
  <video class="hero-video" autoplay muted loop playsinline>
    <source src="<?php echo esc_url( jp_assets( 'images/hero/Just-Phantoms-Homepage-Video.mp4' ) ); ?>" type="video/mp4">
  </video>
  <div class="container hero-inner">
    <div>
      <div class="eyebrow">Wedding &amp; Prom Car Hire Specialists</div>
      <h1>Luxury arrivals for Weddings and Proms.</h1>
      <p>Chauffeur-driven Wedding and Prom car and Limousine hire across <strong>Lancashire</strong>, <strong>Yorkshire</strong>,
        <strong>Cumbria</strong>, <strong>Derbyshire</strong> and <strong>Nottinghamshire</strong>. Specialising in Asian and English Weddings and high-impact Prom arrivals.</p>
      <div class="tick">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Price-match within 7 days &mdash; we will beat like-for-like quotes by 10%.
      </div>
      <div class="tick">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Experienced smart dressed Chauffeurs for every occasion.
      </div>
      <div class="tick">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Freshly valeted vehicles for every booking.
      </div>
      <div class="tick">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Chauffeurs arrive <strong>15 minutes early</strong> &mdash; always punctual.
      </div>
      <div class="tick">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Complimentary touches: bottled water, drinks &amp; bow tie ribbons on request.
      </div>
      <div class="form-actions">
        <a class="btn primary" href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Get Wedding Quote</a>
        <a class="btn btn-prom-quote" href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>">Get Prom Quote</a>
        <a class="btn btn-general-quote" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">General Quote</a>
        <a class="btn btn-hero-tel" href="tel:+447504040407">Call 07504 040 407</a>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about">
  <div class="container">
    <div class="section-head">
      <h2>Luxury Without Compromise</h2>
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Explore Services</a>
    </div>
    <p class="lead">Just Phantoms provides premium Wedding and Prom car and Limousine hire with professional chauffeurs,
      trusted for Nikah, Walima, Hindu, Sikh, Pakistani, Indian, Bangladeshi and traditional English Wedding transport, plus unforgettable Prom night arrivals. We regularly cover <strong>Preston, Blackburn, Burnley, Lancaster,
      Blackpool, Leeds, Bradford, York, Sheffield, Carlisle, Kendal, Penrith, Derby, Chesterfield, Nottingham,
      Mansfield</strong> and surrounding areas.</p>
    <div class="pill-row">
      <span class="pill">Nationwide coverage</span>
      <span class="pill">Immaculate vehicles</span>
      <span class="pill">Professional chauffeurs</span>
      <span class="pill">Tailored packages</span>
      <span class="pill">Transparent pricing</span>
    </div>
  </div>
</section>

<!-- FLEET SHOWCASE -->
<section id="fleet">
  <div class="container">
    <div class="section-head">
      <h2>Our Fleet &mdash; Built to Impress</h2>
      <div style="display:flex;gap:.6rem;flex-wrap:wrap">
        <a class="btn primary" href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Check Wedding Availability</a>
        <a class="btn ghost" href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>">Check Prom Availability</a>
      </div>
    </div>
    <div class="grid g3">

      <?php
      // Reusable fleet card helper.
      $passenger_icon = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>';

      $vehicles = array(
        array(
          'badge'    => 'Rolls-Royce',
          'href'     => home_url( '/our-fleet/rolls-royce-phantom/' ),
          'img_src'  => jp_assets( 'images/fleet/rolls-royce-phantom/Rolls Royce Phantom.jpg' ),
          'img_alt'  => 'Rolls Royce Phantom',
          'seats'    => '4',
          'name'     => 'Rolls Royce Phantom',
          'desc'     => 'The pinnacle of luxury motoring &mdash; whisper-quiet elegance for Weddings and VIP occasions.',
          'price'    => 'From &pound;250 per hire',
        ),
        array(
          'badge'    => 'Limo',
          'href'     => home_url( '/our-fleet/porsche-cayenne-limo/' ),
          'img_src'  => jp_assets( 'images/fleet/porsche-cayenne-limo/Porsche Cayenne Limo.jpg' ),
          'img_alt'  => 'Porsche Cayenne Limo',
          'seats'    => '8',
          'name'     => 'Porsche Cayenne Limo',
          'desc'     => 'Striking Limousine conversion with sports car DNA &mdash; perfect for making a statement arrival.',
          'price'    => 'From &pound;250 per hire',
        ),
        array(
          'badge'    => 'Vintage',
          'href'     => home_url( '/our-fleet/regent-landaulette-convertible/' ),
          'img_src'  => jp_assets( 'images/fleet/regent/regent-landaulette-convertible.png' ),
          'img_alt'  => 'Regent Landaulette Convertible',
          'seats'    => '6',
          'name'     => 'Regent Landaulette Convertible',
          'desc'     => 'Classic 1930s styling with modern reliability. Perfect for Weddings and open-top summer cruising.',
          'price'    => 'From &pound;250 per hire',
        ),
        array(
          'badge'    => 'Performance',
          'href'     => home_url( '/our-fleet/limited-edition-ford-mustang-gt500/' ),
          'img_src'  => jp_assets( 'images/fleet/mustang-gt500/2.jpg' ),
          'img_alt'  => 'Limited Edition Ford Mustang GT500',
          'seats'    => '3',
          'name'     => 'Limited Edition Ford Mustang GT500',
          'desc'     => 'Raw American muscle with supercharged V8 power &mdash; ideal for music videos and photoshoots.',
          'price'    => 'From &pound;250 per hire',
        ),
        array(
          'badge'    => 'Limo',
          'href'     => home_url( '/our-fleet/baby-bentley-chrysler-limo/' ),
          'img_src'  => jp_assets( 'images/fleet/bentley-chrysler-limo/Baby Bentley Chrysler Limo.png' ),
          'img_alt'  => 'Baby Bentley Chrysler Limo',
          'seats'    => '8',
          'name'     => 'Baby Bentley Chrysler Limo',
          'desc'     => 'The &ldquo;Baby Bentley&rdquo; stretch Limousine. Sophisticated presence for bridal parties and executive groups.',
          'price'    => 'From &pound;195 per hire',
        ),
        array(
          'badge'    => 'Vintage',
          'href'     => home_url( '/our-fleet/1930s-vintage-classic/' ),
          'img_src'  => jp_assets( "images/fleet/vintage/1930's Vintage Classic Car.jpg" ),
          'img_alt'  => "1930's Vintage Classic Car",
          'seats'    => '3',
          'name'     => "1930's Vintage Classic Car",
          'desc'     => 'Timeless glamour and authentic period styling &mdash; creates stunning photos and cinematic moments.',
          'price'    => 'From &pound;195 per hire',
        ),
        array(
          'badge'    => 'Executive',
          'href'     => home_url( '/our-fleet/range-rover-executive/' ),
          'img_src'  => jp_assets( 'images/fleet/range-rover/Range Rover Executive LWB SVO.jpg' ),
          'img_alt'  => 'Range Rover Executive LWB SVO',
          'seats'    => '4',
          'name'     => 'Range Rover Executive LWB SVO',
          'desc'     => 'Ultimate luxury SUV with extended wheelbase and bespoke SVO refinements for executive travel.',
          'price'    => 'From &pound;195 per hire',
        ),
      );

      foreach ( $vehicles as $v ) : ?>
        <article class="card">
          <div class="imgwrap">
            <span class="badge"><?php echo esc_html( $v['badge'] ); ?></span>
            <a href="<?php echo esc_url( $v['href'] ); ?>" aria-label="View <?php echo esc_attr( $v['name'] ); ?> details">
              <img src="<?php echo esc_url( $v['img_src'] ); ?>" alt="<?php echo esc_attr( $v['img_alt'] ); ?>" loading="lazy">
            </a>
          </div>
          <div class="body">
            <div style="display:flex;align-items:center;gap:6px;font-size:.85rem;color:#ccc;margin-bottom:.3rem">
              <?php echo $passenger_icon; // phpcs:ignore WordPress.Security.EscapeOutput ?> <?php echo esc_html( $v['seats'] ); ?> Passengers
            </div>
            <h3><?php echo esc_html( $v['name'] ); ?></h3>
            <p><?php echo wp_kses_post( $v['desc'] ); ?></p>
            <div class="price"><?php echo wp_kses_post( $v['price'] ); ?></div>
            <a href="<?php echo esc_url( $v['href'] ); ?>" class="btn primary" style="margin-top:.5rem;font-size:.9rem;">View Details &amp; Book</a>
          </div>
        </article>
      <?php endforeach; ?>

    </div>
    <p class="micro" style="margin-top:.6rem">Don't see the model you want? <a href="<?php echo esc_url( home_url( '/get-quote/' ) ); ?>">Ask our team</a> &mdash; we source on request.</p>
  </div>
</section>

<!-- SERVICES -->
<section id="services">
  <div class="container">
    <div class="section-head">
      <h2>Hire Us for Any Occasion</h2>
      <div style="display:flex;gap:.6rem;flex-wrap:wrap">
        <a class="btn primary" href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Get Wedding Package</a>
        <a class="btn ghost" href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>">Get Prom Package</a>
      </div>
    </div>
    <div class="grid g4">
      <?php
      $services = array(
        array( 'img' => 'Wedding Transport.jpg',      'name' => 'Wedding Transport',      'desc' => 'Make your special day perfect with luxury Wedding car service and professional chauffeurs.' ),
        array( 'img' => 'Prom Transport.jpg',         'name' => 'Prom Transport',          'desc' => 'Arrive in style with friends in our party Limousines and luxury vehicles.' ),
        array( 'img' => 'Music Videos & Film.jpg',    'name' => 'Music Videos &amp; Film', 'desc' => 'Statement vehicles for productions, with flexible hire terms for creatives.' ),
        array( 'img' => 'VIP & Executive Transfer.jpg', 'name' => 'VIP &amp; Executive Transfer', 'desc' => 'Discreet, professional chauffeur service for business and VIP clients.' ),
        array( 'img' => 'Airport Transfers.jpg',      'name' => 'Airport Transfers',       'desc' => 'Stress-free luxury travel to and from all major UK airports.' ),
        array( 'img' => 'Special Occasions.jpg',      'name' => 'Special Occasions',       'desc' => 'Celebrate birthdays, anniversaries and milestone moments in luxury.' ),
        array( 'img' => 'Self Drive Options.jpg',     'name' => 'Self Drive Options',      'desc' => 'Drive selected luxury vehicles yourself with comprehensive insurance.' ),
        array( 'img' => 'Corporate Events.jpg',       'name' => 'Corporate Events',        'desc' => 'Professional transport solutions for business events and conferences.' ),
      );
      foreach ( $services as $svc ) : ?>
        <article class="card">
          <div class="imgwrap">
            <img src="<?php echo esc_url( jp_assets( 'images/services/' . $svc['img'] ) ); ?>" alt="<?php echo esc_attr( strip_tags( $svc['name'] ) ); ?>" loading="lazy">
          </div>
          <div class="body">
            <h3><?php echo wp_kses_post( $svc['name'] ); ?></h3>
            <p><?php echo esc_html( $svc['desc'] ); ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- REVIEWS -->
<section class="reviews" id="reviews">
  <div class="container">
    <div class="section-head">
      <h2>Loved by Clients Across the UK</h2>
      <div style="display:flex;gap:.6rem;flex-wrap:wrap">
        <a class="btn btn-gold-cta" href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Secure Wedding Date</a>
        <a class="btn ghost" href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>">Secure Prom Date</a>
      </div>
    </div>
    <div class="slider" aria-label="Customer reviews">
      <div class="slide">
        <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>&ldquo;Absolutely incredible service for our Wedding! The Rolls Royce Phantom was immaculate and the chauffeur was so professional. Made our special day even more magical. 10/10 would recommend!&rdquo;</p>
        <div class="micro">&mdash; Sarah M. via Google</div>
      </div>
      <div class="slide">
        <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>&ldquo;Used Just Phantoms for Prom and it was perfect! The Porsche Cayenne Limo was exactly what we wanted &mdash; spacious, luxurious, and the driver made sure we had an amazing night. Great value too!&rdquo;</p>
        <div class="micro">&mdash; Emma L. via Google</div>
      </div>
      <div class="slide">
        <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>&ldquo;Outstanding corporate service. The Range Rover Executive is perfect for business travel &mdash; arrived 15 minutes early as promised. Professional, discrete, and comfortable. Will definitely use again.&rdquo;</p>
        <div class="micro">&mdash; David C. via Google</div>
      </div>
      <div class="slide">
        <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>&ldquo;Hired the Limited Edition Ford Mustang GT500 for our music video shoot. The team was incredibly accommodating with multiple takes and location changes. Car looked amazing on camera!&rdquo;</p>
        <div class="micro">&mdash; Marcus Productions via Google</div>
      </div>
      <div class="slide">
        <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>&ldquo;The 1930&rsquo;s vintage classic car was perfect for our anniversary photoshoot. Pristine condition and looked absolutely stunning in photos. The team went above and beyond to make it special.&rdquo;</p>
        <div class="micro">&mdash; Rachel T. via Google</div>
      </div>
      <div class="slide">
        <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>&ldquo;Fantastic service from start to finish. Booking was easy, communication excellent, and the actual service exceeded expectations. The attention to detail is remarkable. Highly recommend!&rdquo;</p>
        <div class="micro">&mdash; Alex M. via Google</div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section id="faq" class="faq">
  <div class="container">
    <div class="section-head">
      <h2>Frequently Asked Questions</h2>
      <a class="btn primary" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">See All FAQs</a>
    </div>
    <details class="item">
      <summary>How far in advance should I book?</summary>
      <div class="content">Peak dates fill quickly (especially summer weekends). We advise booking as early as possible; contact us for short-notice availability.</div>
    </details>
    <details class="item">
      <summary>Do you cover my area?</summary>
      <div class="content">Yes &mdash; we cover Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire, including Preston, Blackburn, Burnley, Lancaster, Blackpool, Leeds, Bradford, York, Sheffield, Carlisle, Kendal, Penrith, Derby, Chesterfield, Nottingham, Mansfield and nearby towns.</div>
    </details>
    <details class="item">
      <summary>What&rsquo;s included in the hire?</summary>
      <div class="content">A freshly valeted vehicle, professional chauffeur, early arrival buffer, and complimentary bottled water. Wedding ribbons available on request.</div>
    </details>
    <details class="item">
      <summary>Can I make extra stops or adjust timings?</summary>
      <div class="content">Absolutely. Your schedule is our schedule &mdash; tell us your route and we&rsquo;ll tailor a precise plan with transparent pricing.</div>
    </details>
    <details class="item">
      <summary>Do you offer a price-match?</summary>
      <div class="content">Yes. If you find a like-for-like written quote from a VAT-registered company within 7 days of booking, we&rsquo;ll beat it by 10% (T&amp;Cs apply).</div>
    </details>
  </div>
</section>

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Just Phantoms",
  "description": "Luxury Wedding and Prom car and Limousine hire across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.",
  "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
  "telephone": "+447504040407",
  "email": "info@justphantoms.com",
  "priceRange": "£££",
  "areaServed": ["Lancashire", "Yorkshire", "Cumbria", "Derbyshire", "Nottinghamshire"],
  "serviceType": ["Wedding Car Hire", "Prom Car Hire", "Limousine Hire", "Chauffeur Service"]
}
</script>

<?php get_footer();
