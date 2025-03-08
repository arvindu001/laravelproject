<?php 
add_filter( 'elementor/icons_manager/additional_tabs', 'themesflat_iconpicker_register' );

function themesflat_iconpicker_register( $icons = array() ) {
	
	$icons['theme_icon'] = array(
		'name'          => 'theme_icon',
		'label'         => esc_html__( 'Theme Icons', 'themesflat-elementor' ),
		'labelIcon'     => 'icon-graingrow-menu',
		'prefix'        => '',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-graingrow.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/graingrow_fonts_default.json',
		'ver'           => '1.0.0',
	);

	$icons['graingrow_icon'] = array(
		'name'          => 'graingrow_icon',
		'label'         => esc_html__( 'graingrow Icons', 'themesflat-elementor' ),
		'labelIcon'     => 'icon-graingrow-grow18',
		'prefix'        => '',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-graingrow.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/graingrow_fonts_extend.json',
		'ver'           => '1.0.0',
	);

	$icons['farm_icon_extend'] = array(
		'name'          => 'farm_icon_extend',
		'label'         => esc_html__( 'farm Icons', 'themesflat-elementor' ),
		'labelIcon'     => 'icon-farm-extend-farm1',
		'prefix'        => '',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-farm.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/farm_icon_extend.json',
		'ver'           => '1.0.0',
	);

	return $icons;
}