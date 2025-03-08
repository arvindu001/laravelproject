<?php
class TFServices_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-service';
    }
    
    public function get_title() {
        return esc_html__( 'TF Service', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	public function get_style_depends(){
		return ['owl-carousel'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-service','anime','appear','jquery-easing','tf-svg'];
	}

	protected function register_controls() {
        // Start Posts Query        
			$this->start_controls_section( 
				'section_posts_query',
	            [
	                'label' => esc_html__('Query', 'themesflat-core'),
	            ]
	        );

	        $this->add_control( 
					'posts_per_page',
		            [
		                'label' => esc_html__( 'Posts Per Page', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::NUMBER,
		                'default' => '4',
		            ]
		        );

				$this->add_control( 
					'show_loadmore',
					[
						'label' => esc_html__( 'Show Button LoadMore (not support style carousel)', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themesflat-core' ),
						'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
						'return_value' => 'yes',
						'default' => 'no',
					]
				);

		        $this->add_control( 
		        	'order_by',
					[
						'label' => esc_html__( 'Order By', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'date',
						'options' => [						
				            'date' => 'Date',
				            'ID' => 'Post ID',			            
				            'title' => 'Title',
						],
					]
				);

				$this->add_control( 
					'order',
					[
						'label' => esc_html__( 'Order', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'desc',
						'options' => [						
				            'desc' => 'Descending',
				            'asc' => 'Ascending',	
						],
					]
				);

				$this->add_control( 
					'posts_categories',
					[
						'label' => esc_html__( 'Categories', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SELECT2,
						'options' => ThemesFlat_Addon_For_Elementor_graingrow::tf_get_taxonomies('services_category'),
						'label_block' => true,
		                'multiple' => true,
					]
				);

				$this->add_control( 
					'exclude',
					[
						'label' => esc_html__( 'Exclude', 'themesflat-core' ),
						'type'	=> \Elementor\Controls_Manager::TEXT,	
						'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-core' ),
						'default' => '',
						'label_block' => true,				
					]
				);

				$this->add_control( 
					'sort_by_id',
					[
						'label' => esc_html__( 'Sort By ID', 'themesflat-core' ),
						'type'	=> \Elementor\Controls_Manager::TEXT,	
						'description' => esc_html__( 'Post Ids Will Be Sort. Ex: 1,2,3', 'themesflat-core' ),
						'default' => '',
						'label_block' => true,				
					]
				);

				$this->add_group_control( 
					\Elementor\Group_Control_Image_Size::get_type(),
					[
						'name' => 'thumbnail',
						'default' => 'full',
					]
				);

				$this->add_responsive_control(
					'image-object-fit',
					[
						'label' => esc_html__( 'Object Fit', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'condition' => [
							'image_height[size]!' => '',
						],
						'options' => [
							'' => esc_html__( 'Default', 'themesflat-core' ),
							'fill' => esc_html__( 'Fill', 'themesflat-core' ),
							'cover' => esc_html__( 'Cover', 'themesflat-core' ),
							'contain' => esc_html__( 'Contain', 'themesflat-core' ),
						],
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .service-post .featured-post img' => 'object-fit: {{VALUE}};',
						],
					]
				);

				$this->add_control( 
		        	'layout',
					[
						'label' => esc_html__( 'Columns', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'column-4',
						'options' => [
							'column-1' => esc_html__( '1', 'themesflat-core' ),
							'column-2' => esc_html__( '2', 'themesflat-core' ),
							'column-3' => esc_html__( '3', 'themesflat-core' ),
							'column-4' => esc_html__( '4', 'themesflat-core' ),
						],
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
							'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
							'style3' => esc_html__( 'Style 3', 'themesflat-core' ),
						],
					]
				);	
				
				$this->add_control( 
					'excerpt_lenght',
					[
						'label' => esc_html__( 'Excerpt Length', 'graingrow' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'min' => 0,
						'max' => 500,
						'step' => 1,
						'default' => 8,
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
						'default' => 'yes',
					]
				);

				$this->add_control(
					'post_icon_readmore',
					[
						'label' => esc_html__( 'Post Icon ', 'graingrow' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'icon-graingrow-angle-right',
							'library' => 'theme_icon',
						],
						'condition' => [
							'show_button' => 'yes',
						],
					]
				);	
			
			$this->end_controls_section();
        // /.End Posts Query

		// Start Carousel        
			$this->start_controls_section( 
				'section_posts_carousel',
	            [
	                'label' => esc_html__('Carousel', 'themesflat-core'),
	            ]
	        );	

	        $this->add_control( 
				'carousel',
				[
					'label' => esc_html__( 'Carousel', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-core' ),
					'label_off' => esc_html__( 'Off', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);        

			$this->add_control( 
				'carousel_loop',
				[
					'label' => esc_html__( 'Loop', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-core' ),
					'label_off' => esc_html__( 'Off', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
				'carousel_auto',
				[
					'label' => esc_html__( 'Auto Play', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-core' ),
					'label_off' => esc_html__( 'Off', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
	        	'carousel_column_desk',
				[
					'label' => esc_html__( 'Columns Desktop', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '4',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
						'3' => esc_html__( '3', 'themesflat-core' ),
						'4' => esc_html__( '4', 'themesflat-core' ),
						'5' => esc_html__( '5', 'themesflat-core' ),
						'6' => esc_html__( '6', 'themesflat-core' ),
					],
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
	        	'carousel_column_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '2',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
						'3' => esc_html__( '3', 'themesflat-core' ),
					],
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
	        	'carousel_column_mobile',
				[
					'label' => esc_html__( 'Columns Mobile', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
					],
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);	

			$this->add_control( 
				'carousel_arrow',
				[
					'label' => esc_html__( 'Arrow', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'carousel' => 'yes',
					],
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
				]
			);

			$this->add_control( 
				'carousel_prev_icon', [
	                'label' => esc_html__( 'Prev Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'icon-graingrow-angle-left',
	                'include' => [
						'fas fa-angle-double-left',
						'fas fa-angle-left',
						'fas fa-chevron-left',
						'icon-graingrow-angle-left',
					],  
	                'condition' => [
	                	'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	    	$this->add_control( 
	    		'carousel_next_icon', [
	                'label' => esc_html__( 'Next Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'icon-graingrow-angle-right',
	                'include' => [
						'fas fa-angle-double-right',
						'fas fa-angle-right',
						'fas fa-chevron-right',
						'icon-graingrow-angle-right',
					], 
	                'condition' => [
	                	'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	        $this->add_responsive_control( 
	        	'carousel_arrow_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 23,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'w_size_carousel_arrow',
				[
					'label' => esc_html__( 'Width', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 72,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'h_size_carousel_arrow',
				[
					'label' => esc_html__( 'Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 72,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);	

			$this->add_responsive_control( 
				'carousel_arrow_width',
				[
					'label' => esc_html__( 'Width Wrap Nav', 'themesflat-core' ),
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
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 176,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position',
				[
					'label' => esc_html__( 'Horizontal Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -2000,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 15,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
						'.rtl {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav' => 'left: {{SIZE}}{{UNIT}};right: unset;',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_vertical_position',
				[
					'label' => esc_html__( 'Vertical Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => -104,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_arrow_tabs',
				[
					'condition' => [
		                'carousel_arrow' => 'yes',
		                'carousel' => 'yes',
		            ]
				] );
				$this->start_controls_tab( 
					'carousel_arrow_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),						
					]
				);
				$this->add_control( 
					'carousel_arrow_color',
		            [
		                'label' => esc_html__( 'Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ffffff',
		                'selectors' => [
							'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
		        $this->add_control( 
		        	'carousel_arrow_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#7141B1',
		                'selectors' => [
							'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );			        
		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_arrow_border',
						'label' => esc_html__( 'Border', 'themesflat-core' ),
						'selector' => '{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);
				$this->add_responsive_control( 
					'carousel_arrow_border_radius',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'default' => [
							'top' => '0',
							'right' => '0',
							'bottom' => '0',
							'left' => '0',
							'unit' => 'px',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
		        $this->end_controls_tab();
		        $this->start_controls_tab( 
			    	'carousel_arrow_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					]
				);
		    	$this->add_control( 
		    		'carousel_arrow_color_hover',
		            [
		                'label' => esc_html__( 'Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#091D3E',
		                'selectors' => [
							'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
		        $this->add_control( 
		        	'carousel_arrow_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ffffff',
		                'selectors' => [
							'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
							'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_arrow_border_hover',
						'label' => esc_html__( 'Border', 'themesflat-core' ),
						'selector' => '{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next.disabled',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);
				$this->add_responsive_control( 
					'carousel_arrow_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius Previous', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-services-wrap .owl-carousel .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
	       	$this->end_controls_tab();
	        $this->end_controls_tabs();

			$this->add_control( 
				'carousel_bullets',
	            [
	                'label'         => esc_html__( 'Bullets', 'themesflat-core' ),
	                'type'          => \Elementor\Controls_Manager::SWITCHER,
	                'label_on'      => esc_html__( 'Show', 'themesflat-core' ),
	                'label_off'     => esc_html__( 'Hide', 'themesflat-core' ),
	                'return_value'  => 'yes',
	                'default'       => 'no',
	                'condition' => [
						'carousel' => 'yes',
	                ],
	                'separator' => 'before',
	            ]
	        );	

	        $this->add_responsive_control( 
	        	'w_size_carousel_bullets',
					[
						'label' => esc_html__( 'Width', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						'selectors' => [
							'{{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'carousel' => 'yes',
		                    'carousel_bullets' => 'yes',
		                ]
					]
			);

			$this->add_responsive_control( 
				'h_size_carousel_bullets',
				[
					'label' => esc_html__( 'Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_bullets_horizontal_position',
				[
					'label' => esc_html__( 'Horizonta Offset', 'themesflat-core' ),
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
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-services-wrap .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_bullets_vertical_position',
				[
					'label' => esc_html__( 'Vertical Offset', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -200,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-services-wrap .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_bullets_tabs',
					[
						'condition' => [
							'carousel' => 'yes',
		                    'carousel_bullets' => 'yes',
		                ]
					] );
				$this->start_controls_tab( 
					'carousel_bullets_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),						
					]
				);
				$this->add_control( 
					'carousel_bullets_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'selectors' => [
							'{{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
							'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-dots .owl-dot.active span::after' => 'border-color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );			         
		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_bullets_border',
						'label' => esc_html__( 'Border', 'themesflat-core' ),
						'selector' => '{{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot',
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);
				$this->add_responsive_control( 
					'carousel_bullets_border_radius',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );
			    $this->end_controls_tab();
		        $this->start_controls_tab( 
		        	'carousel_bullets_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
				]
				); 
	        	$this->add_control( 
	        		'carousel_bullets_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'selectors' => [
							'{{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
							'{{WRAPPER}} .tf-services-wrap .owl-carousel .owl-dots .owl-dot.active span::after' => 'border-color: {{VALUE}}',
							
						],
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        ); 
	        	$this->add_group_control( 
	        		\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_bullets_border_hover',
						'label' => esc_html__( 'Border', 'themesflat-core' ),
						'selector' => '{{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot.active',
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);
				$this->add_responsive_control( 
					'carousel_bullets_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-services-wrap .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );
				$this->end_controls_tab();
		    $this->end_controls_tabs();

	        $this->end_controls_section();
        // /.End Carousel	

		// Start General Style 
			$this->start_controls_section( 
				'section_style_general',
				[
					'label' => esc_html__( 'General', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control( 
				'padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'default' => [
						'top' => '15',
						'right' => '15',
						'bottom' => '15',
						'left' => '15',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .wrap-services-post .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],					
				]
			);	

			$this->add_responsive_control( 
				'margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'allowed_dimensions' => [ 'right', 'left' ],
					'default' => [
						'right' => '',
						'left' => '',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .wrap-services-post .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_box_shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .wrap-services-post .services-post',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .wrap-services-post .services-post',
				]
			);    

			$this->add_responsive_control( 
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .wrap-services-post .services-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 
 

			$this->start_controls_tabs( 
                'background_generel_tabs',
                );
                $this->start_controls_tab( 
                    'background_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'themesflat-core' ),
                    ] ); 


					$this->add_control( 
						'background_color_content',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .wrap-services-post .item .services-post, {{WRAPPER}} .tf-services-wrap.style1 .services-post .content::before, {{WRAPPER}} .tf-services-wrap.style1 .services-post .content' => 'background-color: {{VALUE}}',
							],
						]
					);  
                   
                $this->end_controls_tab();

                $this->start_controls_tab( 
                    'background_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'themesflat-core' ),
                    ] );


					$this->add_control( 
						'background_color_content_hover',
						[
							'label' => esc_html__( 'Background Color ', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post:hover, {{WRAPPER}} .tf-services-wrap.style1 .services-post:hover .content, {{WRAPPER}}  .tf-services-wrap.style1 .services-post:hover .content::before' => 'background-color: {{VALUE}}',
							],
						]
					);  
                   
                $this->end_controls_tab();
            $this->end_controls_tabs(); 
			
			$this->end_controls_section();    
		// /.End General Style

		// Start Post Icon Style 
		$this->start_controls_section( 
			'image_hei',
			[
				'label' => esc_html__( 'Image', 'themesflat-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control( 
			'image_sv',
			[
				'label' => esc_html__( 'Image Height', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services-wrap .services-post .features-image img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); 


		// Start Post Icon Style 
			$this->start_controls_section( 
				'icon_style_general',
				[
					'label' => esc_html__( 'Post Icon', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'style' => ['style2', 'style3'],
					],
				]
			);

			$this->add_responsive_control( 
				'icon_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .wrap-services-post .item .post-icon, {{WRAPPER}} .tf-services-wrap.style3 .services-post .content .post-icon3 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'button_icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .wrap-services-post .item .post-icon .icon-1, {{WRAPPER}} .tf-services-wrap.style3 .services-post .content .post-icon3 ' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wrap-services-post .item .post-icon svg ' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'style' => 'style1',
					],
				]
			); 

			$this->add_control( 
				'button_icon_size_ov',
				[
					'label' => esc_html__( 'Over Icon Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .services-post .post-icon .icon-1, {{WRAPPER}} .tf-services-wrap.style2 .services-post .icon-img, {{WRAPPER}} .tf-services-wrap.style2 .services-post .post-icon .icon-1' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			); 


			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'icon_background_img',
					'label' => esc_html__( 'Background', 'themesflat-elementor' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .tf-services-wrap.style2 .services-post .post-icon .icon-1',
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			$this->start_controls_tabs( 
				'icon_generel_tabs',
			);
				$this->start_controls_tab( 
					'icon_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),
					] ); 

					$this->add_control(
						'icon_color_1',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post .post-icon .icon-1 i' => 'color: {{VALUE}}',
							],
						]
					);


					$this->add_control(
						'icon_bg_color_1',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post .post-icon .icon-1' => 'background-color: {{VALUE}}',
							],
						]
					);

					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'icon_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					] );

					$this->add_control(
						'icon_hover_1',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post:hover .post-icon .icon-1 i' => 'color: {{VALUE}}',
							],
						]
					);


					$this->add_control(
						'icon_bg_hover_1',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post:hover .post-icon .icon-1' => 'background-color: {{VALUE}}',
							],
						]
					);

					
				$this->end_controls_tab();
			$this->end_controls_tabs(); 

			
			
			$this->end_controls_section();    
		// /.End Post Icon Style

		// Start Content Style 
			$this->start_controls_section( 
				'section_style_content',
				[
					'label' => esc_html__( 'Content', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control( 
				'padding_content',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .wrap-services-post .item .services-post .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],					
				]
			);	

			$this->add_responsive_control( 
				'margin_content',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .wrap-services-post .item .services-post .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_box_shadow::get_type(),
				[
					'name' => 'box_shadow_content',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .wrap-services-post .item .services-post .content',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_content',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .wrap-services-post .item .services-post .content',
				]
			);    

			$this->add_responsive_control( 
				'border_radius_content',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .wrap-services-post .item .services-post .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 
			
			$this->end_controls_section();    
		// /.End Content Style

		// Start Title Style 
			$this->start_controls_section( 
				'section_style_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .wrap-services-post .item .services-post .content .title ',
				]
			); 

			$this->add_responsive_control( 
				'margin_title',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .wrap-services-post .item .services-post .content .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  	

			$this->start_controls_tabs( 
				'background_title_tabs',
				);
				$this->start_controls_tab( 
					'title_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),
					] ); 
					$this->add_control( 
						'title_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .wrap-services-post .item .services-post .content .title ' => 'color: {{VALUE}}',
							],
							
						]
					);  
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'title_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					] );

					$this->add_control( 
						'title_color_hover',
						[
							'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .wrap-services-post .item .services-post:hover .content .title a' => 'color: {{VALUE}}',
							],
						]
					);   
					
				$this->end_controls_tab();
			$this->end_controls_tabs(); 
			
			$this->end_controls_section();    
		// /.End Title Style

		// Start Description Style 
			$this->start_controls_section( 
				'section_style_category',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);	

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_cate',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .wrap-services-post .item .services-post .content .description',
				]
			);

			$this->start_controls_tabs( 
				'background_category_tabs',
				);
				$this->start_controls_tab( 
					'category_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),
					] ); 
					$this->add_control( 
						'category_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .wrap-services-post .item .services-post .content .description' => 'color: {{VALUE}}',
							],
							
						]
					);  
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'category_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					] );


					$this->add_control( 
						'category_color_hover_2',
						[
							'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .wrap-services-post .item .services-post:hover .content .description' => 'color: {{VALUE}}',
							],
						]
					); 
					
				$this->end_controls_tab();
			$this->end_controls_tabs(); 
			
			$this->end_controls_section();    
		// /.End Description Style

		// Start Button Style 
			$this->start_controls_section( 
				'section_style_social',
				[
					'label' => esc_html__( 'Button', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);	

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_button',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .wrap-services-post .item .services-post .content .tf-button-container a ',
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			$this->start_controls_tabs( 
				'background_social_tabs',
				);
				$this->start_controls_tab( 
					'social_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),
					] ); 
					$this->add_control( 
						'social_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post .tf-button-container a' => 'background-color: {{VALUE}}',
							],
							
						]
					);  

					$this->add_control( 
						'social_bg_color',
						[
							'label' => esc_html__( 'Color Icon', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post .tf-button-container a' => 'color: {{VALUE}}',
							],
							
						]
					);  

					$this->add_responsive_control( 'icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'graingrow' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
	
						'selectors' => [
							'{{WRAPPER}} .tf-services-wrap .services-post .tf-button-container a svg' => 'width: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .tf-services-wrap .services-post .tf-button-container a i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_responsive_control( 
					'icon_fontsize',
					[
						'label' => esc_html__( 'Icon With Height', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 1000,
								'step' => 1,
							]
						],
						'selectors' => [
							'{{WRAPPER}} .tf-services-wrap.style1 .services-post .tf-button-icon ' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'icon_border',
						'label' => esc_html__( 'Border', 'themesflat-core' ),
						'selector' => '{{WRAPPER}} .tf-services-wrap.style1 .services-post .tf-button-icon',
						'condition' => [
							'style' => ['style1', 'style3'],
						],
					]
				);
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'social_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					] );


					$this->add_control( 
						'social_color_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post:hover .tf-button-container a' => 'text-decoration-color: {{VALUE}};',
								'{{WRAPPER}} .tf-services-wrap .services-post:hover .tf-button-container a' => 'background-color: {{VALUE}};',
								
							],
						]
					); 

					$this->add_control( 
						'social_color_hover_2',
						[
							'label' => esc_html__( 'Color Icon Hover', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post:hover .tf-button-container a' => 'color: {{VALUE}}',
							],
						]
					); 
					
				$this->end_controls_tab();
			$this->end_controls_tabs(); 
			

			
			$this->end_controls_section();    
		// /.End Button Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$has_carousel = '';
		if ( $settings['carousel'] == 'yes' ) {
			$has_carousel = 'has-carousel';
		}

		$this->add_render_attribute( 'tf_services_wrap', ['id' => "tf-services-{$this->get_id()}", 'class' => ['tf-services-wrap', 'themesflat-services-taxonomy', $settings['style'], $has_carousel ], 'data-tabid' => $this->get_id()] );


		if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
		$query_args = array(
            'post_type' => 'services',
            'posts_per_page' => $settings['posts_per_page'],
            'paged'     => $paged
        );

        if (! empty( $settings['posts_categories'] )) {        	
        	$query_args['tax_query'] = array(
							        array(
							            'taxonomy' => 'services_category',
							            'field'    => 'slug',
							            'terms'    => $settings['posts_categories']
							        ),
							    );
        }        
        if ( ! empty( $settings['exclude'] ) ) {				
			if ( ! is_array( $settings['exclude'] ) )
				$exclude = explode( ',', $settings['exclude'] );

			$query_args['post__not_in'] = $exclude;
		}

		$query_args['orderby'] = $settings['order_by'];
		$query_args['order'] = $settings['order'];

		if ( $settings['sort_by_id'] != '' ) {	
			$sort_by_id = array_map( 'trim', explode( ',', $settings['sort_by_id'] ) );
			$query_args['post__in'] = $sort_by_id;
			$query_args['orderby'] = 'post__in';
		}

		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>
		<div <?php echo $this->get_render_attribute_string('tf_services_wrap'); ?>>
			<div class="wrap-services-post row <?php echo esc_attr($settings['layout']); ?>">

				<?php if ( $settings['carousel'] == 'yes' ): ?>
				<div class="owl-carousel" data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>">
				<?php endif; ?>

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php 
					$attr['settings'] = $settings; 
					tf_get_template_widget("service/{$settings['style']}", $attr); 
					?>
				<?php endwhile; ?>

				<?php if ( $settings['carousel'] == 'yes' ): ?>
				</div>
				<?php endif; ?>

			</div>
				<?php if ( $settings['show_loadmore'] == 'yes' && $settings['carousel'] == 'no' ) {
					themesflat_pagination_posttype($query, 'loadmore' ); wp_reset_postdata();
				} else {
					wp_reset_postdata();
				} ?>
		</div>
		<?php
		else:
			esc_html_e('No posts found', 'themesflat-core');
		endif;
			
	}	

}