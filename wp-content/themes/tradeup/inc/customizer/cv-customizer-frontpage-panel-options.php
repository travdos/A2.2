<?php
/**
 * tradeup manage the Customizer options of frontpage panel.
 *
 * @subpackage tradeup
 * @since 1.0 
 */

/* top header section*/

// Toggle field for Enable/Disable top header
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_top_header_section',
		'label'    => __( 'Display Top Header', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '1',
		'priority' => 5,
	)
);

// Toggle field for Enable/Disable Social Icon
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_social_top_header_section',
		'label'    => __( 'Display Social Icons', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '1',
		'priority' => 10,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// facebook url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_social_fb_button_link',
		'label'    => __( 'Facebook URL', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '#',
		'priority' => 15,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// twitter url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_social_tw_button_link',
		'label'    => __( 'Twitter URL', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '#',
		'priority' => 20,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// instagram url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_social_insta_button_link',
		'label'    => __( 'Instagram URL', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '#',
		'priority' => 25,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// linkedin url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_social_lkdn_button_link',
		'label'    => __( 'Linkedin URL', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '#',
		'priority' => 30,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// pinterest url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_social_pint_button_link',
		'label'    => __( 'Pinterest URL', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '#',
		'priority' => 35,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// youtube url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_social_youtube_button_link',
		'label'    => __( 'Youtube URL', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '#',
		'priority' => 40,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// Toggle field for Enable/Disable new tab for social icon url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_new_tab_top_header_section',
		'label'    => __( 'Display Social URL in new Window', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '1',
		'priority' => 45,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// Toggle field for Enable/Disable Contact Number
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_contact_top_header_section',
		'label'    => __( 'Display Contact Number', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '1',
		'priority' => 50,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// Text field for Contact Number
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_contact_top_header_section',
		'label'    => __( 'Contact Number', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
        'default'  => '+1-200-196-348-24',
		'priority' => 55,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// Toggle field for Enable/Disable Address
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_address_top_header_section',
		'label'    => __( 'Display Address', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '1',
		'priority' => 60,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// Text field for Address
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_address_top_header_section',
		'label'    => __( 'Address', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
        'default'  => '272 California, USA',
		'priority' => 65,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// Toggle field for Enable/Disable Timing
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_timing_top_header_section',
		'label'    => __( 'Display Timing', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
		'default'  => '1',
		'priority' => 70,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// Text field for Timing
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_timing_top_header_section',
		'label'    => __( 'Timing', 'tradeup' ),
		'section'  => 'tradeup_top_header_section_content',
        'default'  => 'Mon - Sat: 8.00 - 18.00',
		'priority' => 75,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_top_header_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

/* end of top header section*/

/* general options */

// Text field for general options
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_readmore_general_section',
		'label'    => __( 'Read More Label', 'tradeup' ),
		'section'  => 'tradeup_general_section_content',
		'default'  => 'Read More',	
		'priority' => 5,
	)
);

// excerpt length 
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'number',
		'settings' => 'tradeup_excerpt_general_section',
		'label'    => __( 'Excerpt Length', 'tradeup' ),
		'section'  => 'tradeup_general_section_content',
		'description' => __( '0 length will not show the excerpt.', 'tradeup' ),
		'default'  => '55',	
		'priority' => 5,
	)
);

/* end of general options */

/* layout options */

// Select field for Theme Layout
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'select',
		'settings' => 'tradeup_theme_layout_section',
		'label'    => __( 'Theme Layout', 'tradeup' ),
		'description' => __( 'Box layout will be visible at minimum 1200px display', 'tradeup' ),
		'section'  => 'tradeup_layout_section_content',
		'default'  => 'wide',	
		'priority' => 5,
		'choices'  => array(
			'wide' => __( 'Wide', 'tradeup' ),
			'box'  => __( 'Box',  'tradeup' ),
		),
	)
);

// Select field for sidebar position
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'select',
		'settings' => 'tradeup_sidebar_layout_section',
		'label'    => __( 'Sidebar Position', 'tradeup' ),
		'section'  => 'tradeup_layout_section_content',
		'default'  => 'right',	
		'priority' => 10,
		'choices'  => array(
			'right' => __( 'Right Sidebar', 'tradeup'),
			'left'  => __( 'Left Sidebar',  'tradeup'),
			'no'    => __( 'No Sidebar',  'tradeup'),
		),
	)
);

/* end of layout options */

/* blog post options */

// Toggle field for Enable/Disable Author
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_author_blog_section',
		'label'    => __( 'Display Author', 'tradeup' ),
		'section'  => 'tradeup_blog_post_section_content',
		'default'  => '1',
		'priority' => 5,
	)
);

// Toggle field for Enable/Disable Date
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_date_blog_section',
		'label'    => __( 'Display Date', 'tradeup' ),
		'section'  => 'tradeup_blog_post_section_content',
		'default'  => '1',
		'priority' => 10,
	)
);

// Toggle field for Enable/Disable Comment Count
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_comment_blog_section',
		'label'    => __( 'Display Comments Count', 'tradeup' ),
		'section'  => 'tradeup_blog_post_section_content',
		'default'  => '1',
		'priority' => 15,
	)
);

