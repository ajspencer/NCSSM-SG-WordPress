(function ($, console) {
  'use strict';
  if (typeof console !== 'object') {
    console = {};
  }
  if (typeof console.log !== 'function') {
    console.log = function () {
    }
  }
  var log = function () {
    var args = Array.prototype.slice.call(arguments, 0);
    args.unshift('everestMobileNav:');
    console.log.apply(console, args);
  };

  $.everestMobileNav = function (nav, options) {
    this.$nav = $(nav);
    this.nav = nav;
    this.$nav.data('everestMobileNav', this);

    var me = this;

    me.toggleMenu = function($li, $expand){
      if(typeof $expand !== 'object'){
        $expand = $li.children('.' + me.options.classes.expander).first();
      }
      if($li.hasClass(me.options.classes.expanded)){
        $li.removeClass(me.options.classes.expanded);
        $expand.text('+');
      }else{
        $li.addClass(me.options.classes.expanded);
        $expand.text('‐');
      }
    };

    me.init = function () {
      me.options = $.extend(true, {}, $.everestMobileNav.defaults, options);

      me.$nav.addClass('everest-mobile-nav');

      me.$nav.on('click', '.' + me.options.classes.expander, function(ev){
        var $expand = $(ev.target);
        me.toggleMenu($expand.parent().first(), $expand);
        ev.preventDefault();
      });

      if(!!me.options.disableTopLevel){
        me.$nav.on('click', '.' + me.options.classes.topLevel + ' > .' + me.options.classes.parent + ' > a', function(ev){
          var $li = $(ev.target).closest('.' + me.options.classes.item);
          me.toggleMenu($li);
          ev.preventDefault();
        });
      }

      me.$nav.on('mouseup', '.' + me.options.classes.topExpander, function(ev){
        me.$nav.toggleClass(me.options.classes.topExpanded);
        ev.preventDefault();
      });

      me.$nav.on('click', '.' + me.options.classes.topExpander + ' a', function(ev){
        ev.preventDefault();
      });

      me.$nav.find('.' + me.options.classes.parent).each(function(i,e){
        $(e).append($('<div class="' + me.options.classes.expander + '">+</div>'));
      });
      me.$nav.prepend('<div class="' + me.options.classes.topExpander + '"><a href="#">Menu</a><div><span></span><span></span><span></span></div></div>');

      me.$nav.html(me.$nav.html().replace(/>\s+</g,'><'));

    };

    me.init();
  };

  $.everestMobileNav.defaults = {
    classes: {
      topExpander: 'nav-top-expand',
      topExpanded: 'nav-top-expanded',
      expander: 'nav-expand',
      expanded: 'nav-expanded',
      parent: 'menu-item-has-children',
      item: 'menu-item',
      topLevel: 'nav-menu'
    },
    disableTopLevel: false
  };


  $.fn.everestMobileNav = function (options) {
    return this.each(function () {
      (new $.everestMobileNav(this, options));
    });
  };
})(jQuery, window.console);