<?php
/**
 * Template Name: Fleet
 *
 * @package just-phantoms-nkds
 */

get_header();
$img = get_stylesheet_directory_uri() . '/assets/images';
?>

  <section class="page-hero">
    <div class="container-full">
      <h1>Our Luxury Fleet</h1>
      <p>From the ultimate Rolls Royce Phantom to the powerful Mustang GT500, our curated fleet offers the perfect vehicle for every occasion — all meticulously maintained with professional chauffeur service included.</p>
    </div>
  </section>

  <section>
    <div class="container-full">
      <div class="filter-nav">
        <button class="filter-btn active" data-filter="all">All Vehicles</button>
        <button class="filter-btn" data-filter="luxury">Luxury</button>
        <button class="filter-btn" data-filter="executive">Executive</button>
        <button class="filter-btn" data-filter="party">Party &amp; Limo</button>
        <button class="filter-btn" data-filter="performance">Performance</button>
        <button class="filter-btn" data-filter="vintage">Vintage</button>
      </div>

      <div class="grid g3" id="fleet-grid">
        <article class="card" data-category="executive">
          <div class="imgwrap"><span class="badge">Executive SUV</span><img src="<?php echo esc_url( $img ); ?>/fleet/Range%20Rover%20Executive%20LWB%20SVO.jpg" alt="Range Rover Executive LWB SVO" /></div>
          <div class="body">
            <h3>Range Rover Executive LWB SVO</h3>
            <p>Ultimate luxury SUV with extended wheelbase and bespoke SVO refinements for executive travel.</p>
            <div class="price">From £300 per hire</div>
            <a href="<?php echo esc_url( home_url( '/range-rover/' ) ); ?>" class="btn primary" style="font-size:.9rem">View Details &amp; Book</a>
          </div>
        </article>

        <article class="card" data-category="party">
          <div class="imgwrap"><span class="badge">Luxury Limousine</span><img src="<?php echo esc_url( $img ); ?>/fleet/Porsche%20Cayenne%20Limo.jpg" alt="Porsche Cayenne Limo" /></div>
          <div class="body">
            <h3>Porsche Cayenne Limo</h3>
            <p>Striking limousine conversion with sports car DNA — perfect for making a statement arrival.</p>
            <div class="price">From £450 per hire</div>
            <a href="<?php echo esc_url( home_url( '/porsche-cayenne-limo/' ) ); ?>" class="btn primary" style="font-size:.9rem">View Details &amp; Book</a>
          </div>
        </article>

        <article class="card" data-category="luxury">
          <div class="imgwrap"><span class="badge">Ultimate Luxury</span><img src="<?php echo esc_url( $img ); ?>/fleet/Rolls%20Royce%20Phantom.jpg" alt="Rolls Royce Phantom" /></div>
          <div class="body">
            <h3>Rolls Royce Phantom</h3>
            <p>The pinnacle of luxury motoring — whisper&#8209;quiet elegance for weddings and VIP occasions.</p>
            <div class="price">From £500 per hire</div>
            <a href="<?php echo esc_url( home_url( '/rolls-royce-phantom/' ) ); ?>" class="btn primary" style="font-size:.9rem">View Details &amp; Book</a>
          </div>
        </article>

        <article class="card" data-category="performance">
          <div class="imgwrap"><span class="badge">Performance Beast</span><img src="<?php echo esc_url( $img ); ?>/fleet/Limited%20Edition%20Mustang%20GT500.jpg" alt="Limited Edition Mustang GT500" /></div>
          <div class="body">
            <h3>Limited Edition Mustang GT500</h3>
            <p>Raw American muscle with supercharged V8 power — ideal for music videos and photoshoots.</p>
            <div class="price">From £400 per hire</div>
            <a href="<?php echo esc_url( home_url( '/mustang-gt500/' ) ); ?>" class="btn primary" style="font-size:.9rem">View Details &amp; Book</a>
          </div>
        </article>

        <article class="card" data-category="vintage">
          <div class="imgwrap"><span class="badge">Classic Elegance</span><img src="<?php echo esc_url( $img ); ?>/fleet/1930%27s%20Vintage%20Car.jpg" alt="1930's Vintage Car" /></div>
          <div class="body">
            <h3>1930's Vintage Car</h3>
            <p>Timeless glamour and authentic period styling — creates stunning photos and cinematic moments.</p>
            <div class="price">From £350 per hire</div>
            <a href="<?php echo esc_url( home_url( '/vintage-car/' ) ); ?>" class="btn primary" style="font-size:.9rem">View Details &amp; Book</a>
          </div>
        </article>

        <article class="card" data-category="vintage">
          <div class="imgwrap"><span class="badge">Vintage Style</span><img src="<?php echo esc_url( $img ); ?>/fleet/Regent.png" alt="Regent Convertible" /></div>
          <div class="body">
            <h3>Regent Convertible</h3>
            <p>Classic 1930s styling with modern reliability. Perfect for weddings and open-top summer cruising.</p>
            <div class="price">From £350 per hire</div>
            <a href="<?php echo esc_url( home_url( '/regent/' ) ); ?>" class="btn primary" style="font-size:.9rem">View Details &amp; Book</a>
          </div>
        </article>

        <article class="card" data-category="party">
          <div class="imgwrap"><span class="badge">Luxury Limousine</span><img src="<?php echo esc_url( $img ); ?>/fleet/Bentley%20Chrysler%20Limo.png" alt="Bentley Chrysler Limo" /></div>
          <div class="body">
            <h3>Bentley Chrysler Limo</h3>
            <p>The "Baby Bentley" stretch limousine. Sophisticated presence for bridal parties and executive groups.</p>
            <div class="price">From £395 per hire</div>
            <a href="<?php echo esc_url( home_url( '/bentley-chrysler-limo/' ) ); ?>" class="btn primary" style="font-size:.9rem">View Details &amp; Book</a>
          </div>
        </article>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
