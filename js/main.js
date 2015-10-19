//========================
//  Flexslider
//========================
jQuery(window).load(function(){
	jQuery(".flexslider").flexslider({
		animation:"slide",
		controlNav: true, 
		start:function(){
			jQuery(".site-main").find(".flexslider-wrapper").removeClass("loading");
			jQuery(".spinner").hide();
		}
	});
});


jQuery(document).ready(function($){
	
	//When we click on every menu section we show the menu dishes
	$('.js-menu-switcher').on('click', function() {
		// $(this).find('.menu-hidden').slideToggle();
		$(this).next('.js-menu').toggleClass('menu-hidden');

		//we show the first menu sub-section by default
		$(this).next().find('.menu-dish-wrapper:first-child').addClass('menu-show');

		//we add an active class by default to the first dish section
		$(this).next().find('.js-menu-select_item').removeClass('menu-select__item--active');
		$(this).next().find('.js-menu-select_item:first-child').addClass('menu-select__item--active');
	});

	//we make a mini-function to extrac the numerical part of every ID
	var getNumericIdPart = function(id) {
		var $num = id.replace(/[^\d]+/, '');
		return $num;
	};

	//When we click on every menu item we get its ID and switch menu
	$('.js-menu-select_item').on('click', function() {
		var menu_item_id = $(this).attr('id');
		var menu_item_num_id = getNumericIdPart( menu_item_id );

		$('.js-menu_section .menu-content').find('.menu-dish-wrapper').removeClass('menu-show');
		$('#menu-dish-'+menu_item_num_id).addClass('menu-show');

		//add an active class to the menu selected
		$(this).siblings().removeClass('menu-select__item--active');
		$(this).addClass('menu-select__item--active');
	});
});

//========================
// fancybox Newsletter
//========================
jQuery(function($) {
	$(".button-news-fancy").fancybox(
	{
		padding : 0
	});
});

//========================
// fancybox Press page
//========================

jQuery(function($) {
	$(".fancybox").fancybox(
	{
		padding : 0
	});
});