// Toggle field for Enable/Disable Visit Count
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_vcount_blog_section',
		'label'    => __( 'Display Visit Count', 'tradeup' ),
		'section'  => 'tradeup_blog_post_section_content',
		'default'  => '1',
		'priority' => 20,
	)
);

// Toggle field for Enable/Disable Featured Image
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_fimage_blog_section',
		'label'    => __( 'Display Featured Image', 'tradeup' ),
		'section'  => 'tradeup_blog_post_section_content',
		'default'  => '1',
		'priority' => 25,
	)
);

/* end of blog post options */

/* single post options */

// Toggle field for Enable/Disable Author
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_author_single_section',
		'label'    => __( 'Display Author', 'tradeup' ),
		'section'  => 'tradeup_single_post_section_content',
		'default'  => '1',
		'priority' => 5,
	)
);

// Toggle field for Enable/Disable Comment Count
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_comment_single_section',
		'label'    => __( 'Display Comments Count', 'tradeup' ),
		'section'  => 'tradeup_single_post_section_content',
		'default'  => '1',
		'priority' => 10,
	)
);

// Toggle field for Enable/Disable Date
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_date_single_section',
		'label'    => __( 'Display Date', 'tradeup' ),
		'section'  => 'tradeup_single_post_section_content',
		'default'  => '1',
		'priority' => 15,
	)
);

// Toggle field for Enable/Disable Visit Count
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_vcount_single_section',
		'label'    => __( 'Display Visit Count', 'tradeup' ),
		'section'  => 'tradeup_single_post_section_content',
		'default'  => '1',
		'priority' => 18,
	)
);

// Toggle field for Enable/Disable Visit Count
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_tags_single_section',
		'label'    => __( 'Display Tags', 'tradeup' ),
		'section'  => 'tradeup_single_post_section_content',
		'default'  => '1',
		'priority' => 20,
	)
);

// Toggle field for Enable/Disable Featured Image
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_fimage_single_section',
		'label'    => __( 'Display Featured Image', 'tradeup' ),
		'section'  => 'tradeup_single_post_section_content',
		'default'  => '1',
		'priority' => 25,
	)
);

/* end of single post options */

/* footer options */

// Toggle field for Enable/Disable Copyright
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_cpright_footer_section',
		'label'    => __( 'Display Copyright Footer', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => '1',
		'priority' => 5,
	)
);

// Textarea field for Footer section content
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'textarea',
		'settings' => 'tradeup_cpright_footer_section',
		'label'    => __( 'Copyright Content', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => '',	
		'priority' => 10,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_cpright_footer_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// Toggle field for Enable/Disable Social Icon
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_logo_footer_section',
		'label'    => __( 'Display Logo', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => '1',
		'priority' => 12,
	)
);

// Text field for Footer section title
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_title_footer_section',
		'label'    => __( 'Footer Title', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => 'TAKE OWNERSHIP OF YOUR BRAND',	
		'priority' => 15,
	)
);

// Text field for Footer section description
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_description_footer_section',
		'label'    => __( 'Footer Description', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => 'Finally, a partner that handles the heavy lifting for you.',	
		'priority' => 20,
	)
);

// Toggle field for Enable/Disable Social Icon
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_social_footer_section',
		'label'    => __( 'Display Social Icon', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => '1',
		'priority' => 25,
	)
);

// facebook url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_social_fb_button_link_footer',
		'label'    => __( 'Facebook URL', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => '#',
		'priority' => 30,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_social_footer_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// instagram url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_social_insta_button_link_footer',
		'label'    => __( 'Instagram URL', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => '#',
		'priority' => 35,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_social_footer_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// linkedin url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'text',
		'settings' => 'tradeup_social_lkdn_button_link_footer',
		'label'    => __( 'Linkedin URL', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => '#',
		'priority' => 40,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_social_footer_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);

// Toggle field for Enable/Disable new tab for social icon url
Kirki::add_field(
	'tradeup_config', array(
		'type'     => 'toggle',
		'settings' => 'tradeup_enable_new_tab_footer_section',
		'label'    => __( 'Display Social URL in new Window', 'tradeup' ),
		'section'  => 'tradeup_footer_section_content',
		'default'  => '1',
		'priority' => 45,
		'active_callback' => array(
			array(
				'setting'  => 'tradeup_enable_social_footer_section',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);
/* end of footer options */