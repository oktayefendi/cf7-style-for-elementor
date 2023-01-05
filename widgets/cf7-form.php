<?php


class Goat_Elementor_CF7_Addon_Widget extends \Elementor\Widget_Base {

  // Widget name and ID
  public function get_name() {
    return 'cf7_form';
  }
  public function get_title() {
    return __( 'Contact Form 7 Style', 'goat-elementor-cf7-addon' );
  }
  public function get_icon() {
    return 'eicon-form-horizontal';
  }
  public function get_categories() {
    return [ 'general' ];
  }
  // Widget controls
  protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Select Form', 'goat-elementor-cf7-addon' ),
			]
		);

		$this->add_control(
			'form_id',
			[
				'label' => __( 'Select Form', 'goat-elementor-cf7-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $this->get_cf7_forms(),
				'default' => '0',
			]
		);
    $this->end_controls_section();

    $this->start_controls_section(
			'label_settings',
			[
				'label' => __( 'Label', 'goat-elementor-cf7-addon' ),
			]
		);

    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
        'label' => __( 'Label Typography', 'goat-elementor-cf7-addon' ),
        'selector' => '{{WRAPPER}} .wpcf7-form label',
			]
		);

    $this->add_control(
      'label_color',
      [
        'label' => __( 'Label Color', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form label' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
			'input_settings',
			[
				'label' => __( 'Input ', 'goat-elementor-cf7-addon' ),
			]
		);

    $this->add_control(
      'input_bg_color',
      [
        'label' => __( 'Input Background Color', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form input[type="text"], {{WRAPPER}} .wpcf7-form input[type="email"], {{WRAPPER}} .wpcf7-form input[type="url"], {{WRAPPER}} .wpcf7-form input[type="tel"], {{WRAPPER}} .wpcf7-form input[type="number"], {{WRAPPER}} .wpcf7-form input[type="date"], {{WRAPPER}} .wpcf7-form textarea' => 'background-color: {{VALUE}}',
        ],
      ]
    );

    $this->add_responsive_control(
      'input_width',
      [
        'label' => __( 'Input Width', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form input[type="text"], {{WRAPPER}} .wpcf7-form input[type="email"], {{WRAPPER}} .wpcf7-form input[type="url"], {{WRAPPER}} .wpcf7-form input[type="tel"], {{WRAPPER}} .wpcf7-form input[type="number"], {{WRAPPER}} .wpcf7-form input[type="date"], {{WRAPPER}} .wpcf7-form textarea' => 'width: {{VALUE}}px',
        ],
      ]
    );
    
    $this->add_responsive_control(
      'input_border_size',
      [
        'label' => __( 'Input Border Size', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form input[type="text"], {{WRAPPER}} .wpcf7-form input[type="email"], {{WRAPPER}} .wpcf7-form input[type="url"], {{WRAPPER}} .wpcf7-form input[type="tel"], {{WRAPPER}} .wpcf7-form input[type="number"], {{WRAPPER}} .wpcf7-form input[type="date"], {{WRAPPER}} .wpcf7-form textarea' => 'border-width: {{VALUE}}px',
        ],
      ]
    );

    $this->add_control(
      'input_border_radius',
      [
        'label' => __( 'Input Border Radius', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'default' => [
          'size' => 0,
        ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form input[type="text"], {{WRAPPER}} .wpcf7-form input[type="email"], {{WRAPPER}} .wpcf7-form input[type="url"], {{WRAPPER}} .wpcf7-form input[type="tel"], {{WRAPPER}} .wpcf7-form input[type="number"], {{WRAPPER}} .wpcf7-form input[type="date"], {{WRAPPER}} .wpcf7-form textarea' => 'border-radius: {{SIZE}}{{UNIT}}',
        ],
      ]
    );

    $this->add_control(
      'input_border_color',
      [
        'label' => __( 'Input Border Color', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form input[type="text"], {{WRAPPER}} .wpcf7-form input[type="email"], {{WRAPPER}} .wpcf7-form input[type="url"], {{WRAPPER}} .wpcf7-form input[type="tel"], {{WRAPPER}} .wpcf7-form input[type="number"], {{WRAPPER}} .wpcf7-form input[type="date"], {{WRAPPER}} .wpcf7-form textarea' => 'border-color: {{VALUE}}',
        ],
      ]
    );


    // Button options
    $this->end_controls_section();

    $this->start_controls_section(
			'button_settings',
			[
				'label' => __( 'Button', 'goat-elementor-cf7-addon' ),
			]
		);

    $this->add_control(
      'button_size',
      [
        'label' => __( 'Button Size', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
          'small' => __( 'Small', 'goat-elementor-cf7-addon' ),
          'medium' => __( 'Medium', 'goat-elementor-cf7-addon' ),
          'large' => __( 'Large', 'goat-elementor-cf7-addon' ),
        ],
        'default' => 'medium',
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'font-size: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'button_background_color',
      [
        'label' => __( 'Button Background Color', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'background-color: {{VALUE}};',
        ],
      ]
    );
    
    $this->add_control(
      'button_text_color',
      [
        'label' => __( 'Button Text Color', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'color: {{VALUE}};',
        ],
      ]
    );
    
    $this->add_control('button_border_radius',
    [
      'label' => __( 'Button Border Radius', 'goat-elementor-cf7-addon' ),
      'type' => \Elementor\Controls_Manager::SLIDER,
      'size_units' => [ 'px' ],
      'range' => [
        'px' => [
          'min' => 0,
          'max' => 100,
        ],
      ],
      'selectors' => [
        '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'border-radius: {{SIZE}}{{UNIT}};',
      ],
    ]
    );
    
      

		$this->end_controls_section();
	}

  

  protected function render() {
		$settings = $this->get_settings_for_display();

		if ( ! $settings['form_id'] ) {
			return;
		}

		echo do_shortcode( '[contact-form-7 id="' . $settings['form_id'] . '"]' );
	}


	private function get_cf7_forms() {
		$forms = get_posts( [
			'post_type' => 'wpcf7_contact_form',
			'posts_per_page' => -1,
		] );

		$options = [ '0' => __( 'Select a form', 'goat-elementor-cf7-addon' ) ];

		if ( $forms ) {
			foreach ( $forms as $form ) {
				$options[ $form->ID ] = $form->post_title;
			}
		}
    return $options;
	}

}

add_filter( 'wpcf7_form_elements', function( $elements ) {
	$text_color = get_option( 'goat_elementor_cf7_addon_button_text_color' ); // get the button text color
	$bg_color = get_option( 'goat_elementor_cf7_addon_button_background_color' ); // get the button background color
	$class = 'custom-button';
	if ( $text_color ) {
		$class .= ' button-text-color-' . str_replace( '#', '', strtolower( $text_color ) );
	}
	if ( $bg_color ) {
		$class .= ' button-bg-color-' . str_replace( '#', '', strtolower( $bg_color ) );
	}
	$elements = str_replace( '<input', '<input class="' . $class . '"', $elements );
	return $elements;
} );
