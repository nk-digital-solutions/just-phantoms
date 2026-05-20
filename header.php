<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
  <div class="container nav">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img alt="Just Phantoms" src="<?php echo esc_url( jp_assets( 'images/logos/nav-logo.png' ) ); ?>">
    </a>
    <button class="nav-toggle" id="navToggle" aria-label="Open menu" aria-expanded="false">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
        <line x1="3" y1="6"  x2="21" y2="6"/>
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="18" x2="21" y2="18"/>
      </svg>
    </button>
    <div class="right" id="mainNav">
      <button class="nav-close" id="navClose" aria-label="Close menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6"  y1="6" x2="18" y2="18"/>
        </svg>
      </button>
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/our-fleet/' ) ); ?>" data-nav="fleet">Our Fleet</a>
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/services/' ) ); ?>" data-nav="services">Services</a>
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>" data-nav="reviews">Reviews</a>
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" data-nav="faq">FAQ</a>
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/locations/' ) ); ?>" data-nav="locations">Locations</a>
      <a class="btn primary" href="<?php echo esc_url( home_url( '/wedding-quote/' ) ); ?>">Get Wedding Quote</a>
      <a class="btn btn-prom-quote" href="<?php echo esc_url( home_url( '/prom-quote/' ) ); ?>">Get Prom Quote</a>
    </div>
  </div>
</header>

