jQuery(document).ready(function($){
	/* IE Retrofitting & Etc Styling */
	$('li:last-child, p:last-child').addClass('last-child');
	/*$('.about-honoree p:nth-child(3)').addClass('first-p');*/
	$('.become-a-sponsor article p:first-child').prepend('<span class="st-btn-spacer"></span>');
	
	/* Hacks */
	$('#b-65 strong').html('Susan Sandler and <br />Steve Phillips');
	$('#b-68 strong').html('Angelica Salas and Coalition for Humane Immigrant Rights of <br />Los Angeles');

	/* Sitewide WP Menu */
	$('nav.site a').each(function(){
		var $subtitle = $(this).attr('title');
		$(this).append($subtitle);
	});

	/* Anchor Link Scrolling */
	$('nav.page ul').localScroll({
		duration:500,
		hash:true
		});

	/* Honorees Carousel */
	$('div.item:last-child').addClass('active');
	$('#myCarousel').carousel({
		interval: false
	});
	$('.honorees nav li button').each(function(index) {
		$(this).attr("data-slide-to", index);
	});
	/* Animate Height of Carousel:
	$('#myCarousel').bind('slide', function(e){
    	$('.carousel').animate({height: $(e.relatedTarget).outerHeight()},500);
    });*/
	
	/* Honoree Show/Hide */
	$('.honoree-nav button').click(function(){
		$('.honorees .carousel-inner').hide().css({opacity: 0});
		var $honoreeID = 'a' + $(this).attr('id').substring(1);
		$('.honorees .the-slider').animate({width: '100%'},250);
		$('#' + $honoreeID).show().animate({opacity: 1},500);
	});
	$('.about-honoree .close-btn').click(function(){
		$('.honorees .the-slider').animate({width: 0},250);
		$(this).parent('.about-honoree').animate({opacity: 0},250,function(){
			$(this).hide();
			$('.honorees .carousel-inner').show().animate({opacity: 1},500);
		});
	});
	$('.honorees nav li button').click(function(){
		$('.honorees .the-slider').animate({width: 0},100);
		$('.about-honoree').animate({opacity: 0},100,function(){
			$('.honorees .carousel-inner').show().animate({opacity: 1},500);
			$(this).hide();
		});
	});
	
	/* Sponsors: It Is A Mess */
	var $ssbutton = 'Our sponsors for 2016';
	$('.sponsor-scroll').click(function(){
		$(this).animate({opacity: 0},0,function(){
			$(this).html($ssbutton);
			// if($ssbutton == 'Our sponsors for 2016'){
			// 	$ssbutton = 'Our sponsors for 2016';
			// }else{
			// 	$ssbutton = 'Our sponsors for 2016';
			// }
			if($(this).hasClass('last-year')){
				$(this).removeClass('last-year');
				$(this).addClass('this-year');
				$('.this-years-sponsors .wrap').css('z-index','-1');
				$('li.this-year,li.full-list').hide().css({opacity: 0});
				$('.this-years-sponsors .the-slider').animate({width: '100%'},250);
				$('li.last-year').show().animate({opacity: 1},500);
			}else{
				$(this).removeClass('this-year');
				$(this).addClass('last-year');
				$('li.last-year,li.full-list').hide().css({opacity: 0});
				$('.this-years-sponsors .the-slider').css({left:0,right:'auto'});
				$('.this-years-sponsors .the-slider').animate({width: '0'},100,function(){
					$('.this-years-sponsors .the-slider').css({left:'auto',right:0});
				});
				$('li.this-year').show().animate({opacity: 1},500);
			}
			$(this).animate({opacity: 1},500);
		});
	});
	$('.sponsor-full').click(function(){
		$(this).animate({opacity: 0},0,function(){
			// $('.this-years-sponsors .wrap').css('z-index','-1');
			$('li.this-year,li.last-year').hide().css({opacity: 0});
			$('.this-years-sponsors .the-slider').animate({width: '100%'},250);
			$('li.full-list').show().animate({opacity: 1},500);
			$(this).animate({opacity: 1},500);
		});
	});
	$('li.sponsors .close-btn').click(function(){
		$('.this-years-sponsors .the-slider').animate({width: 0},250);
		$(this).parent().animate({opacity: 0},250,function(){
			$(this).hide();
			$('.sponsor-scroll').removeClass('this-year');
			$('.sponsor-scroll').addClass('last-year');
			$('.sponsor-scroll').html('Our sponsors for 2016');
/*			$('.sponsor-scroll').html('See last year&rsquo;s sponsors');*/
			$('li.this-year').show().animate({opacity: 1},500);
			$('.this-years-sponsors .wrap').css('z-index','1');
		});
	});
			
	/* Event Photos */		
	var $container = $('.event-photos ul');
	$container.imagesLoaded(function(){
		$container.masonry({
			itemSelector : 'li',
			columnWidth : 272
		});
	});
});