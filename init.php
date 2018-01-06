<?php
/*
Plugin Name: SSS
Description: Use shortcode [sss_form] to display form on page.
Version: 1
Author: Karthick
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit('Cheating uh!');
}

add_action('admin_menu','management_menu');
function management_menu(){
	add_menu_page('SSS','SSS','manage_options','sss_list','sss_list');
    add_submenu_page('null', 'DETAILS','DETAILS','manage_options','sss_details','sss_details');
}

define('ROOT_DIR',plugin_dir_path(__FILE__));

require_once (ROOT_DIR.'sss_list.php');
require_once (ROOT_DIR.'sss_details.php');

/* frontEnd form */

function frondendForm(){
    include(ROOT_DIR.'frontend_form.php');
}

add_shortcode('sss_form','frondendForm');

/* sss table */

function sss_table(){
    global $wpdb;
    $table_name = $wpdb -> prefix. 'sss';
    $charset_collate = $wpdb -> get_charset_collate();

    $sql = "CREATE TABLE $table_name (id int (5) NOT NULL AUTO_INCREMENT, sender VARCHAR (150) NOT NULL,  dated VARCHAR (15) NOT NULL,  invoiceno VARCHAR (15) NOT NULL,  deliverynote VARCHAR (150) NOT NULL,  paymentmode VARCHAR (50) NOT NULL, supplierref VARCHAR (50) NOT NULL, otherref VARCHAR (50) NOT NULL,  buyer VARCHAR (150) NOT NULL,  buyersorder VARCHAR (50) NOT NULL,  buyersdated VARCHAR (50) NOT NULL,  despatchno VARCHAR (50) NOT NULL, deliverydate VARCHAR (50) NOT NULL,despatchedthrough VARCHAR (50) NOT NULL, destination VARCHAR (50) NOT NULL, terms VARCHAR (150) NOT NULL, description VARCHAR (150) NOT NULL, hsn VARCHAR (150) NOT NULL, qty VARCHAR (150) NOT NULL, rate VARCHAR (150) NOT NULL,  total FLOAT (20) NOT NULL,  taxcgst FLOAT (20) NOT NULL,  cgstamount FLOAT (20) NOT NULL,  taxsgst FLOAT (20) NOT NULL,sgstamount FLOAT (20) NOT NULL, taxigst FLOAT (20) NOT NULL,  igstamount FLOAT (20) NOT NULL,  totaltax FLOAT (20) NOT NULL,  totalround INT (20) NOT NULL,  amountwords VARCHAR (150) NOT NULL, timeStamp TIMESTAMP(6) NOT NULL , PRIMARY KEY(id))$charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);



}

register_activation_hook(__FILE__, 'sss_table');

/* enqueue script */

function sss_script() {
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'sss_script');
