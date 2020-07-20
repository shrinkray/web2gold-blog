/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        // Add Alt info to to MegaMenu Logo Image
        $('.mega-menu-logo > img:not([alt])').attr('alt', 'Soss UltraLatch');

        // Background Image Header (Image added from Customizer panel)

        // $(".static-header").css('background', function () {
        //   var bg = ('url(' + $(this).data("image-src") + ') no-repeat center center fixed');
        //   return bg;
        // });

        // Background Gradient Image Newsletter CTA

        // $(".cta-news").css('background', function () {
        //   var bg = ('linear-gradient(rgba(0,19,33,1), rgba(19,49,71,1)), url(' + $(this).data("image-src") + ') repeat center center');
        //   return bg;
        // });

        // Background Image Break Box

        $(".break-block").css('background', function () {
          var bgBreak = ('linear-gradient(rgba(70,74,76,0.2) 0%, rgba(70,74,76,0.05) 30%, rgba(70,74,76,0.05) 70%, rgba(70,74,76,0.2)) 100%, ' +
          'url(' + $(this).data("image-src") + ') repeat center center');
          return bgBreak;
        });


        // when button navbar-toggler is clicked, check for open class.
        // If it exists, replace class with a close class otherwise apply the open class

        $('.navbar-toggler').click(function(){
          if ($('.mega-menu-toggle').hasClass('mega-menu-open')) {
            $('.mega-menu-toggle').removeClass('mega-menu-open').addClass('mega-menu-close');
          } else {
            $('.mega-menu-toggle').removeClass('mega-menu-close').addClass('mega-menu-open');
          }
        });


        // back to top script

        $(document).ready(function () {
          // show or hide the sticky footer button
          $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
              $('.go-top').fadeIn(200);
            } else {
              $('.go-top').fadeOut(200);
            }
          });

          // Animate to scroll to top
          $('.go-top').click(function (event) {
            event.preventDefault();

            $('html, body').animate({scrollTop: 0}, 400);
          });

        }); // go top





      // Background Image for Diagonal Rows
        $(".cta-diagonal").css('background', function () {
          var bg = ('url(' + $(this).data("image-src") + ') no-repeat 60% center');
          // console.log ( bg );
          return bg;
        });




        // Adjust container in Jumbotron Slider settings on breakpoints
        // https://www.sitepoint.com/community/t/adding-removing-classes-on-resize-jquery/191805

        $(window).on('load, resize', function mobileViewUpdate() {
          var viewportWidth = $(window).width();
          if (viewportWidth < 992) {
            $(".jumbo").removeClass("jumbo container").addClass("jumbo fluid-container");
          }
          if (viewportWidth > 991) {
            $(".jumbo").removeClass("jumbo fluid-container").addClass("jumbo container");
          }
        });

        // slick basic
        // added fade and speed for Mike Temple
        $('.slider').slick({
          autoplay: false,
          dots: true,
          adaptiveHeight: true,
          fade: true,
          speed: 2500,

        });


        // stop video playback on modal close
        // http://stackoverflow.com/a/25069916
        $(".video-modal").on('hidden.bs.modal', function (e) {

          //console.log('hidden');

          var id = $(this).attr('id');
          var target = "#" + id + ".video-modal iframe";

          $(target).attr("src", $(target).attr("src"));
        });



      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired

        $('.af-form').find('.af-fields').addClass('d-flex');

      } // closing
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page



      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },

    //WooCommerce
    'woocommerce': {
      init: function() {
        // JavaScript to be fired on the woocommerce page


       //  $('#pa_fire-rating').children('option').attr( "disabled", 'disabled' );

      },
      finalize: function() {
        // JavaScript to be fired on woocommerce page, after the init JS
        $('#pa_fire-rating').children('option').each(function() {
          $(this).attr( "disabled", 'disabled' );
        });

      }
    }, // woocommerce

    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
