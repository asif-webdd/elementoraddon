<?php
/**
 * ZSLN Basic Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;

class Zsln_Basic_Widget extends Widget_Base {

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'zsln_basic_widget';
	}

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'ZSLN', 'zsln-elm-addon' );
	}

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-typography';
	}

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'zsln-custom-cat' ];
	}

	// add stylesheet dependency in widget
	public function get_style_depends() {
		return [ 'zsln-widget-css' ];
	}

	// add js dependency in widget
	public function get_script_depends() {
		return [ 'zsln-widget-js' ];
	}

	/**
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// title tab start
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Title', 'zsln-elm-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'zsln_title',
			[
				'label' => __( 'Title', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type Title', 'zsln-elm-addon' ),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'zsln-elm-addon' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .heading',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => __( 'Border', 'zsln-elm-addon' ),
				'selector' => '{{WRAPPER}} .heading',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'zsln_alignment',
			[
				'label' => __( 'Alignment', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'separator' => 'before',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'label' => __( 'Text Shadow', 'zsln-elm-addon' ),
				'selector' => '{{WRAPPER}} .heading',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'separator' => 'before',
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'large',
				'separator' => 'after',
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
				'prefix_class' => 'elementor-animation-',
			]
		);


		$this->end_controls_section();
		// title tab end



		// description tab start
		$this->start_controls_section(
			'description_section',
			[
				'label' => __( 'Description', 'zsln-elm-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'zsln_description',
			[
				'label' => __( 'Description', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type Description', 'zsln-elm-addon' ),
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography', 'zsln-elm-addon' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .desc',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'desc_border',
				'label' => __( 'Border', 'zsln-elm-addon' ),
				'selector' => '{{WRAPPER}} .desc',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'zsln_alignment_desc',
			[
				'label' => __( 'Alignment', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'separator' => 'before',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_shadow',
				'label' => __( 'Text Shadow', 'zsln-elm-addon' ),
				'selector' => '{{WRAPPER}} .desc',
			]
		);
		
		$this->add_control(
			'website_link',
			[
				'label' => __( 'URL', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://developerasif.com', 'zsln-elm-addon' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'custom_html',
			[
				'label' => __( 'Custom HTML', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'html',
				'rows' => 20,
				'separator' => 'before',
			]
		);


		$this->end_controls_section();
		// description tab end




		// Button tab start
		$this->start_controls_section(
			'button', 
			[
				'label' => esc_html__( 'Button', 'zsln-elm-addon' ),
			]
		);

		$this->add_control(
			'button_label', 
			[
				'label' => esc_html__( 'Button Text', 'zsln-elm-addon' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Click Here',
			]
		);

		$this->add_control(
			'button_url', 
			[
				'label' => esc_html__( 'Button URL', 'zsln-elm-addon' ),
				'type'  => \Elementor\Controls_Manager::URL,
				'default' => 
				[
					'url' => '#'
				]
			]
		);
		
		$this->add_control(
			'button_color',
			[
				'label' => __( 'Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'zsln_alignment_button',
			[
				'label' => __( 'Alignment', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
			]
		);
		/*
		$this->add_control(
			'button_text_color', 
			[
				'label' => esc_html__( 'Button Text Color', 'zsln-elm-addon' ),
				'type'  => \Elementor\Controls_Manager::COLOR,
				'scheme' => 
				[
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value'  => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => 
				[
					'{{WRAPPER}} .call_to_action_bg .btn.btn_custom_color' => 'color: {{VALUE}}'
				],
				'default' => '#fc5c7d',
				'condition' =>
				[
					'btn_color_type' => 'custom_color'
				]
			]
		);
		$this->add_control(
			'button_bg_color', 
			[
				'label' => esc_html__( 'Button Background Color', 'zsln-elm-addon' ),
				'type'  => \Elementor\Controls_Manager::COLOR,
				'scheme' => 
				[
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value'  => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => 
				[
					'{{WRAPPER}} .call_to_action_bg .btn.btn_custom_color' => 'color: {{VALUE}}'
				],
				'default' => '#ddd',
				'condition' =>
				[
					'btn_color_type' => 'custom_color'
				]
			]
		);
		$this->add_control(
			'button_text_hover_color', 
			[
				'label' => esc_html__( 'Button Text Hover Color', 'zsln-elm-addon' ),
				'type'  => \Elementor\Controls_Manager::COLOR,
				'scheme' => 
				[
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value'  => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => 
				[
					'{{WRAPPER}} .call_to_action_bg .btn.btn_custom_color.btn:hover' => 'color: {{VALUE}}'
				],
				'default' => '#fc5c7d',
				'condition' =>
				[
					'btn_color_type' => 'custom_color'
				]
			]
		);
		*/



		$this->end_controls_section();
		// Button tab end



		// icon tab start
		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon', 'zsln-elm-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'icon_alignment',
			[
				'label' => __( 'Alignment', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'zsln-elm-addon' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => __( 'Border', 'zsln-elm-addon' ),
				'selector' => '{{WRAPPER}} .iconborder',
			]
		);



		$this->end_controls_section();
		// icon tab end



		// style tab start
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'zsln-elm-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		





		$this->end_controls_section();
		// style tab end







	}


	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

		<!-- Icon -->
		<div style="color: <?php echo $settings['icon_color'] ?>;  text-align: <?php echo $settings['icon_alignment'] ?>; border: <?php echo $settings['icon_border'] ?>;" class="iconborder">
			<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		</div>

		<!-- Heading -->
		<div class="heading" style="color: <?php echo $settings['title_color'] ?>; border: <?php echo $settings['title_border'] ?>; text-align: <?php echo $settings['zsln_alignment'] ?>; hover-animation: <?php echo $settings['animation_section'] ?>"><?php echo $settings['zsln_title'] ?></div>


		<!-- Description -->
		<h6 class="desc" style="color: <?php echo $settings['desc_color'] ?>; border: <?php echo $settings['desc_border'] ?>; text-align: <?php echo $settings['zsln_alignment_desc'] ?> "><?php echo $settings['zsln_description']; ?></h6>
		
		<!-- Button -->
		<a href="" class="" style=" color: <?php echo $settings['button_color'] ?>; text-align: <?php echo $settings['zsln_alignment_button'] ?>;"><?php echo $settings['button_label']; ?></a>

		<!-- URL -->
		<a href="<?php echo $settings['website_link']['url'] ?>"><?php echo $settings['website_link']['url']; ?></a>

		<?php

		// Image 'thumbnail' by ID
		//echo wp_get_attachment_image( $settings['image']['id'], 'thumbnail' );
		echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );


		echo $settings['custom_html'];

			

		

	}


}
