<?php 

function text_ajax_process_request() {
	// first check if data is being sent and that it is the data we want
  	if ( isset( $_POST["value"] ) && !empty($_POST["value"]) ) {
		// now set our response var equal to that of the POST var (this will need to be sanitized based on what you're doing with with it)
		$buyer_value = $_POST["value"];
		// send the response back to the front end

		global $wpdb;
		$buyer_datas = $wpdb->get_results( "SELECT buyer FROM ".$wpdb->prefix."sss WHERE buyer LIKE '%". $buyer_value ."%'" );
		$buyer_count = count($buyer_datas);
		if ($buyer_count > 0){
        foreach ($buyer_datas  as $key => $buyer_data){
			$buyer[]= $buyer_data->buyer;
		}
			$output = $buyer;
		}else{
			$output[] = "No existing buyer found";
		}
	}else{
		$output= "";
	}
		echo json_encode($output);
		die();
}
add_action('wp_ajax_buyer_data', 'text_ajax_process_request');
add_action('wp_ajax_nopriv_buyer_data', 'text_ajax_process_request');
