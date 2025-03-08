<?php
class TFList_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-list';
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
		return ['tf-list'];
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
				'name',
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
							'name' => esc_html__( 'Al Mahmud', 'tf-addon-for-elementer' ),
						],
						[
							'name' => esc_html__( 'Michelle Williams', 'tf-addon-for-elementer' ),
						],
						[
							'name' => esc_html__( 'Michelle Pfeiffer', 'tf-addon-for-elementer' ),
						],
						
						[
							'name' => esc_html__( 'Michelle monaghan', 'tf-addon-for-elementer' ),
						],
						[
							'name' => esc_html__( 'James Charlie', 'tf-addon-for-elementer' ),
						],
						[
							'name' => esc_html__( 'Madison Ava', 'tf-addon-for-elementer' ),
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

        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_list', ['id' => "tf-list-{$this->get_id()}", 'class' => ['tf-list'], 'data-tabid' => $this->get_id()] );

		$content = $name = '';	

		foreach ( $settings['list'] as $index => $item ) {
			if ($item['name'] != '') {
				$name = '<span class="name"> '.$item['name'].' </span>';
			}

			if ($item['image'] != '') {
				$url = esc_attr($item['image']['url']);
				$image = sprintf( '<span class="image"><img src="%1s" alt="image"></span>',$url);
			}

			
			$content .= sprintf( '<li class="item-image">
                                   %1$s
								   %2$s									
								</li>',$image,$name );
		}		

		echo sprintf ( 
			'<ul %1$s> 
				%2$s                
            </ul>',
            $this->get_render_attribute_string('tf_list'),
            $content
        );	
		
	}

}