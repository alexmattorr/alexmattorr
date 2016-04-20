<div class="content content-full">

  <div class="content-block content-resume">

    <div class="content-block-large">
      <h3><?php echo the_field('work_title') ?></h3>
      <?php if(have_rows('resume_work') ): while(have_rows('resume_work') ) : the_row(); ?>
      <div class="content-block-item work-block">
        <h4><?php echo the_sub_field('company_name'); ?></h4>
        <h5><?php echo the_sub_field('job_title'); ?></h5>
        <h6 class="work-date"><?php echo the_sub_field('dates'); ?></h6>
        <p><?php echo the_sub_field('description'); ?></p>
      </div>
      <?php endwhile; endif; ?>

      <h3><?php echo the_field('education_title') ?></h3>
      <?php if(have_rows('resume_education') ): while(have_rows('resume_education') ) : the_row(); ?>
      <div class="content-block-item edu-block">
        <h5><?php echo the_sub_field('name_of_institution'); ?></h5>
        <p><?php echo the_sub_field('achievements'); ?></p>
      </div>
      <?php endwhile; endif; ?>
    </div>


    <div class="content-block-small contact-block-side">
      <?php echo the_field('resume_side'); ?>
    </div>

  </div>

</div>
