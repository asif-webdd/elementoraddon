<?php
/**
 * ZSLN Basic Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;

class Zsln_Blog_Widget extends Widget_Base {

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'zsln_blog_widget';
	}

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Blog Section', 'zsln-elm-addon' );
	}

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-group';
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
			'title',
			[
				'label' => __( 'Title', 'zsln-elm-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'zsln-elm-addon' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_background',
				'label' => __( 'Background', 'zsln-elm-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .title',
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => __( 'Border', 'zsln-elm-addon' ),
				'selector' => '{{WRAPPER}} .title',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_alignment',
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
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);




		$this->end_controls_section();
		// title tab end


		// description tab start
		$this->start_controls_section(
			'description',
			[
				'label' => __( 'Description', 'zsln-elm-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
				'separator' => 'before',
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
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'desc_background',
				'label' => __( 'Background', 'zsln-elm-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .desc',
				'separator' => 'before',
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
			'desc_alignment',
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
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'desc_padding',
			[
				'label' => __( 'Padding', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => __( 'Margin', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);




		$this->end_controls_section();
		// description tab end



		// button tab start
		$this->start_controls_section(
			'button',
			[
				'label' => __( 'Button', 'zsln-elm-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Text', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Button Title', 'zsln-elm-addon' ),
			]
		);
		
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .btn' => 'color: {{VALUE}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __( 'Typography', 'zsln-elm-addon' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btn_background',
				'label' => __( 'Background', 'zsln-elm-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .btn',
				'separator' => 'before',
			]
		);
		/* $this->add_control(
			'btn_background',
			[
				'label' => __( 'Background Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .btn, {{WRAPPER}} .btn' => 'background-color: {{VALUE}};',
				],
			]
		); 
		$this->add_control(
			'btn_background_hover',
			[
				'label' => __( 'Background Hover Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .btn:hover, {{WRAPPER}} .btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		); */

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => __( 'Border', 'zsln-elm-addon' ),
				'selector' => '{{WRAPPER}} .btn',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'btn_alignment',
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
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();
		// button tab end




		// social tab start
		$this->start_controls_section(
			'social_sec',
			[
				'label' => __( 'Social Links', 'zsln-elm-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Facebook Icon Start
		$this->add_control(
			'fb_icon',
			[
				'label' => __( 'Facebook Icon', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-square',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'fb_link',
			[
				'label' => __( 'Facebook URL', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-fb-link.com', 'zsln-elm-addon' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'fb_icon_color',
			[
				'label' => __( 'Facebook Icon Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fb' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'fb_background',
				'label' => __( 'Facebook Background', 'zsln-elm-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .fb',
			]
		);

		$this->add_control(
			'fb_icon_alignment',
			[
				'label' => __( 'Facebook Alignment', 'zsln-elm-addon' ),
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

		$this->add_responsive_control(
			'fb_padding',
			[
				'label' => __( 'Facebook Padding', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'fb_margin',
			[
				'label' => __( 'Facebook Margin', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Facebook Icon End		


		// Twitter Icon Start
		$this->add_control(
			'twit_icon',
			[
				'label' => __( 'Twitter Icon', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-twitter-square',
					'library' => 'solid',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'twit_link',
			[
				'label' => __( 'Twitter URL', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-twit-link.com', 'zsln-elm-addon' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'twit_icon_color',
			[
				'label' => __( 'Twitter Icon Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .twit' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'twit_background',
				'label' => __( 'Twitter Background', 'zsln-elm-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .twit',
			]
		);

		$this->add_control(
			'twit_icon_alignment',
			[
				'label' => __( 'Twitter Alignment', 'zsln-elm-addon' ),
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

		$this->add_responsive_control(
			'twit_padding',
			[
				'label' => __( 'Facebook Padding', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .twit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'twit_margin',
			[
				'label' => __( 'Facebook Margin', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .twit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Twitter Icon End


		// Google Icon Start
		$this->add_control(
			'goog_icon',
			[
				'label' => __( 'Google Plus Icon', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-google-plus-square',
					'library' => 'solid',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'goog_link',
			[
				'label' => __( 'Google URL', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-goog-link.com', 'zsln-elm-addon' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'goog_icon_color',
			[
				'label' => __( 'Google Icon Color', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .goog' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'goog_background',
				'label' => __( 'Google Background', 'zsln-elm-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .goog',
			]
		);

		$this->add_control(
			'goog_icon_alignment',
			[
				'label' => __( 'Google Alignment', 'zsln-elm-addon' ),
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

		$this->add_responsive_control(
			'goog_padding',
			[
				'label' => __( 'Facebook Padding', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .goog' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'goog_margin',
			[
				'label' => __( 'Facebook Margin', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .goog' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Google Icon End




		$this->end_controls_section();
		// social tab end



		// style tab start
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style Section', 'zsln-elm-addon' ),
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
		
		global $post;
		$args = array(
			'numberposts' => 2
		  );
		   
		  $latest_posts = get_posts( $args );
		  foreach( $latest_posts as $post ){

		?>

		<div class="w3ls">
			<div class="col-md-6 w3ls-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<div class="tc-ch">
					<div class="tch-img">
						<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail(get_the_id()); ?></a>
					</div>
				
					<h3 class="title" style="text-align: <?php echo $settings['title_alignment'] ?>; color: <?php echo $settings['title_color'] ?>; <?php echo $settings['title_background'] ?>; <?php echo $settings['title_border'] ?>"><a href="<?php echo get_the_permalink(); ?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <?php echo get_the_title(); ?> </font></font></a></h3>

					<h6><a href="singlepage.html"><?php echo get_the_author(); ?></a> <?php echo the_date(); ?></h6>

					<p class="desc" style="text-align: <?php echo $settings['desc_alignment'] ?>; color: <?php echo $settings['desc_color'] ?>; <?php echo $settings['desc_background'] ?>; <?php echo $settings['desc_border'] ?>"><?php echo the_excerpt(); ?></p>
					<div class="bht1">
						<a class="btn" style="text-align: <?php echo $settings['btn_alignment'] ?>; color: <?php echo $settings['btn_color'] ?>; <?php echo $settings['btn_background'] ?>; <?php echo $settings['btn_border'] ?>" href="<?php echo get_the_permalink(); ?>"><?php echo $settings['btn_text'] ?></a>
					</div>
					<div class="soci my-icon-wrapper">
					<ul>
						<li class="hvr-rectangle-out"><a class="fb" href="<?php echo $settings['fb_link']['url'] ?>" style="  text-align: <?php echo $settings['fb_icon_alignment'] ?>;"><?php \Elementor\Icons_Manager::render_icon( $settings['fb_icon'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
						<li class="hvr-rectangle-out"><a class="twit" href="<?php echo $settings['twit_link']['url'] ?>" style="  text-align: <?php echo $settings['twit_icon_alignment'] ?>;"><?php \Elementor\Icons_Manager::render_icon( $settings['twit_icon'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
						<li class="hvr-rectangle-out"><a class="goog" href="<?php echo $settings['goog_link']['url'] ?>" style="  text-align: <?php echo $settings['goog_icon_alignment'] ?>;"><?php \Elementor\Icons_Manager::render_icon( $settings['goog_icon'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
						<!-- <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
						<li class="hvr-rectangle-out"><a class="drib" href="#"></a></li> -->
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>



		<?php
		
		}
		wp_reset_postdata();

	}


	/* protected function _content_template(){
		?>

		

		<?php
	} */



}
