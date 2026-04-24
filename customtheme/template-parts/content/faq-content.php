<section class="faq-section">
	<div class="container">
	<?php if (get_field('title') ) : ?>
		<h2 class="title"><?php echo esc_html( get_field('title') ); ?></h2>
	<?php endif; ?>
	<div>
		<?php if(have_rows('faqs')) : ?>
			<ul class='faq-grid-list'>
				<?php while(have_rows('faqs')) : the_row();
					$question = get_sub_field('question');
					$answer = get_sub_field('answer');
				?>
				<li>
					<div class='faq-question'>
						<h3><?php echo esc_html( $question ); ?></h3>
						<div class='faq-toggle'>
							<span></span>
							<span></span>
						</div>
					</div>
					<p><?php echo esc_html( $answer ); ?></p>
				</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
	</div>
</section>