<?php 
$get_id_post_thumbnail = get_post_thumbnail_id();
$featured_image = sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )); 
 ?>
<div class="item">
    <div class="entry blog-post"> 
        <?php if ( $settings['show_image'] == 'yes' ): ?>                                    
        <div class="featured-post">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
                <?php echo sprintf('%s',$featured_image); ?>
            </a>            
            <?php if ( $settings['show_meta'] == 'yes' ): ?> 
                <div class="post-category"><?php echo get_the_category_list(''); ?></div>
            <?php endif; ?> 
            <div class="tf-button-container">
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                    <?php echo \Elementor\Addon_Elementor_Icon_manager_graingrow::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="content">

        <?php if ( $settings['show_meta'] == 'yes' ): ?>                                          
            <div class="post-meta">
                <?php if ( $settings['show_meta_user'] == 'yes' ): ?>
                <span class="post-meta-inner">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class='icon-graingrow-grow7'></i>  <?php echo esc_html__('By ', 'themesflat-core').'<span>'.get_the_author().'</span>'; ?></a>
                </span>
                <?php endif; ?>
                <?php if ( $settings['show_meta_comment'] == 'yes' ): ?>
                <span class="post-meta-inner">
                    <i class='icon-graingrow-grow8'></i><?php echo comments_popup_link( esc_html__( '0 Comments ', 'tf-addon-for-elementer' ), esc_html__(  '1 Comment', 'tf-addon-for-elementer' ), esc_html__( '% Comments', 'tf-addon-for-elementer' ) ); ?>
                </span>
                <?php endif; ?>
                <?php if ( $settings['show_meta_date'] == 'yes' ): ?>
                <?php
                $archive_year  = get_the_time('Y'); 
                $archive_month = get_the_time('m'); 
                $archive_day   = get_the_time('d');
                ?>
               <span class="post-meta-time">
                    <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>">
                      <?php echo get_the_date(); ?></a>
                </span>
                <?php endif; ?>
            </div>                                                  
             <?php endif; ?>
             
            <?php if ( $settings['show_title'] == 'yes' ): ?>
                <h2 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h2>
            <?php endif; ?>

            <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
                <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
            <?php endif; ?>  

            <?php if ( $settings['show_button'] == 'yes' && $settings['button_text'] != '' ): ?>
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