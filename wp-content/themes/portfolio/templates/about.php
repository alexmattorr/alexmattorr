<section class="wrapper" id="about">
	<h3 class="title"><?php echo the_field('about_title'); ?></h3>
	<article class="about-item">
		<?php
	    if(have_rows('about_paragraph') ):
	    while(have_rows('about_paragraph') ) : the_row();
		?>
			<h5><?php echo the_sub_field('paragraph_header'); ?></h5>
			<p><?php echo the_sub_field('paragraph'); ?></p>
		<?php
		  endwhile;
		  endif;
		?>
	</article>

	<article class="about-item">
		<h5 class="skill-header"><?php echo the_field('skill_header'); ?></h5>
		<ul class="about-skills">
			<?php
		    if(have_rows('about_skills') ):
		    while(have_rows('about_skills') ) : the_row();
			?>
			<li class="about-skill">
				<h5><?php echo the_sub_field('skill'); ?></h5>
				<span class="about-skill-icon skill-icon-open is-active">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"><g><polyline fill="none" stroke-width="2" stroke-linejoin="bevel" stroke-miterlimit="10" points="15,24 32,41 49,24 	"/></g></svg>
				</span>

				<span class="about-skill-icon skill-icon-close">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"><g><polyline fill="none" stroke-width="2" stroke-linejoin="bevel" stroke-miterlimit="10" points="49,41 32,24 15,41 	"/> </g></svg>
				</span>
				<ul>
					<?php
				    if(have_rows('sub_skills') ):
				    while(have_rows('sub_skills') ) : the_row();
					?>
						<li><?php echo the_sub_field('sub'); ?></li>
					<?php
					  endwhile;
					  endif;
					?>
				</ul>
			</li>
			<?php
			  endwhile;
			  endif;
			?>
		</ul>
	</article>
</section>