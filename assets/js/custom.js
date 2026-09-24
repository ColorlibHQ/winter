/**
 * Winter front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel, Slick, Magnific Popup and AjaxChimp that
 * build the same markup, so the theme's stylesheets apply unchanged. The
 * new-arrivals filter uses MixItUp 3, which never needed jQuery.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  UI.magnific('.popup-youtube, .popup-vimeo', {
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  UI.owl('.textimonial_iner', {
    items: 1,
    loop: true,
    dots: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false,
    responsive: {
      0: { margin: 15 },
      600: { margin: 10 },
      1000: { margin: 10 }
    }
  });

  UI.owl('.best_product_slider', {
    items: 4,
    loop: true,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: true,
    navText: ['next', 'previous'],
    responsive: {
      0: { margin: 15, items: 1, nav: false },
      576: { margin: 15, items: 2, nav: false },
      768: { margin: 30, items: 3, nav: true },
      991: { margin: 30, items: 4, nav: true }
    }
  });

  //product list slider
  UI.owl('.product_list_slider', {
    items: 1,
    loop: true,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: true,
    navText: ['next', 'previous'],
    smartSpeed: 1000,
    responsive: {
      0: { margin: 15, nav: false, items: 1 },
      600: { margin: 15, items: 1, nav: false },
      768: { margin: 30, nav: true, items: 1 }
    }
  });

  UI.magnific('.img-gal', {
    type: 'image',
    gallery: { enabled: true }
  });

  // niceSelect js code
  UI.enhanceSelects('select');
  UI.counter('.counter', { time: 2000 });

  UI.slick('.slider', {
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    speed: 300,
    infinite: true,
    asNavFor: '.slider-nav-thumbnails',
    autoplay: true,
    pauseOnFocus: true,
    dots: true
  });

  UI.slick('.slider-nav-thumbnails', {
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider',
    focusOnSelect: true,
    infinite: true,
    prevArrow: false,
    nextArrow: false,
    centerMode: true,
    responsive: [{
      breakpoint: 480,
      settings: { centerMode: false }
    }]
  });

  //------- Mailchimp js --------//
  UI.ajaxChimp('#mc_embed_signup form');

  UI.ready(function () {
    // Add the pagination class into shop page
    UI.toElements('.winter-wc-pagination .next.page-numbers').forEach(function (el) {
      el.classList.add('btn_2');
    });

    // menu fixed js code
    var menus = UI.toElements('.main_menu');
    window.addEventListener('scroll', function () {
      var method = window.pageYOffset + 1 > 50 ? 'add' : 'remove';
      menus.forEach(function (menu) { menu.classList[method]('menu_fixed', 'animated', 'fadeInDown'); });
    }, { passive: true });

    // Search Toggle
    var box = document.getElementById('search_input_box');
    var open = document.getElementById('search_1');
    var close = document.getElementById('close_search');
    if (box) {
      box.style.display = 'none';
      if (open) {
        open.addEventListener('click', function () {
          UI.slide(box, 'toggle');
          var input = document.getElementById('search_input');
          if (input) input.focus();
        });
      }
      if (close) {
        close.addEventListener('click', function () {
          UI.slide(box, 'up', 500);
        });
      }
    }

    //------- makeTimer js --------//
    // Counts down to the date in #timer's data-date attribute (anything
    // Date.parse reads, e.g. "2026-12-31T18:00:00"). Without one it counts to
    // 30 days from page load (it used to count to a fixed 2019 date and showed
    // negative numbers). Stops at zero.
    var parts = ['days', 'hours', 'minutes', 'seconds'].map(function (id) {
      return document.getElementById(id);
    });
    if (parts.some(Boolean)) {
      var timerBox = document.getElementById('timer');
      var endTime = Date.parse(timerBox ? timerBox.getAttribute('data-date') || '' : '');
      if (isNaN(endTime)) endTime = Date.now() + 30 * 86400000;
      endTime = Math.floor(endTime / 1000);
      var labels = ['Days', 'Hours', 'Minutes', 'Seconds'];
      var pad = function (n) { return n < 10 ? '0' + n : n; };
      var tick = function () {
        var timeLeft = Math.max(0, endTime - Math.floor(Date.now() / 1000));
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - days * 86400) / 3600);
        var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
        var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);
        [days, pad(hours), pad(minutes), pad(seconds)].forEach(function (value, i) {
          if (parts[i]) parts[i].innerHTML = '<span>' + labels[i] + '</span>' + value;
        });
        if (!timeLeft) clearInterval(timerId);
      };
      var timerId = setInterval(tick, 1000);
      tick();
    }

    // Quantity steppers: the buttons either side of an .input-number.
    UI.toElements('.input-number').forEach(function (input) {
      var min = input.getAttribute('min');
      var max = input.getAttribute('max');
      var dec = input.previousElementSibling;
      var inc = input.nextElementSibling;
      if (dec) {
        dec.addEventListener('click', function () {
          var value = Number(input.value) - 1;
          if (!min || value >= Number(min)) input.value = value;
        });
      }
      if (inc) {
        inc.addEventListener('click', function () {
          var value = Number(input.value) + 1;
          if (!max || value <= Number(max)) input.value = value;
        });
      }
    });

    // Nested sub-menus start closed; a link toggles its sub-menu's list
    // (jQuery read the "100" it was given as its default 400 ms).
    UI.toElements('.sub-menu ul').forEach(function (ul) { ul.style.display = 'none'; });
    UI.toElements('.sub-menu a').forEach(function (link) {
      link.addEventListener('click', function () {
        var parent = link.parentElement;
        if (parent && parent.classList.contains('sub-menu')) {
          UI.slide(Array.prototype.filter.call(parent.children, function (child) {
            return child.tagName === 'UL';
          }), 'toggle');
        }
        UI.toElements('.right', link).forEach(function (icon) {
          icon.classList.toggle('ti-plus');
          icon.classList.toggle('ti-minus');
        });
      });
    });

    var containerEl = document.querySelector('.new_arrival_iner');
    if (containerEl && window.mixitup) {
      window.mixitup(containerEl);
    }

    UI.toElements('.controls').forEach(function (control) {
      control.addEventListener('click', function () {
        control.classList.add('active');
        Array.prototype.forEach.call(control.parentNode.children, function (sibling) {
          if (sibling !== control) sibling.classList.remove('active');
        });
      });
    });
  });

  // The old script also initialised lightSlider on #vertical, but the theme
  // never loaded that plugin, so on any page with #vertical it threw instead.
}());
