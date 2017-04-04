/* Add here all your JS customizations */


$(document).on("submit", "#recover", function() { 
   $.ajax({ 
       data: $(this).serialize(), 
        type: $(this).attr('method'), 
        url: $(this).attr('action'), 
        success: function(response) { 
           
		    $('#error').html(response);	
			
        }
    });
    return false;
});
