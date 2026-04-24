<section class="services-section">
	<div class="container">
	<?php if (get_field('services-title') ) : ?>
		<h2 class="title"><?php echo esc_html( get_field('services-title') ); ?></h2>
	<?php endif; ?>
	
	<?php if(have_rows('services')) : ?>
		<!-- Mobile/Tablet Navigation Buttons -->
		<div class="services-nav">
			<?php 
			$service_index = 0;
			while(have_rows('services')) : the_row();
				$icon_default = get_sub_field('icon_default');
				$icon_active = get_sub_field('icon_active');
				$color = get_sub_field('color');
				$active_class = ($service_index === 0) ? 'active' : '';
			?>
			<button class="service-nav-btn <?php echo $active_class; ?>" 
			        data-service="<?php echo $service_index; ?>"
			        data-color="<?php echo esc_attr( $color ); ?>"
			        data-icon-default="<?php echo esc_url( $icon_default['url'] ); ?>"
			        data-icon-active="<?php echo esc_url( $icon_active['url'] ); ?>"
			        style="<?php echo ($service_index === 0) ? 'background-color: ' . esc_attr($color) . ';' : ''; ?>">
				<img src="<?php echo ($service_index === 0) ? esc_url( $icon_active['url'] ) : esc_url( $icon_default['url'] ); ?>" 
				     alt="<?php echo esc_attr( $icon_default['alt'] ); ?>">
			</button>
			<?php 
				$service_index++;
			endwhile; 
			?>
		</div>
		
		<!-- Service Content Container -->
		<div class="services-content-container">
			<?php 
			$service_index = 0;
			while(have_rows('services')) : the_row();
				$color = get_sub_field('color');
				$icon_active = get_sub_field('icon_active');
				$description = get_sub_field('description');
				$active_class = ($service_index === 0) ? 'active' : '';
			?>
			<div class="service-content-item <?php echo $active_class; ?>" 
			     data-service="<?php echo $service_index; ?>"
			     style="background-color: <?php echo esc_attr( $color ); ?>;">
				<img src="<?php echo esc_url( $icon_active['url'] ); ?>" 
				     alt="<?php echo esc_attr( $icon_active['alt'] ); ?>" 
				     class="service-icon">
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<?php 
				$service_index++;
			endwhile; 
			?>
		</div>
		
		<!-- Desktop Grid List (original) -->
		<div class="desktop-services">
			<ul class='grid-list'>
				<?php while(have_rows('services')) : the_row();
					$color = get_sub_field('color');
					$icon_default = get_sub_field('icon_default');
					$icon_active = get_sub_field('icon_active');
					$description = get_sub_field('description');
				?>
				<li style="--hover-color: <?php echo esc_attr( $color ); ?>;" 
				    data-icon-default="<?php echo esc_url( $icon_default['url'] ); ?>" 
				    data-icon-active="<?php echo esc_url( $icon_active['url'] ); ?>">
					<img src="<?php echo esc_url( $icon_default['url'] ); ?>" 
					     alt="<?php echo esc_attr( $icon_default['alt'] ); ?>" 
					     class="service-icon">
					<p><?php echo esc_html( $description ); ?></p>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>
	</div>
</section>