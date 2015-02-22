$("[data-hide]").on("click", function(){
       $("." + $(this).attr("data-hide")).hide();
         //$(this).closest("." + $(this).attr("data-hide")).hide();
       
    });
    
    
 $('.payment-options input').on('change', function() {
                                    $('.payment-options input').not(this).prop('checked', false);  
                                });
 $('.checkout-options input').on('change', function() {
                                    $('.checkout-options input').not(this).prop('checked', false);  
                                });