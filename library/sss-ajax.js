jQuery(document).ready( function($) {
	$("#buyer").keyup(function() {
		var query = $(this).val();
		var data = {
			action: 'buyer_data',
            value: query
		};
		// the_ajax_script.ajaxurl is a variable that will contain the url to the ajax processing file
	 	$.post(the_ajax_script.ajaxurl, data, function(response) {
			$("#buyer-list").fadeIn();
			var buyer_data = JSON.parse(response);
			var count = buyer_data.length;
			var buyer_response = "<ul style='list-style: none;padding: 5px;cursor: pointer;'>";
			for(i=0;i < count;i++){
			buyer_response+= "<li>"+buyer_data[i]+"</li>";
			}
			buyer_response+= "</ul>";
			$("#buyer-list").html(buyer_response);
	 	});
	 	return false;
	});
});