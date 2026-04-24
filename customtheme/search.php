<?php
/**
 * The template for displaying search results pages
 *
 * @package CustomTheme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <h1 class="page-title">
                <?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Search Results for: %s', 'customtheme' ), '<span>' . get_search_query() . '</span>' );
                ?>
            </h1>
        </header><!-- .page-header -->

        <?php
        // Start the Loop.
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content/content', 'search' );

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
