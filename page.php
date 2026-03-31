<?php
/**
 * Default page template.
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <section class="page-hero">
    <div class="container">
      <h1><?php the_title(); ?></h1>
    </div>
  </section>

  <div class="container" style="padding: 3.5rem 0; max-width: 900px;">
    <?php the_content(); ?>
  </div>

<?php endwhile; ?>

<?php get_footer();
