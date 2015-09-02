<?php

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);


add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
	load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(
	array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
	);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts() {
	wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}

add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title ) {
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
	register_sidebar( array (
	'name' => __( 'Sidebar Widget Area', 'blankslate' ),
	'id' => 'primary-widget-area',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</li>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}

function blankslate_custom_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}

add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count ) {
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

register_post_type( 'work',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'Work' ),
      'singular_name' => __( 'Work' )
    ),
    'public' => true,
    // 'has_archive' => 'work',
  )
);

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_work-page',
		'title' => 'Work Page',
		'fields' => array (
			array (
				'key' => 'field_55d8b9d9a45c8',
				'label' => 'Background Image',
				'name' => 'background_image',
				'type' => 'image',
				'instructions' => 'Add background image.',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'work.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_work',
		'title' => 'Work',
		'fields' => array (
			array (
				'key' => 'field_55be4655178f0',
				'label' => 'Work Image',
				'name' => 'work_image',
				'type' => 'image',
				'instructions' => 'Add work image.',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_55be4678178f1',
				'label' => 'Work Stage Image',
				'name' => 'work_stage_image',
				'type' => 'image',
				'instructions' => 'Add staged work image.',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_55be4692178f2',
				'label' => 'Work Company',
				'name' => 'work_company',
				'type' => 'text',
				'instructions' => 'Add the company you did the work for.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'KNI',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55be46af178f3',
				'label' => 'Work Info',
				'name' => 'work_info',
				'type' => 'textarea',
				'instructions' => 'Add information about the work	you did.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Lorem dorum ipsum',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_55be46d2178f4',
				'label' => 'Work Tech',
				'name' => 'work_tech',
				'type' => 'textarea',
				'instructions' => 'Add a information paragraph about the technology used to build the project',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'We used html5 obviously.',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_55be474cf3e71',
				'label' => 'Work Internal Link',
				'name' => 'work_internal_link',
				'type' => 'text',
				'instructions' => 'Add internal link for the project',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'work',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_home',
		'title' => 'Home',
		'fields' => array (
			array (
				'key' => 'field_55d8b92dd160f',
				'label' => 'Hero Image',
				'name' => 'hero_image',
				'type' => 'image',
				'instructions' => 'Add hero image.',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_55bd84e934fbd',
				'label' => 'Headshot',
				'name' => 'headshot',
				'type' => 'image',
				'instructions' => 'Add headshot.',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_55bd850b34fbe',
				'label' => 'First Name',
				'name' => 'first_name',
				'type' => 'text',
				'instructions' => 'Add first name.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Alexander',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55bd852c34fbf',
				'label' => 'Last Name',
				'name' => 'last_name',
				'type' => 'text',
				'instructions' => 'Add last name.',
				'default_value' => '',
				'placeholder' => 'Orr',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55bd854034fc0',
				'label' => 'Professional Title',
				'name' => 'professional_title',
				'type' => 'text',
				'instructions' => 'Add professional title.',
				'default_value' => '',
				'placeholder' => 'Front-End Developer',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55bd34b82b370',
				'label' => 'About Title',
				'name' => 'about_title',
				'type' => 'text',
				'instructions' => 'Add about title.',
				'default_value' => '',
				'placeholder' => 'About',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55bd34d22b371',
				'label' => 'About Paragraph',
				'name' => 'about_paragraph',
				'type' => 'repeater',
				'instructions' => 'Add about paragraphs.',
				'required' => 1,
				'sub_fields' => array (
					array (
						'key' => 'field_55be3793ea606',
						'label' => 'Paragraph Header',
						'name' => 'paragraph_header',
						'type' => 'text',
						'instructions' => 'Add paragraph header',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'Header',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_55bd350e2b372',
						'label' => 'Paragraph',
						'name' => 'paragraph',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur asperiores ipsa voluptatibus possimus deserunt aut laborum expedita atque mollitia iusto dolore, suscipit cum nemo eos cupiditate sed dolorum magni. Ipsum.',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
				),
				'row_min' => 1,
				'row_limit' => 3,
				'layout' => 'row',
				'button_label' => 'Add Row',
			),
			array (
				'key' => 'field_55be38ee20a3d',
				'label' => 'About Skill Header',
				'name' => 'skill_header',
				'type' => 'text',
				'instructions' => 'Add about skill header.',
				'default_value' => '',
				'placeholder' => 'Header',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55bd352c2b373',
				'label' => 'About Skills',
				'name' => 'about_skills',
				'type' => 'repeater',
				'instructions' => 'Add skills for the about section.',
				'required' => 1,
				'sub_fields' => array (
					array (
						'key' => 'field_55bd35522b374',
						'label' => 'Skill',
						'name' => 'skill',
						'type' => 'text',
						'instructions' => 'Add skill',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'HTML',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_55bd35812b375',
						'label' => 'Sub Skills',
						'name' => 'sub_skills',
						'type' => 'repeater',
						'instructions' => 'Add sub skill.',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_55bd35a32b376',
								'label' => 'Sub Skill',
								'name' => 'sub',
								'type' => 'text',
								'instructions' => 'Add sub skill',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => 'HTML5',
								'prepend' => '',
								'append' => '',
								'formatting' => 'none',
								'maxlength' => '',
							),
						),
						'row_min' => '',
						'row_limit' => 10,
						'layout' => 'row',
						'button_label' => 'Add Row',
					),
				),
				'row_min' => 1,
				'row_limit' => 10,
				'layout' => 'row',
				'button_label' => 'Add Row',
			),
			array (
				'key' => 'field_55c2933abc8ef',
				'label' => 'Work Title',
				'name' => 'work_title',
				'type' => 'text',
				'instructions' => 'Add work section title.',
				'default_value' => '',
				'placeholder' => 'Work',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55c27fd63940a',
				'label' => 'Contact Title',
				'name' => 'contact_title',
				'type' => 'text',
				'instructions' => 'Add contact title here.',
				'default_value' => '',
				'placeholder' => 'Contact',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55c27ff23940b',
				'label' => 'Contact Info',
				'name' => 'contact_info',
				'type' => 'text',
				'instructions' => 'Add contact information paragraph here.',
				'default_value' => '',
				'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto qui non labore, ex nemo, est optio explicabo perspiciatis dolorem eaque dolores. Nesciunt voluptatem, odio modi maiores repellat illo, dolorem suscipit.',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55c280163940c',
				'label' => 'Contact Email',
				'name' => 'contact_email',
				'type' => 'text',
				'instructions' => 'Add email.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'alexmattorr@gmail.com',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55c2802a3940d',
				'label' => 'Contact Telephone',
				'name' => 'contact_telephone',
				'type' => 'text',
				'instructions' => 'Add contact telephone number.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '415-314-9497',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55c2804f3940e',
				'label' => 'City',
				'name' => 'city',
				'type' => 'text',
				'instructions' => 'Add current city.',
				'default_value' => '',
				'placeholder' => 'Salt Lake City',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55c2806a3940f',
				'label' => 'State',
				'name' => 'state',
				'type' => 'text',
				'instructions' => 'Add current state.',
				'default_value' => '',
				'placeholder' => 'UT',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55c2808139410',
				'label' => 'GitHub Link',
				'name' => 'github_link',
				'type' => 'text',
				'instructions' => 'Add GitHub link.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'https://github.com/alexsmander',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55c280b339411',
				'label' => 'Linkedin Link',
				'name' => 'linkedin_link',
				'type' => 'text',
				'instructions' => 'Add Linkedin link.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'https://www.linkedin.com/in/alexmattorr',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55c280f339412',
				'label' => 'Twitter Link',
				'name' => 'twitter_link',
				'type' => 'text',
				'instructions' => 'Add Twitter link.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'https://twitter.com/alexmattorr',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'home.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_work-button-2',
		'title' => 'Work Button',
		'fields' => array (
			array (
				'key' => 'field_55e780fd22bc9',
				'label' => 'Work Button',
				'name' => 'work_button',
				'type' => 'repeater',
				'instructions' => 'Add work button',
				'sub_fields' => array (
					array (
						'key' => 'field_55e7810f22bca',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'instructions' => 'Add the button label',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'View Project',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_55e7812122bcb',
						'label' => 'Link',
						'name' => 'link',
						'type' => 'text',
						'instructions' => 'Add the work item link',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'http://www.iiwisdom.com',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => 2,
				'layout' => 'row',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'work',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
