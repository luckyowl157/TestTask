<?php
/**
 * The main template file
 *
 * @package CustomTheme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <?php
        // Start the Loop.
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content/content', get_post_type() );

        endwhile;

        // Previous/next page navigation.
        the_posts_pagination(
            array(
                'prev_text'          => __( 'Previous page', 'customtheme' ),
                'next_text'          => __( 'Next page', 'customtheme' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'customtheme' ) . ' </span>',
            )
        );

    else :

        get_template_part( 'template-parts/content/content', 'none' );

    endif;
    ?>

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
