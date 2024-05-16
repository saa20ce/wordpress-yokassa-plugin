<?php
/**
 * Plugin Name: Yokassa Payment Plugin
 * Description: Оплата заказа с помощью ЮКасса
 * Version: 1.0
 * Author: gutgik & PetrMiller
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( file_exists( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' ) ) {
    require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-payment.php';
require_once plugin_dir_path( __FILE__ ) . 'public/class-to-pay-public.php';

function run_my_yokassa_payment_plugin() {
	$plugin_public = new ToPayPublic();
	$plugin_public->init();
}

run_my_yokassa_payment_plugin();


add_action('rest_api_init', function () {
    register_rest_route('myyokassaplugin/v1', '/payment/', array(
        'methods' => 'GET',
        'callback' => 'my_plugin_payment_function',
    ));
});

function my_plugin_payment_function(WP_REST_Request $request) {
    require_once plugin_dir_path(__FILE__) . 'includes/class-payment.php';
    $payment_instance = new Payment();
    $results = $payment_instance->to_pay();
    return new WP_REST_Response($results, 200);
}