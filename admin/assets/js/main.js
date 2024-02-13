$(document).ready(function() {
	function aO(el, anim, onDone) {
		var $el = $(el);
		$el.addClass( 'animated ' + anim );
		$el.one( 'animationend', function() {
			$(this).removeClass( 'animated ' + anim );
			onDone && onDone();
		});
	}
	if($('.dashboard-save-notification').length){
		var query = window.location.search.substring(1)
		if(query.length) {
		   if(window.history != undefined && window.history.pushState != undefined) {
				window.history.pushState({}, document.title, window.location.pathname);
		   }
		}
		aO( $('.dashboard-save-notification'), 'bounceIn' );
		setTimeout(function() {	
			$('.dashboard-save-notification').fadeOut();
		}, 1500 );
	}
	var $toggleButton = $('.toggle-button'),
        $menuWrap = $('.mr-side-nav-wrapper');

    $toggleButton.on('click', function() {
        $(this).toggleClass('button-open');
        $menuWrap.toggleClass('menu-show');
    });
});