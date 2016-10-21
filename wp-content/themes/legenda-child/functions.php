<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
//
// Your code goes below
//


/* 결제 청구주소 입력폼 삭제 */
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
unset($fields['billing']['billing_last_name']);  // 성 제거
unset($fields['billing']['billing_company']);    // 회사 제거
unset($fields['billing']['billing_city']);       // 도시 제거
unset($fields['billing']['billing_country']);    // 국가 제거
unset($fields['billing']['billing_state']);      // 주 제거

unset($fields['shipping']['shipping_last_name']);  // 성 제거
unset($fields['shipping']['shipping_company']);    // 회사 제거
unset($fields['shipping']['shipping_city']);       // 도시 제거
unset($fields['shipping']['shipping_country']);    // 국가 제거
unset($fields['shipping']['shipping_state']);      // 주 제거

$fields['shipping']['shipping_email'] = array(
	'label'     => __('Email Address', 'woocommerce'),
	'placeholder'   => _x('이메일 주소 입력', 'placeholder', 'woocommerce'),
	'required'  => true,
	'class'     => array('form-row-wide'),
	'clear'     => true
	);
$fields['shipping']['shipping_phone'] = array(
	'label'     => __('전화번호', 'woocommerce'),
	'placeholder'   => _x('전화번호 입력', 'placeholder', 'woocommerce'),
	'required'  => true,
	'class'     => array('form-row-wide'),
	'clear'     => true
	);
return $fields;
}
