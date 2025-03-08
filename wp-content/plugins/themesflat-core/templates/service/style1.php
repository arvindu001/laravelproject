<div class="item">				
    <div class="services-post services-post-<?php the_ID(); ?>">
        <div class="features-image">
            <a href="<?php echo get_the_permalink(); ?>">
	            <?php 
	            $get_id_post_thumbnail = get_post_thumbnail_id();
				echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
	            ?>
	        </a>
        </div>
        <div class="content"> 
            <div class="meta-category"><?php echo the_terms( get_the_ID(), 'services_category', '', ' , ', '' ); ?></div>
            <h4 class="title">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h4>

            <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
            <?php if ( $settings['show_button'] == 'yes' ): ?>
            <div class="tf-button-container">
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button-icon">
                    <?php echo \Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                </a>
            </div> 
            <?php endif; ?>
        </div>
    </div>
</div>