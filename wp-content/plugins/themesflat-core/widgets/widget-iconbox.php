<?php
class TFIconBox_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tficonbox';
    }
    
    public function get_title() {
        return esc_html__( 'TF Icon Box', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-iconbox'];
	}

	protected function register_controls() {
        // Start Icon Box Setting        
			$this->start_controls_section( 
				'section_tficonbox',
	            [
	                'label' => esc_html__('Icon Box', 'themesflat-core'),
	            ]
	        );

			$this->add_control(
				'style',
				[
					'label' => esc_html__( 'Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1'  => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
					],
				]
			);

	        $this->add_control(
				'icon_style',
				[
					'label' => esc_html__( 'Icon Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'none' => [
							'title' => esc_html__( 'None', 'themesflat-core' ),
							'icon' => 'fa fa-ban',
						],
						'icon' => [
							'title' => esc_html__( 'Icon', 'themesflat-core' ),
							'icon' => 'fa fa-paint-brush',
						],
					],
					'default' => 'icon',
					'toggle' => false,
				]
			);


			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'icon-graingrow-grow13',
						'library' => 'graingrow_icon',
					],
					'condition' => [
						'icon_style' => 'icon',
					],
				]
			);
			

			$this->add_control(
				'title_text',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'IT Strategy', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'description_text',
				[
					'label' => 'Description',
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Phasellus nec magna quis lorem semper', 'themesflat-core' ),
					'condition' => [
	                	'style' => ['style1','style2','style4','style5','style6'],
	                ],
				]
			);		

			$this->add_control(
				'position',
				[
					'label' => esc_html__( 'Icon Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'default' => 'left',
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-h-align-left',
						],
						'top' => [
							'title' => esc_html__( 'Top', 'themesflat-core' ),
							'icon' => 'eicon-v-align-top',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-h-align-right',
						],
					],
				]
			);
			
	        $this->end_controls_section();
        // /.End Icon Box Setting

        // Start Read More        
			$this->start_controls_section( 
				'section_button',
	            [
	                'label' => esc_html__('Button', 'themesflat-core'),
	            ]
	        );
	        $this->add_control(
				'show_button',
				[
					'label' => esc_html__( 'Show Button', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);
			$this->add_control( 
				'button_text',
				[
					'label' => esc_html__( 'Button Text', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Read More', 'themesflat-core' ),
					'condition' => [
	                    'show_button'	=> 'yes',
	                ],
				]
			);
	        $this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
					'default' => [
						'url' => '#',
						'is_external' => false,
						'nofollow' => false,
					],
					'condition' => [
						'show_button' => 'yes'
					]
				]
			);
	        $this->end_controls_section();
        // /.End Read More	    

	    // Start Icon Style 
		    $this->start_controls_section( 
		    	'section_style_icon',
	            [
	                'label' => esc_html__( 'Icon', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	                'condition' => [
						'icon_style' => 'icon',
					],
	            ]
	        ); 

			$this->add_responsive_control(
				'text_align_icon',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
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
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon' => 'display: flex;justify-content: {{VALUE}};',
					],
				]
			);


	        $this->add_control( 
	        	'icon_size',
				[
					'label' => esc_html__( 'Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon-inner i,{{WRAPPER}} .tficonbox.style5 .wrap-icon-inner .icon-2 i ' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tficonbox .wrap-icon-inner svg,{{WRAPPER}} .tficonbox .wrap-icon-inner img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
	        	'wrap_icon_size',
				[
					'label' => esc_html__( 'Wrap Icon Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 100,
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tficonbox .wrap-icon.square .wrap-icon-inner, {{WRAPPER}} .tficonbox .wrap-icon.square-outline .wrap-icon-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'icon_showcase!' => 'default'
					],
				]
			);

			$this->add_control(
				'rotate',
				[
					'label' => esc_html__( 'Rotate', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'default' => [
						'size' => 0,
						'unit' => 'deg',
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon-inner' => 'transform: rotate({{SIZE}}{{UNIT}});',
					],
				]
			);

			$this->add_control(
				'rotate_icon',
				[
					'label' => esc_html__( 'Rotate Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'default' => [
						'size' => 0,
						'unit' => 'deg',
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon-inner i, {{WRAPPER}} .tficonbox .wrap-icon-inner svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
						'{{WRAPPER}} .tficonbox .wrap-icon-inner img' => 'transform: rotate({{SIZE}}{{UNIT}});',
					],
				]
			);

			$this->add_control(
				'icon_border_width',
				[
					'label' => esc_html__( 'Border Width', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 20,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 3,
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon-inner' => 'border-width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tficonbox .wrap-icon-spin-around:before' => 'width: calc(100% + 2 * {{SIZE}}{{UNIT}}); height: calc(100% + 2 * {{SIZE}}{{UNIT}}); border-width: {{SIZE}}{{UNIT}}; top: -{{SIZE}}{{UNIT}}; left: -{{SIZE}}{{UNIT}};',

					],
					'condition' => [
						'icon_showcase' => array('circle-outline','square-outline')
					],
				]
			);

			$this->add_control(
				'icon_bg_width',
				[
					'label' => esc_html__( 'Background Width', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 150,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox.style5 .wrap-icon-inner .icon-2' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'style' => 'style5'
					],
				]
			);

			$this->add_control(
				'icon_boder_width',
				[
					'label' => esc_html__( 'Border Width', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 150,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox.style5 .wrap-icon-inner .icon-2::after' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
						
					],
					'condition' => [
						'style' => 'style5'
					],
				]
			);

			$this->add_control(
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon-inner, {{WRAPPER}} .tficonbox .wrap-icon-spin-around:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'icon_showcase!' => 'default',
					],
				]
			);

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'icon_tabs' );				

				$this->start_controls_tab( 
					'icon_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),						
					]
				);

				$this->add_control( 
					'icon_color',
					[
						'label' => esc_html__( 'Icon Color', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .tficonbox .wrap-icon-inner i' => 'color: {{VALUE}}; fill: {{VALUE}}',
						],
					]
				);

				$this->add_control( 
					'icon_color_bg',
					[
						'label' => esc_html__( 'Icon Background Color', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .tficonbox .wrap-icon .wrap-icon-inner .icon' => 'background-color: {{VALUE}};',
						],
					]
				);
	
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'icon_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					]
				);

				$this->add_control( 
					'icon_color_hover',
					[
						'label' => esc_html__( 'Icon Color', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .tficonbox:hover .wrap-icon-inner i' => 'color: {{VALUE}}; fill: {{VALUE}}',
						],
					]
				);

				$this->add_control( 
					'icon_color_bg_hover',
					[
						'label' => esc_html__( 'Icon Background Color', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .tficonbox:hover .wrap-icon .wrap-icon-inner .icon' => 'background-color: {{VALUE}};',
						],
					]
				);

				
				$this->end_controls_tab();

	        $this->end_controls_tabs();

		    $this->end_controls_section();
	    // /.End Icon Style

	    // Start Content Style 
		    $this->start_controls_section( 
		    	'section_style_content',
	            [
	                'label' => esc_html__( 'Content', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );  

	        $this->add_responsive_control(
				'text_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
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
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'themesflat-core' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .content' => 'text-align: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'heading_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,					
					'separator' => 'before',
				]
			);		

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .tficonbox .content .title',
				]
			);


			$this->add_control(
				'title_tag',
				[
					'label' => esc_html__( 'Title Tag', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h3',
					'options' => [
						'h1'  => esc_html__( 'H1', 'themesflat-core' ),
						'h2'  => esc_html__( 'H2', 'themesflat-core' ),
						'h3'  => esc_html__( 'H3', 'themesflat-core' ),
						'h4'  => esc_html__( 'H4', 'themesflat-core' ),
						'h5'  => esc_html__( 'H5', 'themesflat-core' ),
						'h6'  => esc_html__( 'H6', 'themesflat-core' ),
					],
				]
			);

			$this->add_control(
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .content .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tficonbox .content .title, {{WRAPPER}} .tficonbox .content .title a' => 'color: {{VALUE}};',
					],
				]
			);	

			$this->add_control(
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tficonbox:hover .content .title' => 'color: {{VALUE}};',
					],
				]
			);	

			$this->add_control(
				'heading_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,					
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'selector' => '{{WRAPPER}} .tficonbox .content .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tficonbox .content .description' => 'color: {{VALUE}};',
					]
				]
			);	
			
			$this->add_control(
				'description_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tficonbox:hover .content .description' => 'color: {{VALUE}};',
					]
				]
			);

		    $this->end_controls_section();
    	// /.End Content Style

		// Start Button Style 
		    $this->start_controls_section( 
		    	'section_style_button',
	            [
	                'label' => esc_html__( 'Button', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'button_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
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
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'themesflat-core' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
				]
			);

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],				        
				        'font_family' => [
				            'default' => 'Roboto Slab',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '14',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '700',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1',
				            ],
				        ],
				        'text_transform' => [
							'default' => '',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tficonbox .tf-button',
				]
			);

			$this->add_responsive_control( 
				'button_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .tf-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'btn_line',
				[
					'label' => esc_html__( 'Line Button', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);	

			$this->add_responsive_control( 
				'button_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '20',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .tf-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 
				'button_style_tabs' 
				);

	        	$this->start_controls_tab( 'button_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),
					] );	
	        		$this->add_control( 
						'button_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tficonbox .tf-button' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tficonbox .tf-button i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tficonbox .tf-button svg' => 'fill: {{VALUE}}',
								'{{WRAPPER}} .tficonbox .tf-button.has-line:after' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tficonbox .tf-button' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control( 
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'button_border',
							'label' => esc_html__( 'Border', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tficonbox .tf-button',
						]
					);

					$this->add_control( 
						'button_border_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .tficonbox .tf-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control( 
						'heading_button_icon',
						[
							'label' => esc_html__( 'Icon', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					); 

					$this->add_control( 
						'icon_button',
						[
							'label' => esc_html__( 'Icon Button', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::ICONS,
							'fa4compatibility' => 'icon_bt',
							'default' => [
								'value' => 'graingrow-icon-long-arrow-right',
								'library' => 'graingrow_icon_solar_energy',
							],				
						]
					);

					$this->add_control( 
						'button_icon_size',
						[
							'label' => esc_html__( 'Icon Size', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 50,
									'step' => 1,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 15,
							],
							'selectors' => [
								'{{WRAPPER}} .tficonbox .tf-button i' => 'font-size: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tficonbox .tf-button svg' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					); 

					$this->add_control( 
						'button_icon_position',
						[
							'label' => esc_html__( 'Icon Position', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'bt_icon_after',
							'options' => [
								'bt_icon_before'  => esc_html__( 'Before', 'themesflat-core' ),
								'bt_icon_after' => esc_html__( 'After', 'themesflat-core' ),
							],
						]
					);

					$this->add_control( 
						'button_icon_spacer',
						[
							'label' => esc_html__( 'Icon Spacer', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 50,
									'step' => 1,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 7,
							],
							'selectors' => [
								'{{WRAPPER}} .tficonbox .tf-button.bt_icon_before i' => 'margin-right: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tficonbox .tf-button.bt_icon_before svg' => 'margin-right: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tficonbox .tf-button.bt_icon_after i' => 'margin-left: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tficonbox .tf-button.bt_icon_after svg' => 'margin-left: {{SIZE}}{{UNIT}};',
								'.rtl {{WRAPPER}} .tficonbox .tf-button.bt_icon_before i' => 'margin-left: {{SIZE}}{{UNIT}};margin-right:0;',
								'.rtl {{WRAPPER}} .tficonbox .tf-button.bt_icon_before svg' => 'margin-left: {{SIZE}}{{UNIT}};margin-right:0;',
								'.rtl {{WRAPPER}} .tficonbox .tf-button.bt_icon_after i' => 'margin-right: {{SIZE}}{{UNIT}};margin-left:0;',
								'.rtl {{WRAPPER}} .tficonbox .tf-button.bt_icon_after svg' => 'margin-right: {{SIZE}}{{UNIT}};margin-left:0;',
							],
						]
					);
					
				$this->end_controls_tab();

				$this->start_controls_tab( 'button_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					] );

					$this->add_control( 
						'button_color_hover',
						[
							'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tficonbox .tf-button:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tficonbox:hover .tf-button' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tficonbox .tf-button:hover i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tficonbox .tf-button:hover svg' => 'fill: {{VALUE}}',
								'{{WRAPPER}} .tficonbox .tf-button.has-line:hover:after' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tficonbox .tf-button:hover, {{WRAPPER}} .tficonbox .btn-overlay:after' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control( 
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'button_border_hover',
							'label' => esc_html__( 'Border', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tficonbox .tf-button:hover',
						]
					);

					$this->add_control( 
						'button_border_radius_hover',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .tficonbox .tf-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'button_animation_options',
						[
							'label' => esc_html__( 'Effect Type', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'default',
							'options' => [
								'default' => esc_html__( 'Default', 'themesflat-core' ),
								'button' => esc_html__( 'Elementor Button Effect', 'themesflat-core' ),
								'button-overlay' => esc_html__( 'TF Effect', 'themesflat-core' ),
							]
						]
					);

					$this->add_control(
						'button_animation_overlay',
						[
							'label' => esc_html__( 'Style', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'from-top',
							'options' => [								
								'from-top' => esc_html__( 'From Top', 'themesflat-core' ),
								'from-bottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
								'from-left' => esc_html__( 'From Left', 'themesflat-core' ),
								'from-right' => esc_html__( 'From Right', 'themesflat-core' ),
								'from-center' => esc_html__( 'From Center', 'themesflat-core' ),
								'skew' => esc_html__( 'Skew', 'themesflat-core' ),								
							],
							'condition'=> [
								'button_animation_options' => 'button-overlay',
							],
						]
					);	

					$this->add_control(
						'button_animation',
						[
							'label' => esc_html__( 'Hover Animation', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'elementor-animation-push',
							'options' => [
								'elementor-animation-grow' => esc_html__( 'Grow', 'themesflat-core' ),
								'elementor-animation-shrink' => esc_html__( 'Shrink', 'themesflat-core' ),
								'elementor-animation-pulse' => esc_html__( 'Pulse', 'themesflat-core' ),
								'elementor-animation-pulse-grow' => esc_html__( 'Pulse Grow', 'themesflat-core' ),
								'elementor-animation-pulse-shrink' => esc_html__( 'Pulse Shrink', 'themesflat-core' ),
								'elementor-animation-push' => esc_html__( 'Push', 'themesflat-core' ),
								'elementor-animation-pop' => esc_html__( 'Pop', 'themesflat-core' ),
								'elementor-animation-bob' => esc_html__( 'Bob', 'themesflat-core' ),
								'elementor-animation-hang' => esc_html__( 'Hang', 'themesflat-core' ),
								'elementor-animation-skew' => esc_html__( 'Skew', 'themesflat-core' ),
								'elementor-animation-wobble-vertical' => esc_html__( 'Wobble Vertical', 'themesflat-core' ),
								'elementor-animation-wobble-horizontal' => esc_html__( 'Wobble Horizontal', 'themesflat-core' ),

							],
							'condition'=> [
								'button_animation_options' => 'button',
							],
						]
					);	
					
				$this->end_controls_tab();

			$this->end_controls_tabs();

		    $this->end_controls_section();
	    // /.End Button Style

		// Start Container Style 
		    $this->start_controls_section( 
		    	'section_style_container',
	            [
	                'label' => esc_html__( 'Icon Box Container', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );  

	        $this->add_responsive_control(
				'container_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
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
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'themesflat-core' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox' => 'text-align: {{VALUE}};',
					],
				]
			);			

			$this->add_responsive_control(
				'container_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'container_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_box_shadow::get_type(),
				[
					'name' => 'container_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tficonbox',
				]
			);	

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'container_border',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tficonbox',
				]
			);

			$this->add_control(
				'container_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);	

			$this->start_controls_tabs( 
				'container_style_tabs' 
				);

	        	$this->start_controls_tab( 'container_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),
					] );

	        		$this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'container_background_color',
							'label' => esc_html__( 'Background', 'themesflat-core' ),
							'types' => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .tficonbox',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab( 'container_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					] );	

					$this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'container_background_color_hover',
							'label' => esc_html__( 'Background', 'themesflat-core' ),
							'types' => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .tficonbox:hover,{{WRAPPER}} .tficonbox.style5::after',
						]
					);

					$this->add_control(
						'heading_content_text_color',
						[
							'label' => esc_html__( 'Icon & Text Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);

					$this->add_control( 
						'content_text_color_icon',
						[
							'label' => esc_html__( 'Icon Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tficonbox:hover .wrap-icon-inner' => 'color: {{VALUE}};',
								'{{WRAPPER}} .tficonbox:hover .wrap-icon-inner svg' => 'fill: {{VALUE}};',
							],
						]
					);

					$this->add_control( 
						'content_text_color_title',
						[
							'label' => esc_html__( 'Title Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tficonbox:hover .content .title' => 'color: {{VALUE}};',
							],
						]
					);			

					$this->add_control( 
						'content_text_color_description',
						[
							'label' => esc_html__( 'Description Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tficonbox:hover .content .description' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control( 
						'content_text_color_button',
						[
							'label' => esc_html__( 'Button Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tficonbox:hover .tf-button' => 'color: {{VALUE}};',
								'{{WRAPPER}} .tficonbox:hover .tf-button i' => 'color: {{VALUE}};',
								'{{WRAPPER}} .tficonbox:hover .tf-button.has-line:after' => 'background-color: {{VALUE}};',
							],
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();			    

		    $this->end_controls_section();
    	// /.End Container Style

	    // Start Design When Hover Style 
		    $this->start_controls_section( 
		    	'section_style_background_overlay',
	            [
	                'label' => esc_html__( 'Design When Hover', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'heading_effect_overlay',
				[
					'label' => esc_html__( 'Effect Overlay', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

	        $this->add_control(
				'enable_overlay',
				[
					'label' => esc_html__( 'Enable Overlay', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background',
					'label' => esc_html__( 'Background', 'themesflat-core' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .tficonbox .overlay',
					'condition' => [
						'enable_overlay' => 'yes'
					]
				]
			);

			$this->add_control(
				'hover_style',
				[
					'label' => esc_html__( 'Hover Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'fadein',
					'options' => [
						'fadein'  => esc_html__( 'Fade In', 'themesflat-core' ),
						'from-left'  => esc_html__( 'From Left', 'themesflat-core' ),
						'from-top'  => esc_html__( 'From Top', 'themesflat-core' ),
						'from-right'  => esc_html__( 'From Right', 'themesflat-core' ),
						'from-bottom'  => esc_html__( 'From Bottom', 'themesflat-core' ),
						'flip-box'  => esc_html__( 'Flip Box', 'themesflat-core' ),
					],
					'condition' => [
						'enable_overlay' => 'yes'
					]
				]
			);

			$this->add_control( 
						'flip_box_height',
						[
							'label' => esc_html__( 'Flip Box Height', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 1000,
									'step' => 1,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 316,
							],
							'selectors' => [
								'{{WRAPPER}} .container-widget' => 'height: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'enable_overlay' => 'yes',
								'hover_style' => 'flip-box'
							]
						]
					);

			$this->add_control(
				'flip_box_style',
				[
					'label' => esc_html__( 'Flip Box Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'horizontal-rotation',
					'options' => [
						'horizontal-rotation'  => esc_html__( 'Horizontal Rotation', 'themesflat-core' ),
						'reverse-horizontal-rotation'  => esc_html__( 'Reverse Horizontal Rotation', 'themesflat-core' ),
						'vertical-rotation'  => esc_html__( 'Vertical Rotation', 'themesflat-core' ),
						'reverse-vertical-rotation'  => esc_html__( 'Reverse Vertical Rotation', 'themesflat-core' ),
					],
					'condition' => [
						'enable_overlay' => 'yes',
						'hover_style' => 'flip-box'
					]
				]
			);

			$this->add_control(
				'enable_effect_hover_box',
				[
					'label' => esc_html__( 'Effect Hover Box', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'themesflat-core' ),
					'label_off' => esc_html__( 'No', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
					'separator' => 'before',
				]
			);

			$this->add_control(
				'heading_effect_border',
				[
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,	
					'condition' => [
						'enable_effect_hover_box' => 'yes'
					]				
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'effect_border_box',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tficonbox:hover',
					'condition' => [
						'enable_effect_hover_box' => 'yes'
					]
				]
			);

			$this->add_control(
				'effect_border_radius_box',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'enable_effect_hover_box' => 'yes'
					]
				]
			);

			$this->add_control(
				'heading_effect_translate',
				[
					'label' => esc_html__( 'Translate Box', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'enable_effect_hover_box' => 'yes'
					]
				]
			);

			$this->add_control(
				'effect_translate',
				[
					'label' => esc_html__( 'Translate', 'themesflat-core' ),
					'description' => esc_html__( 'ex: to Top (-10) or to Bottom (10)', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => -50,
							'max' => 50,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox:hover' => '-webkit-transform: translateY( {{SIZE}}{{UNIT}} ); transform: translateY( {{SIZE}}{{UNIT}} );',
					],
					'condition' => [
						'enable_effect_hover_box' => 'yes'
					]
				]
			);

			$this->add_control(
				'heading_effect_shadow',
				[
					'label' => esc_html__( 'Shadow Box', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'enable_effect_hover_box' => 'yes'
					]
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_box_shadow::get_type(),
				[
					'name' => 'effect_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tficonbox:hover',
					'condition' => [
						'enable_effect_hover_box' => 'yes'
					]
				]
			);						

	    	$this->end_controls_section();
    	// /.End Design When Hover Style

	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$migrated = isset( $settings['__fa4_migrated']['icon_button'] );	
		$is_new = empty( $settings['icon_bt'] );

		$btn_animation = 'hover-default';
		if ($settings['button_animation_options'] == 'button') {
			$btn_animation = 'hover-default ' . $settings['button_animation'];
		}elseif ($settings['button_animation_options'] == 'button-overlay') {
			$btn_animation = 'btn-overlay ' . $settings['button_animation_overlay'];
		}


		$btn_line = '';
		if ($settings['btn_line'] == 'yes') {
			$btn_line = 'has-line';
		}
		
		?>
		<?php if( $settings['hover_style'] == 'flip-box' || $settings['hover_style'] == 'flip-box-3d' ) : ?>
			<div class="container-widget <?php echo esc_attr($settings['hover_style']); ?> <?php echo esc_attr($settings['flip_box_style']); ?>">
				<div class="tficonbox <?php echo esc_attr($settings['style']); ?> flip-box-front <?php echo esc_attr($settings['position']); ?>">					
					<?php if ($settings['enable_overlay'] == 'yes'): ?>
					<div class="overlay <?php echo esc_attr($settings['hover_style']); ?>"></div>
					<?php endif; ?>	
					<?php if ($settings['icon_style'] == 'icon'): ?>
						<div class="wrap-icon ">
							<div class="wrap-icon-inner <?php echo esc_attr($settings['icon_style']); ?> ">
								<div class="icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
							</div>
							
						</div>
					<?php endif; ?>	

					<div class="content">
						<<?php echo esc_attr($settings['title_tag']);?> class="title"><?php echo esc_attr($settings['title_text']); ?></<?php echo esc_attr($settings['title_tag']);?>>
						<?php echo sprintf('<div class="description">%s</div>', $settings['description_text']); ?>
						
						<?php if ( $settings['show_button'] == 'yes' ): ?>
							<div class="tf-button-container <?php echo esc_attr($settings['button_align']); ?>">
								<a href="<?php echo esc_url( $settings['link']['url'] ) ?>" class="tf-button <?php echo esc_attr($settings['button_icon_position']); ?> <?php echo esc_attr($btn_animation); ?> <?php echo esc_attr($btn_line); ?>"  >
									<?php
									if ($settings['button_icon_position'] == 'bt_icon_before' ) {
										if ( $is_new || $migrated ) {
											if ( isset($settings['icon_button']['value']['url']) ) {
												\Elementor\Icons_Manager::render_icon( $settings['icon_button'], [ 'aria-hidden' => 'true' ] );
											}else {
												echo '<i class="' . esc_attr($settings['icon_button']['value']) . '" aria-hidden="true"></i>';
											}									
										} else {
											echo '<i class="' . esc_attr($settings['icon_bt']) . ' aria-hidden="true""></i>';
										}
									}

									if ( $settings['button_text'] != '' ) {
										echo esc_attr( $settings['button_text'] );
									}

									if ($settings['button_icon_position'] == 'bt_icon_after' ) {
										if ( $is_new || $migrated ) {
											if ( isset($settings['icon_button']['value']['url']) ) {
												\Elementor\Icons_Manager::render_icon( $settings['icon_button'], [ 'aria-hidden' => 'true' ] );
											}else {
												echo '<i class="' . esc_attr($settings['icon_button']['value']) . '" aria-hidden="true"></i>';
											}									
										} else {
											echo '<i class="' . esc_attr($settings['icon_bt']) . ' aria-hidden="true""></i>';
										}
									}

									?> 
								</a>
							</div>
						<?php endif; ?>

					</div>
				</div>

				<div class="tficonbox <?php echo esc_attr($settings['style']); ?> flip-box-back  <?php echo esc_attr($settings['position']); ?>">					
					<?php if ($settings['enable_overlay'] == 'yes'): ?>
					<div class="overlay <?php echo esc_attr($settings['hover_style']); ?>"></div>
					<?php endif; ?>	
					<?php if ($settings['icon_style'] == 'icon'): ?>
						<div class="wrap-icon ">
							<div class="wrap-icon-inner <?php echo esc_attr($settings['icon_style']); ?> ">
								<div class="icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
							</div>
							
						</div>
					<?php endif; ?>	

					<div class="content">
						<<?php echo esc_attr($settings['title_tag']);?> class="title"><?php echo esc_attr($settings['title_text']); ?></<?php echo esc_attr($settings['title_tag']);?>>
						<?php echo sprintf('<div class="description">%s</div>', $settings['description_text']); ?>
						
						<?php if ( $settings['show_button'] == 'yes' ): ?>
							<div class="tf-button-container <?php echo esc_attr($settings['button_align']); ?>">
								<a href="<?php echo esc_url( $settings['link']['url'] ) ?>" class="tf-button <?php echo esc_attr($settings['button_icon_position']); ?> <?php echo esc_attr($btn_animation); ?> <?php echo esc_attr($btn_line); ?>" >
									<?php
									if ($settings['button_icon_position'] == 'bt_icon_before' ) {
										if ( $is_new || $migrated ) {
											if ( isset($settings['icon_button']['value']['url']) ) {
												\Elementor\Icons_Manager::render_icon( $settings['icon_button'], [ 'aria-hidden' => 'true' ] );
											}else {
												echo '<i class="' . esc_attr($settings['icon_button']['value']) . '" aria-hidden="true"></i>';
											}									
										} else {
											echo '<i class="' . esc_attr($settings['icon_bt']) . ' aria-hidden="true""></i>';
										}
									}

									if ( $settings['button_text'] != '' ) {
										echo esc_attr( $settings['button_text'] );
									}

									if ($settings['button_icon_position'] == 'bt_icon_after' ) {
										if ( $is_new || $migrated ) {
											if ( isset($settings['icon_button']['value']['url']) ) {
												\Elementor\Icons_Manager::render_icon( $settings['icon_button'], [ 'aria-hidden' => 'true' ] );
											}else {
												echo '<i class="' . esc_attr($settings['icon_button']['value']) . '" aria-hidden="true"></i>';
											}									
										} else {
											echo '<i class="' . esc_attr($settings['icon_bt']) . ' aria-hidden="true""></i>';
										}
									}

									?> 
								</a>
							</div>
						<?php endif; ?>
					</div>					
				</div>
			</div>
		<?php else: ?>
			<div class="tficonbox <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['position']); ?>  ">
				<?php if ($settings['enable_overlay'] == 'yes'): ?>
				<div class="overlay <?php echo esc_attr($settings['hover_style']); ?>"></div>
				<?php endif; ?>	
				<?php if ($settings['icon_style'] == 'icon'): ?>
						<div class="wrap-icon ">
							<div class="wrap-icon-inner <?php echo esc_attr($settings['icon_style']); ?> ">
								<div class="icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
							</div>
							
						</div>
					<?php endif; ?>	

				<div class="content">
					<<?php echo esc_attr($settings['title_tag']);?> class="title"><?php echo esc_attr($settings['title_text']); ?></<?php echo esc_attr($settings['title_tag']);?>>
					<?php echo sprintf('<div class="description">%s</div>', $settings['description_text']); ?>
					
					<?php if ( $settings['show_button'] == 'yes' ): ?>
						<div class="tf-button-container <?php echo esc_attr($settings['button_align']); ?>">
							<a href="<?php echo esc_url( $settings['link']['url'] ) ?>" class="tf-button <?php echo esc_attr($settings['button_icon_position']); ?> <?php echo esc_attr($btn_animation); ?> <?php echo esc_attr($btn_line); ?>"  >
								<?php
								if ($settings['button_icon_position'] == 'bt_icon_before' ) {
									if ( $is_new || $migrated ) {
										if ( isset($settings['icon_button']['value']['url']) ) {
											\Elementor\Icons_Manager::render_icon( $settings['icon_button'], [ 'aria-hidden' => 'true' ] );
										}else {
											echo '<i class="' . esc_attr($settings['icon_button']['value']) . '" aria-hidden="true"></i>';
										}									
									} else {
										echo '<i class="' . esc_attr($settings['icon_bt']) . ' aria-hidden="true""></i>';
									}
								}

								if ( $settings['button_text'] != '' ) {
									echo esc_attr( $settings['button_text'] );
								}

								if ($settings['button_icon_position'] == 'bt_icon_after' ) {
									if ( $is_new || $migrated ) {
										if ( isset($settings['icon_button']['value']['url']) ) {
											\Elementor\Icons_Manager::render_icon( $settings['icon_button'], [ 'aria-hidden' => 'true' ] );
										}else {
											echo '<i class="' . esc_attr($settings['icon_button']['value']) . '" aria-hidden="true"></i>';
										}									
									} else {
										echo '<i class="' . esc_attr($settings['icon_bt']) . ' aria-hidden="true""></i>';
									}
								}

								?> 
							</a>
						</div>
					<?php endif; ?>

				</div>
			</div>
		<?php
			endif;
	}	

}