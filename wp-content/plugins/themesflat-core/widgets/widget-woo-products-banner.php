<?php
class TFWooProductsBanner_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-woo-products-banner';
    }
    
    public function get_title() {
        return esc_html__( 'TF Product Banner', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-font-awesome','owl-carousel','tf-product-banner'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-product-banner'];
	}

	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );	

	        $repeater = new \Elementor\Repeater();

	        $repeater->start_controls_tabs( 'slides_repeater' );
	        	$repeater->start_controls_tab( 'content', [ 'label' => esc_html__( 'Content', 'themesflat-core' ) ] );
			        $repeater->add_control(
						'category',
						[
							'label' => esc_html__( 'Category', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'Solar Panel', 'themesflat-core' ),
							'label_block' => true,
						]
					);
			        $repeater->add_control(
						'heading',
						[
							'label' => esc_html__( 'Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'Solar Energy Panel Battery', 'themesflat-core' ),
							'label_block' => true,
						]
					);
					$repeater->add_control(
						'sub_heading',
						[
							'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'Save 25% Hurry Up', 'themesflat-core' ),
							'label_block' => true,
						]
					);
					$repeater->add_control(
						'button_text',
						[
							'label' => esc_html__( 'Button Text', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'Shop Now', 'themesflat-core' ),
							'label_block' => true,
						]
					);
					$repeater->add_control(
						'button_link',
						[
							'label' => esc_html__( 'Button Link', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::URL,
							'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
								'is_external' => false,
								'nofollow' => false,
							],
							'condition' => [
								'button_text!' => '',
							],
						]
					);
				$repeater->end_controls_tab();

				$repeater->start_controls_tab( 'style', [ 'label' => esc_html__( 'Style', 'themesflat-core' ) ] );
					$repeater->add_control(
						'background_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#eef7eb',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-color: {{VALUE}}',
							],
						]
					);
					$repeater->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'background_image',
							'label' => esc_html__( 'Background Image', 'themesflat-core' ),
							'types' => [ 'classic' ],
							'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
						]
					);
					$repeater->add_control(
						'h_cat',
						[
							'label' => esc_html__( 'Category', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$repeater->add_control(
						'cat_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#565872',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .category' => 'color: {{VALUE}}',
							],
						]
					);
					$repeater->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'cat_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'fields_options' => [
						        'typography' => ['default' => 'yes'],
						        'font_family' => [
						            'default' => 'Rubik',
						        ],
						        'font_size' => [
						            'default' => [
						                'unit' => 'px',
						                'size' => '15',
						            ],
						        ],
						        'font_weight' => [
						            'default' => '500',
						        ],
						        'line_height' => [
						            'default' => [
						                'unit' => 'em',
						                'size' => '1.5',
						            ],
						        ],
								'letter_spacing' => [
						            'default' => [
						                'unit' => 'px',
						                'size' => '0',
						            ],
						        ],
						    ],
							'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .category',
						]
					);

					$repeater->add_control(
						'h_heading',
						[
							'label' => esc_html__( 'Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$repeater->add_control(
						'heading_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#0d232e',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .heading' => 'color: {{VALUE}}',
							],
						]
					);
					$repeater->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'heading_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'fields_options' => [
						        'typography' => ['default' => 'yes'],
						        'font_family' => [
						            'default' => 'Rubik',
						        ],
						        'font_size' => [
						            'default' => [
						                'unit' => 'px',
						                'size' => '24',
						            ],
						        ],
						        'font_weight' => [
						            'default' => '600',
						        ],
						        'line_height' => [
						            'default' => [
						                'unit' => 'em',
						                'size' => '1.3',
						            ],
						        ],
								'letter_spacing' => [
						            'default' => [
						                'unit' => 'px',
						                'size' => '-1',
						            ],
						        ],
						    ],
							'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .heading',
						]
					);

					$repeater->add_control(
						'h_sub_heading',
						[
							'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$repeater->add_control(
						'sub_heading_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#1f242c',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .sub-heading' => 'color: {{VALUE}}',
							],
						]
					);
					$repeater->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'sub_heading_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'fields_options' => [
						        'typography' => ['default' => 'yes'],
						        'font_family' => [
						            'default' => 'Rubik',
						        ],
						        'font_size' => [
						            'default' => [
						                'unit' => 'px',
						                'size' => '15',
						            ],
						        ],
						        'font_weight' => [
						            'default' => '400',
						        ],
						        'line_height' => [
						            'default' => [
						                'unit' => 'em',
						                'size' => '1.5',
						            ],
						        ],
								'letter_spacing' => [
						            'default' => [
						                'unit' => 'px',
						                'size' => '0',
						            ],
						        ],
						    ],
							'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .sub-heading',
						]
					);

					$repeater->add_control(
						'h_button',
						[
							'label' => esc_html__( 'Button', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$repeater->add_control(
						'button_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .button-banner' => 'color: {{VALUE}}',
							],
						]
					);
					$repeater->add_control(
						'button_bgcolor',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#57b33c',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .button-banner' => 'background-color: {{VALUE}}',
							],
						]
					);
					$repeater->add_control(
						'button_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .button-banner:hover' => 'color: {{VALUE}}',
							],
						]
					);
					$repeater->add_control(
						'button_bgcolor_hover',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .button-banner:hover' => 'background-color: {{VALUE}}',
							],
						]
					);
					$repeater->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'button_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'fields_options' => [
						        'typography' => ['default' => 'yes'],
						        'font_family' => [
						            'default' => 'Rubik',
						        ],
						        'font_size' => [
						            'default' => [
						                'unit' => 'px',
						                'size' => '15',
						            ],
						        ],
						        'font_weight' => [
						            'default' => '600',
						        ],
						        'line_height' => [
						            'default' => [
						                'unit' => 'em',
						                'size' => '1',
						            ],
						        ],
								'letter_spacing' => [
						            'default' => [
						                'unit' => 'px',
						                'size' => '0',
						            ],
						        ],
						    ],
							'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .button-banner',
						]
					);
				$repeater->end_controls_tab();
			$repeater->end_controls_tabs();

			$this->add_control(
				'list_banner',
				[
					'label' => esc_html__( 'List Banner', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'show_label' => true,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'category' => esc_html__( 'Solar Panel', 'themesflat-core' ),
							'heading' => esc_html__( 'Solar Energy Panel Battery', 'themesflat-core' ),
							'sub_heading' => esc_html__( 'Save 25% Hurry Up', 'themesflat-core' ),
							'button_text' => esc_html__( 'Shop Now', 'themesflat-core' ),
							'background_color' => '#f0f4f9',
							'button_bgcolor' => '#ff7029',
						],
						[
							'category' => esc_html__( 'Solar Panel', 'themesflat-core' ),
							'heading' => esc_html__( 'Solar Energy Panel Lamp', 'themesflat-core' ),
							'sub_heading' => esc_html__( 'Save 25% Hurry Up', 'themesflat-core' ),
							'button_text' => esc_html__( 'Shop Now', 'themesflat-core' ),
							'background_color' => '#eef7eb',
							'button_bgcolor' => '#57b33c',
						],
						[
							'category' => esc_html__( 'Solar Panel', 'themesflat-core' ),
							'heading' => esc_html__( 'Solar Energy Panel Cable', 'themesflat-core' ),
							'sub_heading' => esc_html__( 'Save 25% Hurry Up', 'themesflat-core' ),
							'button_text' => esc_html__( 'Shop Now', 'themesflat-core' ),
							'background_color' => '#f0f4f9',
							'button_bgcolor' => '#0d232e',
						],
					],
					'title_field' => '{{{ heading }}}',
				]
			);			
	        
			$this->end_controls_section();
        // /.End List Setting  

	    // Start Style Style
			$this->start_controls_section(
				'section_style',
				[
					'label' => esc_html__( 'Style', 'themesflat-core' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
                'columns',
                [
                    'label' => esc_html__( 'Columns', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'columns-3',
                    'options' => [
                    	'columns-1' => esc_html__( '1', 'themesflat-core' ),
                        'columns-2' => esc_html__( '2', 'themesflat-core' ),
                        'columns-3' => esc_html__( '3', 'themesflat-core' ),
                    ]
                ]
            );

            $this->add_responsive_control(
				'content_width',
				[
					'label'     => esc_html__( 'Content Width', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 60,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-products-banner .item-banner .inner' => 'max-width: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control( 'wrap_nav_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'default' => [
						'top' => '40',
						'right' => '40',
						'bottom' => '40',
						'left' => '40',
						'unit' => 'px',
						'isLinked' => false,
					],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-products-banner .item-banner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

            $this->add_control(
				'column_gap',
				[
					'label'     => esc_html__( 'Columns Gap', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'default'   => [
						'size' => 30,
					],
					'range'     => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-products-banner .products-banner' => 'grid-column-gap: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'row_gap',
				[
					'label'     => esc_html__( 'Rows Gap', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'default'   => [
						'size' => 30,
					],
					'range'     => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-products-banner .products-banner' => 'grid-row-gap: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->end_controls_section();
		// /.End Style 
	}	

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		

		$this->add_render_attribute( 'tf_products_banner', ['id' => "tf-products-banner-{$this->get_id()}", 'class' => ['tf-products-banner'], 'data-tabid' => $this->get_id() ] );

		$target_nofollow = '';		
        ?>
        <div <?php echo $this->get_render_attribute_string('tf_products_banner') ?>>
	       <div class="products-banner <?php echo esc_attr($settings['columns']); ?>">
	       		<?php foreach ( $settings['list_banner'] as $banner ): 
	       			$target = $banner['button_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $banner['button_link']['nofollow'] ? ' rel="nofollow"' : '';
					$target_nofollow = $target .' '. $nofollow;
	       		?>
	       		<div class="elementor-repeater-item-<?php echo esc_attr($banner['_id']); ?> item-banner">
	       			<div class="inner">
		       			<div class="category"><?php echo esc_attr($banner['category']); ?></div>
		       			<h2 class="heading"><?php echo esc_attr($banner['heading']); ?></h2>
		       			<div class="sub-heading"><?php echo esc_attr($banner['sub_heading']); ?></div>
		       			<a href="<?php echo esc_url($banner['button_link']['url']); ?>" class="button-banner" <?php echo esc_attr($target_nofollow); ?>><?php echo esc_attr($banner['button_text']); ?><i class="graingrow-icon-long-arrow-right2"></i></a>
	       			</div>
	       		</div>
	       		<?php endforeach; ?>
	       </div>
	    </div>
        <?php 		
	}

}