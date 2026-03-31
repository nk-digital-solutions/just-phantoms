<?php
/**
 * Template Name: Reviews
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>What Wedding &amp; Prom Clients Say</h1>
    <p>Real feedback from couples, families and students who booked our Wedding and Prom cars and Limousines across Lancashire, Yorkshire, Cumbria, Derbyshire and Nottinghamshire.</p>

    <div class="stats-row">
      <div class="stat">
        <span class="stat-number">4.9&#9733;</span>
        <div class="stat-label">Average Rating</div>
      </div>
      <div class="stat">
        <span class="stat-number">500+</span>
        <div class="stat-label">Happy Customers</div>
      </div>
      <div class="stat">
        <span class="stat-number">98%</span>
        <div class="stat-label">Would Recommend</div>
      </div>
      <div class="stat">
        <span class="stat-number">100%</span>
        <div class="stat-label">On-Time Arrivals</div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="reviews-grid">

      <?php
      $reviews = array(
        array(
          'initial' => 'S',
          'name'    => 'Sarah Mitchell',
          'service' => 'Wedding &middot; Rolls-Royce Phantom &middot; Google Review',
          'text'    => '"Absolutely incredible service for our Wedding day! The Rolls Royce Phantom was immaculate and the chauffeur was professional, punctual, and made us feel like royalty. They arrived 15 minutes early as promised and even provided complimentary water and Wedding ribbons. Couldn\'t have asked for better service. Will definitely use again for future special occasions!"',
        ),
        array(
          'initial' => 'M',
          'name'    => 'Marcus Productions',
          'service' => 'Music Video &middot; Ford Mustang GT500 &middot; Google Review',
          'text'    => '"Used Just Phantoms for our music video shoot and they were incredibly accommodating. The Limited Edition Ford Mustang GT500 looked absolutely stunning on camera. The team worked with us through multiple takes and location changes without any complaints. Professional service that exceeded expectations!"',
        ),
        array(
          'initial' => 'E',
          'name'    => 'Emma Lawrence &amp; Friends',
          'service' => 'Prom &middot; Porsche Cayenne Limo &middot; Google Review',
          'text'    => '"Perfect for our Prom group! The Porsche Cayenne Limo was exactly what we wanted — spacious enough for 8 of us, luxury interior with amazing LED lighting, and the champagne bar was a nice touch. Our driver was so friendly and made sure we had the best night. Great value for money compared to other companies we looked at. Highly recommend!"',
        ),
        array(
          'initial' => 'D',
          'name'    => 'David Chen',
          'service' => 'Corporate &middot; Range Rover Executive SVO &middot; Google Review',
          'text'    => '"Outstanding corporate service for our executive travel needs. The Range Rover Executive LWB SVO is perfect for business meetings — quiet, comfortable, and equipped with WiFi and charging ports. Always on time for airport transfers and the chauffeur is professional and discreet. This is now our go-to service."',
        ),
        array(
          'initial' => 'R',
          'name'    => 'Rachel &amp; Tom Bennett',
          'service' => 'Anniversary &middot; 1930\'s Vintage Classic Car &middot; Google Review',
          'text'    => '"Hired the 1930\'s vintage classic car for our 25th anniversary photoshoot and it was absolutely magical. The car was in pristine condition with beautiful chrome details and authentic period features. The team at Just Phantoms went above and beyond to coordinate with our photographer. Thank you!"',
        ),
        array(
          'initial' => 'A',
          'name'    => 'Alex Morrison',
          'service' => 'Special Event &middot; Corporate Transfer &middot; Google Review',
          'text'    => '"Fantastic service from start to finish. Booking was so easy through their website, communication was excellent with quick responses to all our questions, and the actual service exceeded our expectations. The attention to detail is remarkable. They even followed up after our event to make sure everything was perfect. 5 stars!"',
        ),
        array(
          'initial' => 'J',
          'name'    => 'Jennifer Walsh',
          'service' => 'Airport Transfer &middot; Executive Service &middot; Google Review',
          'text'    => '"Booked Just Phantoms for airport transfer to Heathrow and was thoroughly impressed. The service was punctual, professional, and stress-free. The driver helped with luggage and provided water for the journey. The vehicle was immaculate and comfortable. Will definitely use again for future trips."',
        ),
        array(
          'initial' => 'C',
          'name'    => 'Caroline Stevens',
          'service' => 'Sweet 16 &middot; Party Transport &middot; Google Review',
          'text'    => '"Used Just Phantoms for our daughter\'s sweet 16 party and they made it so special. The team was incredibly patient with all our teenage passengers and kept everyone safe while still making sure they had fun. Great communication with parents too. Highly recommend for special occasions!"',
        ),
        array(
          'initial' => 'L',
          'name'    => 'Lisa Anderson',
          'service' => 'Corporate Event &middot; Rolls Royce Phantom &middot; Google Review',
          'text'    => '"Outstanding experience with Just Phantoms for our corporate event! The Rolls Royce Phantom made such an impression on our international clients. The chauffeur was impeccably dressed and the service was flawless from pickup to drop-off. Perfect for making any business occasion truly memorable. Will definitely book again!"',
        ),
        array(
          'initial' => 'K',
          'name'    => 'Katie &amp; Michael Carter',
          'service' => 'Wedding &middot; Vintage Car &amp; Range Rover &middot; Google Review',
          'text'    => '"Brilliant service for our Wedding transport. We had the vintage 1930\'s car for the bride and the Range Rover Executive for the Wedding party. Both vehicles were in perfect condition and the drivers were fantastic. They even brought umbrellas when it started to rain! The vintage car photos are absolutely stunning. Thank you for making our day perfect!"',
        ),
        array(
          'initial' => 'P',
          'name'    => 'Premier Events Ltd',
          'service' => 'Red Carpet &middot; Ford Mustang GT500 &middot; Google Review',
          'text'    => '"Exceptional service for our red carpet event. The Limited Edition Ford Mustang GT500 was the perfect choice — it photographed beautifully and our celebrity client was thrilled. The team coordinated perfectly with our event planners and handled all the media attention professionally. Top-class service we\'ll definitely use again."',
        ),
      );

      foreach ( $reviews as $review ) : ?>
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

    <div class="cta-section">
      <h3>Ready to create your own 5-star experience?</h3>
      <p>Join hundreds of satisfied customers who chose Just Phantoms for their special moments.</p>
      <div class="cta-buttons">
        <a href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>" class="btn primary">Get Wedding Quote</a>
        <a href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>" class="btn btn-prom-quote">Get Prom Quote</a>
        <a href="tel:+447504040407" class="btn btn-hero-tel">Call 07504 040 407</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer();
