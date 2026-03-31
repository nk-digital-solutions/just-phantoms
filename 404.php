<?php
/**
 * 404 Not Found template.
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<div class="container">
  <div class="error-404">
    <p class="error-code">404</p>
    <h1>Page Not Found</h1>
    <p>Sorry, the page you're looking for doesn't exist. It may have been moved or the link may be incorrect.</p>
    <div class="cta-buttons" style="justify-content:center; margin-bottom: 2rem;">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn primary">Return Home</a>
      <a href="<?php echo esc_url( home_url( '/our-fleet/' ) ); ?>" class="btn ghost">View Our Fleet</a>
      <a href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>" class="btn primary">Get a Quote</a>
    </div>
    <p style="color:var(--muted); font-size:.9rem;">
      Or call us directly: <a class="tel" href="tel:+447504040407">07504 040 407</a>
    </p>
  </div>
</div>

<?php get_footer();
