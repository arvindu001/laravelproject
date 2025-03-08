<?php
class TFTitle_Section_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-title-section';
    }
    
    public function get_title() {
        return esc_html__( 'TF Title Section', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-title-section'];
	}

	protected function register_controls() {
		// Start Tab Setting        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Title Section', 'themesflat-core'),
	            ]
	        );	 
			
			$this->add_control( 
				'style',
				[
					'label' => esc_html__( 'Styles', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1', 'themesflat-core' ),
					],
				]
			);	

			$this->add_control( 
	        	'html_tag',
				[
					'label' => esc_html__( 'HTML Tag', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h2',
					'options' => [
						'h1' => esc_html__( 'H1', 'themesflat-core' ),
						'h2' => esc_html__( 'H2', 'themesflat-core' ),
						'h3' => esc_html__( 'H3', 'themesflat-core' ),
						'h4' => esc_html__( 'H4', 'themesflat-core' ),
						'h5' => esc_html__( 'H5', 'themesflat-core' ),
						'h6' => esc_html__( 'H6', 'themesflat-core' ),
						'span' => esc_html__( 'span', 'themesflat-core' ),
						'p' => esc_html__( 'p', 'themesflat-core' ),
						'div' => esc_html__( 'div', 'themesflat-core' ),
					],
				]
			);		

			$this->add_control(
				'sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Services We Provide', 'themesflat-core' ),
					'label_block' => true,
				]
			);			

			$this->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Outsmart the competition with best-in-class SEO marketing services', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'default' => 'center',
					'options' => [
						'left'    => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-core' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-text-align-right',
						]
					],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section' => 'text-align: {{VALUE}}',
					],
				]
			);
	        
			$this->end_controls_section();
        // /.End Tab Setting         

	    // Start Style
	        $this->start_controls_section( 'section_style',
	            [
	                'label' => esc_html__( 'Style', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );	

			$this->add_control(
				'h_sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_sub_title',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Nunito',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '18',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '700',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '26',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-title-section .title-section .sub-title',
				]
			); 

			$this->add_control( 
				'color_sub_title',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'color: {{VALUE}}',					
					],
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->add_control( 
				'color_sub_title2',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'background-color: {{VALUE}}',					
					],
				]
			);

			$this->add_responsive_control( 
				'border_sub_title',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_box_shadow::get_type(),
				[
					'name' => 'box_shadow_sub_title',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-title-section .title-section .sub-title',
				]
			);

			$this->add_control( 
				'color_sub_title_2',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'color: {{VALUE}}',					
					],
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			$this->add_responsive_control(
				'padding_sub_title',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'style' => ['style1','style2'],
					],
				]
			);

			$this->add_responsive_control(
				'margin_sub_title',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'style' => ['style1','style2'],
					],
				]
			);		

			$this->add_control(
				'h_heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Nunito',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '52',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '600',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1.1923076923076923',
				            ],
				        ],
				        'text_transform' => [
							'default' => '',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-title-section .title-section .heading',
				]
			); 

			$this->add_control( 
				'heading_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .heading' => 'color: {{VALUE}}',					
					],
				]
			);			

			$this->add_control( 
				'heading_color_span',
				[
					'label' => esc_html__( 'Color Span', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .heading span' => 'color: {{VALUE}}',					
					],
				]
			);	

			$this->add_responsive_control(
				'heading_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'heading_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_title_section', ['id' => "tf-title-section-{$this->get_id()}", 'class' => ['tf-title-section', $settings['style']], 'data-tabid' => $this->get_id()] );

		$animation = ! empty( $settings['hover_animation'] ) ? 'elementor-animation-' . esc_attr( $settings['hover_animation'] . ' inline-block' ) : '';

		$heading = $blurred_text = $sub_title = '';		

		if ($settings['heading'] != '') {
			$heading = sprintf( '<%1$s class="heading">%2$s</%1$s>',$settings['html_tag'], $settings['heading'] );
		}		

		if ($settings['sub_title'] != '') {
			$sub_title = sprintf( '<div class="sub-title">%1$s</div>', $settings['sub_title'] );
		}
		
		$content = sprintf( '
			<div class="title-section">
				%1$s
				%2$s
			</div>' , $sub_title, $heading );

		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_title_section'),
            $content
        );	
		
	}

}