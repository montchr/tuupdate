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
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
      $('body').addClass('js');

      /* FitVids */
      $(document).fitVids();

      /* Main Navigation */
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
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // Post/page with sidebar
  has_sidebar: {
    init: function() {
      /**
       * Replace static Forecast.io widget icons with animated
       * Skycons, but only if the browser supports HTML5 `canvas`.
       */
      if (Modernizr.canvas) {
        var $icons = $('.js-icon-weather'),
            skycons;

        skyconConstruct = function (i) {
          c = document.createElement('canvas');
          c.className = 'js-skycon-' + i + '  js-skycon  ' + iconClasses;
          c.title = iconSummary;
          c.width = 150;
          return c;
        };

        skycons = new Skycons({
          // On Android, a nasty hack is needed
          resizeClear:true
        });

        for (var i = $icons.length - 1; i >= 0; i--) {
          var $icon = $icons[i],
              iconName = $icon.dataset.icon,
              iconSummary = $icon.title,
              iconParent = $icon.parentNode,
              iconClasses = 'icon--weather  js-icon-weather  icon  informative  ';

              // Make sure Currently gets its class
              if (i === 0) {
                iconClasses += 'icon--weather--currently  ';
              } else {
                iconClasses += 'icon--weather--day  ';
              }

          // If original `data-icon` attributes had dashes, they'll be camel-cased by the `dataset` method.
          // TODO: Needs a fallback for when it's not camel-cased!
          skyconType = iconName.replace(/([a-z])([A-Z])/g, '$1-$2').toLowerCase();
          // Add the icon-specific classes in the loop
          iconClasses += 'icon-' + skyconType + '  ';
          iconClasses += 'js-icon-' + skyconType;
          // Replace the old `<img>`
          iconParent.replaceChild(skyconConstruct(i), $icon);

          skyconThis = $('.js-skycon-' + i)[0];
          skycons.add(skyconThis, iconName);
          skycons.play();
        }
      }
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
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

})(jQuery); // Fully reference jQuery after this point.
