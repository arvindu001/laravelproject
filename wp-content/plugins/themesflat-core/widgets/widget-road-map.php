<?php
class TFRoadMap_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-road-map';
    }
    
    public function get_title() {
        return esc_html__( 'TF Road Map', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-road-map'];
	}

	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );

	        $repeater = new \Elementor\Repeater();

	        $repeater->add_control(
				'before_title',
				[
					'label' => esc_html__( 'Time', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '1992', 'themesflat-core' ),
					'label_block' => true,
				]
			);

	        $repeater->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'We Started IT Technology Company', 'themesflat-core' ),
					'label_block' => true,
				]
			);

            $repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Proin Lobortis, Orci Quis Congue Scelerisque, ' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/default-road-map.jpg",
					],
				]
			);

			$this->add_control(
				'list',
				[
					'label' => esc_html__( 'List', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'before_title' => esc_html__( '1992', 'tf-addon-for-elementer' ),
							'title' => esc_html__( 'We Started IT Technology Company', 'tf-addon-for-elementer' ),
							'description' => esc_html__( 'Proin Lobortis, Orci Quis Congue Scelerisque, ' ),
						],
						[
							'before_title' => esc_html__( '1997', 'tf-addon-for-elementer' ),
							'title' => esc_html__( 'Buildup Development Team Member', 'tf-addon-for-elementer' ),
							'description' => esc_html__( 'Proin Lobortis, Orci Quis Congue Scelerisque, ' ),
						],
                        [
							'before_title' => esc_html__( '2001', 'tf-addon-for-elementer' ),
							'title' => esc_html__( 'National Award Development Team', 'tf-addon-for-elementer' ),
							'description' => esc_html__( 'Proin Lobortis, Orci Quis Congue Scelerisque, ' ),
						],
                        [
							'before_title' => esc_html__( '2010', 'tf-addon-for-elementer' ),
							'title' => esc_html__( 'National Award Desinging Team', 'tf-addon-for-elementer' ),
							'description' => esc_html__( 'Proin Lobortis, Orci Quis Congue Scelerisque, ' ),
						],
					],
					'title_field' => '{{{ title }}}',
				]
			);
	        
			$this->end_controls_section();
        // /.End List Setting              

	    // Start Style
	        $this->start_controls_section( 'section_style',
	            [
	                'label' => esc_html__( 'Style', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

			$this->add_control( 
				'background',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content .content' => 'background-color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'background_hover',
				[
					'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content .content:hover ' => 'background-color: {{VALUE}}',					
					],
				]
			);

	        $this->add_responsive_control(
				'distance_between',
				[
					'label' => esc_html__( 'Distance Between', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 29,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-road-map .road-map-content:last-child' => 'margin-bottom: 0;',
					],
				]
			);

			$this->add_control( 
				'color_time_line',
				[
					'label' => esc_html__( 'Time Line Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-road-map::before, .tf-road-map .road-map-content .content .check-mark .line ' => 'background: {{VALUE}}',					
					],
				]
			);

	        $this->add_control(
				'h_before_title',
				[
					'label' => esc_html__( 'Time', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_before_title',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Roboto Slab',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '48',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '700',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '82',
				            ],
				        ],
				        'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-road-map .road-map-content .before-title',
				]
			); 

			$this->add_control( 
				'color_before_title',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#010C2A',
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content .before-title' => 'color: {{VALUE}}',					
					],
				]
			);

	        $this->add_control(
				'h_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);			

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_title',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Roboto Slab',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '20',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '700',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '30',
				            ],
				        ],
				        'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-road-map .road-map-content .title',
				]
			); 

			$this->add_control( 
				'color_title',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#010C2A',
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content .title' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'color_title_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content .content:hover .title' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'margin_title',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
            
            $this->add_control(
				'h_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);			

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_description',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Inter',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '16',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '400',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '26',
				            ],
				        ],
				        'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-road-map .road-map-content .description',
				]
			); 

			$this->add_control( 
				'color_description',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#494A4D',
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content .description' => 'color: {{VALUE}}',					
					],
				]
			);
			
			$this->add_control( 
				'color_description_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content .content:hover .description' => 'color: {{VALUE}}',					
					],
				]
			);

            $this->add_control(
				'h_checkmark',
				[
					'label' => esc_html__( 'Check Mark', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
            $this->add_responsive_control( 
                'checkmark_size',
                [
                    'label' => esc_html__( 'Check Mark Size', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 2000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 20,
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-road-map .road-map-content .content .check-mark' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );  	
            
            $this->add_control( 
				'color_checkmark',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#E8E8E9',
					'selectors' => [
						'{{WRAPPER}} .tf-road-map .road-map-content .content .check-mark' => 'background-color: {{VALUE}}',					
					],
				]
			);

            $this->add_responsive_control( 
                'checkmark_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' , '%' ],
                    'default' => [
                        'top' => '50',
                        'right' => '50',
                        'bottom' => '50',
                        'left' => '50',
                        'unit' => '%',
                        'isLinked' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-road-map .road-map-content .content .check-mark' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            ); 
			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_road-map', ['id' => "tf-road-map-{$this->get_id()}", 'class' => ['tf-road-map'], 'data-tabid' => $this->get_id()] );

		$content = $title = $before_title = '';	

		foreach ( $settings['list'] as $index => $item ) {
			if ($item['before_title'] != '') {
				$before_title = '<div class="before-title"> '.$item['before_title'].' </div>';
			}
			if ($item['title'] != '') {
				$title = '<h3 class="title">'.$item['title'].'</h3>';
			}
            if ($item['description'] != '') {
				$description = '<p class="description">'.$item['description'].'</p>';
			}

			if ($item['description'] != '') {
				$description = '<p class="description">'.$item['description'].'</p>';
			}


			if ($item['image'] != '') {
				$url = esc_attr($item['image']['url']);
				$image = sprintf( '<div class="image"><img src="%1s" alt="image"></div>',$url);
			}

			
			$content .= sprintf( '<div class="road-map-content">
                                    <div class="time">%1$s</div>
                                    <div class="content">
										%4$s
                                        <span class="check-mark">
                                            <span class="circle"></span>
                                        </span>
                                        <div class="inner-content">%2$s%3$s</div>
                                    </div>
									
								</div>',$before_title, $title, $description,$image );
		}		

		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_road-map'),
            $content
        );	
		
	}

}