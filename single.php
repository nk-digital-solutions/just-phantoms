<?php
/**
 * The single post template.
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <section class="page-hero">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php echo esc_html( get_the_date() ); ?></p>
    </div>
  </section>

  <div class="container" style="padding: 3.5rem 0; max-width: 900px;">
    <?php if ( has_post_thumbnail() ) : ?>
      <div style="margin-bottom: 2rem; border-radius: 16px; overflow: hidden;">
        <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:auto;' ) ); ?>
      </div>
    <?php endif; ?>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,.08);">
      <?php the_post_navigation( array(
        'prev_text' => '&larr; %title',
        'next_text' => '%title &rarr;',
      ) ); ?>
    </div>
  </div>

<?php endwhile; ?>

<?php get_footer();
