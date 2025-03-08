<?php
class TFProgressBars_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-progress-bar';
    }
    
    public function get_title() {
        return esc_html__( 'TF Progress Bar', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-progress-bar'];
	}

	public function get_script_depends() {
		return ['appear', 'tf-progress-bar'];
	}

	protected function register_controls() {
		// Start Tab Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Progress Bar', 'themesflat-core'),
	            ]
	        );			

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Research', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'percent',
				[
					'label' => esc_html__( 'Percentage', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ '%' ],
					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 89,
					],
				]
			);								
	        
			$this->end_controls_section();
        // /.End Tab Setting         

	    // Start Style Progress Bar
	        $this->start_controls_section( 'section_style_progress',
	            [
	                'label' => esc_html__( 'Progress Bar', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'percentage_type',
				[
					'label' => esc_html__( 'Type', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'outer',
					'options' => [
						'inner'  => esc_html__( 'Inner', 'themesflat-core' ),
						'outer' => esc_html__( 'Outer', 'themesflat-core' ),
						'outer2' => esc_html__( 'Outer Style 2', 'themesflat-core' ),
					],
				]
			);

	        $this->add_control(
				'height_progress',
				[
					'label' => esc_html__( 'Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 5,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-progress-bar .progress-wrap' => 'height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'percentage_type' => ['outer','outer2'],
					],
				]
			);

			$this->add_responsive_control(
				'margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '15',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-progress-bar .progress-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'percentage_type' => ['outer','outer2'],
					],
				]
			); 

			$this->add_responsive_control(
				'padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '15',
						'bottom' => '0',
						'left' => '15',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-progress-bar .perc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'percentage_type' => 'inner',
					],
				]
			);				

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'name' => 'progress_color',	
					'types' => [ 'gradient' ],
					'selector' => '{{WRAPPER}} .tf-progress-bar .progress-animate',
				]
			);


			$this->add_control( 
				'progress_background',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#eee6ff',
					'selectors' => [
						'{{WRAPPER}} .tf-progress-bar .progress-wrap' => 'background-color: {{VALUE}}',				
					],
				]
			);

			$this->add_control(
				'border_radius_progress',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-progress-bar .progress-wrap' => 'border-radius: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-progress-bar .progress-animate' => 'border-radius: {{SIZE}}{{UNIT}};',
					],
				]
			); 
			        
        	$this->end_controls_section();    
	    // /.End Style Progress Bar

       	// Start Style Text
	        $this->start_controls_section( 'section_style_title',
	            [
	                'label' => esc_html__( 'Text', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'h_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Outfit',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '22',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '600',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '26',
				            ],
				        ],
				        'text_transform' => [
							'default' => '',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-progress-bar .title',
				]
			);
			$this->add_control( 
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#010C2A',
					'selectors' => [
						'{{WRAPPER}} .tf-progress-bar .title' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'h_percentage',
				[
					'label' => esc_html__( 'Percentage', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'percentage_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Outfit',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '22',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '600',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '26',
				            ],
				        ],
				        'text_transform' => [
							'default' => '',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-progress-bar .number-perc',
				]
			); 
			$this->add_control( 
				'percentage_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#010C2A',
					'selectors' => [
						'{{WRAPPER}} .tf-progress-bar .number-perc' => 'color: {{VALUE}}',					
					],
				]
			);		

			$this->add_control( 
				'percentage_background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#8B54FF',
					'selectors' => [
						'{{WRAPPER}} .tf-progress-bar.outer2 .perc .number-perc' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .tf-progress-bar.outer2 .perc .number-perc::after'	=> 'border-top-color: {{VALUE}}',				
					],
					'condition' => [
						'percentage_type' => 'outer2',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'percentage_border',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-progress-bar .progress-wrap',
				]
			);
			     
        	$this->end_controls_section();    
	    // /.End Style Text 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_progress_bar', ['id' => "tf-progress-bar-{$this->get_id()}", 'class' => ['tf-progress-bar', $settings['percentage_type']], 'data-tabid' => $this->get_id()] );
		
		$title = '<span class="title">'. esc_html( $settings['title'] ) .'</span>';

		$percent = '<div class="wrap-perc-title">
						<div class="perc">'.$title.'<span class="number-perc">'.$settings['percent']['size'].'%</span></div>
					</div>';
		
		$content = sprintf( '
			%1$s
			<div class="progress-wrap">				
				<div class="progress-animate" data-valuemax="100" data-valuemin="0" data-valuenow="%2$s"></div>
			</div>' , $percent, $settings['percent']['size'] );

		if ($settings['percentage_type'] == 'inner') {
			$content = sprintf( '				
				<div class="progress-wrap">				
					<div class="progress-animate" data-valuemax="100" data-valuemin="0" data-valuenow="%2$s">%1$s</div>
				</div>' , $percent, $settings['percent']['size'] );
		}

		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_progress_bar'),
            $content
        );	
		
	}

}