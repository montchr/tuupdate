/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 * ======================================================================== */

var Roots = {
    // All pages
    common: {
    init: function() {
        /* FitVids */
        $(document).fitVids();

        /* Main Menu */
        jQuery(document).ready(function($) {
            $('body').addClass('js');
                var $menu = $('#main-nav'),
                    $menulink = $('.menu-link'),
                    //$menuItem = $('.main-nav ul li a'),
                    $menuTrigger = $('.touch .dropdown__toggle');

            $menulink.click(function(e) {
                $menulink.toggleClass('active');
                $menu.toggleClass('active');
            });

            $menuTrigger.click(function(e) {
                e.preventDefault();
                var $this = $(this);
                $this.toggleClass('active').next('ul').toggleClass('active');
            });

            /*$menuItem.hover(function(e) {
                e.preventDefault();
                //$(this).parents('li').parents('ul').andSelf().toggleClass('active');
                //$(this).toggleClass('active');
            });*/
        });
    }
    },
    // Home page
    home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
    },
    // About page
    about: {
    init: function() {
      // JavaScript to be fired on the about page
    }
    }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);
