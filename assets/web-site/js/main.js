!function(t){"use strict";t(".js-fullheight").css("height",t(window).height()),t(window).resize(function(){t(".js-fullheight").css("height",t(window).height())});var i=t(".featured-carousel");t(".featured-carousel").owlCarousel({animateOut:"fadeOut",center:!1,items:1,loop:!0,stagePadding:0,margin:0,smartSpeed:1500,autoplay:!1,dots:!1,nav:!1,navText:['<span class="icon-keyboard_arrow_left">','<span class="icon-keyboard_arrow_right">']}),t(".thumbnail li").each(function(a){t(this).click(function(e){i.trigger("to.owl.carousel",[a,1500]),e.preventDefault()})}),i.on("changed.owl.carousel",function(e){t(".thumbnail li").removeClass("active"),t(".thumbnail li").eq(e.item.index-2).addClass("active")})}(jQuery);