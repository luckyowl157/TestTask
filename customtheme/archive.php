<?php
/**
 * The template for displaying archive pages
 *
 * @package CustomTheme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </header><!-- .page-header -->

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
