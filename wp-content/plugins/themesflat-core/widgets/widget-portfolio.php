<?php
class TFPortfolio_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfportfolio';
    }
    
    public function get_title() {
        return esc_html__( 'TF Portfolio', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends(){
		return ['jquery-justified','owl-carousel'];
	}

	public function get_script_depends() {
		return ['jquery-justified','appear','owl-carousel','tf-portfolio'];
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
	                'default' => '6',
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
					'options' => ThemesFlat_Addon_For_Elementor_graingrow::tf_get_taxonomies('portfolios_category'),
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
					'default' => 'themesflat-portfolio-image',
				]
			);	

			$this->add_control( 
	        	'types',
				[
					'label' => esc_html__( 'Types', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'grid',
					'options' => [
						'grid' => esc_html__( 'Grid', 'themesflat-core' ),
						'mansory' => esc_html__( 'Mansory', 'themesflat-core' ),
					],
				]
			);

			$this->add_control( 
	        	'columns',
				[
					'label' => esc_html__( 'Columns', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'column-3',
					'options' => [
						'column-1' => esc_html__( '1', 'themesflat-core' ),
						'column-2' => esc_html__( '2', 'themesflat-core' ),
						'column-3' => esc_html__( '3', 'themesflat-core' ),
						'column-4' => esc_html__( '4', 'themesflat-core' ),
						'column-5' => esc_html__( '5', 'themesflat-core' ),
					],
					'condition' => [
						'types' => 'grid',
					],
				]
			);

			$this->add_control(
				'rowheight',
				[
					'label' => esc_html__( 'Row Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 50,
					'max' => 1000,
					'step' => 1,
					'default' => 520,
					'condition' => [
						'types' => 'mansory',
					],
				]
			);

			$this->add_control(
	        	'style',
				[
					'label' => esc_html__( 'Grid Styles', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
					],
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
                        'style' => 'style1',
                    ],
				]
			);

			$this->add_control(
				'post_icon_readmore2',
				[
					'label' => esc_html__( 'Post Icon ', 'graingrow' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'icon-graingrow-angle-right',
						'library' => 'theme_icon',
					],
					'condition' => [
                        'style' => 'style2',
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
	                'condition' => [
						'types' => 'grid'
					],
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
					'condition' => [
						'types' => 'grid'
					],
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
				'spacing_item_carousel',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 200,
					'step' => 1,
					'default' => 30,
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
					'default' => '3',
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
					'default' => 'yes',
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
						'icon-graingrow-angle-left',
					],  
	                'condition' => [
	                	'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

			$this->add_control(
	        	'style_arrow',
				[
					'label' => esc_html__( 'Navigation Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'nav-1',
					'options' => [
						'nav-1' => esc_html__( 'Style 1', 'themesflat-core' ),
						'nav-2' => esc_html__( 'Style 2', 'themesflat-core' ),
					],
					'condition' => [
	                	'style' => 'style2',
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
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'size' => 60,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
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
						'size' => 60,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
							'max' => 1000,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 100,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
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
							'max' => 1000,
							'step' => 0.1,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
						'.rtl {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav' => 'left: {{SIZE}}{{UNIT}};right: unset;',
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
							'max' => 1000,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 50,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
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
		                'selectors' => [
							'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
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
		                'selectors' => [
							'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next',
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
							'top' => '50',
							'right' => '50',
							'bottom' => '50',
							'left' => '50',
							'unit' => '%',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		                'selectors' => [
							'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',
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
		                'selectors' => [
							'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
							'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next.disabled',
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
		                    '{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio-wrap .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio-wrap .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
							
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
						'selector' => '{{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot',
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
		                    '{{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
							'{{WRAPPER}} .tf-portfolio-wrap .owl-carousel .owl-dots .owl-dot.active span::after' => 'border-color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot.active',
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
		                    '{{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-portfolio-wrap .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

	    // Start Filter     
			$this->start_controls_section( 
				'section_filter',
	            [
	                'label' => esc_html__('Filter', 'themesflat-core'),
	                'condition' => [
						
						'carousel!' => 'yes',
					],
	            ]
	        );
	        $this->add_control(
				'show_filter',
				[
					'label' => esc_html__( 'Filter', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'carousel!' => 'yes',
					],
				]
			);
			$this->add_control( 
				'filter_category_order',
				[
					'label' => esc_html__( 'Filter Order', 'themesflat-core' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,	
					'description' => esc_html__( 'Filter Slug Categories Order Split By ","', 'themesflat-core' ),
					'default' => '',
					'label_block' => true,	
					'condition' => [
						'show_filter' => 'yes',
						'carousel!' => 'yes',
					],			
				]
			);
	    	$this->end_controls_section();
        // /.End Filter

		// Start Style
	        $this->start_controls_section( 'section_post_style',
	            [
	                'label' => esc_html__( 'Style', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

			$this->add_control(
				'h_style_image',
				[
					'label' => esc_html__( 'Image Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_responsive_control( 
				'h_size_image',
				[
					'label' => esc_html__( 'Height', 'themesflat-core' ),
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
						'{{WRAPPER}} .portfolios-post .featured-post img ' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'h_style_content',
				[
					'label' => esc_html__( 'Content', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control( 
				'content_color',
				[
					'label' => esc_html__( 'Background', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .portfolios-post .content ,{{WRAPPER}} .portfolios-post ' => 'background: {{VALUE}}',				
					],
				]
			);

			$this->add_control(
				'h_style_position',
				[
					'label' => esc_html__( 'Category', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'position_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-portfolio-wrap .portfolios-post .content .portfolios-category a',
				]
			); 
			$this->add_control( 
				'position_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .portfolios-post .content .portfolios-category a ' => 'color: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'position_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .portfolios-post .content .portfolios-category a:hover ' => 'color: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'bg_position_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .portfolios-post .content .portfolios-category a ' => 'background-color: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'bg_position_color_hover',
				[
					'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .portfolios-post .content .portfolios-category a:hover ' => 'background-color: {{VALUE}}',				
					],
				]
			);

	        $this->add_control(
				'h_style_title',
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
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-portfolio-wrap .portfolios-post .title',
				]
			); 
			$this->add_control( 
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .portfolios-post .title a' => 'color: {{VALUE}}',				
					],
				]
			);
			$this->add_control( 
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio-wrap .portfolios-post .title a:hover, {{WRAPPER}} .portfolios-post .content .title a:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'h_style_button',
				[
					'label' => esc_html__( 'Button', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
                'button_size',
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
                        '{{WRAPPER}} .portfolios-post .content .tf-button-container a i, {{WRAPPER}} .tf-portfolio-wrap.style2 .portfolios-post .tf-button-pj2 a ' => 'font-size: {{SIZE}}{{UNIT}};',                        
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
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .portfolios-post .content .tf-button-container a, {{WRAPPER}} .tf-portfolio-wrap.style2 .portfolios-post .tf-button-pj2 a' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			); 

			$this->add_control( 
				'button_color',
				[
					'label' => esc_html__( 'Background', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .portfolios-post .content .tf-button-container a, {{WRAPPER}} .tf-portfolio-wrap.style2 .portfolios-post .tf-button-pj2 a ' => 'background: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'bg_button_a',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__( 'Background Hover', 'themesflat-core' ),
					'selectors' => [
						'{{WRAPPER}} .portfolios-post .content .tf-button-container a:hover, {{WRAPPER}} .tf-portfolio-wrap.style2 .portfolios-post .tf-button-pj2 a:hover' => 'background: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'bg_button_icon_color',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__( 'Color icon', 'themesflat-core' ),
					'selectors' => [
						'{{WRAPPER}} .portfolios-post .content .tf-button-container a i, {{WRAPPER}} .tf-portfolio-wrap.style2 .portfolios-post .tf-button-pj2 a' => 'color: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'bg_button_icon',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__( 'Color Hover icon', 'themesflat-core' ),
					'selectors' => [
						'{{WRAPPER}} .portfolios-post .content .tf-button-container a:hover i, {{WRAPPER}} .tf-portfolio-wrap.style2 .portfolios-post .tf-button-pj2 a:hover' => 'color: {{VALUE}}',				
					],
				]
			);

        	$this->end_controls_section();    
	    // /.End Style

       	// Start Style Filter
	        $this->start_controls_section( 'section_filter_style',
	            [
	                'label' => esc_html__( 'Filter', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	                'condition' => [
						'show_filter' => 'yes',
					],
	            ]
	        );

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'filter_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-widget-portfolio-wrap .portfolio-filter li a',
				]
			);
			$this->add_control( 
				'filter_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-widget-portfolio-wrap .portfolio-filter li a' => 'color: {{VALUE}}',				
					],
				]
			);			
			$this->add_control( 
				'filter_bgcolor',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-widget-portfolio-wrap .portfolio-filter li a' => 'background-color: {{VALUE}}',				
					],
				]
			);
			$this->add_control( 
				'filter_color_hover',
				[
					'label' => esc_html__( 'Color Active', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-widget-portfolio-wrap .portfolio-filter li a:hover' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-widget-portfolio-wrap .portfolio-filter li.active a' => 'color: {{VALUE}}',				
					],
				]
			);
			$this->add_control( 
				'filter_bgcolor_hover',
				[
					'label' => esc_html__( 'Background Color Active', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-widget-portfolio-wrap .portfolio-filter li a:hover' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .tf-widget-portfolio-wrap .portfolio-filter li.active a' => 'background-color: {{VALUE}}',				
					],
				]
			);
			        
        	$this->end_controls_section();    
	    // /.End Style Filter
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		if ($settings['types'] == 'mansory') {
			$attr['settings'] = $settings; 
			tf_get_template_widget("portfolio/mansory", $attr);
		}else {
			$attr['settings'] = $settings; 
			tf_get_template_widget("portfolio/{$settings['style']}", $attr);
		}				
		
	}

	

	

}