<?php
/**
 * The main template file — fallback for all content types.
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero">
  <div class="container">
    <?php if ( is_home() && ! is_front_page() ) : ?>
      <h1>Latest News</h1>
    <?php elseif ( is_archive() ) : ?>
      <h1><?php the_archive_title(); ?></h1>
      <?php the_archive_description( '<p>', '</p>' ); ?>
    <?php else : ?>
      <h1>Just Phantoms</h1>
    <?php endif; ?>
  </div>
</section>

<div class="container" style="padding: 3rem 0;">
  <?php if ( have_posts() ) : ?>
    <div class="grid g3">
      <?php while ( have_posts() ) : the_post(); ?>
        <article class="card" id="post-<?php the_ID(); ?>">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="imgwrap">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'jp-fleet-card' ); ?></a>
            </div>
          <?php endif; ?>
          <div class="body">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
            <a class="btn primary" href="<?php the_permalink(); ?>">Read More</a>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <?php the_posts_navigation(); ?>

  <?php else : ?>
    <p style="color:var(--muted);">No content found. <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Return home</a></p>
  <?php endif; ?>
</div>

<?php get_footer();
