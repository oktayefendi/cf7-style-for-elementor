<?php


class Goat_CF7_FormStyle extends \Elementor\Widget_Base {

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
    // Add a control to select the Contact Form 7 form
    $this->start_controls_section(
      'section_cf7',
      [
        'label' => __( 'Contact Form 7', 'goat-elementor-cf7-addon' ),
      ]
    );
    $this->add_control(
      'form_id',
      [
        'label' => __( 'Select Form', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => $this->get_cf7_forms(),
     
      ]
    );
    $this->end_controls_section();
  
    // Add a control for the label size
    $this->start_controls_section(
      'section_label_style',
      [
        'label' => __( 'Label Style', 'goat-elementor-cf7-addon' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_control(
      'label_size',
      [
        'label' => __( 'Size', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 8,
            'max' => 20,
          ],
        ],
        'default' => [
          'size' => 14,
          'unit' => 'px',
        ],
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form label' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
      ]
    );
    
        // Add a control for the label color
    $this->add_control(
        'label_color',
        [
        'label' => __( 'Label Color', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .wpcf7-form label' => 'color: {{VALUE}};',
        ],
        ]
    );
    $this->end_controls_section();
    // Add a section for button style options
$this->start_controls_section(
    'section_button_style',
    [
      'label' => __( 'Button Style', 'goat-elementor-cf7-addon' ),
      'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
  );
  // Add a control for the button background color
  $this->add_control(
    'button_bg_color',
    [
      'label' => __( 'Background Color', 'goat-elementor-cf7-addon' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'background-color: {{VALUE}};',
      ],
    ]
  );
  // Add a control for the button text color
  $this->add_control(
    'button_text_color',
    [
      'label' => __( 'Text Color', 'goat-elementor-cf7-addon' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'color: {{VALUE}};',
      ],
    ] );
    // Add a control for the button border radius
    $this->add_control(
      'button_border_radius',
      [
        'label' => __( 'Border Radius', 'goat-elementor-cf7-addon' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    // Add a control for the button typography

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'label' => __( 'Typography', 'goat-elementor-cf7-addon' ),
            'name' => 'content_typography',
            'selector' => '{{WRAPPER}} .wpcf7-form input[type="submit"]',
        ]
    );

    // Add a control for the button padding
$this->add_control(
    'button_padding',
    [
      'label' => __( 'Padding', 'goat-elementor-cf7-addon' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'size_units' => [ 'px', 'em', '%' ],
      'selectors' => [
        '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      ],
    ]
  );
  // Add a control for the button margin
  $this->add_control(
    'button_margin',
    [
      'label' => __( 'Margin', 'goat-elementor-cf7-addon' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'size_units' => [ 'px', 'em', '%' ],
      'selectors' => [
        '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      ],
    ]
  );

  // Add a control for the button box shadow
$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'button_box_shadow',
        'label' => __( 'Box Shadow', 'goat-elementor-cf7-addon' ),
        'selector' => '{{WRAPPER}} .wpcf7-form input[type="submit"]',
      ] );


      // Add a control for the button border width
$this->add_control(
    'button_border_width',
    [
      'label' => __( 'Border Width', 'goat-elementor-cf7-addon' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'size_units' => [ 'px' ],
      'selectors' => [
        '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      ],
    ]
  );
  // Add a control for the button border color
  $this->add_control(
    'button_border_color',
    [
      'label' => __( 'Border Color', 'goat-elementor-cf7-addon' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
        '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'border-color: {{VALUE}};',
      ],
    ]
  );
    $this->end_controls_section();
  }

  

  private function get_cf7_forms() {
    // Get the Contact Form 7 forms
    $cf7_forms = get_posts( [
      'post_type' => 'wpcf7_contact_form',
      'post_status' => 'publish',
      'posts_per_page' => -1,
    ] );

    
    // Return the forms as an options array
    $options = [ '0' => '— ' . __( 'Select', 'goat-elementor-cf7-addon' ) . ' —' ];
    foreach ( $cf7_forms as $form ) {
      $options[ $form->ID ] = $form->post_title;
    }
    return $options;
  }

  protected function render() {
    // Get the form ID
    $form_id = $this->get_settings( 'form_id' );
    // Check if a form is selected
    if ( ! $form_id ) {
      _e( 'Please select a form', 'goat-elementor-cf7-addon' );
      return;
    }
    // Get the form shortcode
    $shortcode = '[contact-form-7 id="' . $form_id . '"]';
    // Render the form
    echo do_shortcode( $shortcode );
  }};

  
