(function($) {
    "use strict";

    var initProductQty = function(){
      $('.product-qty').each(function(){
        var $el_product = $(this);
        $el_product.find('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($el_product.find('#quantity').val());
            $el_product.find('#quantity').val(quantity + 1);
        });

        $el_product.find('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($el_product.find('#quantity').val());
            if(quantity>0){
              $el_product.find('#quantity').val(quantity - 1);
            }
        });
      });
    }

    $(document).ready(function() {
      initProductQty();
      
      // Global Swipers for simple components
      var testimonialSwiper = new Swiper(".testimonial-swiper", {
        loop: true,
        navigation: {
          nextEl: ".swiper-arrow-next",
          prevEl: ".swiper-arrow-prev",
        },
      }); 
    });

})(jQuery);