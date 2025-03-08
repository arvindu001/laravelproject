<?php
class TFTestimonialTypeGroupCarousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-testimonial-carousel-type-group';
    }
    
    public function get_title() {
        return esc_html__( 'TF Testimonial Type Group Carousel', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	protected function register_controls() {
        // Start Carousel Setting        
			$this->start_controls_section( 
				'section_carousel',
	            [
	                'label' => esc_html__('Testimonial Carousel', 'themesflat-core'),
	            ]
	        );

	        $this->add_control(
				'testimonial_style',
				[
					'label' => esc_html__( 'Layout Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style-1',
					'options' => [
						'style-1'  => esc_html__( 'Style 1', 'themesflat-core' ),
						'style-2' => esc_html__( 'Style 2', 'themesflat-core' ),
					],
				]
			);

			$this->add_control(
				'before_title',
				[
					'label' => esc_html__( 'Before Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Customer Say', 'themesflat-core' ),
					'label_block' => true,
				]
			);		

			$this->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'What our clients say about our service', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( '', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'icon_quote',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'graingrow-icon-quotation',
						'library' => 'graingrow_icon_solar_energy',
					],
				]
			);	    

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'avatar',
				[
					'label' => esc_html__( 'Choose Avatar', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder-2.jpg",
					],
				]
			);

			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Teodoro D. Williams', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'position',
				[
					'label' => esc_html__( 'Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Web Developer', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'rows' => 10,
					'default' => esc_html__( 'Consectetur adipiscing elit sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ul trices gravida. Risus commodo viverra maecenas accumsan lacus facilisis.', 'themesflat-core' ),
				]
			);	

			$repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image (Only Style 1)', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/testimonial-type-2.jpg",
					],
				]
			);		

			$this->add_control( 
				'carousel_list',
				[					
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[ 
							'name' => 'Teodoro D. Williams',
							'position' => 'Web Developer',
							'description'=> 'Consectetur adipiscing elit sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ul trices gravida. Risus commodo viverra maecenas accumsan lacus facilisis.',
						],
						[ 
							'name' => 'Donald C. Mitchell',
							'position' => 'Web Developer',
							'description'=> 'Consectetur adipiscing elit sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ul trices gravida. Risus commodo viverra maecenas accumsan lacus facilisis.',
						],
						[ 
							'name' => 'Teodoro D. Williams',
							'position' => 'Web Developer',
							'description'=> 'Consectetur adipiscing elit sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ul trices gravida. Risus commodo viverra maecenas accumsan lacus facilisis.',
						],
						[ 
							'name' => 'Donald C. Mitchell',
							'position' => 'Web Developer',
							'description'=> 'Consectetur adipiscing elit sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ul trices gravida. Risus commodo viverra maecenas accumsan lacus facilisis.',
						],
					],					
				]
			);

			$this->add_control(
				'h_image_size_avatar',
				[
					'label' => esc_html__( 'Image Size Avatar', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail_avatar',
					'default' => 'thumbnail',
				]
			);
			$this->add_control(
				'h_image_size_Image',
				[
					'label' => esc_html__( 'Image Size Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'testimonial_style' => 'style-1',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail_image',
					'default' => 'full',
					'condition' => [
						'testimonial_style' => 'style-1',
					],
				]
			);
			
			$this->end_controls_section();
        // /.End Carousel	

        // Start Style        
			$this->start_controls_section( 
				'section_style',
	            [
	                'label' => esc_html__('Style', 'themesflat-core'),
	            ]
	        );	

	        $this->add_control(
				'h_general',
				[
					'label' => esc_html__( 'General', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);
			$this->add_control(
				'background',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#1f242c',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .bg-overlay' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial-carousel-type-group.style-2' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'h_before_heading',
				[
					'label' => esc_html__( 'Before Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
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
				            'default' => 'Rubik',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '16',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1',
				            ],
				        ],
				        'text_transform' => [
							'default' => 'uppercase',
						],
				    ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .before-title',
				]
			);
			$this->add_control( 
				'color_before_title',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .before-title' => 'color: {{VALUE}}',					
					],
				]
			);
			$this->add_control( 
				'bg_color_before_title',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff7029',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .before-title' => 'background-color: {{VALUE}}',					
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
					'name' => 'typography_heading',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Teko',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '45',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1',
				            ],
				        ],
				        'text_transform' => [
							'default' => 'uppercase',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .heading',
				]
			); 
			$this->add_control( 
				'color_heading',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .heading' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'h_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_sub_heading',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Rubik',
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
				                'size' => '32',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .sub-heading',
				]
			); 
			$this->add_control( 
				'color_sub_heading',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .sub-heading' => 'color: {{VALUE}}',
					],
				]
			);

	        $this->add_control(
				'h_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'icon_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 660,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(255,255,255, 0.03)',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote svg' => 'fill: {{VALUE}}',
					],
				]
			);

	        $this->add_control(
				'h_name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'name_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Teko',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '24',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '30',
				            ],
				        ],
				        'text_transform' => [
							'default' => 'uppercase',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0.7',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .name',
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .name' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'name_typography_s2',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Teko',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '24',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '30',
				            ],
				        ],
				        'text_transform' => [
							'default' => 'uppercase',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group.style-2 .name',
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);
			$this->add_control(
				'name_color_s2',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#232323',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group.style-2 .name' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);

			$this->add_control(
				'h_position',
				[
					'label' => esc_html__( 'Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'position_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Rubik',
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
				                'size' => '27',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .position',
				]
			);
			$this->add_control(
				'position_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .position' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_control(
				'position_color_s2',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#616161',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group.style-2 .position' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-2'
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
					'name' => 'description_typography',
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
				            'default' => '400',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '37',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .description',
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .description' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography_s2',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Rubik',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '18',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '400',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '37',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group.style-2 .description',
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);
			$this->add_control(
				'description_color_s2',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#232323',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group.style-2 .description' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);

			$this->add_control(
				'h_rating',
				[
					'label' => esc_html__( 'Rating', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);
			$this->add_control(
				'rating_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#fc6f29',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group.style-2 .testimonial-star-rating' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);
			$this->add_control(
				'rating',
				[
					'label' => esc_html__( 'Rating', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '100',
					'options' => [
						'0'   => esc_html__( '0 stars', 'themesflat-core' ),
						'20'  => esc_html__( '1 star', 'themesflat-core' ),
						'40'  => esc_html__( '2 stars', 'themesflat-core' ),
						'60'  => esc_html__( '3 stars', 'themesflat-core' ),
						'80'  => esc_html__( '4 stars', 'themesflat-core' ),
						'100' => esc_html__( '5 stars', 'themesflat-core' ),
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group.style-2 .testimonial-star-rating span' => 'width: {{VALUE}}%',
					],
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);

	        $this->end_controls_section();
        // /.End Style

        // Start Setting        
			$this->start_controls_section( 
				'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	                'condition' => [
						'testimonial_style' => 'style-2'
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
						'testimonial_style' => 'style-2'
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
						'testimonial_style' => 'style-2'
					],			
				]
			);	

			$this->add_control(
				'carousel_spacer',
				[
					'label' => esc_html__( 'Spacer', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'default' => 30,
					'condition' => [
						'testimonial_style' => 'style-2'
					],				
				]
			);		

	        $this->end_controls_section();
        // /.End Setting

        // Start Arrow        
			$this->start_controls_section( 
				'section_arrow',
	            [
	                'label' => esc_html__('Arrow', 'themesflat-core'),
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
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
				]
			);

	        $this->add_control( 
				'carousel_prev_icon', [
	                'label' => esc_html__( 'Prev Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fa fa-chevron-left',
	                'include' => [
						'fa fa-angle-double-left',
						'icon-graingrow-angle-left',
						'fa fa-chevron-left',
						'fa fa-arrow-left',
						'graingrow-icon-long-arrow-left1',
					],  
	                'condition' => [                	
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	    	$this->add_control( 
	    		'carousel_next_icon', [
	                'label' => esc_html__( 'Next Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fa fa-chevron-right',
	                'include' => [
						'fa fa-angle-double-right',
						'icon-graingrow-angle-right',
						'fa fa-chevron-right',
						'fa fa-arrow-right',
						'graingrow-icon-long-arrow-right2',
					], 
	                'condition' => [                	
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
						'size' => 17,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
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
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
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
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_arrow_tabs',
				[
					'condition' => [
		                'carousel_arrow' => 'yes',	                
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
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'color: {{VALUE}}',
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
		                'default' => '#fc6f29',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next',
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
							'top' => "0",
							'right' => "0",
							'bottom' => "0",
							'left' => "0",
							'unit' => 'px',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		                'default' => '#ffffff',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',
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
		                'default' => '#00B0FC',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next.disabled',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_arrow_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                    '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

	       		$this->end_controls_tab();

	        $this->end_controls_tabs();

	        $this->end_controls_section();
        // /.End Arrow
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		
		$carousel_arrow = 'no-arrow';
		if ( $settings['carousel_arrow'] == 'yes' ) {
			$carousel_arrow = 'has-arrow';
		}
		
		$icon_quote = \Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( $settings['icon_quote'], [ 'aria-hidden' => 'true' ] );

		?>
		<div class="tf-testimonial-carousel-type-group <?php echo esc_attr($settings['testimonial_style']) ?> <?php echo esc_attr($carousel_arrow); ?>" data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>">
			<?php if ($settings['testimonial_style'] == 'style-1'): ?>
				<div class="wrap-testimonial">
					<div class="inner-testimonial">
						<div class="bg-overlay"></div>
						<?php if ($icon_quote): ?>
							<div class="icon-quote"><?php echo sprintf($icon_quote); ?></div>
						<?php endif; ?>	

						<div class="wrap-heading">
							<?php if ($settings['before_title']): ?>
								<div class="before-title"><?php echo esc_attr($settings['before_title']); ?></div>
							<?php endif; ?>

							<?php if ($settings['heading']): ?>
								<div class="heading"><?php echo esc_attr($settings['heading']); ?></div>
							<?php endif; ?>

							<?php if ($settings['sub_heading']): ?>
								<div class="sub-heading"><?php echo esc_attr($settings['sub_heading']); ?></div>
							<?php endif; ?>
						</div>
								
						<div class="owl-carousel owl-theme testimonial">
							<?php foreach ($settings['carousel_list'] as $carousel): ?>			
							<div class="item">
								<div class="item-testimonial">
									<div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>
									<div class="wrap-avatar">
										<div class="avatar">
											<?php if ($carousel['avatar']['id']): ?>
												<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['avatar']['id'], 'thumbnail_avatar', $settings )); ?>" alt="avatar">
											<?php else: ?>
												<img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="avatar">
											<?php endif ?>										
										</div>
										<div class="info">
											<div class="name"><?php echo esc_attr($carousel['name']); ?></div>
											<div class="position"><?php echo esc_attr($carousel['position']); ?></div>
										</div>
									</div>
								</div>			
							</div>				
							<?php endforeach;?>
						</div>
					</div>
							
					<div class="owl-carousel owl-theme thumbs">
						<?php foreach ($settings['carousel_list'] as $carousel): ?>
					    <div class="image-thumbs">
					    	<?php if ($carousel['image']['id']): ?>
								<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['image']['id'], 'thumbnail_image', $settings )); ?>" alt="image">
							<?php else: ?>
								<img src="<?php echo esc_attr($carousel['image']['url']); ?>" alt="image">
							<?php endif ?>
					    </div>
					    <?php endforeach;?>
					</div>
				</div>
			<?php elseif ($settings['testimonial_style'] == 'style-2'): ?>
				<?php if ($icon_quote): ?>
					<div class="icon-quote"><?php echo sprintf($icon_quote); ?></div>
				<?php endif; ?>
				<div class="wrap-testimonial">					
					<div class="wrap-heading">
						<div class="before-title"><?php echo esc_attr($settings['before_title']); ?></div>
						<div class="heading"><?php echo esc_attr($settings['heading']); ?></div>
						<div class="sub-heading"><?php echo esc_attr($settings['sub_heading']); ?></div>
					</div>					
					<div class="owl-carousel owl-theme">
						<?php foreach ($settings['carousel_list'] as $carousel): ?>			
							<div class="item">							
								<div class="item-testimonial">							
									<div class="wrap-avatar">
										<div class="avatar">
											<?php if ($carousel['avatar']['id']): ?>
												<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['avatar']['id'], 'thumbnail_avatar', $settings )); ?>" alt="avatar">
											<?php else: ?>
												<img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="avatar">
											<?php endif ?>
										</div>
										<div class="info">
											<div class="name"><?php echo esc_attr($carousel['name']); ?></div>
											<div class="position"><?php echo esc_attr($carousel['position']); ?></div>
										</div>
									</div>
									<div class="content">
										<div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>
										<div class="rating">
											<span class="text"><?php echo esc_html__('Rating','themesflat-core'); ?></span>
											<span class="testimonial-star-rating"><span></span></span>
										</div>
									</div>
								</div>			
							</div>				
						<?php endforeach;?>
					</div>
				</div>
			<?php endif; ?>			
		</div>
		<?php	
	}

}