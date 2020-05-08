<?php
/**
 * ZSLN Basic Widget.
 *
 * @since 1.0.0
 */

use \Elementor\Widget_Base;

class Zsln_Repeater_Widget extends Widget_Base {

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'zsln_repeater_widget';
	}

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Repeater', 'zsln-elm-addon' );
	}

	/**
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-meta-data';
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
		// main tab start
		$this->start_controls_section(
			'repeater_section',
			[
				'label' => __( 'Author', 'zsln-elm-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'author_name',
			[
				'label' => __( 'Author Name', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'author_about',
			[
				'label' => __( 'About Author', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		// Repeater tab start
		$this->add_control(
			'list',
			[
				'label' => __( 'Authors Info', 'zsln-elm-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'author_name' =>__('author name', 'zsln-elm-addon'),
						'author_about' =>__('About Author', 'zsln-elm-addon'),
					]
				],
				'title_field' => '{{{ author_name }}}',
			]
		);
		// Repeater tab start



		$this->end_controls_section();
		// main tab end



	}


	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		if( $settings['list'] ){

			foreach( $settings['list']  as $sauthor ){
				echo '<h2>'. $sauthor['author_name'] .'</h2>';
				echo '<p>'. $sauthor['author_about'] .'</p>';
			}

		}

		
		
		

	}


	/* protected function _content_template() {
		?>
		<h2>{{{ settings.author_name }}}</h2>
		<p>{{{ settings.author_about }}}</p>
		<?php
	} */




}
