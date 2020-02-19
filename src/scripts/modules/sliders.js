import $ from 'jquery';
import 'slick-carousel';

/* Your code here */

window.initSliders = () => {
	
	$('.js-slider:not(.slick-initialized)').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 4000,
		speed: 500,
		dots: true,
		arrows: false
	});
	
}

$(document).ready(initSliders)

if( window.acf ) {
    window.acf.addAction( 'render_block_preview/type=slider-block', initSliders )
}