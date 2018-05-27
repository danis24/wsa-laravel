webpackJsonp([3],{

/***/ "./node_modules/icheck/icheck.js":
/***/ (function(module, exports) {

/*!
 * iCheck v1.0.2, http://git.io/arlzeA
 * ===================================
 * Powerful jQuery and Zepto plugin for checkboxes and radio buttons customization
 *
 * (c) 2013 Damir Sultanov, http://fronteed.com
 * MIT Licensed
 */

(function($) {

  // Cached vars
  var _iCheck = 'iCheck',
    _iCheckHelper = _iCheck + '-helper',
    _checkbox = 'checkbox',
    _radio = 'radio',
    _checked = 'checked',
    _unchecked = 'un' + _checked,
    _disabled = 'disabled',
    _determinate = 'determinate',
    _indeterminate = 'in' + _determinate,
    _update = 'update',
    _type = 'type',
    _click = 'click',
    _touch = 'touchbegin.i touchend.i',
    _add = 'addClass',
    _remove = 'removeClass',
    _callback = 'trigger',
    _label = 'label',
    _cursor = 'cursor',
    _mobile = /ipad|iphone|ipod|android|blackberry|windows phone|opera mini|silk/i.test(navigator.userAgent);

  // Plugin init
  $.fn[_iCheck] = function(options, fire) {

    // Walker
    var handle = 'input[type="' + _checkbox + '"], input[type="' + _radio + '"]',
      stack = $(),
      walker = function(object) {
        object.each(function() {
          var self = $(this);

          if (self.is(handle)) {
            stack = stack.add(self);
          } else {
            stack = stack.add(self.find(handle));
          }
        });
      };

    // Check if we should operate with some method
    if (/^(check|uncheck|toggle|indeterminate|determinate|disable|enable|update|destroy)$/i.test(options)) {

      // Normalize method's name
      options = options.toLowerCase();

      // Find checkboxes and radio buttons
      walker(this);

      return stack.each(function() {
        var self = $(this);

        if (options == 'destroy') {
          tidy(self, 'ifDestroyed');
        } else {
          operate(self, true, options);
        }

        // Fire method's callback
        if ($.isFunction(fire)) {
          fire();
        }
      });

    // Customization
    } else if (typeof options == 'object' || !options) {

      // Check if any options were passed
      var settings = $.extend({
          checkedClass: _checked,
          disabledClass: _disabled,
          indeterminateClass: _indeterminate,
          labelHover: true
        }, options),

        selector = settings.handle,
        hoverClass = settings.hoverClass || 'hover',
        focusClass = settings.focusClass || 'focus',
        activeClass = settings.activeClass || 'active',
        labelHover = !!settings.labelHover,
        labelHoverClass = settings.labelHoverClass || 'hover',

        // Setup clickable area
        area = ('' + settings.increaseArea).replace('%', '') | 0;

      // Selector limit
      if (selector == _checkbox || selector == _radio) {
        handle = 'input[type="' + selector + '"]';
      }

      // Clickable area limit
      if (area < -50) {
        area = -50;
      }

      // Walk around the selector
      walker(this);

      return stack.each(function() {
        var self = $(this);

        // If already customized
        tidy(self);

        var node = this,
          id = node.id,

          // Layer styles
          offset = -area + '%',
          size = 100 + (area * 2) + '%',
          layer = {
            position: 'absolute',
            top: offset,
            left: offset,
            display: 'block',
            width: size,
            height: size,
            margin: 0,
            padding: 0,
            background: '#fff',
            border: 0,
            opacity: 0
          },

          // Choose how to hide input
          hide = _mobile ? {
            position: 'absolute',
            visibility: 'hidden'
          } : area ? layer : {
            position: 'absolute',
            opacity: 0
          },

          // Get proper class
          className = node[_type] == _checkbox ? settings.checkboxClass || 'i' + _checkbox : settings.radioClass || 'i' + _radio,

          // Find assigned labels
          label = $(_label + '[for="' + id + '"]').add(self.closest(_label)),

          // Check ARIA option
          aria = !!settings.aria,

          // Set ARIA placeholder
          ariaID = _iCheck + '-' + Math.random().toString(36).substr(2,6),

          // Parent & helper
          parent = '<div class="' + className + '" ' + (aria ? 'role="' + node[_type] + '" ' : ''),
          helper;

        // Set ARIA "labelledby"
        if (aria) {
          label.each(function() {
            parent += 'aria-labelledby="';

            if (this.id) {
              parent += this.id;
            } else {
              this.id = ariaID;
              parent += ariaID;
            }

            parent += '"';
          });
        }

        // Wrap input
        parent = self.wrap(parent + '/>')[_callback]('ifCreated').parent().append(settings.insert);

        // Layer addition
        helper = $('<ins class="' + _iCheckHelper + '"/>').css(layer).appendTo(parent);

        // Finalize customization
        self.data(_iCheck, {o: settings, s: self.attr('style')}).css(hide);
        !!settings.inheritClass && parent[_add](node.className || '');
        !!settings.inheritID && id && parent.attr('id', _iCheck + '-' + id);
        parent.css('position') == 'static' && parent.css('position', 'relative');
        operate(self, true, _update);

        // Label events
        if (label.length) {
          label.on(_click + '.i mouseover.i mouseout.i ' + _touch, function(event) {
            var type = event[_type],
              item = $(this);

            // Do nothing if input is disabled
            if (!node[_disabled]) {

              // Click
              if (type == _click) {
                if ($(event.target).is('a')) {
                  return;
                }
                operate(self, false, true);

              // Hover state
              } else if (labelHover) {

                // mouseout|touchend
                if (/ut|nd/.test(type)) {
                  parent[_remove](hoverClass);
                  item[_remove](labelHoverClass);
                } else {
                  parent[_add](hoverClass);
                  item[_add](labelHoverClass);
                }
              }

              if (_mobile) {
                event.stopPropagation();
              } else {
                return false;
              }
            }
          });
        }

        // Input events
        self.on(_click + '.i focus.i blur.i keyup.i keydown.i keypress.i', function(event) {
          var type = event[_type],
            key = event.keyCode;

          // Click
          if (type == _click) {
            return false;

          // Keydown
          } else if (type == 'keydown' && key == 32) {
            if (!(node[_type] == _radio && node[_checked])) {
              if (node[_checked]) {
                off(self, _checked);
              } else {
                on(self, _checked);
              }
            }

            return false;

          // Keyup
          } else if (type == 'keyup' && node[_type] == _radio) {
            !node[_checked] && on(self, _checked);

          // Focus/blur
          } else if (/us|ur/.test(type)) {
            parent[type == 'blur' ? _remove : _add](focusClass);
          }
        });

        // Helper events
        helper.on(_click + ' mousedown mouseup mouseover mouseout ' + _touch, function(event) {
          var type = event[_type],

            // mousedown|mouseup
            toggle = /wn|up/.test(type) ? activeClass : hoverClass;

          // Do nothing if input is disabled
          if (!node[_disabled]) {

            // Click
            if (type == _click) {
              operate(self, false, true);

            // Active and hover states
            } else {

              // State is on
              if (/wn|er|in/.test(type)) {

                // mousedown|mouseover|touchbegin
                parent[_add](toggle);

              // State is off
              } else {
                parent[_remove](toggle + ' ' + activeClass);
              }

              // Label hover
              if (label.length && labelHover && toggle == hoverClass) {

                // mouseout|touchend
                label[/ut|nd/.test(type) ? _remove : _add](labelHoverClass);
              }
            }

            if (_mobile) {
              event.stopPropagation();
            } else {
              return false;
            }
          }
        });
      });
    } else {
      return this;
    }
  };

  // Do something with inputs
  function operate(input, direct, method) {
    var node = input[0],
      state = /er/.test(method) ? _indeterminate : /bl/.test(method) ? _disabled : _checked,
      active = method == _update ? {
        checked: node[_checked],
        disabled: node[_disabled],
        indeterminate: input.attr(_indeterminate) == 'true' || input.attr(_determinate) == 'false'
      } : node[state];

    // Check, disable or indeterminate
    if (/^(ch|di|in)/.test(method) && !active) {
      on(input, state);

    // Uncheck, enable or determinate
    } else if (/^(un|en|de)/.test(method) && active) {
      off(input, state);

    // Update
    } else if (method == _update) {

      // Handle states
      for (var each in active) {
        if (active[each]) {
          on(input, each, true);
        } else {
          off(input, each, true);
        }
      }

    } else if (!direct || method == 'toggle') {

      // Helper or label was clicked
      if (!direct) {
        input[_callback]('ifClicked');
      }

      // Toggle checked state
      if (active) {
        if (node[_type] !== _radio) {
          off(input, state);
        }
      } else {
        on(input, state);
      }
    }
  }

  // Add checked, disabled or indeterminate state
  function on(input, state, keep) {
    var node = input[0],
      parent = input.parent(),
      checked = state == _checked,
      indeterminate = state == _indeterminate,
      disabled = state == _disabled,
      callback = indeterminate ? _determinate : checked ? _unchecked : 'enabled',
      regular = option(input, callback + capitalize(node[_type])),
      specific = option(input, state + capitalize(node[_type]));

    // Prevent unnecessary actions
    if (node[state] !== true) {

      // Toggle assigned radio buttons
      if (!keep && state == _checked && node[_type] == _radio && node.name) {
        var form = input.closest('form'),
          inputs = 'input[name="' + node.name + '"]';

        inputs = form.length ? form.find(inputs) : $(inputs);

        inputs.each(function() {
          if (this !== node && $(this).data(_iCheck)) {
            off($(this), state);
          }
        });
      }

      // Indeterminate state
      if (indeterminate) {

        // Add indeterminate state
        node[state] = true;

        // Remove checked state
        if (node[_checked]) {
          off(input, _checked, 'force');
        }

      // Checked or disabled state
      } else {

        // Add checked or disabled state
        if (!keep) {
          node[state] = true;
        }

        // Remove indeterminate state
        if (checked && node[_indeterminate]) {
          off(input, _indeterminate, false);
        }
      }

      // Trigger callbacks
      callbacks(input, checked, state, keep);
    }

    // Add proper cursor
    if (node[_disabled] && !!option(input, _cursor, true)) {
      parent.find('.' + _iCheckHelper).css(_cursor, 'default');
    }

    // Add state class
    parent[_add](specific || option(input, state) || '');

    // Set ARIA attribute
    if (!!parent.attr('role') && !indeterminate) {
      parent.attr('aria-' + (disabled ? _disabled : _checked), 'true');
    }

    // Remove regular state class
    parent[_remove](regular || option(input, callback) || '');
  }

  // Remove checked, disabled or indeterminate state
  function off(input, state, keep) {
    var node = input[0],
      parent = input.parent(),
      checked = state == _checked,
      indeterminate = state == _indeterminate,
      disabled = state == _disabled,
      callback = indeterminate ? _determinate : checked ? _unchecked : 'enabled',
      regular = option(input, callback + capitalize(node[_type])),
      specific = option(input, state + capitalize(node[_type]));

    // Prevent unnecessary actions
    if (node[state] !== false) {

      // Toggle state
      if (indeterminate || !keep || keep == 'force') {
        node[state] = false;
      }

      // Trigger callbacks
      callbacks(input, checked, callback, keep);
    }

    // Add proper cursor
    if (!node[_disabled] && !!option(input, _cursor, true)) {
      parent.find('.' + _iCheckHelper).css(_cursor, 'pointer');
    }

    // Remove state class
    parent[_remove](specific || option(input, state) || '');

    // Set ARIA attribute
    if (!!parent.attr('role') && !indeterminate) {
      parent.attr('aria-' + (disabled ? _disabled : _checked), 'false');
    }

    // Add regular state class
    parent[_add](regular || option(input, callback) || '');
  }

  // Remove all traces
  function tidy(input, callback) {
    if (input.data(_iCheck)) {

      // Remove everything except input
      input.parent().html(input.attr('style', input.data(_iCheck).s || ''));

      // Callback
      if (callback) {
        input[_callback](callback);
      }

      // Unbind events
      input.off('.i').unwrap();
      $(_label + '[for="' + input[0].id + '"]').add(input.closest(_label)).off('.i');
    }
  }

  // Get some option
  function option(input, state, regular) {
    if (input.data(_iCheck)) {
      return input.data(_iCheck).o[state + (regular ? '' : 'Class')];
    }
  }

  // Capitalize some string
  function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }

  // Executable handlers
  function callbacks(input, checked, callback, keep) {
    if (!keep) {
      if (checked) {
        input[_callback]('ifToggled');
      }

      input[_callback]('ifChanged')[_callback]('if' + capitalize(callback));
    }
  }
})(window.jQuery || window.Zepto);


/***/ }),

/***/ "./resources/assets/js/inspinia.js":
/***/ (function(module, exports, __webpack_require__) {

window._ = __webpack_require__("./node_modules/lodash/lodash.js");

try {
  window.$ = window.jQuery = __webpack_require__("./node_modules/jquery/dist/jquery.js");

  // Bootstrap Sass
  __webpack_require__("./node_modules/bootstrap-sass/assets/javascripts/bootstrap.js");

  // iCheck
  __webpack_require__("./node_modules/icheck/icheck.js");

  //Metis Menu
  __webpack_require__("./node_modules/metismenu/dist/metisMenu.js");

  // jQuery SlimScroll
  __webpack_require__("./node_modules/jquery-slimscroll/jquery.slimscroll.js");

  // Inspinia
  __webpack_require__("./resources/assets/js/inspinia/inspinia.js");

  // Pace JS
  window.pace = __webpack_require__("./node_modules/pace-js/pace.js");
  pace.start();
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = __webpack_require__("./node_modules/axios/index.js");

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key',
//     cluster: 'mt1',
//     encrypted: true
// });

/***/ }),

/***/ "./resources/assets/js/inspinia/inspinia.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {/*
 *
 *   INSPINIA - Responsive Admin Theme
 *   version 2.7.1
 *
 */

$(document).ready(function () {
  // Add body-small class if window less than 768px
  if ($(this).width() < 769) {
    $('body').addClass('body-small');
  } else {
    $('body').removeClass('body-small');
  }

  // MetisMenu
  $('.nav.metismenu').metisMenu();

  // Collapse ibox function
  $('.collapse-link').on('click', function () {
    var ibox = $(this).closest('div.ibox');
    var button = $(this).find('i');
    var content = ibox.children('.ibox-content');
    content.slideToggle(200);
    button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
    ibox.toggleClass('').toggleClass('border-bottom');
    setTimeout(function () {
      ibox.resize();
      ibox.find('[id^=map-]').resize();
    }, 50);
  });

  // Close ibox function
  $('.close-link').on('click', function () {
    var content = $(this).closest('div.ibox');
    content.remove();
  });

  // Fullscreen ibox function
  $('.fullscreen-link').on('click', function () {
    var ibox = $(this).closest('div.ibox');
    var button = $(this).find('i');
    $('body').toggleClass('fullscreen-ibox-mode');
    button.toggleClass('fa-expand').toggleClass('fa-compress');
    ibox.toggleClass('fullscreen');
    setTimeout(function () {
      $(window).trigger('resize');
    }, 100);
  });

  // Close menu in canvas mode
  $('.close-canvas-menu').on('click', function () {
    $("body").toggleClass("mini-navbar");
    SmoothlyMenu();
  });

  // Run menu of canvas
  $('body.canvas-menu .sidebar-collapse').slimScroll({
    height: '100%',
    railOpacity: 0.9
  });

  // Open close right sidebar
  $('.right-sidebar-toggle').on('click', function () {
    $('#right-sidebar').toggleClass('sidebar-open');
  });

  // Initialize slimscroll for right sidebar
  $('.sidebar-container').slimScroll({
    height: '100%',
    railOpacity: 0.4,
    wheelStep: 10
  });

  // Open close small chat
  $('.open-small-chat').on('click', function () {
    $(this).children().toggleClass('fa-comments').toggleClass('fa-remove');
    $('.small-chat-box').toggleClass('active');
  });

  // Initialize slimscroll for small chat
  $('.small-chat-box .content').slimScroll({
    height: '234px',
    railOpacity: 0.4
  });

  // Small todo handler
  $('.check-link').on('click', function () {
    var button = $(this).find('i');
    var label = $(this).next('span');
    button.toggleClass('fa-check-square').toggleClass('fa-square-o');
    label.toggleClass('todo-completed');
    return false;
  });

  // Append config box / Only for demo purpose
  // Uncomment on server mode to enable XHR calls
  //$.get("skin-config.html", function (data) {
  //    if (!$('body').hasClass('no-skin-config'))
  //        $('body').append(data);
  //});

  // Minimalize menu
  $('.navbar-minimalize').on('click', function (event) {
    event.preventDefault();
    $("body").toggleClass("mini-navbar");
    SmoothlyMenu();
  });

  // Tooltips demo
  $('.tooltip-demo').tooltip({
    selector: "[data-toggle=tooltip]",
    container: "body"
  });

  // Full height of sidebar
  function fix_height() {
    var heightWithoutNavbar = $("body > #wrapper").height() - 61;
    $(".sidebar-panel").css("min-height", heightWithoutNavbar + "px");

    var navbarheight = $('nav.navbar-default').height();
    var wrapperHeight = $('#page-wrapper').height();

    if (navbarheight > wrapperHeight) {
      $('#page-wrapper').css("min-height", navbarheight + "px");
    }

    if (navbarheight < wrapperHeight) {
      $('#page-wrapper').css("min-height", $(window).height() + "px");
    }

    if ($('body').hasClass('fixed-nav')) {
      if (navbarheight > wrapperHeight) {
        $('#page-wrapper').css("min-height", navbarheight + "px");
      } else {
        $('#page-wrapper').css("min-height", $(window).height() - 60 + "px");
      }
    }
  }

  fix_height();

  // Fixed Sidebar
  $(window).bind("load", function () {
    if ($("body").hasClass('fixed-sidebar')) {
      $('.sidebar-collapse').slimScroll({
        height: '100%',
        railOpacity: 0.9
      });
    }
  });

  // Move right sidebar top after scroll
  $(window).scroll(function () {
    if ($(window).scrollTop() > 0 && !$('body').hasClass('fixed-nav')) {
      $('#right-sidebar').addClass('sidebar-top');
    } else {
      $('#right-sidebar').removeClass('sidebar-top');
    }
  });

  $(window).bind("load resize scroll", function () {
    if (!$("body").hasClass('body-small')) {
      fix_height();
    }
  });

  $("[data-toggle=popover]").popover();

  // Add slimscroll to element
  $('.full-height-scroll').slimscroll({
    height: '100%'
  });
});

// Minimalize menu when screen is less than 768px
$(window).bind("resize", function () {
  if ($(this).width() < 769) {
    $('body').addClass('body-small');
  } else {
    $('body').removeClass('body-small');
  }
});

// Local Storage functions
// Set proper body class and plugins based on user configuration
$(document).ready(function () {
  if (localStorageSupport()) {

    var collapse = localStorage.getItem("collapse_menu");
    var fixedsidebar = localStorage.getItem("fixedsidebar");
    var fixednavbar = localStorage.getItem("fixednavbar");
    var boxedlayout = localStorage.getItem("boxedlayout");
    var fixedfooter = localStorage.getItem("fixedfooter");

    var body = $('body');

    if (fixedsidebar == 'on') {
      body.addClass('fixed-sidebar');
      $('.sidebar-collapse').slimScroll({
        height: '100%',
        railOpacity: 0.9
      });
    }

    if (collapse == 'on') {
      if (body.hasClass('fixed-sidebar')) {
        if (!body.hasClass('body-small')) {
          body.addClass('mini-navbar');
        }
      } else {
        if (!body.hasClass('body-small')) {
          body.addClass('mini-navbar');
        }
      }
    }

    if (fixednavbar == 'on') {
      $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
      body.addClass('fixed-nav');
    }

    if (boxedlayout == 'on') {
      body.addClass('boxed-layout');
    }

    if (fixedfooter == 'on') {
      $(".footer").addClass('fixed');
    }
  }
});

// check if browser support HTML5 local storage
function localStorageSupport() {
  return 'localStorage' in window && window['localStorage'] !== null;
}

// For demo purpose - animation css script
function animationHover(element, animation) {
  element = $(element);
  element.hover(function () {
    element.addClass('animated ' + animation);
  }, function () {
    //wait for animation to finish before removing classes
    window.setTimeout(function () {
      element.removeClass('animated ' + animation);
    }, 2000);
  });
}

function SmoothlyMenu() {
  if (!$('body').hasClass('mini-navbar') || $('body').hasClass('body-small')) {
    // Hide menu in order to smoothly turn on when maximize menu
    $('.nav.metismenu').hide();
    // For smoothly turn on menu
    setTimeout(function () {
      $('.nav.metismenu').fadeIn(400);
    }, 200);
  } else if ($('body').hasClass('fixed-sidebar')) {
    $('.nav.metismenu').hide();
    setTimeout(function () {
      $('.nav.metismenu').fadeIn(400);
    }, 100);
  } else {
    // Remove all inline style from jquery fadeIn function to reset menu state
    $('.nav.metismenu').removeAttr('style');
  }
}

// Dragable panels
function WinMove() {
  var element = "[class*=col]";
  var handle = ".ibox-title";
  var connect = "[class*=col]";
  $(element).sortable({
    handle: handle,
    connectWith: connect,
    tolerance: 'pointer',
    forcePlaceholderSize: true,
    opacity: 0.8
  }).disableSelection();
}
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ 2:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/inspinia.js");


/***/ })

},[2]);