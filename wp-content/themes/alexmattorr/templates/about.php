<section class="wrapper" id="about">
	<h3 class="title"><?php echo the_field('about_title'); ?></h3>
	<article class="about-item">
		<?php
	    if(have_rows('about_paragraph') ):
	    while(have_rows('about_paragraph') ) : the_row();
		?>
			<p><?php echo the_sub_field('paragraph'); ?></p>
		<?php
		  endwhile;
		  endif;
		?>
	</article>

	<article class="about-item">
		<ul class="about-skills">
			<?php
		    if(have_rows('about_skills') ):
		    while(have_rows('about_skills') ) : the_row();
			?>
			<li class="about-skill">
				<h5><?php echo the_sub_field('skill'); ?></h5>
				<span class="about-skill-icon skill-icon-open is-active">+</span>
				<span class="about-skill-icon skill-icon-close">-</span>
				<ul>
					<?php
				    if(have_rows('sub_skills') ):
				    while(have_rows('sub_skills') ) : the_row();
					?>
						<li><?php echo the_sub_field('sub_skill'); ?></li>
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