<?php
/**
 * Template Name: Our Promise
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<!-- ── Page Hero ── -->
<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Est. 1996 &mdash; London &amp; Lancashire</span>
    <h1>Our Promise to You</h1>
    <p>Our Pledge of Assurance isn&rsquo;t merely the standard we set for ourselves &mdash; it is a pledge we make to you, plainly and in print, to provide you true service.</p>
  </div>
</section>

<!-- ── Pledge of Assurance ── -->
<section class="promise-intro">
  <div class="container">
    <div class="promise-intro-inner">
      <span class="eyebrow">Our Pledge of Assurance</span>
      <h2>One of the UK&rsquo;s Largest Selections of Rolls Royce Phantoms</h2>
      <p class="lead">At JUST PHANTOMS, we can confidently say with both our branches we have one of the largest selections of Rolls Royce Phantoms in the country. Our services are available nationwide and with over 25 years&rsquo; experience in the Wedding Car Chauffeur Service, you won&rsquo;t be disappointed.</p>
    </div>
  </div>
</section>

<!-- ── Our Guarantee ── -->
<section class="promise-guarantee">
  <div class="container">
    <div style="text-align:center;margin-bottom:2.5rem">
      <span class="eyebrow">What We Promise</span>
      <h2>Our Guarantee</h2>
    </div>
    <div class="features-grid">

      <div class="feature-card">
        <h4>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="color:var(--gold);margin-right:.4rem;vertical-align:middle"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          Experienced Chauffeurs
        </h4>
        <p>Professional and polite, highly experienced chauffeurs for every booking.</p>
      </div>

      <div class="feature-card">
        <h4>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="color:var(--gold);margin-right:.4rem;vertical-align:middle"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          Always Punctual
        </h4>
        <p>All our vehicles arrive at least 15 minutes before the arranged meeting time.</p>
      </div>

      <div class="feature-card">
        <h4>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="color:var(--gold);margin-right:.4rem;vertical-align:middle"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          Freshly Valeted
        </h4>
        <p>Immaculate vehicles cleaned, polished and inspected before every hire.</p>
      </div>

      <div class="feature-card">
        <h4>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="color:var(--gold);margin-right:.4rem;vertical-align:middle"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          Coloured Ribbons
        </h4>
        <p>Coloured ribbon of your choice if required (upon prior request).</p>
      </div>

      <div class="feature-card">
        <h4>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="color:var(--gold);margin-right:.4rem;vertical-align:middle"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          Refreshing Towel
        </h4>
        <p>Complimentary refreshing cotton towel provided for your journey.</p>
      </div>

      <div class="feature-card">
        <h4>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="color:var(--gold);margin-right:.4rem;vertical-align:middle"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          Free WiFi
        </h4>
        <p>Free Wi-Fi access available in all vehicles (upon prior request).</p>
      </div>

    </div>
  </div>
</section>

<!-- ── Pull Quote ── -->
<section class="promise-quote">
  <div class="container">
    <blockquote class="pull-quote">
      &ldquo;Luxury must be comfortable,<br>otherwise it is not luxury&rdquo;
    </blockquote>
  </div>
</section>

<!-- ── Best Packages ── -->
<section>
  <div class="container">
    <div class="section-head">
      <h2>Our Best Packages</h2>
      <div style="display:flex;gap:.6rem;flex-wrap:wrap">
        <a class="btn primary" href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Wedding Quote</a>
        <a class="btn ghost" href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>">Prom Quote</a>
      </div>
    </div>
    <div class="grid g3">

      <?php
      $packages = array(
        array(
          'img'   => 'Prom Transport.jpg',
          'name'  => 'Prom',
          'desc'  => 'Your Prom is a special day — arrive in style! Make it a night to remember and choose the perfect prom car. We have the right selection of luxurious cars available.',
        ),
        array(
          'img'   => 'Wedding Transport.jpg',
          'name'  => 'Weddings',
          'desc'  => 'Your wedding is a big occasion and your wedding car should reflect that. We offer a sensational fleet of luxurious vehicles at competitive rates, with dedication to outstanding customer service.',
        ),
        array(
          'img'   => 'Music Videos & Film.jpg',
          'name'  => 'Music Videos',
          'desc'  => 'Hire a car for your music video and take your production to another level by renting a luxury car from Just Phantoms.',
        ),
        array(
          'img'   => 'VIP & Executive Transfer.jpg',
          'name'  => 'Funerals',
          'desc'  => 'At this difficult time, you need a company that you can rely on. We offer a discreet, compassionate service that is tailored to your individual needs.',
        ),
        array(
          'img'   => 'Corporate Events.jpg',
          'name'  => 'Corporate',
          'desc'  => 'Just Phantoms pride ourselves on delivering a reliable, professional and punctual service, ensuring you arrive at your destination stress-free and on time.',
        ),
        array(
          'img'   => 'Special Occasions.jpg',
          'name'  => 'Birthdays',
          'desc'  => 'We know the excitement of the day could only be made better with Just Phantoms Luxury Car hire to take you to the party venue. Arrive in Style!',
        ),
      );
      foreach ( $packages as $pkg ) : ?>
        <article class="card">
          <div class="imgwrap">
            <img src="<?php echo esc_url( jp_assets( 'images/services/' . $pkg['img'] ) ); ?>" alt="<?php echo esc_attr( $pkg['name'] ); ?> car hire" loading="lazy">
          </div>
          <div class="body">
            <h3><?php echo esc_html( $pkg['name'] ); ?></h3>
            <p><?php echo esc_html( $pkg['desc'] ); ?></p>
          </div>
        </article>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- ── Areas Covered ── -->
<section class="promise-areas">
  <div class="container">
    <h2 style="text-align:center;margin-bottom:.5rem">Areas Covered</h2>
    <div class="gold-divider" style="margin:0 auto 2.5rem"></div>
    <div class="areas-grid">

      <div class="area-col">
        <h4>Rolls Royce Hire</h4>
        <ul>
          <li>Lancashire</li><li>Yorkshire</li><li>Midlands</li><li>Cumbria</li>
          <li>London</li><li>North Wales</li><li>Liverpool</li><li>Manchester</li>
          <li>Kent</li><li>Nationwide</li>
        </ul>
      </div>

      <div class="area-col">
        <h4>Phantom Hire</h4>
        <ul>
          <li>Lancashire</li><li>Yorkshire</li><li>Midlands</li><li>Cumbria</li>
          <li>London</li><li>North Wales</li><li>Liverpool</li><li>Manchester</li>
          <li>Kent</li><li>Nationwide</li>
        </ul>
      </div>

      <div class="area-col">
        <h4>Wedding Car Hire</h4>
        <ul>
          <li>Lancashire</li><li>Yorkshire</li><li>Midlands</li><li>Cumbria</li>
          <li>London</li><li>North Wales</li><li>Liverpool</li><li>Manchester</li>
          <li>Kent</li><li>Nationwide</li>
        </ul>
      </div>

      <div class="area-col">
        <h4>Luxury Car Hire</h4>
        <ul>
          <li>Lancashire</li><li>Yorkshire</li><li>Midlands</li><li>Cumbria</li>
          <li>London</li><li>North Wales</li><li>Liverpool</li><li>Manchester</li>
          <li>Kent</li><li>Nationwide</li>
        </ul>
      </div>

      <div class="area-col">
        <h4>Limo Hire</h4>
        <ul>
          <li>Lancashire</li><li>Yorkshire</li><li>Midlands</li><li>Cumbria</li>
          <li>London</li><li>North Wales</li><li>Liverpool</li><li>Manchester</li>
          <li>Kent</li><li>Nationwide</li>
        </ul>
      </div>

      <div class="area-col">
        <h4>Classic Car Hire</h4>
        <ul>
          <li>Lancashire</li><li>Yorkshire</li><li>Midlands</li><li>Cumbria</li>
          <li>London</li><li>North Wales</li><li>Liverpool</li><li>Manchester</li>
          <li>Kent</li><li>Nationwide</li>
        </ul>
      </div>

      <div class="area-col">
        <h4>Vintage Car Hire</h4>
        <ul>
          <li>Lancashire</li><li>Yorkshire</li><li>Midlands</li><li>Cumbria</li>
          <li>London</li><li>North Wales</li><li>Liverpool</li><li>Manchester</li>
          <li>Kent</li><li>Nationwide</li>
        </ul>
      </div>

      <div class="area-col">
        <h4>Event Car Hire</h4>
        <ul>
          <li>Lancashire</li><li>Yorkshire</li><li>Midlands</li><li>Cumbria</li>
          <li>London</li><li>North Wales</li><li>Liverpool</li><li>Manchester</li>
          <li>Kent</li><li>Nationwide</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-section">
  <div class="container">
    <h3>Ready to secure your Wedding or Prom transport?</h3>
    <p>Get an instant quote for your Wedding or Prom car and Limousine package. We regularly cover Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.</p>
    <div class="cta-buttons">
      <a class="btn primary" href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Get Instant Quote</a>
      <a class="btn btn-hero-tel" href="tel:+447504040407">Call 07504 040 407</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
