/*
* Ajax Script
*/

jQuery(document).ready(function($){
	 $(document.body).on('change', 'select[name="price_order"]', function(e) {
		    e.preventDefault();

	        var price_order 	= $(this).val(), 
	        	location 		= $('select#location').val(),
	        	type 			= $('select#propertytype').val(),
	        	price 			= $('select#price').val();

	        $.ajax({
	            type: "POST",
	            url: the_ajax_script.ajaxurl,
	            data: {
	                action		: "property_list_order",
	                price_order	: price_order,
	                location	: location,
	                type 		: type,
	                price 		: price
	            },
	            success: function(data) {
	                console.log(data);
	            }
	        });
	    });
}); //End Document Ready