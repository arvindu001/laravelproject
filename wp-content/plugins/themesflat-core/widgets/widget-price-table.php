<?php
class TFPriceTable_Widget extends \Elementor\Widget_Base {

  public function get_name() {
        return 'tf-pricetable';
    }
    
    public function get_title() {
        return esc_html__( 'TF Price Table', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
        return ['tf-pricetable'];
    }

    protected function register_controls() {
        // Start Price Table Header  
            $this->start_controls_section( 
                'section_price_header',
                [
                    'label' => esc_html__('Header', 'themesflat-core'),
                ]
            );

            $this->add_control(
                'active',
                [
                    'label' => esc_html__( 'Active', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'noactive',
                    'options' => [
                        'noactive'  => esc_html__( 'No', 'themesflat-core' ),
                        'setactive' => esc_html__( 'Yes', 'themesflat-core' ),
                    ],
                ]
            );

            $this->add_control(
                'show_image',
                [
                    'label' => esc_html__( 'Show Image', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'disable-thumb',
                    'options' => [
                        'disable-thumb'  => esc_html__( 'No', 'themesflat-core' ),
                        'active-thumb' => esc_html__( 'Yes', 'themesflat-core' ),
                    ],
                ]
            );

            $this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",
					],
				]
			);

            $this->add_control(
                'price',
                [
                    'label' => esc_html__( 'Price', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '28.95', 'themesflat-core' ),
                ]
            );

            $this->add_control(
                'price_type',
                [
                    'label' => esc_html__( 'Price Type', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '$', 'themesflat-core' ),
                ]
            );

            $this->add_control(
                'time',
                [
                    'label' => esc_html__( 'Time', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '/Monthly', 'themesflat-core' ),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Basic Plan ', 'themesflat-core' ),
                ]
            );

            $this->add_control(
                'subtitle',
                [
                    'label' => esc_html__( 'Sub Title', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Save 25% For All Marketing Services', 'themesflat-core' ),
                ]
            );

            $this->end_controls_section();
        // /.End Price Table Header

        // Start Price Table Content  
            $this->start_controls_section( 
                'section_price_content',
                [
                    'label' => esc_html__('Content', 'themesflat-core'),
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'item',
                [
                    'label' => esc_html__( 'Item', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );

            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'icon-graingrow-seo36',
                        'library' => 'theme_icon',
                    ],
                ]
            );

            $repeater->add_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#8B54FF',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .wrap-icon i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} {{CURRENT_ITEM}} .wrap-icon svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );            

            $repeater->add_control(
                'text',
                [
                    'label' => esc_html__( 'Text', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Powerful Admin Panel', 'tf-addon-for-elementer' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'text_color',
                [
                    'label' => esc_html__( 'Text Color', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#E8E8E9',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .text' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'items',
                [
                    'label' => esc_html__( 'Items', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'show_label' => true,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [   
                            'icon' => [
                                'value' => 'icon-graingrow-seo36',
                                'library' => 'theme_icon',
                            ],
                            'text' => esc_html__( 'Digital Business Strategy', 'tf-addon-for-elementer' ),
                            'icon_color' => '#8B54FF',
                            'text_color' => '#120A21',
                        ],
                        [   
                            'icon' => [
                                'value' => 'icon-graingrow-seo36',
                                'library' => 'theme_icon',
                            ],
                            'text' => esc_html__( 'Search Engine Optimization', 'tf-addon-for-elementer' ),
                            'icon_color' => '#8B54FF',
                            'text_color' => '#120A21',
                        ],
                        [   
                            'icon' => [
                                'value' => 'icon-graingrow-seo36',
                                'library' => 'theme_icon',
                            ],
                            'text' => esc_html__( 'Email & Social Marketing', 'tf-addon-for-elementer' ),
                            'icon_color' => '#8B54FF',
                            'text_color' => '#120A21',
                        ],
                        [   
                            'icon' => [
                                'value' => 'icon-graingrow-seo36',
                                'library' => 'theme_icon',
                            ],
                            'text' => esc_html__( 'Web Design & Development', 'tf-addon-for-elementer' ),
                            'icon_color' => '#8B54FF',
                            'text_color' => '#120A21',
                        ],
                    ],
                    'title_field' => '{{{ text }}}',
                ]
            );            

            $this->end_controls_section();
        // /.End Price Table Content

        // Start Price Table Button  
            $this->start_controls_section( 
                'section_price_button',
                [
                    'label' => esc_html__('Button', 'themesflat-core'),
                ]
            );
            $this->add_control(
                'button_text',
                [
                    'label' => esc_html__( 'Button Text', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Choose Package', 'tf-addon-for-elementer' ),
                ]
            );

            $this->add_control(
                'post_icon_readmore',
                [
                    'label' => esc_html__( 'Post Icon ', 'graingrow' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'icon-graingrow-seo1',
                        'library' => 'theme_icon',
                    ],
                ]
            );

            $this->add_control(
                'link',
                [
                    'label' => esc_html__( 'Link', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'tf-addon-for-elementer' ),
                    'default' => [
                        'url' => '#',
                        'is_external' => false,
                        'nofollow' => false,
                    ],
                ]
            );
            $this->end_controls_section();
        // /.End Price Table Button

        // Start Style General
            $this->start_controls_section( 'section_style_general',
                [
                    'label' => esc_html__( 'General', 'themesflat-core' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );    

            $this->add_group_control(
                \Elementor\Group_Control_box_shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
                    'selector' => '{{WRAPPER}} .tf-pricetable',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => esc_html__( 'Border', 'themesflat-core' ),
                    'selector' => '{{WRAPPER}} .tf-pricetable',
                ]
            ); 

            $this->start_controls_tabs( 
                'background_style_tabs',
                [
 
                ]
                );
                $this->start_controls_tab( 
                    'background_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'themesflat-core' ),
                    ] ); 

                    $this->add_control( 
                        'overlay_bg_color',
                        [
                            'label' => esc_html__( 'Background', 'themesflat-core' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable' => 'background-color: {{VALUE}};',              
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Css_Filter::get_type(),
                        [
                            'name' => 'bg_image_css_filters',
                            'selector' => '{{WRAPPER}} .tf-pricetable',
                        ]
                    );
                $this->end_controls_tab();

                $this->start_controls_tab( 
                    'background_style_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'themesflat-core' ),
                    ] );
                    $this->add_control( 
                        'overlay_bg_color_hover',
                        [
                            'label' => esc_html__( 'Background ', 'themesflat-core' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#8B54FF',
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable:hover, {{WRAPPER}} .tf-pricetable.setactive' => 'background-color: {{VALUE}};',              
                            ],
                        ]
                    );
                    $this->add_control(
                        'background_blend_mode_hover',
                        [
                            'label' => esc_html__( 'Background Blend Mode', 'themesflat-core' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'multiply',
                            'options' => [
                                'normal'  => esc_html__( 'Normal', 'themesflat-core' ),
                                'multiply' => esc_html__( 'Multiply', 'themesflat-core' ),
                                'screen' => esc_html__( 'Screen', 'themesflat-core' ),
                                'overlay' => esc_html__( 'Overlay', 'themesflat-core' ),
                                'darken' => esc_html__( 'Darken', 'themesflat-core' ),
                                'lighten' => esc_html__( 'Lighten', 'themesflat-core' ),
                                'color-dodge' => esc_html__( 'Color Dodge', 'themesflat-core' ),
                                'saturation' => esc_html__( 'Saturation', 'themesflat-core' ),
                                'color' => esc_html__( 'Color', 'themesflat-core' ),
                                'luminosity' => esc_html__( 'Luminosity', 'themesflat-core' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable:hover' => 'background-blend-mode: {{VALUE}};',              
                            ],
                            'condition' => [
                                'style' => 'style2',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'bg_image_hover',
                            'label' => esc_html__( 'Background', 'themesflat-core' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .tf-pricetable:hover',
                            'condition' => [
                                'style' => 'style2',
                            ],
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                

            $this->end_controls_section();    
        // /.End Style General

        // Start Style image
        $this->start_controls_section( 'section_style_image',
        [
            'label' => esc_html__( 'Image', 'themesflat-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
                '{{WRAPPER}} .thumb-pricing img ' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();    
    // /.End Style image

        // Start Style Header
            $this->start_controls_section( 'section_style_header',
                [
                    'label' => esc_html__( 'Header', 'themesflat-core' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'h_general',
                [
                    'label' => esc_html__( 'General', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );

            $this->add_responsive_control(
                'header_text_align',
                [
                    'label' => esc_html__( 'Alignment', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'themesflat-core' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'themesflat-core' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'themesflat-core' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'left',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .header-price' => 'text-align: {{VALUE}}',              
                    ],
                ]
            );

            
            $this->add_responsive_control(
                'header_padding',
                [
                    'label' => esc_html__( 'Padding', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .header-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'header_margin',
                [
                    'label' => esc_html__( 'Margin', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .header-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'h_price',
                [
                    'label' => esc_html__( 'Price', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_typography',
                    'label' => esc_html__( 'Typography', 'themesflat-core' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Outfit',
                        ],
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '42',
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
                        'text_transform' => [
                            'default' => '',
                        ],
                        'letter_spacing' => [
                            'default' => [
                                'unit' => 'em',
                                'size' => '-0.02',
                            ],
                        ],
                    ],
                    'selector' => '{{WRAPPER}} .tf-pricetable .price',
                ]
            );

            $this->add_control( 
                'price_color',
                [
                    'label' => esc_html__( ' Color', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#8B54FF',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .price' => 'color: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'price_color_hover',
                [
                    'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#FFFFFF',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .price' => 'color: {{VALUE}}',     
                        '{{WRAPPER}} .tf-pricetable.setactive .price' => 'color: {{VALUE}}',          
                    ],
                ]
            );

            $this->add_control(
                'h_time',
                [
                    'label' => esc_html__( 'Time', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'time_typography',
                    'label' => esc_html__( 'Typography', 'themesflat-core' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Outfit',
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
                                'size' => '22.68',
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
                    'selector' => '{{WRAPPER}} .tf-pricetable .time',
                ]
            );  
            $this->add_control( 
                'time_color',
                [
                    'label' => esc_html__( ' Color', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#120A21',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .time' => 'color: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'time_color_hover',
                [
                    'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#FFFFFF',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .time' => 'color: {{VALUE}}', 
                        '{{WRAPPER}} .tf-pricetable.setactive .time' => 'color: {{VALUE}}',               
                    ],
                ]
            );

            $this->add_control(
                'h_price-type',
                [
                    'label' => esc_html__( 'Price Type', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price-type_typography',
                    'label' => esc_html__( 'Typography', 'themesflat-core' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Outfit',
                        ],
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '42',
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
                        'text_transform' => [
                            'default' => '',
                        ],
                        'letter_spacing' => [
                            'default' => [
                                'unit' => 'em',
                                'size' => '-0.02',
                            ],
                        ],
                    ],
                    'selector' => '{{WRAPPER}} .tf-pricetable .price-type',
                ]
            ); 
            $this->add_control( 
                'price-type_color',
                [
                    'label' => esc_html__( ' Color', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#8B54FF',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .price-type' => 'color: {{VALUE}}',              
                    ],
                ]
            );

            $this->add_control( 
                'price-type_color_hover',
                [
                    'label' => esc_html__( ' Color Hover', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .price-type' => 'color: {{VALUE}}',   
                        '{{WRAPPER}} .tf-pricetable.setactive .price-type' => 'color: {{VALUE}}',           
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
                    'label' => esc_html__( 'Typography', 'themesflat-core' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Outfit',
                        ],
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '18',
                            ],
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'line_height' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '23',
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
                    'selector' => '{{WRAPPER}} .tf-pricetable .title',
                ]
            );
            $this->add_control( 
                'title_color',
                [
                    'label' => esc_html__( ' Color', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#120A21',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .title' => 'color: {{VALUE}}',              
                    ],
                ]
            );

            $this->add_control( 
                'title_color_hover',
                [
                    'label' => esc_html__( 'Hover', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .title, {{WRAPPER}} .tf-pricetable.setactive .title' => 'color: {{VALUE}}',              
                    ],
                ]
            );

            $this->add_control(
                'h_subtitle',
                [
                    'label' => esc_html__( 'SubTitle', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitle_typography',
                    'label' => esc_html__( 'Typography', 'themesflat-core' ),
                    'selector' => '{{WRAPPER}} .tf-pricetable .subtitle',
                ]
            );
            $this->add_control( 
                'subtitle_color',
                [
                    'label' => esc_html__( 'Color', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .subtitle' => 'color: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'subtitle_color_hover',
                [
                    'label' => esc_html__( 'Hover', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .subtitle, {{WRAPPER}} .tf-pricetable.setactive .subtitle' => 'color: {{VALUE}}',              
                    ],
                ]
            );
            $this->end_controls_section();    
        // /.End Style Header

        // Start Style Content List
            $this->start_controls_section( 'section_style_content',
                [
                    'label' => esc_html__( 'Content', 'themesflat-core' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'h_general_content',
                [
                    'label' => esc_html__( 'General', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );

            $this->add_responsive_control(
                'content_text_align',
                [
                    'label' => esc_html__( 'Alignment', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'themesflat-core' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'themesflat-core' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'themesflat-core' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'left',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list .inner-content-list' => 'display: inline-block;text-align: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_control( 
                'content_bg_color',
                [
                    'label' => esc_html__( 'Background', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list' => 'background-color: {{VALUE}}',               
                    ],
                ]
            );
            $this->add_responsive_control(
                'content_padding',
                [
                    'label' => esc_html__( 'Padding', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'h_content_list',
                [
                    'label' => esc_html__( 'List', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'space_between',
                [
                    'label' => esc_html__( 'Space Between', 'themesflat-core' ),
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
                        'size' => 7.5,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list .item' => 'padding-top: {{SIZE}}{{UNIT}};padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );                 
            $this->add_control(
                'icon_size',
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
                    'default' => [
                        'unit' => 'px',
                        'size' => 25,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-icon i' => 'font-size: {{SIZE}}{{UNIT}};',                        
                        '{{WRAPPER}} .tf-pricetable .wrap-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .tf-pricetable.style1 .wrap-icon' => 'width: calc( {{SIZE}}{{UNIT}} + 5px );display: inline-block;',
                    ],
                ]
            );
            $this->add_control(
                'icon_list_color_hover',
                [
                    'label' => esc_html__( 'Icon Hover Color', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .wrap-icon i, {{WRAPPER}} .tf-pricetable.setactive .wrap-icon i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'text_typography',
                    'label' => esc_html__( 'Typography Text', 'themesflat-core' ),
                    'fields_options' => [
                        'typography' => ['default' => 'yes'],
                        'font_family' => [
                            'default' => 'Nunito Sans',
                        ],
                        'font_size' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '18',
                            ],
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'line_height' => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '24.55',
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
                    'selector' => '{{WRAPPER}} .tf-pricetable .text',
                ]
            );

            $this->add_control(
                'text_list_color',
                [
                    'label' => esc_html__( 'Text Color', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#120A21',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'text_list_color_hover',
                [
                    'label' => esc_html__( 'Text Color Hover', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable:hover .text' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .tf-pricetable.setactive .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'text_indent',
                [
                    'label' => esc_html__( 'Text Indent', 'themesflat-core' ),
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
                        'size' => 2,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .content-list .text' => 'padding-left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );             

            $this->end_controls_section();    
        // /.End Style Content List

        // Start Style Button
            $this->start_controls_section( 'section_style_button',
                [
                    'label' => esc_html__( 'Button', 'themesflat-core' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_responsive_control(
                'btn_text_align',
                [
                    'label' => esc_html__( 'Alignment', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'themesflat-core' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'themesflat-core' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'themesflat-core' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'left',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-button' => 'text-align: {{VALUE}}',              
                    ],
                ]
            );
            $this->add_group_control( 
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'btn_typography',
                    'label' => esc_html__( 'Typography Text', 'themesflat-core' ),
                    'selector' => '{{WRAPPER}} .tf-pricetable .wrap-button a',
                ]
            );

            $this->add_responsive_control(
                'btn_padding',
                [
                    'label' => esc_html__( 'Padding', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'btn_margin',
                [
                    'label' => esc_html__( 'Margin', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'btn_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->start_controls_tabs( 'tabs_btn' );
                $this->start_controls_tab( 'tab_btn_normal', [ 'label' => esc_html__( 'Normal', 'tf-addon-for-elementer' ) ] );
                    $this->add_control( 
                        'btn_color',
                        [
                            'label' => esc_html__( 'Color', 'themesflat-core' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'color: {{VALUE}}',              
                            ],
                        ]
                    ); 
                    $this->add_control( 
                        'btn_bgcolor',
                        [
                            'label' => esc_html__( 'Background', 'themesflat-core' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a' => 'background-color: {{VALUE}}',              
                            ],
                        ]
                    );
                     
                $this->end_controls_tab();
                $this->start_controls_tab( 'tab_btn_hover', [ 'label' => esc_html__( 'Hover', 'tf-addon-for-elementer' ) ] );
                    $this->add_control( 
                        'btn_color_hover',
                        [
                            'label' => esc_html__( 'Color', 'themesflat-core' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a:hover, .tf-pricetable.setactive .wrap-button a' => 'color: {{VALUE}}',              
                            ],
                        ]
                    );
                    $this->add_control( 
                        'btn_bgcolor_hover',
                        [
                            'label' => esc_html__( 'Background', 'themesflat-core' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tf-pricetable .wrap-button a:hover,{{WRAPPER}} .tf-pricetable.setactive .wrap-button a' => 'background-color: {{VALUE}}',              
                            ],
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();    
        // /.End Style Button

    }

    protected function render($instance = []) {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'tf_pricetable', ['id' => "tf-pricetable-{$this->get_id()}", 'class' => ['tf-pricetable', $settings['active']],  'data-tabid' => $this->get_id()] );  

        $header = $content = $button = $subtitle = $icon =  $item_list = $number_order = $time = $image = $show_image ='';

        foreach ( $settings['items'] as $index => $item ) {
            $item_list .= '<div class="item elementor-repeater-item-' . $item['_id'] . '">
                            <span class="wrap-icon">'.\Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( $item['icon'] ).'</span>
                            <span class="text">'.$item['text'].'</span>
                        </div>';
        }
        $image =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); 
        $icon = \Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );
        $price_type = $settings['price_type'] ? '<span class="price-type">'.$settings['price_type'].'</span>' : '';
        $price = $settings['price'] ? '<span class="price">'.$settings['price'].'</span>' : '';
        $title = $settings['price'] ? '<div class="title">'.$settings['title'].'</div>' : '';
        $show_image = $settings['show_image'];
       
        $time = '<span class="time">'.$settings['time'].'</span>';

        if ($settings['subtitle'] != '') {
            $subtitle = '<h4 class="subtitle">'.$settings['subtitle'].'</h4>';
        }    

        $header = sprintf( '<div class="header-price">
                                
                                 %1$s 
                                <div class="content-price"> %4$s %2$s %3$s</div>
                                %5$s 
                            </div>',$title,$price,$time,$price_type,$subtitle);

        $content = sprintf( '<div class="content-list">
                                <div class="inner-content-list">%1$s</div>
                            </div>',$item_list);

        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
        $button = sprintf( '<div class="wrap-button">
                                <a href="%2$s" class="btn-st" %3$s %4$s>%1$s %5$s</a>
                            </div>',$settings['button_text'], $settings['link']['url'], $target, $nofollow, $icon);

        echo sprintf ( 
            '<div class="thumb-pricing %6$s">%5$s</div>
            <div %1$s>  
                %2$s
                %3$s
                %4$s
            </div>',
                $this->get_render_attribute_string('tf_pricetable'),
                $header,
                $content,
                $button,
                $image,
                $show_image
        );
    }

}