<?php
/**
 * Template Name: About Us
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<!-- ── Page Hero ── -->
<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Est. 1996 &mdash; London &amp; Lancashire</span>
    <h1>About Just Phantoms</h1>
    <p>One of the UK&rsquo;s leading Executive Wedding &amp; Event Car Hire providers &mdash; with offices in London and the heart of Lancashire, delivering unforgettable experiences nationwide.</p>

    <div class="stats-row">
      <div class="stat">
        <span class="stat-number">1996</span>
        <div class="stat-label">Established</div>
      </div>
      <div class="stat">
        <span class="stat-number">500+</span>
        <div class="stat-label">Events Delivered</div>
      </div>
      <div class="stat">
        <span class="stat-number">7</span>
        <div class="stat-label">Luxury Vehicles</div>
      </div>
      <div class="stat">
        <span class="stat-number">4.9&#9733;</span>
        <div class="stat-label">Average Rating</div>
      </div>
    </div>
  </div>
</section>

<!-- ── Our Story ── -->
<section class="about-story">
  <div class="container">
    <div class="about-story-inner">
      <div class="about-story-text">
        <span class="eyebrow">Our Story</span>
        <h2>A Legacy of Luxury &amp; Precision Since 1996</h2>
        <p class="lead">JUST PHANTOMS are one of the UK&rsquo;s leading Executive Wedding &amp; Event Car Hire providers, with offices in London and Lancashire &mdash; delivering world-class chauffeur experiences for every occasion.</p>
        <p>We have been providing luxury car chauffeuring services since 1996 in and around London. With years of growth and demand, we have now established an office in the North West of England in the heart of Lancashire, bringing our standards of excellence to clients across the country.</p>
        <p>Whether it&rsquo;s a grand Wedding procession, a standout Prom arrival, a music video shoot or a discreet executive transfer &mdash; our team brings the same meticulous attention to detail to every single booking.</p>
        <a href="<?php echo esc_url( home_url( '/our-fleet/' ) ); ?>" class="btn primary">View Our Fleet</a>
      </div>
      <div class="about-story-media">
        <img
          src="<?php echo esc_url( jp_assets( 'images/fleet/rolls-royce-phantom/Rolls Royce Phantom.jpg' ) ); ?>"
          alt="Just Phantoms Rolls-Royce Phantom"
          loading="lazy"
          class="about-hero-img"
        >
      </div>
    </div>
  </div>
</section>

<!-- ── Why Choose Us ── -->
<section>
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Why Just Phantoms</span>
        <h2>What Sets Us Apart</h2>
      </div>
    </div>

    <div class="features-grid">

      <?php
      $values = array(
        array(
          'icon'  => '&#9733;',
          'title' => 'A Range of Vehicles',
          'desc'  => 'We have a range of prestige cars from a White Rolls-Royce Phantom to the classic 1930&rsquo;s Rolls Royce. Whatever your requirement, we are sure our selection will meet your needs for any joyous occasion.',
        ),
        array(
          'icon'  => '&#9733;',
          'title' => 'For a Range of Events',
          'desc'  => 'We accommodate VIP events, photoshoots, Prom nights, birthday parties and executive drop-offs &mdash; whether it be an important social gathering or a relaxed journey to the airport or a meeting.',
        ),
        array(
          'icon'  => '&#9733;',
          'title' => 'Matched by None',
          'desc'  => 'We are so confident in our service &mdash; if you find a cheaper like-for-like quote within 7 days of booking, we will reduce it by a further 10%! (Written quote from a VAT-registered company required.)',
        ),
        array(
          'icon'  => '&#9733;',
          'title' => 'Experienced',
          'desc'  => 'Our top professional and experienced Wedding Chauffeurs will make sure your Wedding Hire is everything you hope for &mdash; and more.',
        ),
        array(
          'icon'  => '&#9733;',
          'title' => 'Professional',
          'desc'  => 'We pride ourselves on our service. First class attention to detail will make your hire with Just Phantoms truly amazing.',
        ),
        array(
          'icon'  => '&#9733;',
          'title' => 'Prepared',
          'desc'  => 'While we hope for perfect weather on your special day, all cars come equipped with umbrellas for your convenience &mdash; to ensure you stay dry!',
        ),
      );

      foreach ( $values as $v ) : ?>
        <div class="feature-card">
          <h4><?php echo $v['icon']; ?> <?php echo wp_kses_post( $v['title'] ); ?></h4>
          <p><?php echo wp_kses_post( $v['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- ── Our Services / Packages ── -->
<section>
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Best Packages</span>
        <h2>What We Can Do For You</h2>
      </div>
      <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn ghost btn-compact">All Services</a>
    </div>

    <div class="grid g3">

      <?php
      $packages = array(
        array(
          'name' => 'Proms',
          'img'  => 'services/Prom Transport.jpg',
          'desc' => 'Your Prom is a special day &mdash; arrive in style! Make it a night to remember and choose the perfect prom car. We have the right selection of luxurious cars available.',
        ),
        array(
          'name' => 'Weddings',
          'img'  => 'services/Wedding Transport.jpg',
          'desc' => 'Your wedding is a big occasion and your wedding car should reflect it. With our expertise and dedication to outstanding service, we guarantee your wedding car hire is second to none.',
        ),
        array(
          'name' => 'Music Videos',
          'img'  => 'services/Music Videos & Film.jpg',
          'desc' => 'Hire a car for your music video and take it to another level by renting a luxury car from Just Phantoms &mdash; statement vehicles with flexible production hire terms.',
        ),
        array(
          'name' => 'Corporate',
          'img'  => 'services/VIP & Executive Transfer.jpg',
          'desc' => 'Just Phantoms pride themselves on delivering a reliable, professional and punctual service, ensuring you arrive at your destination stress-free and on time.',
        ),
        array(
          'name' => 'Airport Transfers',
          'img'  => 'services/Airport Transfers.jpg',
          'desc' => 'Stress-free luxury travel to and from all major UK airports. Flight monitoring, luggage assistance and fixed pricing guarantee included as standard.',
        ),
        array(
          'name' => 'Special Occasions',
          'img'  => 'services/Special Occasions.jpg',
          'desc' => 'Birthdays, anniversaries and milestone moments &mdash; we know the excitement of the day can only be made better arriving in a Just Phantoms luxury car.',
        ),
      );

      foreach ( $packages as $pkg ) : ?>
        <article class="card">
          <div class="imgwrap">
            <img
              src="<?php echo esc_url( jp_assets( 'images/' . $pkg['img'] ) ); ?>"
              alt="<?php echo esc_attr( $pkg['name'] ); ?>"
              loading="lazy"
            >
          </div>
          <div class="body">
            <h3><?php echo esc_html( $pkg['name'] ); ?></h3>
            <p><?php echo wp_kses_post( $pkg['desc'] ); ?></p>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn ghost btn-compact">Learn More</a>
          </div>
        </article>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- ── What Clients Say ── -->
<section>
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Client Reviews</span>
        <h2>What Our Clients Say</h2>
      </div>
      <a href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>" class="btn ghost btn-compact">All Reviews</a>
    </div>

    <div class="reviews-grid">

      <?php
      $about_reviews = array(
        array(
          'initial' => 'A',
          'name'    => 'Afzal Hussain',
          'service' => 'Wedding Car Hire &middot; Google Review',
          'text'    => '"Hired the Rolls Royce Phantom for my wedding. I have to say it was a very clean and well presented car. The chauffeur was very polite and friendly. They were on time and very professional. I would definitely recommend Just Phantoms to anyone that needs to hire a wedding car."',
        ),
        array(
          'initial' => 'H',
          'name'    => 'Hamza Muhaimin',
          'service' => 'Wedding Car Hire &middot; Google Review',
          'text'    => '"Found Just Phantoms on Google when looking for wedding car hire. I hired out both the Rolls Royce Phantom and the vintage car. They were immaculate and the chauffeurs were really polite and friendly. The service was A1 from start to finish with no delays, no issues. I would highly recommend Just Phantoms!"',
        ),
        array(
          'initial' => 'Z',
          'name'    => 'Zak Reid',
          'service' => 'Music Video Hire &middot; Google Review',
          'text'    => '"I was looking for a cool, mean looking car and I came across Just Phantoms&rsquo; Mustang. I have to say that is one hell of a beast! Went absolutely perfect for my music video. Couldn\'t thank Just Phantoms enough for their top quality service."',
        ),
        array(
          'initial' => 'S',
          'name'    => 'Sarah Thompson',
          'service' => 'Funeral Car Hire &middot; Google Review',
          'text'    => '"We had a relative pass away and wanted to send them off in a nice and classy way. Just Phantoms let us hire their vintage car, which went perfectly with the theme. The chauffeur and the team were very respectful and super punctual. I would definitely use their services again."',
        ),
      );

      foreach ( $about_reviews as $review ) : ?>
        <div class="review-card">
          <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          <p class="review-text"><?php echo wp_kses_post( $review['text'] ); ?></p>
          <div class="review-meta">
            <div class="review-avatar"><?php echo esc_html( $review['initial'] ); ?></div>
            <div>
              <div class="review-author"><?php echo wp_kses_post( $review['name'] ); ?></div>
              <div class="review-service"><?php echo wp_kses_post( $review['service'] ); ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- ── Areas Covered ── -->
<section>
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Coverage</span>
        <h2>Areas Covered</h2>
      </div>
    </div>

    <div class="pill-row" style="justify-content:center;margin-bottom:1rem;">
      <?php
      $areas = array(
        'Lancashire', 'Yorkshire', 'London', 'Manchester', 'Liverpool',
        'Cumbria', 'Midlands', 'North Wales', 'Derbyshire', 'Nottinghamshire',
        'Kent', 'Nationwide',
      );
      foreach ( $areas as $area ) : ?>
        <span class="pill">&#128205; <?php echo esc_html( $area ); ?></span>
      <?php endforeach; ?>
    </div>

    <p style="color:var(--muted);font-size:.95rem;text-align:center;">We offer Rolls Royce hire, Phantom hire, Wedding car hire, Limo hire, Classic &amp; Vintage car hire and Event car hire across all of the above regions and beyond.</p>
  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-section">
  <div class="container">
    <h3>Ready to secure your Wedding or Prom transport?</h3>
    <p>Get an instant quote for your Wedding or Prom car and Limousine package. We regularly cover Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.</p>
    <div class="cta-buttons">
      <a href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>" class="btn primary">Get Instant Quote</a>
      <a href="tel:+447504040407" class="btn btn-hero-tel">Call 07504 040 407</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
