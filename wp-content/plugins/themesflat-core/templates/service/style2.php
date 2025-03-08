<div class="item">				
    <div class="services-post services-post-<?php the_ID(); ?>" >
        <?php 
            $icon_1 = \Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( themesflat_get_opt_elementor('services_post_icon') );
            $icon_post_1 = '<div class="post-icon"><div class="icon-1" >'.$icon_1.'</div></div>';
        ?>
        <?php echo $icon_post_1; ?>
        <div class="content"> 
            <h4 class="title">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h4>

            <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
            <?php if ( $settings['show_button'] == 'yes' ): ?>
            <div class="tf-button-container">
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                    <span><?php echo esc_attr( $settings['button_text'] ); ?></span>
                    <?php echo \Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>