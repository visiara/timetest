/*!
 * Bracket Plus v1.1.0 (https://themetrace.com/bracketplus)
 * Copyright 2017-2018 ThemePixels
 * Licensed under ThemeForest License
 */

'use strict';

$(document).ready(function(){

  // Toggles sidebar menu between expanded and collapsed states
  $('#btnLeftMenu').on('click', function(){
    var menuText = $('.menu-item-label');

    if($('body').hasClass('collapsed-menu')) {
      $('body').removeClass('collapsed-menu');
      $('.show-sub + .br-menu-sub').slideDown();
      $('.br-sideleft').one('transitionend', function() {
        menuText.removeClass('op-lg-0-force d-lg-none');
      });
    } else {
      $('body').addClass('collapsed-menu');
      $('.show-sub + .br-menu-sub').slideUp();
      menuText.addClass('op-lg-0-force');
      $('.br-sideleft').one('transitionend', function() {
        menuText.addClass('d-lg-none');
      });
    }
    return false;
  });

  // Expands the sidebar menu when hovering over it in collapsed mode
  $(document).on('mouseover', function(e){
    e.stopPropagation();
    if($('body').hasClass('collapsed-menu') && $('#btnLeftMenu').is(':visible')) {
      var targ = $(e.target).closest('.br-sideleft').length;
      if(targ) {
        $('body').addClass('expand-menu');
        $('.show-sub + .br-menu-sub').slideDown();
        $('.menu-item-label').removeClass('d-lg-none op-lg-0-force');
      } else {
        $('body').removeClass('expand-menu');
        $('.show-sub + .br-menu-sub').slideUp();
        $('.menu-item-label').addClass('op-lg-0-force d-lg-none');
      }
    }
  });

  // Handles multi-level navigation menu interactions
  $('.br-sideleft').on('click', '.br-menu-link', function(){
    var nextElem = $(this).next();
    var thisLink = $(this);

    if(nextElem.hasClass('br-menu-sub')) {
      if(nextElem.is(':visible')) {
        thisLink.removeClass('show-sub');
        nextElem.slideUp();
      } else {
        thisLink.closest('.br-menu-sub').find('.show-sub').removeClass('show-sub').next('.br-menu-sub').slideUp();
        thisLink.addClass('show-sub');
        nextElem.slideDown();
      }
      return false;
    }
  });

  // Shows sidebar on mobile when button is clicked
  $('#btnLeftMenuMobile').on('click', function(){
    $('body').addClass('show-left');
    return false;
  });

  // Shows right sidebar when button is clicked
  $('#btnRightMenu').on('click', function(){
    $('body').addClass('show-right');
    return false;
  });

  // Hides sidebar when clicking outside of it
  $(document).on('click touchstart', function(e){
    e.stopPropagation();
    if($('body').hasClass('show-left') && !$(e.target).closest('.br-sideleft').length) {
      $('body').removeClass('show-left');
    }
    if($('body').hasClass('show-right') && !$(e.target).closest('.br-sideright').length) {
      $('body').removeClass('show-right');
    }
  });

  // Displays live time and date in the right sidebar
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#brDate').html(momentNow.format('MMMM DD, YYYY') + ' ' + momentNow.format('ddd').toUpperCase());
    $('#brTime').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  // Initializes date picker
  if($().datepicker) {
    $('.form-control-datepicker').datepicker()
      .on("change", function (e) {
        console.log("Date changed: ", e.target.value);
    });
  }

  // Custom scrollbar for different sidebar sections
  new PerfectScrollbar('.sideleft-scrollbar', { suppressScrollX: true });
  new PerfectScrollbar('.contact-scrollbar', { suppressScrollX: true });
  new PerfectScrollbar('.attachment-scrollbar', { suppressScrollX: true });
  new PerfectScrollbar('.schedule-scrollbar', { suppressScrollX: true });
  new PerfectScrollbar('.settings-scrollbar', { suppressScrollX: true });

  // Initializes datepicker for input fields
  $('.datepicker').datepicker();

  // Toggles switch button state
  $('.br-switchbutton').on('click', function(){
    $(this).toggleClass('checked');
  });

  // Initializes Peity charts
  $('.peity-bar').peity('bar');

  // Syntax highlighting for code blocks
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });

  // Initializes Bootstrap tooltips
  $('[data-toggle="tooltip"]').tooltip();
  $('[data-popover-color="default"]').popover();

  // Closes popovers when clicking outside
  $(document).on('click', function (e) {
    $('[data-toggle="popover"],[data-original-title]').each(function () {
      if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
        (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false;
      }
    });
  });

  // Initializes Select2 dropdowns
  if($().select2) {
    $('.select2').select2({ minimumResultsForSearch: Infinity, placeholder: 'Choose one' });
    $('.select2-show-search').select2({ minimumResultsForSearch: '' });
    $('.select2-tag').select2({ tags: true, tokenSeparators: [',', ' '] });
  }
});
