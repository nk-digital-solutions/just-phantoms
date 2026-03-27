<?php
/**
 * Template Name: Homepage
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';
?>

  <!-- HERO -->
  <section class="hero">
    <div class="container hero-inner">
      <div>
        <div class="eyebrow">Exclusive vehicle hire nationwide</div>
        <h1>Make your moment unforgettable — arrive in absolute style.</h1>
        <p>Luxury &amp; chauffeur&#8209;driven car hire for <strong>weddings</strong>, <strong>proms</strong>, <strong>music videos</strong>, <strong>VIP transfers</strong> and more. Immaculate vehicles, professional chauffeurs, and punctuality as standard.</p>
        <div class="tick"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Price&#8209;match within 7 days — we'll beat like&#8209;for&#8209;like quotes by 10%.</div>
        <div class="tick"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Chauffeurs arrive <strong>15 minutes early</strong> — always punctual.</div>
        <div class="tick"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Complimentary touches: bottled water, ribbons on request.</div>
        <div class="form-actions" style="margin-top:1.1rem">
          <a class="btn primary" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">Get a quote</a>
          <a class="btn ghost" href="tel:+447504040407">Call 07504 040 407</a>
        </div>
      </div>
    </div>
  </section>

  <!-- INTRO -->
  <section id="about">
    <div class="container">
      <div class="section-head">
        <h2>Luxury without compromise</h2>
        <a class="btn ghost" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Explore Services</a>
      </div>
      <p class="lead">With branches in <strong>London</strong> and <strong>Lancashire</strong>, Just Phantoms is one of the UK's leading executive wedding &amp; event car hire providers. Every booking includes a meticulously valeted vehicle and a courteous, discreet chauffeur dedicated to timing, comfort and care.</p>
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
        <h2>Our fleet — built to impress</h2>
        <a class="btn primary" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">Request availability</a>
      </div>
      <div class="grid g3">
        <article class="card">
          <div class="imgwrap"><span class="badge">Executive</span><img src="<?php echo esc_url( $img ); ?>/fleet/Range%20Rover%20Executive%20LWB%20SVO.jpg" alt="Range Rover Executive LWB SVO" /></div>
          <div class="body">
            <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:#ccc;margin-bottom:0.3rem"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> 4 Passengers</div>
            <h3>Range Rover Executive LWB SVO</h3>
            <p>Ultimate luxury SUV with extended wheelbase and bespoke SVO refinements for executive travel.</p>
            <a href="<?php echo esc_url( home_url( '/range-rover/' ) ); ?>" class="btn primary" style="margin-top:0.5rem;font-size:0.9rem;">View Details &amp; Book</a>
          </div>
        </article>
        <article class="card">
          <div class="imgwrap"><span class="badge">Limo</span><img src="<?php echo esc_url( $img ); ?>/fleet/Porsche%20Cayenne%20Limo.jpg" alt="Porsche Cayenne Limo" /></div>
          <div class="body">
            <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:#ccc;margin-bottom:0.3rem"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> 8–10 Passengers</div>
            <h3>Porsche Cayenne Limo</h3>
            <p>Striking limousine conversion with sports car DNA — perfect for making a statement arrival.</p>
            <a href="<?php echo esc_url( home_url( '/porsche-cayenne-limo/' ) ); ?>" class="btn primary" style="margin-top:0.5rem;font-size:0.9rem;">View Details &amp; Book</a>
          </div>
        </article>
        <article class="card">
          <div class="imgwrap"><span class="badge">Rolls&#8209;Royce</span><img src="<?php echo esc_url( $img ); ?>/fleet/Rolls%20Royce%20Phantom.jpg" alt="Rolls Royce Phantom" /></div>
          <div class="body">
            <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:#ccc;margin-bottom:0.3rem"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> 4 Passengers</div>
            <h3>Rolls Royce Phantom</h3>
            <p>The pinnacle of luxury motoring — whisper&#8209;quiet elegance for weddings and VIP occasions.</p>
            <a href="<?php echo esc_url( home_url( '/rolls-royce-phantom/' ) ); ?>" class="btn primary" style="margin-top:0.5rem;font-size:0.9rem;">View Details &amp; Book</a>
          </div>
        </article>
        <article class="card">
          <div class="imgwrap"><span class="badge">Performance</span><img src="<?php echo esc_url( $img ); ?>/fleet/Limited%20Edition%20Mustang%20GT500.jpg" alt="Limited Edition Mustang GT500" /></div>
          <div class="body">
            <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:#ccc;margin-bottom:0.3rem"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> 2 Passengers</div>
            <h3>Limited Edition Mustang GT500</h3>
            <p>Raw American muscle with supercharged V8 power — ideal for music videos and photoshoots.</p>
            <a href="<?php echo esc_url( home_url( '/mustang-gt500/' ) ); ?>" class="btn primary" style="margin-top:0.5rem;font-size:0.9rem;">View Details &amp; Book</a>
          </div>
        </article>
        <article class="card">
          <div class="imgwrap"><span class="badge">Vintage</span><img src="<?php echo esc_url( $img ); ?>/fleet/1930%27s%20Vintage%20Car.jpg" alt="1930's Vintage Car" /></div>
          <div class="body">
            <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:#ccc;margin-bottom:0.3rem"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> 4 Passengers</div>
            <h3>1930's Vintage Car</h3>
            <p>Timeless glamour and authentic period styling — creates stunning photos and cinematic moments.</p>
            <a href="<?php echo esc_url( home_url( '/vintage-car/' ) ); ?>" class="btn primary" style="margin-top:0.5rem;font-size:0.9rem;">View Details &amp; Book</a>
          </div>
        </article>
        <article class="card">
          <div class="imgwrap"><span class="badge">Vintage</span><img src="<?php echo esc_url( $img ); ?>/fleet/Regent.png" alt="Regent Convertible" /></div>
          <div class="body">
            <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:#ccc;margin-bottom:0.3rem"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> 4 Passengers</div>
            <h3>Regent Convertible</h3>
            <p>Classic 1930s styling with modern reliability. Perfect for weddings and open-top summer cruising.</p>
            <a href="<?php echo esc_url( home_url( '/regent/' ) ); ?>" class="btn primary" style="margin-top:0.5rem;font-size:0.9rem;">View Details &amp; Book</a>
          </div>
        </article>
        <article class="card">
          <div class="imgwrap"><span class="badge">Limo</span><img src="<?php echo esc_url( $img ); ?>/fleet/Bentley%20Chrysler%20Limo.png" alt="Bentley Chrysler Limo" /></div>
          <div class="body">
            <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:#ccc;margin-bottom:0.3rem"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> 8 Passengers</div>
            <h3>Bentley Chrysler Limo</h3>
            <p>The "Baby Bentley" stretch limousine. Sophisticated presence for bridal parties and executive groups.</p>
            <a href="<?php echo esc_url( home_url( '/bentley-chrysler-limo/' ) ); ?>" class="btn primary" style="margin-top:0.5rem;font-size:0.9rem;">View Details &amp; Book</a>
          </div>
        </article>
      </div>
      <div class="micro" style="margin-top:.6rem">Don't see the model you want? <a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">Ask our team</a> — we source on request.</div>
    </div>
  </section>

  <!-- SERVICES -->
  <section id="services">
    <div class="container">
      <div class="section-head">
        <h2>Hire us for any occasion</h2>
        <a class="btn primary" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">Get a tailored package</a>
      </div>
      <div class="grid g4">
        <article class="card"><div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Wedding%20Transport.jpg" alt="Wedding car service" /></div><div class="body"><h3>Wedding Transport</h3><p>Make your special day perfect with luxury wedding car service and professional chauffeurs.</p></div></article>
        <article class="card"><div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Prom%20Transport.jpg" alt="Prom transport" /></div><div class="body"><h3>Prom Transport</h3><p>Arrive in style with friends in our party limousines and luxury vehicles.</p></div></article>
        <article class="card"><div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Music%20Videos%20%26%20Film.jpg" alt="Music video production" /></div><div class="body"><h3>Music Videos &amp; Film</h3><p>Statement vehicles for productions, with flexible hire terms for creatives.</p></div></article>
        <article class="card"><div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/VIP%20%26%20Executive%20Transfer.jpg" alt="VIP chauffeur service" /></div><div class="body"><h3>VIP &amp; Executive Transfer</h3><p>Discreet, professional chauffeur service for business and VIP clients.</p></div></article>
        <article class="card"><div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Airport%20Transfers.jpg" alt="Airport transfer" /></div><div class="body"><h3>Airport Transfers</h3><p>Stress-free luxury travel to and from all major UK airports.</p></div></article>
        <article class="card"><div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Special%20Occasions.jpg" alt="Special events" /></div><div class="body"><h3>Special Occasions</h3><p>Celebrate birthdays, anniversaries and milestone moments in luxury.</p></div></article>
        <article class="card"><div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Self%20Drive%20Options.jpg" alt="Self drive luxury" /></div><div class="body"><h3>Self Drive Options</h3><p>Drive selected luxury vehicles yourself with comprehensive insurance.</p></div></article>
        <article class="card"><div class="imgwrap"><img src="<?php echo esc_url( $img ); ?>/services/Corporate%20Events.jpg" alt="Corporate events" /></div><div class="body"><h3>Corporate Events</h3><p>Professional transport solutions for business events and conferences.</p></div></article>
      </div>
    </div>
  </section>

  <!-- REVIEWS -->
  <section class="reviews" id="reviews">
    <div class="container">
      <div class="section-head">
        <h2>Loved by clients across the UK</h2>
        <a class="btn ghost" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">Secure your date</a>
      </div>
      <div class="slider" aria-label="Customer reviews">
        <div class="slide"><div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p>"Absolutely incredible service for our wedding! The Rolls Royce Phantom was immaculate and the chauffeur was so professional. Made our special day even more magical. 10/10 would recommend!"</p><div class="micro">— Sarah M. via Google</div></div>
        <div class="slide"><div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p>"Used Just Phantoms for prom and it was perfect! The Porsche Cayenne Limo was exactly what we wanted - spacious, luxurious, and the driver made sure we had an amazing night. Great value too!"</p><div class="micro">— Emma L. via Google</div></div>
        <div class="slide"><div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p>"Outstanding corporate service. The Range Rover Executive is perfect for business travel - arrived 15 minutes early as promised. Professional, discrete, and comfortable. Will definitely use again."</p><div class="micro">— David C. via Google</div></div>
        <div class="slide"><div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p>"Hired the Mustang GT500 for our music video shoot. The team was incredibly accommodating with multiple takes and location changes. Car looked amazing on camera and service was top-notch!"</p><div class="micro">— Marcus Productions via Google</div></div>
        <div class="slide"><div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p>"The 1930's vintage car was perfect for our anniversary photoshoot. Pristine condition and looked absolutely stunning in photos. The team went above and beyond to make it special."</p><div class="micro">— Rachel T. via Google</div></div>
        <div class="slide"><div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p>"Fantastic service from start to finish. Booking was easy, communication excellent, and the actual service exceeded expectations. The attention to detail is remarkable. Highly recommend!"</p><div class="micro">— Alex M. via Google</div></div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq" class="faq">
    <div class="container">
      <div class="section-head">
        <h2>Frequently asked questions</h2>
        <a class="btn primary" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">Ask a quick question</a>
      </div>
      <details class="item"><summary>How far in advance should I book?<span>+</span></summary><div class="content">Peak dates fill quickly (especially summer weekends). We advise booking as early as possible; contact us for short&#8209;notice availability.</div></details>
      <details class="item"><summary>Do you cover my area?<span>+</span></summary><div class="content">Yes — we're nationwide with branches in London and Lancashire. Share your pickup and drop&#8209;off details and we'll confirm in minutes.</div></details>
      <details class="item"><summary>What's included in the hire?<span>+</span></summary><div class="content">A freshly valeted vehicle, professional chauffeur, early arrival buffer, and complimentary bottled water. Wedding ribbons available on request.</div></details>
      <details class="item"><summary>Can I make extra stops or adjust timings?<span>+</span></summary><div class="content">Absolutely. Your schedule is our schedule — tell us your route and we'll tailor a precise plan with transparent pricing.</div></details>
      <details class="item"><summary>Do you offer a price&#8209;match?<span>+</span></summary><div class="content">Yes. If you find a like&#8209;for&#8209;like written quote from a VAT&#8209;registered company within 7 days of booking, we'll beat it by 10% (T&amp;Cs apply).</div></details>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"FAQPage",
    "mainEntity":[
      {"@type":"Question","name":"How far in advance should I book?","acceptedAnswer":{"@type":"Answer","text":"Peak dates fill quickly. We advise booking as early as possible."}},
      {"@type":"Question","name":"Do you cover my area?","acceptedAnswer":{"@type":"Answer","text":"Yes — nationwide with branches in London and Lancashire."}},
      {"@type":"Question","name":"What's included in the hire?","acceptedAnswer":{"@type":"Answer","text":"A freshly valeted vehicle, professional chauffeur, early arrival buffer, and complimentary bottled water."}},
      {"@type":"Question","name":"Do you offer a price-match?","acceptedAnswer":{"@type":"Answer","text":"Yes. Beat like-for-like quotes by 10% within 7 days of booking."}}
    ]
  }
  </script>
  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"LocalBusiness",
    "name":"Just Phantoms",
    "url":"<?php echo esc_url( home_url( '/' ) ); ?>",
    "telephone":"+44 7504 040 407",
    "description":"Luxury car hire & chauffeur services for weddings, proms, music videos and VIP travel.",
    "areaServed":"GB"
  }
  </script>

<?php get_footer(); ?>
