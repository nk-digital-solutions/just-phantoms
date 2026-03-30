<?php
/**
 * Fallback index template.
 *
 * WordPress requires an index.php in every theme. All real page rendering
 * is handled by the page templates (page-home.php, page-fleet.php, etc.).
 * This file is a safety net for any URL that doesn't match a specific template.
 *
 * @package just-phantoms-nkds
 */

get_header();
?>

<div class="container" style="padding:4rem 0;text-align:center">
    <h1 style="color:var(--gold)"><?php the_title(); ?></h1>
    <div style="color:#e0e0e0;line-height:1.7;max-width:70ch;margin:0 auto">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
        else :
            echo '<p>' . esc_html__( 'No content found.', 'just-phantoms-nkds' ) . '</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer();
