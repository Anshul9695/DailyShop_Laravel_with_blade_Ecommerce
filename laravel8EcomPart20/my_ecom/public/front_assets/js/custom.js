/** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
**/

jQuery(function ($) {


  /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */

  jQuery(".aa-cartbox").hover(function () {
    jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
  }
    , function () {
      jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
    }
  );

  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */
  jQuery('[data-toggle="tooltip"]').tooltip();
  jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */

  jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
    loading_image: 'demo/images/loading.gif'
  });

  jQuery('#demo-1 .simpleLens-big-image').simpleLens({
    loading_image: 'demo/images/loading.gif'
  });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-popular-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-featured-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */
  jQuery('.aa-latest-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-testimonial-slider').slick({
    dots: true,
    infinite: true,
    arrows: false,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
  });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-client-brand-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */

  jQuery(function () {
    if ($('body').is('.productPage')) {
      var skipSlider = document.getElementById('skipstep');
      var filter_price_start = jQuery("#filter_price_start").val();
      var filter_price_end = jQuery("#filter_price_end").val();
      if (filter_price_start == '' || filter_price_end == '') {
        var filter_price_start = 100;
        var filter_price_end = 1700;
      }
      noUiSlider.create(skipSlider, {
        range: {
          'min': 0,
          '10%': 100,
          '20%': 300,
          '30%': 500,
          '40%': 700,
          '50%': 900,
          '60%': 1100,
          '70%': 1300,
          '80%': 1500,
          '90%': 1700,
          'max': 1900
        },
        snap: true,
        connect: true,
        start: [filter_price_start, filter_price_end]
      });
      // for value print
      var skipValues = [
        document.getElementById('skip-value-lower'),
        document.getElementById('skip-value-upper')
      ];

      skipSlider.noUiSlider.on('update', function (values, handle) {
        skipValues[handle].innerHTML = values[handle];
      });
    }
  });



  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

  jQuery(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });

  //Click event to scroll to top

  jQuery('.scrollToTop').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 800);
    return false;
  });

  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

  jQuery(window).load(function () { // makes sure the whole site is loaded      
    jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
  })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function (e) {
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function (e) {
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-related-item-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

});
function change_product_color_image(img, color) {
  jQuery("#color_id").val(color);
  jQuery(".simpleLens-big-image-container").html('<a data-lens-image="' + img + '" class="simpleLens-lens-image"><img src="' + img + '" class="simpleLens-big-image"></a>');
}

function showColor(size) {
  jQuery("#size_id").val(size);
  jQuery(".product_color").hide();
  jQuery(".size_" + size).show();
  jQuery(".size_link").css('border', '1px solid #ddd');
  jQuery("#size_" + size).css('border', '1px solid black');
}
function home_add_to_cart(id, size_str_id, color_str_id) {
  jQuery("#size_id").val(size_str_id);
  jQuery("#color_id").val(color_str_id);
  add_to_cart(id, size_str_id, color_str_id)
}
function add_to_cart(id, size_str_id, color_str_id) {
  jQuery("#add_to_cart_msg").html("");
  var size_id = jQuery("#size_id").val();
  var color_id = jQuery("#color_id").val();
  if (size_str_id == 0 && color_str_id == 0) {
    size_id = 'no';
    color_id = 'no';
  }
  if (size_id == '' && size_id != 'no') {
    jQuery("#add_to_cart_msg").html('<div class="alert alert-danger fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error!   </strong>Please Select The Size</div>');
  } else if (color_id == '' && color_id != 'no') {
    jQuery("#add_to_cart_msg").html('<div class="alert alert-danger fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error!   </strong>Please Select The Color</div>');
  } else {
    jQuery("#product_id").val(id);
    jQuery("#pqty").val(jQuery("#qty").val());
    jQuery.ajax({
      url: '/add_to_cart',
      data: jQuery("#frmAddToCart").serialize(),
      type: "post",
      success: function (result) {
        var totalPrice = 0;
        alert("Product   " + result.msg);
        if (result.rowCount == 0) {
          jQuery(".aa-cart-notify").html("0");
          jQuery(".aa-cartbox-summary").remove();
        } else {
          jQuery(".aa-cart-notify").html(result.rowCount);
          // console.log('cart data'+result.rowCount);
          var html = '<ul>';
          jQuery.each(result.data, function (arrKey, arrVal) {
            totalPrice = parseInt(totalPrice) + (parseInt(arrVal.qty) * parseInt(arrVal.price));
            html += '<li><a class="aa-cartbox-img" href="#"><img src="' + PRODUCT_IMAGE + '/' + arrVal.image + '" alt="img"></a><div class="aa-cartbox-info"><h4><a href="#">' + arrVal.name + '</a></h4><p> ' + arrVal.qty + ' * Rs  ' + arrVal.price + '</p></div></li>';
          });
        }
        html += '<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">Rs ' + totalPrice + '</span></li>';
        html += '</ul><a class="aa-cartbox-checkout aa-primary-btn" href="checkout">Checkout</a>';
        console.log(html);
        jQuery('.aa-cartbox-summary').html(html);

      }
    });
  }
}
function updateCartQty(pid, size, color, attr_id, price) {
  jQuery("#size_id").val(size);
  jQuery("#color_id").val(color);
  var qty = jQuery("#qty" + attr_id).val();
  // alert(qty);
  jQuery('#qty').val(qty);
  add_to_cart(pid, size, color);
  jQuery("#total_price_" + attr_id).html('Rs' + qty * price);
}

// delete the cart product data 
function deleteCartProduct(pid, size, color, attr_id) {
  jQuery("#size_id").val(size);
  jQuery("#color_id").val(color);
  jQuery('#qty').val(0);
  add_to_cart(pid, size, color);
  jQuery("#cart_box_" + attr_id).remove();
}

//filter by name and data and price --> MAKING FILTER'S

function sort_by() {
  var sort_by_val = jQuery("#sort_by_val").val();
  jQuery("#sort").val(sort_by_val);
  jQuery("#catagoryFilter").submit();
}
function sort_price_filter() {
  var start = jQuery("#skip-value-lower").html();
  var end = jQuery("#skip-value-upper").html();
  jQuery("#filter_price_start").val(start);
  jQuery("#filter_price_end").val(end);
  jQuery("#catagoryFilter").submit();
}
function setColor(color, type) {
  var color_str = jQuery("#color_filter").val();
  if (type == 1) {
    var new_str_color = color_str.replace(color + ':', '');
    jQuery("#color_filter").val(new_str_color);
  } else {
    jQuery("#color_filter").val(color + ':' + color_str);
    jQuery("#catagoryFilter").submit();
  }
  jQuery("#catagoryFilter").submit();
}
function funSearch() {
  var search_txt = jQuery("#search_str").val();
  if (search_txt != '') {
    window.location.href = '/search/' + search_txt;
  }
}

// for user registration using ajax 
jQuery("#frmRegistration").submit(function (e) {
  jQuery(".field_error").html('');
  e.preventDefault();
  jQuery.ajax({
    url: 'registration_process',
    data: jQuery("#frmRegistration").serialize(),
    type: 'post',
    success: function (result) {
      // console.log(result.status);
      if (result.status == "errors") {
        jQuery.each(result.errors, function (key, val) {
          // console.log(key);
          // console.log(val);
          jQuery("#"+key+"_error").html(val[0]);
          jQuery(".field_error").css("color","red");
        });
      }if(result.status == "success"){
        jQuery("#frmRegistration")[0].reset();
        jQuery("#thankyou_msg").html(result.msg);
        jQuery(".thankyou_message").css("color","green");
      }
    }
  });
});