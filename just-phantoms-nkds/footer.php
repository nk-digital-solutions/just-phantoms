<footer>
  <div class="container footer-compact">
    <div class="footer-brand">
      <div class="logo" style="margin-bottom:0.75rem">
        <img alt="Just Phantoms" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/logos/nav-logo.png" />
      </div>
      <p class="footer-tagline">Premier luxury car hire across the UK</p>
      <div class="footer-contact">
        <a class="tel" href="tel:+447504040407">07504 040 407</a>
        <a href="mailto:info@justphantoms.com">info@justphantoms.com</a>
      </div>
    </div>

    <div class="footer-links">
      <div class="link-group">
        <h4>Services</h4>
        <div class="links-compact">
          <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Weddings</a>
          <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Proms</a>
          <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Executive</a>
          <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Airport</a>
          <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Music Videos</a>
          <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Corporate</a>
        </div>
      </div>

      <div class="link-group">
        <h4>Fleet</h4>
        <div class="links-compact">
          <a href="<?php echo esc_url( home_url( '/rolls-royce-phantom/' ) ); ?>">Rolls Royce</a>
          <a href="<?php echo esc_url( home_url( '/range-rover/' ) ); ?>">Range Rover</a>
          <a href="<?php echo esc_url( home_url( '/porsche-cayenne-limo/' ) ); ?>">Limo</a>
          <a href="<?php echo esc_url( home_url( '/mustang-gt500/' ) ); ?>">Mustang</a>
          <a href="<?php echo esc_url( home_url( '/vintage-car/' ) ); ?>">Vintage</a>
          <a href="<?php echo esc_url( home_url( '/fleet/' ) ); ?>">View All</a>
        </div>
      </div>

      <div class="link-group">
        <h4>Support</h4>
        <div class="links-compact">
          <a href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>">Reviews</a>
          <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a>
          <a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">Get Quote</a>
          <a href="#terms">Terms</a>
          <a href="#privacy">Privacy</a>
        </div>
      </div>
    </div>

    <div class="footer-cta">
      <div class="cta-content">
        <strong>Ready to book?</strong>
        <p>Available 8AM–10PM daily</p>
      </div>
      <div class="cta-buttons">
        <a href="tel:+447504040407" class="btn-compact primary">Call Now</a>
        <a href="https://wa.me/447504040407" class="btn-compact ghost" target="_blank" rel="noopener noreferrer">WhatsApp</a>
      </div>
    </div>
  </div>

  <div class="footer-bottom-compact">
    <div class="container">
      <div class="footer-bottom-flex">
        <div class="copyright">&copy; <span id="year"></span> Just Phantoms. All rights reserved.</div>
        <div class="footer-badges">
          <span>Licensed</span> &bull; <span>Insured</span> &bull; <span>VAT Registered</span>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/447504040407?text=Hi!%20I'm%20interested%20in%20luxury%20car%20hire.%20Can%20you%20help%20me%20with%20a%20quote%3F" class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Contact us on WhatsApp">
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.944 1.164-.177.199-.354.223-.651.074-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.085" fill="currentColor"/>
  </svg>
</a>

<?php wp_footer(); ?>
</body>
</html>
