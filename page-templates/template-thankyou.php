<?php
/**
 * Template Name: Thank You
 * Template Post Type: page
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="thankyou-section">
  <div class="container">
    <div class="thankyou-card">

      <div class="thankyou-icon">
        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="32" cy="32" r="32" fill="var(--gold)"/>
          <path d="M20 32L28 40L44 24" stroke="#111" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>

      <h1>Quote Submitted!</h1>
      <p class="thankyou-lead">Thank you for choosing Just Phantoms. We&rsquo;ve received your enquiry and will be in touch with your tailored quote within 24 hours during business hours.</p>

      <div class="thankyou-next">
        <h2>What Happens Next?</h2>
        <ol class="thankyou-steps">
          <li>
            <span class="step-num">1</span>
            <div>
              <strong>We review your request</strong>
              <p>Our team will review your vehicle choice, date and journey details.</p>
            </div>
          </li>
          <li>
            <span class="step-num">2</span>
            <div>
              <strong>You receive your quote</strong>
              <p>A detailed, transparent quote will be sent to your email within 24 hours.</p>
            </div>
          </li>
          <li>
            <span class="step-num">3</span>
            <div>
              <strong>Confirm your booking</strong>
              <p>Happy with the quote? Secure your date with a deposit and receive immediate confirmation.</p>
            </div>
          </li>
        </ol>
      </div>

      <div class="thankyou-contact">
        <p>Need to speak to us sooner?</p>
        <div class="thankyou-btns">
          <a href="tel:+447504040407" class="btn btn-hero-tel">Call 07504 040 407</a>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn ghost">Back to Home</a>
        </div>
      </div>

    </div>
  </div>
</section>

<?php get_footer();
