<?php
class TFStep_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-step';
    }
    
    public function get_title() {
        return esc_html__( 'TF Step', 'themesflat-core' );
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
				'number_count',
				[
					'label' => esc_html__( 'Number Step', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( '01', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Benefited For Digital Marketing Solution', 'themesflat-core' ),
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
				'h_general',
				[
					'label' => esc_html__( 'General', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_responsive_control( 'padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-step' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );		
			
			$this->add_responsive_control( 
				'margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .tf-step' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_box_shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step',
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step',
				]
			);
			$this->add_responsive_control( 
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-step' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'bg_content',
				[
					'label' => esc_html__( 'Background', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step' => 'background: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'bg_content_hover',
				[
					'label' => esc_html__( 'Background Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step:hover' => 'background: {{VALUE}}',
					],
				]
			);


	        $this->add_control(
				'h_number',
				[
					'label' => esc_html__( 'Number', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control( 
	        	'wrap_icon_size',
				[
					'label' => esc_html__( 'Size Over Number', 'themesflat-core' ),
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
						'{{WRAPPER}} .tf-step .number-count' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'number_bg_color',
				[
					'label' => esc_html__( 'Background Over Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step .number-count' => 'background: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'number_bg_color_hover',
				[
					'label' => esc_html__( 'Background Over Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step:hover .number-count' => 'background: {{VALUE}}',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_box_shadow::get_type(),
				[
					'name' => 'number_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step .number-count',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_box_shadow::get_type(),
				[
					'name' => 'number_box_shadow_hover',
					'label' => esc_html__( 'Box Shadow Hover', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step:hover .number-count',
				]
			);

			$this->add_control(
				'h_inner_number',
				[
					'label' => esc_html__( 'Inner Number', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'number_typography',
					'label' => esc_html__( 'Inner Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-step .number-count .number',
				]
			);

			$this->add_control(
				'number_color',
				[
					'label' => esc_html__( 'Inner Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step .number-count .number' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'number_color_hover',
				[
					'label' => esc_html__( ' Inner Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-step:hover .number-count .number' => 'color: {{VALUE}}',
					],
				]
			);



			$this->end_controls_section();
		// /.End Style 
	}	

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		

		$this->add_render_attribute( 'tf_step', ['id' => "tf-step-{$this->get_id()}", 'class' => ['tf-step'], 'data-tabid' => $this->get_id() ] );
		
        ?>
        <div <?php echo $this->get_render_attribute_string('tf_step') ?>>
			<div class="number-count">
				<div class="number">
					<?php echo esc_attr( $settings['number_count'] ); ?>
				</div>
			</div>
			<h3><?php echo esc_attr( $settings['title'] ); ?></h3>
	    </div>
        <?php 		
	}

}