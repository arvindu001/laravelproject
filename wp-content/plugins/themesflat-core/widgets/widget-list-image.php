<?php
class TFListImage_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-list-image';
    }
    
    public function get_title() {
        return esc_html__( 'TF List Image', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-list-image'];
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
				'title',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Al Mahmud', 'themesflat-core' ),
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
							'title' => esc_html__( 'Al Mahmud', 'tf-addon-for-elementer' ),
						],
						[
							'title' => esc_html__( 'Michelle Williams', 'tf-addon-for-elementer' ),
						],
						[
							'title' => esc_html__( 'Michelle Pfeiffer', 'tf-addon-for-elementer' ),
						],
						[
							'title' => esc_html__( 'Michelle monaghan', 'tf-addon-for-elementer' ),
						],
						[
							'title' => esc_html__( 'James Charlie', 'tf-addon-for-elementer' ),
						],
						[
							'title' => esc_html__( 'Madison Ava', 'tf-addon-for-elementer' ),
						],
						[
							'title' => esc_html__( 'James Charlie', 'tf-addon-for-elementer' ),
						],
						[
							'title' => esc_html__( 'Madison Ava', 'tf-addon-for-elementer' ),
						],
					],
					'title_field' => '{{{ title }}}',
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'icon-graingrow-plus',
						'library' => 'graingrow_icon',
					],
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
				'h_name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_name',
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
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '25',
				            ],
				        ],
				        'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-list-image .name',
				]
			); 

			$this->add_control( 
				'color_name',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffff',
					'selectors' => [
						'{{WRAPPER}} .tf-list-image .name' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'bg_name',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000',
					'selectors' => [
						'{{WRAPPER}} .tf-list-image .name' => 'background-color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'h_image',
				[
					'label' => esc_html__( 'Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_control( 
	        	'image_size',
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
						'{{WRAPPER}} .tf-list-image li .image  ' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-list-image li.item-image.item-icon  ' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			

			$this->add_control(
				'h_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
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
						'{{WRAPPER}} .tf-list-image li.item-image.item-icon i ' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'color_icon',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .tf-list-image li.item-image.item-icon i ' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'color_icon_border',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-list-image li.item-image.item-icon' => 'border-color: {{VALUE}}',					
					],
				]
			);
			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_list-image', ['id' => "tf-list-image-{$this->get_id()}", 'class' => ['tf-list-image'], 'data-tabid' => $this->get_id()] );	

		$content = $title = $before_title = '';	

		foreach ( $settings['list'] as $index => $item ) {
			if ($item['title'] != '') {
				$title = '<span class="name">'.$item['title'].'</span>';
			}

			if ($item['image'] != '') {
				$url = esc_attr($item['image']['url']);
				$image = sprintf( '<span class="image"><img src="%1s" alt="image"></span>',$url);
			}

			$icon = \Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
			
			$content .= sprintf( '<li class="item-image">
			                        %1$s
			 						%2$s									
								  </li>', $image, $title);
		}		

		echo sprintf ( 
			'<ul %1$s> 
				%2$s   
				<li class="item-image item-icon">
				%3$s
			  </li>             
            </ul>',
            $this->get_render_attribute_string('tf_list-image'),
            $content,$icon
        );	
		
	}

}