<?php

defined( 'ABSPATH' ) || exit;

/**
 * Adds this module's "One Brand in Cart" section to the shared "CartRules" tab.
 */

add_filter( 'woocommerce_get_sections_cartrules', 'cartrules_obic_add_settings_section' );
add_filter( 'woocommerce_get_settings_cartrules', 'cartrules_obic_settings_fields', 10, 2 );

function cartrules_obic_add_settings_section( $sections ) {
	$sections['obic'] = __( 'One Brand in Cart', 'cartrules-one-brand-in-cart-for-woocommerce' );

	return $sections;
}

function cartrules_obic_settings_fields( $settings, $section_id ) {
	if ( 'obic' !== $section_id ) {
		return $settings;
	}

	return array(
		array(
			'title' => __( 'One Brand in Cart', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'type'  => 'title',
			'desc'  => __( 'Prevent customers from mixing products from different brands in the same cart.', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'id'    => 'cartrules_obic_settings_title',
		),
		array(
			'title'   => __( 'Enable restriction', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'desc'    => __( 'Only allow products from one brand in the cart at a time', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'id'      => 'cartrules_obic_enabled',
			'default' => 'no',
			'type'    => 'checkbox',
		),
		array(
			'title'   => __( 'When a different brand is added', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'desc'    => __( 'Choose what happens when a customer tries to add a product from a different brand', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'id'      => 'cartrules_obic_mode',
			'default' => 'deny',
			'type'    => 'select',
			'class'   => 'wc-enhanced-select',
			'options' => array(
				'deny'    => __( 'Block the new product and show an error', 'cartrules-one-brand-in-cart-for-woocommerce' ),
				'replace' => __( 'Empty the cart first, then add the new product', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			),
		),
		array(
			'title'    => __( 'Blocked message', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'desc_tip' => __( 'Shown when a product is blocked. Use {brand} for the brand already in the cart.', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'id'       => 'cartrules_obic_deny_message',
			'default'  => __( 'You already have products from "{brand}" in your cart. Please remove them first, or complete that order separately.', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'type'     => 'textarea',
			'css'      => 'width:100%; height: 75px;',
		),
		array(
			'title'    => __( 'Replaced message', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'desc_tip' => __( 'Shown when the cart is emptied and replaced. Use {brand} for the brand that was removed.', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'id'       => 'cartrules_obic_replace_message',
			'default'  => __( 'Your cart contained products from "{brand}", so we replaced them with your new selection.', 'cartrules-one-brand-in-cart-for-woocommerce' ),
			'type'     => 'textarea',
			'css'      => 'width:100%; height: 75px;',
		),
		array(
			'type' => 'sectionend',
			'id'   => 'cartrules_obic_settings_end',
		),
	);
}
