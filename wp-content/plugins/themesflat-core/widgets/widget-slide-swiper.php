<?php
class TFSlideSwiper_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-slide-swiper';
    }
    
    public function get_title() {
        return esc_html__( 'TF Slide Swiper', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-font-awesome','tf-regular','swiper','tf-slide-swiper'];
	}

	public function get_script_depends() {
		return ['swiper','tf-slide-swiper'];
	}

	protected function register_controls() {
		// Start Slides Setting 	
			$this->start_controls_section(
				'section_slides',
				[
					'label' => esc_html__( 'Slides', 'themesflat-core' ),
				]
			);						

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'h_slides',
				[
					'label' => esc_html__( 'Slides', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$repeater->start_controls_tabs( 'slides_repeater' );

				$repeater->start_controls_tab( 'background', [ 'label' => esc_html__( 'Background', 'themesflat-core' ) ] );

					$repeater->add_control(
						'background_image',
						[
							'label' => esc_html__( 'Background Image', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::MEDIA,
							'default' => [
			                    'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/default.jpg",
			                ],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-bg' => 'background-image: url({{URL}})',
							],
						]
					);

					$repeater->add_control(
						'background_size',
						[
							'label' => esc_html__( 'Size', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'cover',
							'options' => [
								'cover' => esc_html__( 'Cover', 'themesflat-core' ),
								'contain' => esc_html__( 'Contain', 'themesflat-core' ),
								'auto' => esc_html__( 'Auto', 'themesflat-core' ),
							],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-bg' => 'background-size: {{VALUE}}',
							],
							'conditions' => [
								'terms' => [
									[
										'name' => 'background_image[url]',
										'operator' => '!=',
										'value' => '',
									],
								],
							],
						]
					);

					$repeater->add_control(
						'background_ken_burns',
						[
							'label' => esc_html__( 'Ken Burns Effect', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SWITCHER,
							'default' => '',
							'conditions' => [
								'terms' => [
									[
										'name' => 'background_image[url]',
										'operator' => '!=',
										'value' => '',
									],
								],
							],
						]
					);

					$repeater->add_control(
						'zoom_direction',
						[
							'label' => esc_html__( 'Zoom Direction', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'in',
							'options' => [
								'in' => esc_html__( 'In', 'themesflat-core' ),
								'out' => esc_html__( 'Out', 'themesflat-core' ),
							],
							'conditions' => [
								'terms' => [
									[
										'name' => 'background_ken_burns',
										'operator' => '!=',
										'value' => '',
									],
								],
							],
						]
					);

					$repeater->add_control(
						'background_overlay',
						[
							'label' => esc_html__( 'Background Overlay', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SWITCHER,
							'default' => '',
							'conditions' => [
								'terms' => [
									[
										'name' => 'background_image[url]',
										'operator' => '!=',
										'value' => '',
									],
								],
							],
						]
					);

					$repeater->add_control(
						'background_overlay_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(0,0,0,0.5)',
							'conditions' => [
								'terms' => [
									[
										'name' => 'background_overlay',
										'value' => 'yes',
									],
								],
							],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .slide-background-overlay' => 'background-color: {{VALUE}}',
							],
						]
					);

					$repeater->add_control(
						'background_overlay_blend_mode',
						[
							'label' => esc_html__( 'Blend Mode', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'options' => [
								'' => esc_html__( 'Normal', 'themesflat-core' ),
								'multiply' => 'Multiply',
								'screen' => 'Screen',
								'overlay' => 'Overlay',
								'darken' => 'Darken',
								'lighten' => 'Lighten',
								'color-dodge' => 'Color Dodge',
								'color-burn' => 'Color Burn',
								'hue' => 'Hue',
								'saturation' => 'Saturation',
								'color' => 'Color',
								'exclusion' => 'Exclusion',
								'luminosity' => 'Luminosity',
							],
							'conditions' => [
								'terms' => [
									[
										'name' => 'background_overlay',
										'value' => 'yes',
									],
								],
							],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .slide-background-overlay' => 'mix-blend-mode: {{VALUE}}',
							],
						]
					);

				$repeater->end_controls_tab();

				$repeater->start_controls_tab( 'content', [ 'label' => esc_html__( 'Content', 'themesflat-core' ) ] );

					$repeater->add_control(
						'heading',
						[
							'label' => esc_html__( 'Title', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'Slide Heading', 'themesflat-core' ),
							'label_block' => true,
						]
					);

					$repeater->add_control(
						'sub_heading',
						[
							'label' => esc_html__( 'Sub Title', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( '', 'themesflat-core' ),
							'label_block' => true,
						]
					);

					$repeater->add_control(
						'description',
						[
							'label' => esc_html__( 'Description', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXTAREA,
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'themesflat-core' ),
							'show_label' => false,
						]
					);

					$repeater->add_control(
						'button_text',
						[
							'label' => esc_html__( 'Button Text', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'Click Here', 'themesflat-core' ),
						]
					);

					$repeater->add_control(
						'link',
						[
							'label' => esc_html__( 'Link', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::URL,
							'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
						]
					);

					$repeater->add_control(
						'link_click',
						[
							'label' => esc_html__( 'Apply Link On', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'options' => [
								'slide' => esc_html__( 'Whole Slide', 'themesflat-core' ),
								'button' => esc_html__( 'Button Only', 'themesflat-core' ),
							],
							'default' => 'button',
							'conditions' => [
								'terms' => [
									[
										'name' => 'link[url]',
										'operator' => '!=',
										'value' => '',
									],
								],
							],
						]
					);

				$repeater->end_controls_tab();

				$repeater->start_controls_tab( 'style', [ 'label' => esc_html__( 'Style', 'themesflat-core' ) ] );

					$repeater->add_control(
						'custom_style',
						[
							'label' => esc_html__( 'Custom', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SWITCHER,
							'description' => esc_html__( 'Set custom style that will only affect this specific slide.', 'themesflat-core' ),
						]
					);

					$repeater->add_control(
						'horizontal_position',
						[
							'label' => esc_html__( 'Horizontal Position', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::CHOOSE,
							'options' => [
								'left' => [
									'title' => esc_html__( 'Left', 'themesflat-core' ),
									'icon' => 'eicon-h-align-left',
								],
								'center' => [
									'title' => esc_html__( 'Center', 'themesflat-core' ),
									'icon' => 'eicon-h-align-center',
								],
								'right' => [
									'title' => esc_html__( 'Right', 'themesflat-core' ),
									'icon' => 'eicon-h-align-right',
								],
							],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-contents' => '{{VALUE}}',
							],
							'selectors_dictionary' => [
								'left' => 'margin-right: auto',
								'center' => 'margin: 0 auto',
								'right' => 'margin-left: auto',
							],
							'conditions' => [
								'terms' => [
									[
										'name' => 'custom_style',
										'value' => 'yes',
									],
								],
							],
						]
					);

					$repeater->add_control(
						'vertical_position',
						[
							'label' => esc_html__( 'Vertical Position', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::CHOOSE,
							'options' => [
								'top' => [
									'title' => esc_html__( 'Top', 'themesflat-core' ),
									'icon' => 'eicon-v-align-top',
								],
								'middle' => [
									'title' => esc_html__( 'Middle', 'themesflat-core' ),
									'icon' => 'eicon-v-align-middle',
								],
								'bottom' => [
									'title' => esc_html__( 'Bottom', 'themesflat-core' ),
									'icon' => 'eicon-v-align-bottom',
								],
							],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-inner' => 'align-items: {{VALUE}}',
							],
							'selectors_dictionary' => [
								'top' => 'flex-start',
								'middle' => 'center',
								'bottom' => 'flex-end',
							],
							'conditions' => [
								'terms' => [
									[
										'name' => 'custom_style',
										'value' => 'yes',
									],
								],
							],
						]
					);

					$repeater->add_control(
						'text_align',
						[
							'label' => esc_html__( 'Text Align', 'themesflat-core' ),
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
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-inner' => 'text-align: {{VALUE}}',
							],
							'conditions' => [
								'terms' => [
									[
										'name' => 'custom_style',
										'value' => 'yes',
									],
								],
							],
						]
					);

					$repeater->add_control(
						'content_color',
						[
							'label' => esc_html__( 'Content Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-inner .slide-heading' => 'color: {{VALUE}}',
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-inner .slide-description' => 'color: {{VALUE}}',
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-inner .swiper-slide-button' => 'color: {{VALUE}}; border-color: {{VALUE}}',
							],
							'conditions' => [
								'terms' => [
									[
										'name' => 'custom_style',
										'value' => 'yes',
									],
								],
							],
						]
					);

					$repeater->add_group_control(
						\Elementor\Group_Control_Text_Shadow::get_type(),
						[
							'name' => 'repeater_text_shadow',
							'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-contents',
							'conditions' => [
								'terms' => [
									[
										'name' => 'custom_style',
										'value' => 'yes',
									],
								],
							],
						]
					);

				$repeater->end_controls_tab();

			$repeater->end_controls_tabs();

			/*Thumbs Gallery*/			
			$repeater->add_control(
				'h_thumbs_gallery',
				[
					'label' => esc_html__( 'Thumbs Gallery', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$repeater->start_controls_tabs( 'slides_thumbs_repeater' );

				$repeater->start_controls_tab( 'background_thumbs', [ 'label' => esc_html__( 'Background', 'themesflat-core' ) ] );
					$repeater->add_control(
						'background_color_thumbs',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#E4E4E4',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-thumb-bg' => 'background-color: {{VALUE}}',
							],
						]
					);
					$repeater->add_control(
						'background_image_thumbs',
						[
							'label' => esc_html__( 'Background Image', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::MEDIA,
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-thumb-bg' => 'background-image: url({{URL}})',
							],
						]
					);
					$repeater->add_control(
						'background_size_thumbs',
						[
							'label' => esc_html__( 'Size', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'cover',
							'options' => [
								'cover' => esc_html__( 'Cover', 'themesflat-core' ),
								'contain' => esc_html__( 'Contain', 'themesflat-core' ),
								'auto' => esc_html__( 'Auto', 'themesflat-core' ),
							],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .swiper-slide-thumb-bg' => 'background-size: {{VALUE}}',
							],
							'conditions' => [
								'terms' => [
									[
										'name' => 'background_image_thumbs[url]',
										'operator' => '!=',
										'value' => '',
									],
								],
							],
						]
					);
				$repeater->end_controls_tab();

				$repeater->start_controls_tab( 'content_thumbs', [ 'label' => esc_html__( 'Content', 'themesflat-core' ) ] );
					$repeater->add_control(
						'description_thumbs',
						[
							'label' => esc_html__( 'Description', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXTAREA,
							'default' => esc_html__( 'Thumb Slide', 'themesflat-core' ),
							'show_label' => false,
						]
					);
				$repeater->end_controls_tab();

				$repeater->start_controls_tab( 'style_thumbs', [ 'label' => esc_html__( 'Style', 'themesflat-core' ) ] );
					$repeater->add_responsive_control(
						'content_thumbs_max_width',
						[
							'label' => esc_html__( 'Content Width', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 1000,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' => [ '%', 'px' ],
							'default' => [
								'size' => '90',
								'unit' => '%',
							],
							'tablet_default' => [
								'unit' => '%',
							],
							'mobile_default' => [
								'unit' => '%',
							],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .slide-thumb-description' => 'max-width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$repeater->add_responsive_control(
						'slides_thumbs_padding',
						[
							'label' => esc_html__( 'Padding', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'default' => [
								'top' => '20',
								'right' => '20',
								'bottom' => '20',
								'left' => '20',
								'unit' => 'px',
								'isLinked' => true,
							],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .thumb-slide-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$repeater->add_control(
						'horizontal_position_thumbs',
						[
							'label' => esc_html__( 'Horizontal Position', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::CHOOSE,
							'options' => [
								'left' => [
									'title' => esc_html__( 'Left', 'themesflat-core' ),
									'icon' => 'eicon-h-align-left',
								],
								'center' => [
									'title' => esc_html__( 'Center', 'themesflat-core' ),
									'icon' => 'eicon-h-align-center',
								],
								'right' => [
									'title' => esc_html__( 'Right', 'themesflat-core' ),
									'icon' => 'eicon-h-align-right',
								],
							],
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .slide-thumb-description' => '{{VALUE}}',
							],
							'selectors_dictionary' => [
								'left' => 'margin-right: auto',
								'center' => 'margin: 0 auto',
								'right' => 'margin-left: auto',
							],
						]
					);

					$repeater->add_control(
						'vertical_position_thumbs',
						[
							'label' => esc_html__( 'Vertical Position', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::CHOOSE,
							'options' => [
								'top' => [
									'title' => esc_html__( 'Top', 'themesflat-core' ),
									'icon' => 'eicon-v-align-top',
								],
								'middle' => [
									'title' => esc_html__( 'Middle', 'themesflat-core' ),
									'icon' => 'eicon-v-align-middle',
								],
								'bottom' => [
									'title' => esc_html__( 'Bottom', 'themesflat-core' ),
									'icon' => 'eicon-v-align-bottom',
								],
							],
							'default' => 'middle',
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .thumb-slide-inner' => 'align-items: {{VALUE}}',
							],
							'selectors_dictionary' => [
								'top' => 'flex-start',
								'middle' => 'center',
								'bottom' => 'flex-end',
							],
						]
					);

					$repeater->add_control(
						'text_align_thumbs',
						[
							'label' => esc_html__( 'Text Align', 'themesflat-core' ),
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
								'{{WRAPPER}} {{CURRENT_ITEM}} .thumb-slide-inner' => 'text-align: {{VALUE}}',
							],
						]
					);

					$repeater->add_control(
						'content_color_thumbs',
						[
							'label' => esc_html__( 'Content Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .thumb-slide-inner .slide-thumb-description' => 'color: {{VALUE}}',
							],
						]
					);

					$repeater->add_group_control(
						\Elementor\Group_Control_Text_Shadow::get_type(),
						[
							'name' => 'repeater_text_shadow_thumbs',
							'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .slide-thumb-description',
						]
					);
				$repeater->end_controls_tab();

			$repeater->end_controls_tabs();
			

			$this->add_control(
				'slides',
				[
					'label' => esc_html__( 'Slides', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'show_label' => true,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'heading' => esc_html__( 'Slide 1 Heading', 'themesflat-core' ),
							'description' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'themesflat-core' ),
							'button_text' => esc_html__( 'Click Here', 'themesflat-core' ),							
							'background_color_thumbs' => '#E4E4E4',
							'description_thumbs' => esc_html__( 'Thumb Slide 1 Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'themesflat-core' ),
						],
						[
							'heading' => esc_html__( 'Slide 2 Heading', 'themesflat-core' ),
							'description' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'themesflat-core' ),
							'button_text' => esc_html__( 'Click Here', 'themesflat-core' ),							
							'background_color_thumbs' => '#CECBCB',
							'description_thumbs' => esc_html__( 'Thumb Slide 2 Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'themesflat-core' ),
						],
						[
							'heading' => esc_html__( 'Slide 3 Heading', 'themesflat-core' ),
							'description' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'themesflat-core' ),
							'button_text' => esc_html__( 'Click Here', 'themesflat-core' ),							
							'background_color_thumbs' => '#B6B4B4',
							'description_thumbs' => esc_html__( 'Thumb Slide 3 Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'themesflat-core' ),
						],
					],
					'title_field' => '{{{ heading }}}',
				]
			);

			$this->add_responsive_control(
				'slides_height',
				[
					'label' => esc_html__( 'Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vh', 'em' ],
					'range' => [
						'px' => [
							'min' => 100,
							'max' => 1000,
						],
						'vh' => [
							'min' => 10,
							'max' => 100,
						],
					],
					'default' => [
						'size' => 500,
					],					
					'selectors' => [
						'{{WRAPPER}} .swiper-container-primary .swiper-slide' => 'height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .swiper-container-primary.swiper-container-vertical' => 'height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .swiper-container-primary.swiper-container-vertical .swiper-wrapper' => 'height: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'slides_content_container',
				[
					'label' => esc_html__( 'Content Container', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'themesflat-core' ),
					'label_off' => esc_html__( 'No', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);	

			$this->add_control(
				'show_thumbs_gallery',
				[
					'label' => esc_html__( 'Show Thumbs Gallery', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
					'separator' => 'before',
				]
			);			

			$this->end_controls_section();
		// /.End Slides Setting

		// Start Slides Options 
			$this->start_controls_section(
				'section_slider_options',
				[
					'label' => esc_html__( 'Slides Options', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SECTION,
				]
			);			

			$this->add_control(
				'direction',
				[
					'label' => esc_html__( 'Motion Direction', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'horizontal',
					'options' => [
						'horizontal' => esc_html__( 'Horizontal', 'themesflat-core' ),
						'vertical' => esc_html__( 'Vertical', 'themesflat-core' ),
					],
				]
			);

			$this->add_control(
				'autoplay',
				[
					'label' => esc_html__( 'Autoplay Transfer', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label' => esc_html__( 'Pause on Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'autoplay!' => '',
					],
				]
			);

			$this->add_control(
				'pause_on_interaction',
				[
					'label' => esc_html__( 'Pause on Interaction', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'autoplay!' => '',
					],
				]
			);

			$this->add_control(
				'autoplay_speed',
				[
					'label' => esc_html__( 'Autoplay Speed', 'themesflat-core' ) . ' (ms)',
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 3000,
					'condition' => [
						'autoplay' => 'yes',
					],
				]
			);

			$this->add_control(
				'infinite',
				[
					'label' => esc_html__( 'Infinite Loop', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'transition',
				[
					'label' => esc_html__( 'Transition', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'slide',
					'options' => [
						'slide' => esc_html__( 'Slide', 'themesflat-core' ),
						'fade' => esc_html__( 'Fade', 'themesflat-core' ),
						'cube' => esc_html__( 'Cube', 'themesflat-core' ),
						'coverflow' => esc_html__( 'Coverflow', 'themesflat-core' ),
						'flip' => esc_html__( 'Flip', 'themesflat-core' ),
					],
				]
			);

			$this->add_control(
				'slide_type',
				[
					'label' => esc_html__( 'Transfer Type Of Transition Slide', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'slide-type-default',
					'options' => [
						'slide-type-default' => esc_html__( 'Default', 'themesflat-core' ),
						'slide-type-scale' => esc_html__( 'Scale', 'themesflat-core' ),
						'slide-type-parallax' => esc_html__( 'Parallax', 'themesflat-core' ),
					],
					'condition' => [
						'transition' => [ 'slide' ],
					],
				]
			);			

			$this->add_control(
				'transition_speed',
				[
					'label' => esc_html__( 'Transition Speed', 'themesflat-core' ) . ' (ms)',
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 1200,
				]
			);

			$this->add_control(
				'content_animation',
				[
					'label' => esc_html__( 'Content Animation', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'fadeInUp',
					'options' => [
						'' => esc_html__( 'None', 'themesflat-core' ),
						'fadeInDown' => esc_html__( 'Down', 'themesflat-core' ),
						'fadeInUp' => esc_html__( 'Up', 'themesflat-core' ),
						'fadeInRight' => esc_html__( 'Right', 'themesflat-core' ),
						'fadeInLeft' => esc_html__( 'Left', 'themesflat-core' ),
						'zoomIn' => esc_html__( 'Zoom', 'themesflat-core' ),
					],
					'condition' => [
						'slide_type' => 'slide-type-default'
					],
				]
			);

			$this->end_controls_section();
		// /.End Slides Options

		// Start Slides Parallax 
			$this->start_controls_section(
				'section_slider_parallax',
				[
					'label' => esc_html__( 'Parallax', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SECTION,
					'condition' => [
						'slide_type' => 'slide-type-parallax'
					],
				]
			);

			$this->add_control(
				'h_image_parallax',
				[
					'label' => esc_html__( 'Customize Image And Image Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_control(
				'bg_image_width',
				[
					'label' => esc_html__( 'Image Width', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'size' => '80',
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-slide-swiper .slide-type-parallax .featured-img img' => 'max-width: {{SIZE}}{{UNIT}}; width: 100%;',
					],
				]
			);

			$this->add_control(
				'bg_image_height',
				[
					'label' => esc_html__( 'Image Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'size' => '80',
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-slide-swiper .slide-type-parallax .featured-img img' => 'max-height: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}; object-fit: cover;',
					],
				]
			);

			$this->add_control(
				'horizontal_position_parallax_image',
				[
					'label' => esc_html__( 'Image Horizontal', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'parallax-h-left' => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-h-align-left',
						],
						'parallax-h-center' => [
							'title' => esc_html__( 'Center', 'themesflat-core' ),
							'icon' => 'eicon-h-align-center',
						],
						'parallax-h-right' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-h-align-right',
						],
					],
					'default' => 'parallax-h-right',
				]
			);

			$this->add_control(
				'vertical_position_parallax_image',
				[
					'label' => esc_html__( 'Image Vertical', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'parallax-v-top' => [
							'title' => esc_html__( 'Top', 'themesflat-core' ),
							'icon' => 'eicon-v-align-top',
						],
						'parallax-v-middle' => [
							'title' => esc_html__( 'Middle', 'themesflat-core' ),
							'icon' => 'eicon-v-align-middle',
						],
						'parallax-v-bottom' => [
							'title' => esc_html__( 'Bottom', 'themesflat-core' ),
							'icon' => 'eicon-v-align-bottom',
						],
					],
					'default' => 'parallax-v-middle',
				]
			);

			$this->add_control(
				'h_slide_parallax',
				[
					'label' => esc_html__( 'Slide Parallax', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'parallax_bg_image',
				[
					'label' => esc_html__( 'Slide Parallax For Image', 'themesflat-core' ),
					'description' => esc_html__( 'Short length slip parameter of Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
					],
					'default' => [
						'size' => -100,
					],
				]
			);

			$this->add_control(
				'parallax_title',
				[
					'label' => esc_html__( 'Slide Parallax For Title', 'themesflat-core' ),
					'description' => esc_html__( 'Short length slip parameter of Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
					],
					'default' => [
						'size' => -300,
					],
				]
			);

			$this->add_control(
				'parallax_sub_title',
				[
					'label' => esc_html__( 'Slide Parallax For Sub Title', 'themesflat-core' ),
					'description' => esc_html__( 'Short length slip parameter of Sub Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
					],
					'default' => [
						'size' => -300,
					],
				]
			);

			$this->add_control(
				'parallax_description',
				[
					'label' => esc_html__( 'Slide Parallax For Description', 'themesflat-core' ),
					'description' => esc_html__( 'Short length slip parameter of Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
					],
					'default' => [
						'size' => -300,
					],
				]
			);

			$this->add_control(
				'parallax_button',
				[
					'label' => esc_html__( 'Slide Parallax For Button', 'themesflat-core' ),
					'description' => esc_html__( 'Short length slip parameter of Button', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
					],
					'default' => [
						'size' => -300,
					],
				]
			);

			$this->end_controls_section();
		// /.End Slides Parallax

		// Start Slides Navigation 
			$this->start_controls_section(
				'section_slider_navigation',
				[
					'label' => esc_html__( 'Slides Navigation', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SECTION,
				]
			);
			$this->add_control(
				'navigation',
				[
					'label' => esc_html__( 'Navigation', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'both',
					'options' => [
						'both' => esc_html__( 'Arrows and Bullets', 'themesflat-core' ),
						'arrows' => esc_html__( 'Arrows', 'themesflat-core' ),
						'bullets' => esc_html__( 'Bullets', 'themesflat-core' ),
						'none' => esc_html__( 'None', 'themesflat-core' ),
					],
				]
			);			
			$this->end_controls_section();
		// /.End Slides Navigation

		// Start Arrow        
			$this->start_controls_section( 
				'section_arrow',
	            [
	                'label' => esc_html__('Arrow', 'themesflat-core'),
	                'condition' => [
						'navigation' => [ 'arrows', 'both' ],
					],
	            ]
	        );

	        $this->add_control(
				'mobile_hide_arrows',
				[
					'label' => esc_html__( 'Mobile Hide Arrows', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'themesflat-core' ),
					'label_off' => esc_html__( 'No', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

	        $this->add_control(
				'arrows_position',
				[
					'label' => esc_html__( 'Arrows Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'inside',
					'options' => [
						'inside' => esc_html__( 'Inside', 'themesflat-core' ),
						'outside' => esc_html__( 'Outside', 'themesflat-core' ),
					],
					'prefix_class' => 'elementor-arrows-position-',
					'condition' => [
						'navigation' => [ 'arrows', 'both' ],
					],
				]
			);

	        $this->add_control(
				'prev_icon',
				[
					'label' => esc_html__( 'Prev Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-chevron-left',
						'library' => 'fa-solid',
					],
					'recommended' => [
						'fa-solid' => [
							'angle-double-left',
							'angle-left',
							'chevron-left',
							'arrow-left',
						],
						'fa-regular' => [
							'arrow-alt-circle-left',
						],
					],
				]
			);

	        $this->add_control(
				'next_icon',
				[
					'label' => esc_html__( 'Next Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-chevron-right',
						'library' => 'fa-solid',
					],
					'recommended' => [
						'fa-solid' => [
							'angle-double-right',
							'angle-right',
							'chevron-right',
							'arrow-right',
						],
						'fa-regular' => [
							'arrow-alt-circle-right',
						],
					],
				]
			);

	        $this->add_responsive_control( 
	        	'arrow_fontsize',
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
						'size' => 30,
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-button-arrows' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control( 
				'w_size_arrow',
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
					'selectors' => [
						'{{WRAPPER}} .swiper-button-arrows' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control( 
				'h_size_arrow',
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
					'selectors' => [
						'{{WRAPPER}} .swiper-button-arrows' => 'height: {{SIZE}}{{UNIT}}; margin-top: calc( -{{SIZE}}{{UNIT}} / 2 )',
					],
				]
			);	

			$this->add_responsive_control( 
				'arrow_horizontal_position_prev',
				[
					'label' => esc_html__( 'Horizontal Position Previous', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -200,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control( 
				'arrow_horizontal_position_next',
				[
					'label' => esc_html__( 'Horizontal Position Next', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -200,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control( 
				'arrow_vertical_position',
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
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'arrow_tabs' );
				$this->start_controls_tab( 
						'arrow_normal_tab',
						[
							'label' => esc_html__( 'Normal', 'themesflat-core' ),						
						]
					);
					$this->add_control( 
						'arrow_color',
			            [
			                'label' => esc_html__( 'Color', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::COLOR,
			                'default' => '#00B0FC',
			                'selectors' => [
								'{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'color: {{VALUE}}',
							],
			            ]
			        );
			        $this->add_control( 
			        	'arrow_bg_color',
			            [
			                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::COLOR,
			                'default' => '',
			                'selectors' => [
								'{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'background-color: {{VALUE}};',
							],
			            ]
			        );	
			        $this->add_group_control( 
			        	\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'arrow_border',
							'label' => esc_html__( 'Border', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next',
						]
					);
					$this->add_responsive_control( 
						'arrow_border_radius',
			            [
			                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::DIMENSIONS,
			                'size_units' => [ 'px', '%', 'em' ],
			                'selectors' => [
			                    '{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );
		        $this->end_controls_tab();

		        $this->start_controls_tab( 
				    	'arrow_hover_tab',
						[
							'label' => esc_html__( 'Hover', 'themesflat-core' ),
						]
					);
			    	$this->add_control( 
			    		'arrow_color_hover',
			            [
			                'label' => esc_html__( 'Color', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::COLOR,
			                'default' => '',
			                'selectors' => [
								'{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover' => 'color: {{VALUE}}',
							],
			            ]
			        );
			        $this->add_control( 
			        	'arrow_hover_bg_color',
			            [
			                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::COLOR,
			                'default' => '',
			                'selectors' => [
								'{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover' => 'background-color: {{VALUE}};',
							],
			            ]
			        );
			        $this->add_group_control( 
			        	\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'arrow_border_hover',
							'label' => esc_html__( 'Border', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover',
						]
					);
					$this->add_responsive_control( 
						'arrow_border_radius_hover',
			            [
			                'label' => esc_html__( 'Border Radius Previous', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::DIMENSIONS,
			                'size_units' => [ 'px', '%', 'em' ],
			                'selectors' => [
			                    '{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );
	       		$this->end_controls_tab();
	        $this->end_controls_tabs();

	        $this->end_controls_section();
        // /.End Arrow

		// Start Bullets        
			$this->start_controls_section( 
				'section_bullets',
	            [
	                'label' => esc_html__('Bullets', 'themesflat-core'),
	                'condition' => [					
	                    'navigation' => ['both','bullets'],
	                ]
	            ]
	        ); 

	        $this->add_control(
				'bullets_type',
				[
					'label' => esc_html__( 'Bullets Type', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'bullets',
					'options' => [
						'bullets' => esc_html__( 'Bullets', 'themesflat-core' ),
						'fraction' => esc_html__( 'Fraction', 'themesflat-core' ),
						'progressbar' => esc_html__( 'Progress Bar', 'themesflat-core' ),
					],
					'condition' => [
						'navigation' => [ 'bullets', 'both' ],
					],
				]
			); 

	        $this->add_control(
				'bullets_position',
				[
					'label' => esc_html__( 'Bullets Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'inside',
					'options' => [
						'outside' => esc_html__( 'Outside', 'themesflat-core' ),
						'inside' => esc_html__( 'Inside', 'themesflat-core' ),
					],
					'prefix_class' => 'elementor-pagination-position-',
					'condition' => [
						'navigation' => [ 'bullets', 'both' ],
					],
				]
			);

			$this->add_control(
				'bullets_size',
				[
					'label' => esc_html__( 'Bullets Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 5,
							'max' => 50,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
						'{{WRAPPER}} .swiper-container-horizontal .swiper-pagination-progressbar' => 'height: {{SIZE}}{{UNIT}}',
						'{{WRAPPER}} .swiper-container-vertical .swiper-pagination-progressbar' => 'width: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'navigation' => [ 'bullets', 'both' ],
						'bullets_type!' => 'fraction',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'bullets_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .swiper-pagination-fraction .swiper-pagination-total',
					'condition' => [
						'navigation' => [ 'bullets', 'both' ],
						'bullets_type' => 'fraction',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'bullets_typography_active',
					'label' => esc_html__( 'Typography Active', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .swiper-pagination-fraction',
					'condition' => [
						'navigation' => [ 'bullets', 'both' ],
						'bullets_type' => 'fraction',
					],
				]
			);   

			$this->add_responsive_control( 
				'bullets_horizontal_position',
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
							'min' => -100,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-pagination' => 'left: {{SIZE}}{{UNIT}};display: inline-block;width: auto;transform: translateX(-50%);',
					],					
				]
			);

			$this->add_responsive_control( 
				'bullets_vertical_position',
				[
					'label' => esc_html__( 'Vertical Offset', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-pagination' => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'bullets_tabs' );
				$this->start_controls_tab( 
						'bullets_normal_tab',
						[
							'label' => esc_html__( 'Normal', 'themesflat-core' ),						
						]
					);
					$this->add_control( 
						'bullets_color',
			            [
			                'label' => esc_html__( 'Color', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::COLOR,
			                'default' => '#FFFFFF99',
			                'selectors' => [
								'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}};opacity: 1;',
								'{{WRAPPER}} .swiper-pagination-fraction' => 'color: {{VALUE}};',
								'{{WRAPPER}} .swiper-pagination-progressbar' => 'background-color: {{VALUE}};',
							],
			            ]
			        );
			        $this->add_group_control( 
			        	\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'bullets_border',
							'label' => esc_html__( 'Border', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet',
							'condition' => [
								'navigation' => [ 'bullets', 'both' ],
								'bullets_type!' => 'fraction',
							],
						]
					);
					$this->add_responsive_control( 
						'bullets_border_radius',
			            [
			                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::DIMENSIONS,
			                'size_units' => [ 'px', '%', 'em' ],
			                'selectors' => [
			                    '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			                'condition' => [
								'navigation' => [ 'bullets', 'both' ],
								'bullets_type!' => 'fraction',
							],
			            ]
			        );
			    $this->end_controls_tab();

		        $this->start_controls_tab( 
			        	'bullets_hover_tab',
						[
							'label' => esc_html__( 'Active', 'themesflat-core' ),
						]
					);
		        	$this->add_control( 
		        		'bullets_hover_color',
			            [
			                'label' => esc_html__( 'Color', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::COLOR,
			                'default' => '#FFFFFF',
			                'selectors' => [
								'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .swiper-pagination-fraction .swiper-pagination-current' => 'color: {{VALUE}};',
								'{{WRAPPER}} .swiper-pagination-progressbar .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}};',
							],
			            ]
			        );
		        	$this->add_group_control( 
		        		\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'bullets_border_hover',
							'label' => esc_html__( 'Border', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active',
							'condition' => [
								'navigation' => [ 'bullets', 'both' ],
								'bullets_type!' => 'fraction',
							],
						]
					);
					$this->add_responsive_control( 
						'bullets_border_radius_hover',
			            [
			                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
			                'type' => \Elementor\Controls_Manager::DIMENSIONS,
			                'size_units' => [ 'px', '%', 'em' ],
			                'selectors' => [
			                    '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			                'condition' => [
								'navigation' => [ 'bullets', 'both' ],
								'bullets_type!' => 'fraction',
							],
			            ]
			        );
				$this->end_controls_tab();
		    $this->end_controls_tabs();	

	        $this->end_controls_section();
        // /.End Bullets

	    // Start Thumbs Gallery        
			$this->start_controls_section( 
				'section_thumbs_gallery',
	            [
	                'label' => esc_html__('Thumbs Gallery', 'themesflat-core'),
	                'condition' => [
						'show_thumbs_gallery' => 'yes',
					],
	            ]
	        );

	        $this->add_responsive_control(
				'slides_width_thumbs',
				[
					'label' => esc_html__( 'Width Thumbs Gallery', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'%' => [
							'min' => 10,
							'max' => 100,
						],
						'px' => [
							'min' => 10,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .gallery-thumbs .swiper-slide' => 'max-width: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}} !important;',
					],
					'condition' => [
						'show_thumbs_gallery' => 'yes',
					],					
				]
			);

			$this->add_responsive_control(
				'slides_height_thumbs',
				[
					'label' => esc_html__( 'Height Thumbs Gallery', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'vh', 'em' ],
					'range' => [
						'px' => [
							'min' => 10,
							'max' => 500,
						],
						'vh' => [
							'min' => 10,
							'max' => 100,
						],
					],
					'default' => [
						'size' => 100,
					],					
					'selectors' => [
						'{{WRAPPER}} .gallery-thumbs .swiper-slide' => 'height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'show_thumbs_gallery' => 'yes',
					],					
				]
			);

			$this->add_control(
			'slides_thumbs_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'flex-start' => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-h-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-core' ),
							'icon' => 'eicon-h-align-center',
						],
						'flex-end' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-h-align-right',
						],
					],
					'default' => 'center',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .tf-slide-swiper .gallery-thumbs > .swiper-wrapper' => 'display: flex; justify-content: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'slides_thumbs_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-slide-swiper .gallery-thumbs' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	        $this->end_controls_section();
        // /.End Thumbs Gallery

		// Start Slides Style
			$this->start_controls_section(
				'section_style_slides',
				[
					'label' => esc_html__( 'Slides', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'content_max_width',
				[
					'label' => esc_html__( 'Content Width', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' => [ '%', 'px' ],
					'default' => [
						'size' => '70',
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-contents' => 'max-width: {{SIZE}}{{UNIT}};width: 100%;',
					],
				]
			);

			$this->add_responsive_control(
				'slides_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'default' => [
						'top' => '50',
						'right' => '50',
						'bottom' => '50',
						'left' => '50',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-inner .swiper-slide-contents' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);			

			$this->add_responsive_control(
				'slides_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-inner .swiper-slide-contents' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'slides_background',
					'label' => esc_html__( 'Background', 'themesflat-core' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .swiper-slide-inner .swiper-slide-contents',
				]
			);

			$this->add_control(
				'slides_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-inner .swiper-slide-contents' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'slides_horizontal_position',
				[
					'label' => esc_html__( 'Content Horizontal Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'default' => 'center',
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-h-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-core' ),
							'icon' => 'eicon-h-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-h-align-right',
						],
					],
					'prefix_class' => 'tf-swiper-slide-h-position-',
				]
			);

			$this->add_control(
				'slides_vertical_position',
				[
					'label' => esc_html__( 'Content Vertical Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'default' => 'middle',
					'options' => [
						'top' => [
							'title' => esc_html__( 'Top', 'themesflat-core' ),
							'icon' => 'eicon-v-align-top',
						],
						'middle' => [
							'title' => esc_html__( 'Middle', 'themesflat-core' ),
							'icon' => 'eicon-v-align-middle',
						],
						'bottom' => [
							'title' => esc_html__( 'Bottom', 'themesflat-core' ),
							'icon' => 'eicon-v-align-bottom',
						],
					],
					'prefix_class' => 'tf-swiper-slide-v-position-',
				]
			);

			$this->add_control(
				'slides_text_align',
				[
					'label' => esc_html__( 'Text Align', 'themesflat-core' ),
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
					'default' => 'center',
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-inner' => 'text-align: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'text_shadow',
					'selector' => '{{WRAPPER}} .swiper-slide-contents',
				]
			);

			$this->end_controls_section();
		// /.End Slides Style

		// Start Title Style
			$this->start_controls_section(
				'section_style_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'heading_spacing',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => '30',
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-inner .slide-heading:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'heading_color',
				[
					'label' => esc_html__( 'Text Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .slide-heading' => 'color: {{VALUE}}',

					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Roboto',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '35',
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
				    ],
					'selector' => '{{WRAPPER}} .slide-heading',
				]
			);

			$this->end_controls_section();
		// /.End Title Style

		// Start Sub Title Style
			$this->start_controls_section(
				'section_style_sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'subheading_spacing',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => '30',
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-inner .slide-sub-heading:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'subheading_color',
				[
					'label' => esc_html__( 'Text Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .slide-sub-heading' => 'color: {{VALUE}}',

					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'subheading_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Roboto',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '35',
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
				    ],
					'selector' => '{{WRAPPER}} .slide-sub-heading',
				]
			);

			$this->end_controls_section();
		// /.End Title Style

		// Start Description Style
			$this->start_controls_section(
				'section_style_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'description_spacing',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => '30',
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-inner .slide-description:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Text Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .slide-description' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Roboto',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '17',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '400',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1.4',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .slide-description',
				]
			);

			$this->end_controls_section();
		// /.End Description Style

		// Start Button Style
			$this->start_controls_section(
				'section_style_button',
				[
					'label' => esc_html__( 'Button', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'button_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'default' => [
						'top' => '12',
						'right' => '24',
						'bottom' => '12',
						'left' => '24',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Roboto',
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
				                'size' => '1',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .swiper-slide-button',
				]
			);

			$this->add_control(
				'button_border_width',
				[
					'label' => esc_html__( 'Border Width', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 20,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => '2',
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-button' => 'border-width: {{SIZE}}{{UNIT}};border-style: solid;',
					],
				]
			);

			$this->add_control(
				'button_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => '3',
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-button' => 'border-radius: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'button_tabs' );

			$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'themesflat-core' ) ] );

			$this->add_control(
				'button_text_color',
				[
					'label' => esc_html__( 'Text Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-button' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'button_background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-button' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'button_border_color',
				[
					'label' => esc_html__( 'Border Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-button' => 'border-color: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab( 'hover', [ 'label' => esc_html__( 'Hover', 'themesflat-core' ) ] );

			$this->add_control(
				'button_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-button:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'button_hover_background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-button:hover' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'button_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .swiper-slide-button:hover' => 'border-color: {{VALUE}};',
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

		if ( empty( $settings['slides'] ) ) {
			return;
		}

		$animated = $content_animation = '';
		if ($settings['content_animation'] != '') {
			$animated = 'animated';
			$content_animation = $animated.' '.$settings['content_animation'];
		}

		$pause_on_interaction = 'no';
		if ($settings['pause_on_interaction'] == 'yes') {
			$pause_on_interaction = 'yes';
		}

		$pause_on_hover = 'no';
		if ($settings['pause_on_hover'] == 'yes') {
			$pause_on_hover = 'yes';
		}

		$autoplay = 'no';
		if ($settings['autoplay'] == 'yes') {
			$autoplay = 'yes';
		}

		$infinite_loop = 'no';
		if ($settings['infinite'] == 'yes') {
			$infinite_loop = 'yes';
		}

		$show_thumbs_gallery = 'no';
		if ($settings['show_thumbs_gallery'] == 'yes') {
			$show_thumbs_gallery = 'yes';
		}

		$slides_content_container = '';
		if ($settings['slides_content_container'] == 'yes') {
			$slides_content_container = 'container';
		}

		$parallax_bg_image = $parallax_title = $parallax_sub_title = $parallax_description = $parallax_button = '';
		if ($settings['slide_type'] == 'slide-type-parallax') {
			$parallax_bg_image = 'data-swiper-parallax="'.$settings['parallax_bg_image']['size'].'%"';
			$parallax_title = 'data-swiper-parallax="'.$settings['parallax_title']['size'].'%"';
			$parallax_sub_title = 'data-swiper-parallax="'.$settings['parallax_sub_title']['size'].'%"';
			$parallax_description = 'data-swiper-parallax="'.$settings['parallax_description']['size'].'%"';
			$parallax_button = 'data-swiper-parallax="'.$settings['parallax_button']['size'].'%"';
		}

		$this->add_render_attribute( 'tf_slide_swiper', [ 'id' => "tf-slide-swiper-{$this->get_id()}", 'class' => [ 'tf-slide-swiper', $settings['slide_type'], $settings['horizontal_position_parallax_image'], $settings['vertical_position_parallax_image'], 'mobile-hide-arrows-'.$settings['mobile_hide_arrows'] ], 'data-tabid' => $this->get_id(), 'data-animation' => $content_animation, 'data-effect' => $settings['transition'], 'data-transition_speed' => $settings['transition_speed'], 'data-autoplay' => $autoplay, 'data-pause_on_hover' => $pause_on_hover, 'data-pause_on_interaction' => $pause_on_interaction, 'data-autoplay_speed' => $settings['autoplay_speed'], 'data-infinite_loop' => $infinite_loop, 'data-bullets_type' => $settings['bullets_type'], 'data-slide_type' => $settings['slide_type'], 'data-direction' => $settings['direction'], 'data-show_thumbs_gallery' => $show_thumbs_gallery ] );

		$this->add_render_attribute( 'button', 'class', [ 'slide-button', 'swiper-slide-button' ] );		

		$slides = [];
		$slide_count = 0;

		foreach ( $settings['slides'] as $slide ) {
			$slide_html = '';
			$btn_attributes = '';
			$slide_attributes = '';
			$slide_element = 'div';
			$btn_element = 'div';

			if ( ! empty( $slide['link']['url'] ) ) {
				$this->add_link_attributes( 'slide_link' . $slide_count, $slide['link'] );

				if ( 'button' === $slide['link_click'] ) {
					$btn_element = 'a';
					$btn_attributes = $this->get_render_attribute_string( 'slide_link' . $slide_count );
				} else {
					$slide_element = 'div';
					$slide_attributes = $this->get_render_attribute_string( 'slide_link' . $slide_count );
				}
			}

			$slide_html .= '<' . $slide_element . ' class="swiper-slide-inner '.$slides_content_container.'" ' . $slide_attributes . '>';

			$slide_html .= '<div class="swiper-slide-contents">';

			if ( $slide['heading'] ) {
				$slide_html .= '<div class="slide-heading" '.$parallax_title.'>' . $slide['heading'] . '</div>';
			}

			if ( $slide['sub_heading'] ) {
				$slide_html .= '<div class="slide-sub-heading" '.$parallax_sub_title.'>' . $slide['sub_heading'] . '</div>';
			}

			if ( $slide['description'] ) {
				$slide_html .= '<div class="slide-description" '.$parallax_description.'>' . $slide['description'] . '</div>';
			}

			if ( $slide['button_text'] ) {
				$slide_html .= '<' . $btn_element . ' ' . $btn_attributes . ' ' . $this->get_render_attribute_string( 'button' ) . ' '.$parallax_button.'>' . $slide['button_text'] . '</' . $btn_element . '>';
			}

			$slide_html .= '</div></' . $slide_element . '>';

			if ( 'yes' === $slide['background_overlay'] ) {
				$slide_html = '<div class="slide-background-overlay"></div>' . $slide_html;
			}

			$ken_class = '';

			if ( $slide['background_ken_burns'] ) {
				$ken_class = ' elementor-ken-burns elementor-ken-burns--' . $slide['zoom_direction'];
			}
			
			if ($settings['slide_type'] == 'slide-type-parallax') {
				$slide_html = '<div class="featured-img"><img alt="image-parallax" '.$parallax_bg_image.' src="'.$slide["background_image"]["url"].'"></div>' . $slide_html;
			}else{
				$slide_html = '<div class="swiper-slide-bg' . $ken_class . '"></div>' . $slide_html;
			}

			$slides[] = '<div class="elementor-repeater-item-' . $slide['_id'] . ' swiper-slide">' . $slide_html . '</div>';
			$slide_count++;
		}

		$show_bullets = ( in_array( $settings['navigation'], [ 'bullets', 'both' ] ) );
		$show_arrows = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );

		$slides_count = count( $settings['slides'] );


		/* Thumbs Gallery */
		$slides_thumbs = [];
		foreach ( $settings['slides'] as $slide_thumb ) {
			$slide_thumbs_html = '';
			if ( $slide_thumb['description_thumbs'] ) {
				$slide_thumbs_html .= '<div class="swiper-slide-thumb-bg"></div><div class="thumb-slide-inner"><div class="slide-thumb-description">' . $slide_thumb['description_thumbs'] . '</div></div>';
			}
			$slides_thumbs[] = '<div class="elementor-repeater-item-' . $slide_thumb['_id'] . ' swiper-slide">' . $slide_thumbs_html . '</div>';
		}

		?>
		<div <?php echo $this->get_render_attribute_string('tf_slide_swiper'); ?>>
			<div class="wrap-swiper-container">
				<!-- Slider container -->
				<div class="swiper-container swiper-container-primary <?php echo esc_attr($settings['slide_type']); ?>">
					<!-- Swiper wrapper -->
					<div class="swiper-wrapper">
						<!-- Slides -->
						<?php echo implode( '', $slides ); ?>
					</div>

					<?php if ( 1 < $slides_count ) : ?>
							<!-- Pagination -->
						<?php if ( $show_bullets ) : ?>
							<div class="swiper-pagination"></div>
						<?php endif; ?>
						
						<?php if ( $show_arrows ) : ?>
							<!-- Navigation buttons -->
							<div class="swiper-button-prev swiper-button-arrows elementor-swiper-button-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['prev_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
							<div class="swiper-button-next swiper-button-arrows elementor-swiper-button-next"><?php \Elementor\Icons_Manager::render_icon( $settings['next_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>

			<?php if($settings['show_thumbs_gallery'] == 'yes'): ?>
			<div class="gallery-thumbs" data-slides_number_thumb="<?php esc_attr_e($slides_count); ?>">
			    <div class="swiper-wrapper">
					<?php echo implode( '', $slides_thumbs ); ?>					
			    </div>
			</div>
			<?php endif; ?>

        </div>

		<?php	
		
	}
}