<?php
//Add New Panel for Homepage Sections
	$wp_customize->add_panel(
		'wp_store_homepage_setting',
		array(
			'priority' => '30',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Homepage Settings', 'wp-store-child' ),
			'description' => __( 'Setup homepage section. Some sections are available from widgets', 'wp-store-child' ),
			)
		);

		//Slider Baisc setup sections
		$wp_customize->add_section(
			'wp_store_homepage_setting_slider',
			array(
				'priority'        => '10',
				'title' => __( 'Slider Section', 'wp-store-child' ),
				'capability' => 'edit_theme_options',
				'description' => __( 'Setup the slider settings for homepage', 'wp-store-child' ),
				'panel' => 'wp_store_homepage_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_slider_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);
			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_slider_option',
					array(
						'type' => 'switch',
						'label' => __('Enable Slider', 'wp-store-child'),
						'description' => __('Select Yes to show Slider on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_slider',
						)
					)
				);

			//select category for slider
			$wp_customize->add_setting(
				'wp_store_homepage_setting_slider_category',
				array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'wp_store_sanitize_integer'
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_slider_category',
				array(
					'type'	=>	'select',
					'label' => __('Select a category to show in slider','wp-store-child'),
					'description' => __('Note: Parent Category are only listed in dropdown.','wp-store-child'),
					'section' => 'wp_store_homepage_setting_slider',
					'choices' => wp_store_parent_category_lists(),
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_slider_pager',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_slider_pager',
					array(
						'type' => 'switch_yesno',
						'label' => __('Slider Pager', 'wp-store-child'),
						'section' => 'wp_store_homepage_setting_slider',
						'output' => array('Yes', 'No')
						)
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_slider_controls',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_slider_controls',
					array(
						'type' => 'switch_yesno',
						'label' => __('Slider Controls', 'wp-store-child'),
						'section' => 'wp_store_homepage_setting_slider',
						'output' => array('Yes', 'No')
						)
					)
				);
			//transition type
			$wp_customize->add_setting(
				'wp_store_homepage_setting_slider_transition_type',
				array(
					'default' => 'fade',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'wp_store_sanitize_transition_type'
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_slider_transition_type',
				array(
					'type' => 'select',
					'label' => __('Transition Type(Slide/Fade)', 'wp-store-child'),
					'section' => 'wp_store_homepage_setting_slider',
					'choices' => array(
				         	'fade' => __('Fade', 'wp-store-child'),
				          	'backSlide' => __('Back Slide', 'wp-store-child'),
				          	'goDown' => __('Go Down Slide', 'wp-store-child'),
				          	'fadeUp' => __('Fade Up', 'wp-store-child'),
				      	)
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_slider_transition_auto',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_slider_transition_auto',
					array(
						'type' => 'switch_yesno',
						'label' => __('Auto Play', 'wp-store-child'),
						'section' => 'wp_store_homepage_setting_slider',
						'output' => array('Yes', 'No')
						)
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_slider_transition_speed',
				array(
					'default'       =>      '1000',
					'sanitize_callback' => 'wp_store_sanitize_integer'
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_slider_transition_speed',
				array(
					'type' => 'number',
					'label' => __('Auto Play Speed', 'wp-store-child'),
					'section' => 'wp_store_homepage_setting_slider',
					'active_callback' => 'wp_store_sutoplay_on'
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_slider_caption',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_slider_caption',
					array(
						'type' => 'switch_yesno',
						'label' => __('Slider Caption', 'wp-store-child'),
						'description' => __('Select Yes to show titles and description over Slider', 'wp-store-child'),
						'section' => 'wp_store_homepage_setting_slider',
						'output' => array('Yes', 'No')
						)
					)
				);

		//Promo Block section below slider
		$wp_customize->add_section(
			'wp_store_homepage_setting_promo',
			array(
				'title'           =>      __('Promotional Block Section', 'wp-store-child'),
				'priority'        =>      '20',
				'capability' => 'edit_theme_options',
				'panel' => 'wp_store_homepage_setting',
				'description' => __('Choose category for the promotional block below the slider.','wp-store-child'),
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_promo_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);
			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_promo_option',
					array(
						'type' => 'switch',
						'label' => __('Enable Promotional Block Section', 'wp-store-child'),
						'description' => __('Select Yes to show Promotional Block on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_promo',
						)
					)
				);

			//select category for promotional block
			$wp_customize->add_setting(
				'wp_store_homepage_setting_promo_category',
				array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'wp_store_sanitize_integer'
					)
				);

			$wp_customize->add_control(
					'wp_store_homepage_setting_promo_category',
					array(
						'label' => __('Choose Category','wp-store-child'),
						'description' => __('Parent Category are only listed in dropdown.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_promo',
						'type'	=> 'select',
						'choices' => wp_store_parent_category_lists(),
					)
				);

		//Widget Area 1 section
		$wp_customize->add_section(
			'wp_store_homepage_setting_widget1',
			array(
				'title'           =>      __('Widget Area 1 Section', 'wp-store-child'),
				'priority'        =>      '30',
				'capability' => 'edit_theme_options',
				'panel' => 'wp_store_homepage_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_widget1_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_widget1_option',
					array(
						'type' => 'switch',
						'label' => __('Enable Widget Area 1 Section', 'wp-store-child'),
						'description' => __('Select Yes to show Widget Area 1 on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_widget1',
						)
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_widget1_instruction',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_text'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_help_Control(
		            $wp_customize,
		            'wp_store_homepage_setting_widget1_instruction',
		            array(
		                'section' => 'wp_store_homepage_setting_widget1',
		                'settings' => 'wp_store_homepage_setting_widget1_instruction',
		                'input_attrs' => array(
		                    'info' => '<p>'.__('Go to ','wp-store-child').'<a href="'.admin_url('widgets.php').'" target="_blank" >'.__('Widgets','wp-store-child').'</a>'.__(' and add widgets in Widget Area One','wp-store-child').'.</p>',
		                	),
		            	)
        			)
				);

		//Cta section
		$wp_customize->add_section(
			'wp_store_homepage_setting_cta',
			array(
				'title'           =>      __('Call to Action(CTA) Section', 'wp-store-child'),
				'priority'        =>      '40',
				'capability' => 'edit_theme_options',
				'panel' => 'wp_store_homepage_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_cta_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);
			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_cta_option',
					array(
						'type' => 'switch',
						'label' => __('Enable CTA Section', 'wp-store-child'),
						'description' => __('Select Yes to show Call to action on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_cta',
						)
					)
				);

			//Cta Section Title
			$wp_customize->add_setting(
				'wp_store_homepage_setting_cta_title',
				array(
					'default'       =>      '',
					'sanitize_callback'     =>  'wp_store_sanitize_text',
					'transport' => 'postMessage',
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_cta_title',
				array(
					'section'       =>      'wp_store_homepage_setting_cta',
					'label'         =>      __('CTA Section Title', 'wp-store-child'),
					'type'          =>      'text'
					)
				);

			//Cta Section sub Title
			$wp_customize->add_setting(
				'wp_store_homepage_setting_cta_subtitle',
				array(
					'default'       =>      '',
					'sanitize_callback'     =>  'wp_store_sanitize_text',
					'transport' => 'postMessage',
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_cta_subtitle',
				array(
					'section'       =>      'wp_store_homepage_setting_cta',
					'label'         =>      __('CTA Section Sub Title', 'wp-store-child'),
					'type'          =>      'text'
					)
				);

			//Cta Section sub Title
			$wp_customize->add_setting(
				'wp_store_homepage_setting_cta_desc',
				array(
					'default'       =>      '',
					'sanitize_callback'     =>  'wp_store_sanitize_text',
					'transport' => 'postMessage',
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_cta_desc',
				array(
					'section'       =>      'wp_store_homepage_setting_cta',
					'label'         =>      __('CTA Section Description', 'wp-store-child'),
					'type'          =>      'textarea'
					)
				);

			//CTA Read more button link
			$wp_customize->add_setting(
				'wp_store_homepage_setting_cta_readmore_link',
				array(
					'default'       =>      '#',
					'sanitize_callback'     =>  'esc_url',
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_cta_readmore_link',
				array(
					'section'       =>      'wp_store_homepage_setting_cta',
					'label'         =>      __('Readmore Button link', 'wp-store-child'),
					'type'          =>      'text',
					)
				);

			//CTA Read more button
			$wp_customize->add_setting(
				'wp_store_homepage_setting_cta_readmore',
				array(
					'default'       =>      __('Read More','wp-store-child'),
					'sanitize_callback'     =>  'wp_store_sanitize_text',
					'transport' => 'postMessage',
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_cta_readmore',
				array(
					'section'       =>      'wp_store_homepage_setting_cta',
					'label'         =>      __('Readmore Button Text', 'wp-store-child'),
					'type'          =>      'text',
					)
				);

			$wp_customize->add_setting(
                'wp_store_homepage_setting_cta_bg_image',
                array(
                    'default' => '',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url_raw'
                    )
                );

            $wp_customize->add_control(
                new WP_Customize_Image_Control($wp_customize,
                    'wp_store_homepage_setting_cta_bg_image',
                    array(
                        'label' => __('CTA Section Image', 'wp-store-child'),
                        'description' => __('Choose image for CTA Section','wp-store-child'),
                        'section' => 'wp_store_homepage_setting_cta',
                        'setting' => 'wp_store_homepage_setting_cta_bg_image'
                        )
                    )
                );



		//Product Section
		$wp_customize->add_section(
			'wp_store_homepage_setting_product',
			array(
				'title'           =>      __('Product Section', 'wp-store-child'),
				'priority'        =>      '45',
				'capability' => 'edit_theme_options',
				'panel' => 'wp_store_homepage_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_product_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_product_option',
					array(
						'type' => 'switch',
						'label' => __('Enable Product Section', 'wp-store-child'),
						'description' => __('Select Yes to show Product Section on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_product',
						)
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_product_instruction',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_text'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_help_Control(
		            $wp_customize,
		            'wp_store_homepage_setting_product_instruction',
		            array(
		                'section' => 'wp_store_homepage_setting_product',
		                'settings' => 'wp_store_homepage_setting_product_instruction',
		                'input_attrs' => array(
		                    'info' => '<p>'.__('Go to ','wp-store-child').'<a href="'.admin_url('widgets.php').'" target="_blank" >'.__('Widgets','wp-store-child').'</a>'.__(' and add widgets in Product Widget Area','wp-store-child').'.</p>',
		                	),
		            	)
        			)
				);

		//Widget Area 2 section
		$wp_customize->add_section(
			'wp_store_homepage_setting_widget2',
			array(
				'title'           =>      __('Widget Area 2 Section', 'wp-store-child'),
				'priority'        =>      '60',
				'capability' => 'edit_theme_options',
				'panel' => 'wp_store_homepage_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_widget2_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_widget2_option',
					array(
						'type' => 'switch',
						'label' => __('Enable Widget Area 2 Section', 'wp-store-child'),
						'description' => __('Select Yes to show Widget Area 2 on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_widget2',
						)
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_widget2_instruction',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_text'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_help_Control(
		            $wp_customize,
		            'wp_store_homepage_setting_widget2_instruction',
		            array(
		                'section' => 'wp_store_homepage_setting_widget2',
		                'settings' => 'wp_store_homepage_setting_widget2_instruction',
		                'input_attrs' => array(
		                    'info' => '<p>'.__('Go to ','wp-store-child').'<a href="'.admin_url('widgets.php').'" target="_blank" >'.__('Widgets','wp-store-child').'</a>'.__(' and add widgets in Widget Area Two','wp-store-child').'.</p>',
		                	),
		            	)
        			)
				);

		//blog section
		$wp_customize->add_section(
			'wp_store_homepage_setting_blog',
			array(
				'title'           =>      __('Blog Section', 'wp-store-child'),
				'priority'        =>      '70',
				'capability' => 'edit_theme_options',
				'panel' => 'wp_store_homepage_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_blog_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);
			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_blog_option',
					array(
						'type' => 'switch',
						'label' => __('Enable Blog Section', 'wp-store-child'),
						'description' => __('Select Yes to show Blog on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_blog',
						)
					)
				);

			//blog title
			$wp_customize->add_setting(
				'wp_store_homepage_setting_blog_title',
				array(
					'default'       =>  '',
					'sanitize_callback'=>  'wp_store_sanitize_text',
					'transport'		=>	'postMessage',
					)
				);
			$wp_customize->add_control(
				'wp_store_homepage_setting_blog_title',
				array(
					'section'       =>      'wp_store_homepage_setting_blog',
					'label'         =>      __('Blog Section Title', 'wp-store-child'),
					'type'          =>      'text'
					)
				);

			//select category for blog
			$wp_customize->add_setting(
				'wp_store_homepage_setting_blog_category',
				array(
					'default' => 0,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'wp_store_sanitize_integer'
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_blog_category',
					array(
						'label' => __('Choose Category','wp-store-child'),
						'section' => 'wp_store_homepage_setting_blog',
						'description' => __('Note: Parent Category are only listed in dropdown.','wp-store-child'),
						'type'	=> 'select',
						'choices'	=>	wp_store_parent_category_lists(),
					)
				);

		//Widget Area 3 section
		$wp_customize->add_section(
			'wp_store_homepage_setting_widget3',
			array(
				'title'           =>      __('Widget Area 3 Section', 'wp-store-child'),
				'priority'        =>      '80',
				'capability' => 'edit_theme_options',
				'panel' => 'wp_store_homepage_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_widget3_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_widget3_option',
					array(
						'type' => 'switch',
						'label' => __('Enable Widget Area 3 Section', 'wp-store-child'),
						'description' => __('Select Yes to show Widget Area 3 on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_widget3',
						)
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_widget3_instruction',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_text'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_help_Control(
		            $wp_customize,
		            'wp_store_homepage_setting_widget3_instruction',
		            array(
		                'section' => 'wp_store_homepage_setting_widget3',
		                'settings' => 'wp_store_homepage_setting_widget3_instruction',
		                'input_attrs' => array(
		                    'info' => '<p>'.__('Go to ','wp-store-child').'<a href="'.admin_url('widgets.php').'" target="_blank" >'.__('Widgets','wp-store-child').'</a>'.__(' and add widgets in Widget Area Three','wp-store-child').'.</p>',
		                	),
		            	)
        			)
				);

		//Widget Icon Area section
		$wp_customize->add_section(
			'wp_store_homepage_setting_widget_icon',
			array(
				'title'           =>      __('Widget Icon Area Section', 'wp-store-child'),
				'priority'        =>      '90',
				'capability' => 'edit_theme_options',
				'panel' => 'wp_store_homepage_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_widget_icon_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_widget_icon_option',
					array(
						'type' => 'switch',
						'label' => __('Enable Widget Icon Area Section', 'wp-store-child'),
						'description' => __('Select Yes to show Widget Icon Area on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_widget_icon',
						)
					)
				);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_widget_icon_instruction',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_text'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_help_Control(
		            $wp_customize,
		            'wp_store_homepage_setting_widget_icon_instruction',
		            array(
		                'section' => 'wp_store_homepage_setting_widget_icon',
		                'settings' => 'wp_store_homepage_setting_widget_icon_instruction',
		                'input_attrs' => array(
		                    'info' => '<p>'.__('Go to ','wp-store-child').'<a href="'.admin_url('widgets.php').'" target="_blank" >'.__('Widgets','wp-store-child').'</a>'.__(' and add widgets in Widget Icon Area','wp-store-child').'.</p>',
		                	),
		            	)
        			)
				);

		// Brand section
		$wp_customize->add_section(
			'wp_store_homepage_setting_brand',
			array(
				'title'           =>      __('Brand Section', 'wp-store-child'),
				'priority'        =>      '100',
				'capability' => 'edit_theme_options',
				'panel' => 'wp_store_homepage_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_homepage_setting_brand_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_homepage_setting_brand_option',
					array(
						'type' => 'switch',
						'label' => __('Enable Brand Section', 'wp-store-child'),
						'description' => __('Select Yes to show Brand on homepage.','wp-store-child'),
						'section' => 'wp_store_homepage_setting_brand',
						)
					)
				);

			//brand title
			$wp_customize->add_setting(
				'wp_store_homepage_setting_brand_title',
				array(
					'default'       =>  __('Brands We Have','wp-store-child'),
					'sanitize_callback'=>  'wp_store_sanitize_text',
					'transport'		=>	'postMessage',
					)
				);
			$wp_customize->add_control(
				'wp_store_homepage_setting_brand_title',
				array(
					'section'       =>      'wp_store_homepage_setting_brand',
					'label'         =>      __('Brand Section Title', 'wp-store-child'),
					'type'          =>      'text'
					)
				);

			//select category for brand
			$wp_customize->add_setting(
				'wp_store_homepage_setting_brand_category',
				array(
					'default' => 0,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'wp_store_sanitize_integer'
					)
				);

			$wp_customize->add_control(
				'wp_store_homepage_setting_brand_category',
					array(
						'label' => __('Choose Category','wp-store-child'),
						'section' => 'wp_store_homepage_setting_brand',
						'description' => __('Note: Parent Category are only listed in dropdown.','wp-store-child'),
						'type'	=> 'select',
						'choices'	=>	wp_store_parent_category_lists(),
					)
				);
