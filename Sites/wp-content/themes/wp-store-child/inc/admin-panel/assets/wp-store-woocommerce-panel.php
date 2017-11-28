<?php
//Woocommerce custom options
$wp_customize->add_panel(
	'wp_store_woocommerce_setting',
	array(
		'priority' => '50',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Woocommerce Settings', 'wp-store-child' ),
		'description' => __( 'This allows to set wocommerce settings', 'wp-store-child' ),
		)
	);

	$wp_customize->add_section(
		'wp_store_woocommerce_setting_page',
		array(
			'title' => __('Woocommerce Shop Page', 'wp-store-child'),
			'priority' => '40',
			'capability' => 'edit_theme_options',
			'panel' => 'wp_store_woocommerce_setting',
			)
		);

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_page_slider',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_woocommerce_setting_page_slider',array(
					'section'       =>      'wp_store_woocommerce_setting_page',
					'label'         =>      __('Enable Home Slider', 'wp-store-child'),
					'description'         =>      __('Show Home Slider on WooCommerce Shop Page.', 'wp-store-child'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_page_cta',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_woocommerce_setting_page_cta',array(
					'section'       =>      'wp_store_woocommerce_setting_page',
					'label'         =>      __('Enable widget before footer', 'wp-store-child'),
					'description'         =>      __('Show widgets of Widget Area Two before footer on WooCommerce Shop Page.', 'wp-store-child'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

	$wp_customize->add_section(
		'wp_store_woocommerce_setting_product',
		array(
			'title' => __('Woocommerce Products Settings', 'wp-store-child'),
			'priority' => '40',
			'capability' => 'edit_theme_options',
			'panel' => 'wp_store_woocommerce_setting',
			)
		);

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_product_image',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
				)
			);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'wp_store_woocommerce_setting_product_image',array(
					'type' => 'image',
					'label'         =>      __('Upload Custom Placeholder', 'wp-store-child'),
					'description' 	=> 		__('Choose image to add fallback image of products in Shop.','wp-store-child'),
					'section'       =>      'wp_store_woocommerce_setting_product',
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_product_rows',
			array(
				'default' => '3',
				'sanitize_callback' => 'wp_store_sanitize_radio_row'
				)
			);

		$wp_customize->add_control(
			'wp_store_woocommerce_setting_product_rows',
			array(
				'type' => 'radio',
				'label' => __('Products In a Row', 'wp-store-child'),
				'description' => __('(Note: The no. of products you select are applied to list the products in archive-product page. i.e This setting is applied in Shop page and also in Search results.)', 'wp-store-child'),
				'section' => 'wp_store_woocommerce_setting_product',
				'choices' => array(
			            '2' => __('Two', 'wp-store-child'),
			            '3' => __('Three', 'wp-store-child'),
			            '4' => __('Four', 'wp-store-child'),
			            '5' => __('Five', 'wp-store-child'),
			      	)
				)
			);

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_product_total',
			array(
				'default' => '12',
				'sanitize_callback' => 'wp_store_sanitize_integer',
				)
			);

		$wp_customize->add_control(
			'wp_store_woocommerce_setting_product_total',
			array(
				'type' => 'number',
				'label' => __('Number of Products', 'wp-store-child'),
				'description' => __('Enter number of products to be shown in shop.', 'wp-store-child'),
				'section' => 'wp_store_woocommerce_setting_product',
				)
			);
