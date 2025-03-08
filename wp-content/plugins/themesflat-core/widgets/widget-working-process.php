<?php
class TFWorking_Process_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-working-process';
    }
    
    public function get_title() {
        return esc_html__( 'TF Working Process', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-step'];
	}

	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );

            $this->add_control(
				'line',
				[
					'label' => esc_html__( 'Details Arrow', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
				]
			);

            $this->end_controls_section();

            $this->start_controls_section( 'section_step1',
	            [
	                'label' => esc_html__('Step 01', 'themesflat-core'),
	            ]
	        );

            $this->add_control(
                'h_step1',
                [
                    'label' => esc_html__( 'Step 01', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
				'image1',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",
					],
				]
			);

			$this->add_control(
				'number_count1',
				[
					'label' => esc_html__( 'Before Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Step 01', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'title1',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Perform a Complete SEO and Content Audit', 'themesflat-core' ),
				]
			);

            $this->add_control(
				'desc1',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Sit amet consect adipiscing nec tortor nec aenean', 'themesflat-core' ),
				]
			);

            $this->end_controls_section();

            $this->start_controls_section( 'section_step2',
	            [
	                'label' => esc_html__('Step 02', 'themesflat-core'),
	            ]
	        );

            $this->add_control(
                'h_step2',
                [
                    'label' => esc_html__( 'Step 02', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
				'image2',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",
					],
				]
			);

			$this->add_control(
				'number_count2',
				[
					'label' => esc_html__( 'Before Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Step 02', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'title2',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Identify Keywords to Optimize', 'themesflat-core' ),
				]
			);

            $this->add_control(
				'desc2',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Sit amet consect adipiscing nec tortor nec aenean', 'themesflat-core' ),
				]
			);

            $this->end_controls_section();

            $this->start_controls_section( 'section_step3',
            [
                'label' => esc_html__('Step 03', 'themesflat-core'),
            ]
        );

            $this->add_control(
                'h_step3',
                [
                    'label' => esc_html__( 'Step 03', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
				'image3',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",
					],
				]
			);

			$this->add_control(
				'number_count3',
				[
					'label' => esc_html__( 'Before Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Step 03', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'title3',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Install analytics and Set Key Performance', 'themesflat-core' ),
				]
			);

            $this->add_control(
				'desc3',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Sit amet consect adipiscing nec tortor nec aenean', 'themesflat-core' ),
				]
			);
	        
	        
			$this->end_controls_section();
        // /.End List Setting  

	    // Start Style Style
			$this->start_controls_section(
				'section_style',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
	        	'wrap_over_icon_size',
				[
					'label' => esc_html__( 'Over Icon Size', 'themesflat-core' ),
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
						'{{WRAPPER}} .tf-working-process .group-working .box .features' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			);
            $this->add_control( 
	        	'wrap_icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-core' ),
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
						'{{WRAPPER}} .tf-working-process .group-working .box .features img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			);

            $this->add_group_control( 
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'icon_border',
                    'label' => esc_html__( 'Border', 'themesflat-core' ),
                    'selector' => '{{WRAPPER}} .tf-working-process .group-working .box .features',
                ]
            );
            $this->add_responsive_control( 
                'icon_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-working-process .group-working .box .features' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control( 
				\Elementor\Group_Control_box_shadow::get_type(),
				[
					'name' => 'icon_box_shadow1',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-working-process .group-working .box .features',
				]
			);
            $this->add_responsive_control( 'icon_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-working-process .group-working .box .features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );		
			
			$this->add_responsive_control( 
				'icon_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .tf-working-process .group-working .box .features' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

            $this->end_controls_section();
		// /.End Style 

            $this->start_controls_section(
				'section_style_content',
				[
					'label' => esc_html__( 'Content', 'themesflat-core' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

            $this->add_control(
				'h_bfcontent',
				[
					'label' => esc_html__( 'Content', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

            $this->add_responsive_control( 
				'gap_content',
				[
					'label' => esc_html__( 'Gap Box Content', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .tf-working-process .group-working .box' => 'width: calc(33.3333% - {{SIZE}}{{UNIT}});',
						'{{WRAPPER}} .tf-working-process .group-working .box' => 'margin-left: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-working-process .group-working' => ' margin-left: -{{SIZE}}{{UNIT}};',
					],
				]
			);

            $this->add_responsive_control( 'cnt_padding',
            [
                'label' => esc_html__( 'Padding', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );		

        $this->add_control(
            'cnt_padding_color',
            [
                'label' => esc_html__( 'Content Background Color', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box .content, {{WRAPPER}} .tf-working-process .group-working .box .content::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control( 
            \Elementor\Group_Control_box_shadow::get_type(),
            [
                'name' => 'cnt_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
                'selector' => '{{WRAPPER}} .tf-working-process .group-working .box .content',
            ]
        );

        $this->add_group_control( 
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'cnt_border',
                'label' => esc_html__( 'Border', 'themesflat-core' ),
                'selector' => '{{WRAPPER}} .tf-working-process .group-working .box .content',
            ]
        );
        $this->add_responsive_control( 
            'cnt_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
	        $this->add_control(
				'h_bftitle',
				[
					'label' => esc_html__( 'Before Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
            $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'beforetitle_typography',
					'label' => esc_html__( 'Before Title Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-working-process .group-working .box .content h4',
				]
			);
            $this->add_control(
				'beforetitle_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-working-process .group-working .box .content h4' => 'color: {{VALUE}}',
					],
				]
			);

            $this->add_responsive_control( 'bt_padding',
            [
                'label' => esc_html__( 'Padding', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box .content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );		
        
        $this->add_responsive_control( 
            'bt_margin',
            [
                'label' => esc_html__( 'Margin', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'name' => 'title_typography',
                'label' => esc_html__( ' Title Typography', 'themesflat-core' ),
                'selector' => '{{WRAPPER}} .tf-working-process .group-working .box .content h3',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box .content h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control( 't_padding',
        [
            'label' => esc_html__( 'Padding', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .tf-working-process .group-working .box .content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );		
    
    $this->add_responsive_control( 
        't_margin',
        [
            'label' => esc_html__( 'Margin', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .tf-working-process .group-working .box .content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'h_desc',
        [
            'label' => esc_html__( 'Description', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $this->add_group_control( 
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography',
            'label' => esc_html__( 'Description Typography', 'themesflat-core' ),
            'selector' => '{{WRAPPER}} .tf-working-process .group-working .box .content p',
        ]
    );
    $this->add_control(
        'desc_color',
        [
            'label' => esc_html__( 'Color', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tf-working-process .group-working .box .content p' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control( 'desc_padding',
    [
        'label' => esc_html__( 'Padding', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .tf-working-process .group-working .box .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);		

$this->add_responsive_control( 
    'desc_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .tf-working-process .group-working .box .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

			$this->end_controls_section();
		// /.End Style 

        $this->start_controls_section(
            'section_style_content1',
            [
                'label' => esc_html__( 'Content Box 1', 'themesflat-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control( 
            'box1_margin_t',
            [
                'label' => esc_html__( 'Margin Top', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box.box1' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control( 
            'box1_margin_b',
            [
                'label' => esc_html__( 'Margin Bottom', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box.box1' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_content2',
            [
                'label' => esc_html__( 'Content Box 2', 'themesflat-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control( 
            'box2_margin_t',
            [
                'label' => esc_html__( 'Margin Top', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box.box2' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control( 
            'box2_margin_b',
            [
                'label' => esc_html__( 'Margin Bottom', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box.box2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_content3',
            [
                'label' => esc_html__( 'Content Box 3', 'themesflat-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control( 
            'box3_margin_t',
            [
                'label' => esc_html__( 'Margin Top', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box.box3' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control( 
            'box3_margin_b',
            [
                'label' => esc_html__( 'Margin Bottom', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-working-process .group-working .box.box3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
	}	

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		

		$this->add_render_attribute( 'tf-working-process', ['id' => "tf-working-process-{$this->get_id()}", 'class' => ['tf-working-process'], 'data-tabid' => $this->get_id() ] );
		
        ?>
        <div <?php echo $this->get_render_attribute_string('tf-working-process') ?>>
			<div class="group-working">
                <div class="line">
                    <?php if ($settings['line'] != '') {
                        echo $line =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'line' );
                    }?>
                </div>
                
                <div class="box box1">
                    <?php if ($settings['image1'] != '') {
                        echo '<div class="features">'.
                        $image =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image1' )
                        .'</div>';
                    }?>
                    <div class="content">
                    <?php if ($settings['number_count1'] != '') {
                            echo '<h4>' . esc_attr( $settings['number_count1'] ) .'</h4>';
                        }?>

                        <?php if ($settings['title1'] != '') {
                            echo '<h3>' . esc_attr( $settings['title1'] ) .'</h3>';
                        }?>

                        <?php if ($settings['desc1'] != '') {
                            echo '<p>' . esc_attr( $settings['desc1'] ) .'</p>';
                        }?>
                    </div>
                    
                </div>
                <div class="box box2">
                    <?php if ($settings['image2'] != '') {
                        echo '<div class="features">'.
                        $image =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image2' )
                        .'</div>';
                    }?>
                    <div class="content">
                    <?php if ($settings['number_count2'] != '') {
                            echo '<h4>' . esc_attr( $settings['number_count2'] ) .'</h4>';
                        }?>

                        <?php if ($settings['title2'] != '') {
                            echo '<h3>' . esc_attr( $settings['title2'] ) .'</h3>';
                        }?>

                        <?php if ($settings['desc2'] != '') {
                            echo '<p>' . esc_attr( $settings['desc2'] ) .'</p>';
                        }?>
                    </div>
                    
                </div>
                <div class="box box3">
                    <?php if ($settings['image3'] != '') {
                        echo '<div class="features">'.
                        $image =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image3' )
                        .'</div>';
                    }?>
                    <div class="content">
                    <?php if ($settings['number_count3'] != '') {
                            echo '<h4>' . esc_attr( $settings['number_count3'] ) .'</h4>';
                        }?>

                        <?php if ($settings['title3'] != '') {
                            echo '<h3>' . esc_attr( $settings['title3'] ) .'</h3>';
                        }?>

                        <?php if ($settings['desc3'] != '') {
                            echo '<p>' . esc_attr( $settings['desc3'] ) .'</p>';
                        }?>
                    </div>
                    
                </div>
            </div>
	    </div>
        <?php 		
	}

}