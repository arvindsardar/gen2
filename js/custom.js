(function ($) {
	jQuery(document).ready(function () {

	//smooth scrolling
		$(window).bind('scroll', function () {
			if ($(window).scrollTop() > 250) {
				$('body').addClass('scrolled');
			} else {
				$('body').removeClass('scrolled');
			}
		});


		//show/hide mobile menu
		$('.mobilemenu-button').click(function(){
			$(this).toggleClass('active');
			$('body').toggleClass('offscreen-menu-active');
		});

		//add arrow toggle & expand sub-menu
		$('.offscreen-menu .menu-item-has-children > a').append('<i class="showmore fas fa-caret-right"></i>');
		$('.offscreen-menu .menu-item-has-children > a .showmore').click(function (event) {
			event.preventDefault();
			$(this).parent().next('.sub-menu').slideToggle('slow');
			$(this).toggleClass('open');
		});

		//show/hide search
		$('.gen2-searchtoggle-button').click(function(){
			$('#searchform-header').slideToggle();
			$('.searchinput').focus();
		});
		//close button
		$('.unsearch').click(function(){
			$('#searchform-header').slideToggle();;
		});


	}); // end doc ready
})(jQuery); //end compatibility