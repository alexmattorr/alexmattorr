<section class="contact wrapper" id="contact">
		<h3 class="title"><?php echo the_field('contact_title'); ?></h3>

	<article class="contact-info">
		<p><?php echo the_field('contact_info'); ?></p>

		<ul>
			<li><a href="mailto:<?php echo the_field('contact_email'); ?>"><?php echo the_field('contact_email'); ?></a></li>
			<li><a href="tel:<?php echo the_field('contact_telephone'); ?>"><?php echo the_field('contact_telephone'); ?></a></li>
		</ul>

		<div class="contact-item contact-location">
			<?php echo the_field('city'); ?>, <span><?php echo the_field('state'); ?></span>
		</div>
	</article>

	<article class="contact-form">
		<?php echo do_shortcode( '[contact-form-7 id="4" title="Contact Form"]' ); ?>
	</article>

	<ul class="contact-social">
			<li>
				<a href="<?php echo the_field('github_link'); ?>" target="_blank">
					<i class="fa fa-github-alt fa-lg"></i>
				</a>
			</li><li>
				<a href="<?php echo the_field('linkedin_link'); ?>" target="_blank">
					<i class="fa fa-linkedin fa-lg"></i>
				</a>
			</li><li>
				<a href="<?php echo the_field('twitter_link'); ?>" target="_blank">
					<i class="fa fa-twitter fa-lg"></i>
				</a>
			</li>
		</ul>
</section>