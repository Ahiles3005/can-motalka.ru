$(document).ready(function() {

$('ul.nav li.dropdown').hover(function() {
	$(this).find('.dropdown-menu').hide();
  $(this).find('.dropdown-menu').stop(true, true).delay(150).fadeIn(300);
}, function() {

  $(this).find('.dropdown-menu').stop(true, true).delay(400).fadeOut(300);
});

});
function megamenu_adapMenu(){
	$(".megamenu-bigblock").css('width',$(".megamenu-menu").outerWidth()-10);
	$('.megamenu-menu .dropdown-menu').each(function() {
		var menu = $('.megamenu-menu').offset();
		var dropdown = $(this).parent().offset();

		var i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('.megamenu-menu').outerWidth());

		if (i > 0) {
			$(this).css('margin-left', '-' + (i + 3) + 'px');
		}		
		var l=$(this).outerWidth()-2;			
		$(this).find(".megamenu-ischild-simple").css('left',l);
		
	});
	
}
!function(n){var a={columns:4,classname:"column",min:1};n.fn.autocolumnlist=function(l){var s=n.extend({},a,l);return this.each(function(){var a=n(this).data();a&&n.each(a,function(n,a){s[n]=a});var l=n(this).find("> li"),c=l.length;if(c>0){var t=Math.ceil(c/s.columns);t<s.min&&(t=s.min);var e=0,u=t;for(i=0;i<s.columns;i++)i+1==s.columns?l.slice(e,u).wrapAll('<div class="'+s.classname+' last" />'):l.slice(e,u).wrapAll('<div class="'+s.classname+'" />'),e+=t,u+=t}})}}(jQuery);
    (function ($) {
        $(function () {
            $('.list-unstyled megamenu-haschild').autocolumnlist({
                columns: 5
            });
        })
    })(jQuery)