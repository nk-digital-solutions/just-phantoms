<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'just-phantoms-body' ); ?>>
<?php wp_body_open(); ?>

<header>
  <div class="container nav">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img alt="Just Phantoms" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/logos/nav-logo.png" />
    </a>
    <div class="right">
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/fleet/' ) ); ?>" data-nav="fleet">Fleet</a>
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/services/' ) ); ?>" data-nav="services">Services</a>
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>" data-nav="reviews">Reviews</a>
      <a class="btn ghost" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" data-nav="faq">FAQ</a>
      <a class="btn primary" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">Get Instant Quote</a>
    </div>
  </div>
</header>
