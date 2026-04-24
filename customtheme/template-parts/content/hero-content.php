<?php
/**
 * Template part for displaying page content
 *
 * @package CustomTheme
 */
?>

<section class='hero-section' role='presentation' style="background-image: url('<?php $background_image = get_field('background_image'); echo esc_url( $background_image['url'] ); ?>');">
	<div class='hero-content'>
		<div class='hero-text'>
			<h1><?php
				$text = get_field('slogan'); 
				echo str_replace('|', '<br>', $text); ?>
			</h1>
			<a class='main-btn hero-btn' href="<?php echo esc_url( get_field('button_link') ); ?>"><?php the_field('button_text'); ?></a>
		</div>
	</div>
</section>