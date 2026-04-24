<?php
/**
 * The header for our theme
 *
 * @package CustomTheme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'customtheme' ); ?></a>

    <?php if (is_front_page()) : ?>
    <header id="masthead" class="site-header">
        <div class="site-branding">
					<div class='header-logo-text'>
						<?php 
            $logo = get_field('logo', 'option');
            if ($logo) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link">
                    <img src="<?php echo esc_url($logo['url']); ?>" 
                         alt="<?php echo esc_attr($logo['alt'] ? $logo['alt'] : get_bloginfo('name')); ?>" 
                         class="custom-logo">
                </a>
					<?php endif; ?>
					<?php 
						$text_info = get_field('text_info', 'option');
						if ($text_info) : ?>
							<p>
								<?php echo str_replace('|', '<br>', $text_info); ?>
							</p>
					<?php endif; ?>
					</div>
					<div class='header-right'>
						<div class="header-socials">
							<?php 
							if(have_rows('social_media', 'option')) : ?>
								<ul class="social-links">
									<?php while(have_rows('social_media', 'option')) : the_row();
										$icon = get_sub_field('icon');
										$link = get_sub_field('link');
										if ($icon && $link) : ?>
											<li>
												<a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
													<img src="<?php echo esc_url($icon['url']); ?>" 
													     alt="<?php echo esc_attr($icon['alt']); ?>">
												</a>
											</li>
										<?php endif;
									endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
						<div class="header-lang">
							<button class='button-secondary isActive'>Укр</button>
							<button class='button-secondary'>Eng</button>
						</div>
					</div>
					<button class="button-menu" aria-controls="primary-menu" aria-expanded="false">
						<span class="menu-icon"></span>
						<span class="menu-icon"></span>
						<span class="menu-icon"></span>
					</button>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
						<div class="mobile-menu-overlay"></div>
						<div class="mobile-menu-panel">
							<button class="mobile-menu-close" aria-label="Close menu">
								<span></span>
								<span></span>
							</button>
							<?php
							wp_nav_menu(
									array(
											'menu' => 'main_menu_primary',
											'menu_id'        => 'primary-menu',
											'container'      => 'div',
											'container_class' => 'menu-container',
									)
							);
							?>
							<div class="mobile-menu-lang">
								<button class='button-secondary isActive'>Укр</button>
								<button class='button-secondary'>Eng</button>
							</div>
						</div>
            <div class="desktop-menu">
							<?php
								wp_nav_menu(
									array(
											'menu' => 'main_menu_primary',
											'menu_id'        => 'primary-menu',
											'container'      => 'div',
											'container_class' => 'menu-container',
									)
								);
							?>
						</div>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
    <?php endif; ?>
