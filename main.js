jQuery(document).ready(function(e){function n(){var e=window.navigator.userAgent,n=e.indexOf("MSIE ");if(n>0)return parseInt(e.substring(n+5,e.indexOf(".",n)),10);var o=e.indexOf("Trident/");if(o>0){var a=e.indexOf("rv:");return parseInt(e.substring(a+3,e.indexOf(".",a)),10)}var i=e.indexOf("Edge/");return i>0?parseInt(e.substring(i+5,e.indexOf(".",i)),10):!1}function o(){1024>=i&&e(".single-project .featured-image").css({transform:"translateY("+e(this).scrollTop()/-4+"px) scale(1.1)"}),e(".home .part_1_image").css({transform:"translateY("+e(this).scrollTop()/-4+"px)"}),e(".home .part_2_image").css({transform:"translateY("+e(this).scrollTop()/-8+"px)"})}e("body").addClass("js"),0!=n()&&e("html").addClass("ie"+n()),e("#nav-icon").click(function(){var n=e(window).height(),o=e("header").height();e("header nav").height(n-o),e(this).toggleClass("open"),e("header nav").toggleClass("open"),e("header nav").hasClass("open")?(e("body").css("overflow","hidden"),e("header nav").height()>=500&&e("header nav .dynamic_posts").css("display","block")):e("body").css("overflow","auto")}),window.requestAnimFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)}}();var a;e(window).scroll(function(){a&&(window.clearTimeout(a),a=null),a=window.setTimeout(function(){requestAnimFrame(o)},15)});var i=e(window).width(),s={init:function(){e(".portfolio").mixItUp({selectors:{target:".project",filter:".filter"},load:{sort:"random"},animation:{enable:!0,effects:"fade",easing:"easeInOutCubic"},controls:{activeClass:"active"}})}};s.init(),e(".image_section").on("click","a",function(n){n.preventDefault();var o=e(this).attr("href");e("#modal_img").attr("src",o),e("body").addClass("no-scroll"),e(".modal").css({display:"block"})}),e(".modal").on("click",function(){e("#modal_img").attr("src",""),e("body").removeClass("no-scroll"),e(".modal").css({display:"none"})}).children().on("click",function(e){e.stopPropagation()}),e(".modal_window").on("click",function(){e("#modal_img").attr("src",""),e("body").removeClass("no-scroll"),e(".modal").css({display:"none"})}).children().on("click",function(e){e.stopPropagation()}),i>=768&&e(window).on("scroll",function(){e(this).scrollTop()>190?(e("header").addClass("fixed"),e(".single-project header").addClass("solid"),e(".page-content").addClass("padding")):(e("header").removeClass("fixed"),e(".single-project header").removeClass("solid"),e(".page-content").removeClass("padding"))})});