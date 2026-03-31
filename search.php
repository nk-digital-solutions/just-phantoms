<?php
/**
 * Search results template.
 *
 * @package Just_Phantoms
 */

get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Search Results for: &ldquo;<?php echo esc_html( get_search_query() ); ?>&rdquo;</h1>
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
            <a class="btn primary" href="<?php the_permalink(); ?>">View Page</a>
          </div>
        </article>
      <?php endwhile; ?>
    </div>
    <?php the_posts_navigation(); ?>
  <?php else : ?>
    <p style="color:var(--muted);">No results found for that search. Try browsing our <a href="<?php echo esc_url( home_url( '/our-fleet/' ) ); ?>">our fleet</a> or <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">services</a>.</p>
  <?php endif; ?>
</div>

<?php get_footer();
