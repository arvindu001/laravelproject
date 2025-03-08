<div class="item">				
    <div class="services-post services-post-<?php the_ID(); ?>" >
        
        <div class="content"> 
            <?php 
                $icon_1 = \Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( themesflat_get_opt_elementor('services_post_icon') );
                $icon_post_1 = '<div class="post-icon3"><div class="icon-3" >'.$icon_1.'</div></div>';
            ?>
            <?php echo $icon_post_1; ?>
            <h4 class="title">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h4>

            <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
        </div>
        <div class="features-image">
            <a href="<?php echo get_the_permalink(); ?>">
            <?php 
            $get_id_post_thumbnail = get_post_thumbnail_id();
            echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
            ?>
            </a>
            <?php if ( $settings['show_button'] == 'yes' ): ?>
            <div class="tf-button-container">
            <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                <?php echo \Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
            </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>