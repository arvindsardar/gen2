(function ($) {
	jQuery(document).ready(function () {

		$(window).bind('scroll', function () {
			if ($(window).scrollTop() > 50) {
				$('body').addClass('scrolled');
			} else {
				$('body').removeClass('scrolled');
			}
		});

		$('.gen2-nav-toggle').click(function(){
			$(this).next('ul.menu').toggleClass('menu-active');
		});



	}); // end doc ready
})(jQuery); //end compatibility