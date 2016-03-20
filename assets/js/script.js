$(document).ready(function() {

	// STEP 1. HOUSE AND PLANTS
	// --------------------------------------------------------------------------------

	// if it's the page that has the house on it (homepage), then do all this stuff
	if ($('#house').length){

		// create svg drawing of house
		var draw_house = SVG('house').size(514,648)

		// create pattern
		var pattern = draw_house.image('assets/images/checkered.png')
		pattern.size(972, 972)

		// create house
		var house = draw_house.polyline()
		house.plot([[257,0], [0,257], [0,604], [514,604], [514,257]])

		// clip image with house
		pattern.clipWith(house)

		// add door
		var door = draw_house.rect(144,282).move(72, 322).addClass('door')
		var doorhandle = draw_house.circle(10).fill('#b59467').move(195,466)

		// make svg responsive
		var svg = $('#house').find('svg')[0];

		svg.setAttribute('viewBox', '0 0 ' + 514 + ' ' + 604);
		svg.setAttribute('preserveAspectRatio', 'xMinYMin meet');

		$(svg).css('width', '100%').css('height', '100%');

		// create svg drawing of plant
		var draw_plant = SVG('plant').size(32,76)

		// start stem
		var stem = draw_plant.rect(6, 60).fill('#00b159').move(14,15)

		// start flower
		var flower_center = draw_plant.circle(10,10).fill('#fff').move(12,10)
		var flower_petal_one = draw_plant.circle(10,10).fill('#fff64c').move(12,0)
		var flower_petal_two = draw_plant.circle(10,10).fill('#fff64c').move(22,10)
		var flower_petal_three = draw_plant.circle(10,10).fill('#fff64c').move(12,20)
		var flower_petal_four = draw_plant.circle(10,10).fill('#fff64c').move(2,10)

		// draw ellipsis
		var draw_ellipsis = SVG('ellipsis').size(48,8)
		var dot_one = draw_ellipsis.circle(8,8).fill('#00A856')
		var dot_two = draw_ellipsis.circle(8,8).fill('#00A856').move(14,0)
		var dot_three = draw_ellipsis.circle(8,8).fill('#00A856').move(28,0)

	}

	// STEP 2. TIME OF DAY WHEREVER YOU ARE
	// --------------------------------------------------------------------------------

	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();


	var hours = dt.getHours();
	var hours = (hours+24)%24; 
	var mid='am';
	if(hours == 0){ // At 00 hours we need to show 12 am
		hours = 12;
	}
	else if (hours == 12) {
		hours = 12;
		mid = 'pm';
	}
	else if (hours > 11) {
		hours = hours % 12;
		mid = 'pm';
	}

	var minutes = dt.getMinutes();

	if (minutes < 10) {
		var current_time = hours + ":" + '0' + minutes + " " + mid;
	}
	else {
		var current_time = hours + ":" + minutes + " " + mid;
	}

	$('#time-of-day').html(current_time);


	// STEP 3. CLICK THE FLOWER AND SEE BELOW IT
	// --------------------------------------------------------------------------------

	$('a#plant, a#ellipsis').click(function(){
		// $('body.home').css('overflow-y','scroll');
		var href = $.attr(this, 'href');
		alert(href);
	    $('html, body').animate({
	        scrollTop: $(href).offset().top
	    }, 500, function () {
	        window.location.hash = href;
	    });
	    return false;
	});


	// STEP 4. CLICK THE DOOR AND ENTER A ROOM
	// --------------------------------------------------------------------------------

	$('.door').click(function(){
		var rooms = ["yellow-room", "blue-room", "green-room", "red-room"];
		var random = rooms[Math.floor(Math.random()*rooms.length)];
		location.href = 'works/' + random; 
		// eventually I would like the rooms to be generated from the rooms dynamically in Kirby
	});


	// STEP 5. DON'T DISPLAY TIME OF DAY FOR MOBILE
	// --------------------------------------------------------------------------------

	function hide_show_time_of_day() {
		var window_height = $(window).height();
		if (window_height < 770) {
			$('#time-of-day').hide();
			$('#plugins').hide();
		}
		else {
			$('#time-of-day').show();
			$('#plugins').show();
		}
	}

	hide_show_time_of_day();
	$(window).on('resize',hide_show_time_of_day);


	// STEP 6. CLICK THE BUTTON AND MAKE THUMBNAILS MOVE
	// --------------------------------------------------------------------------------

	var state = 'paused';

	$('#play-pause').click(function(){

		if (state == 'paused') {
			$('img.moving').show();
			$('img.still').hide();
			$(this).html('||');
			state = 'playing';
		}
		else {
			$('img.moving').hide();
			$('img.still').show();
			$(this).html('▶');
			state = 'paused';
		}

		// console.log('state is now ' + state);

	});


	// STEP 7. CLICK ARROWS NEAR NEWS TO GO TO OTHER NEWS ITEMS IN TIME
	// --------------------------------------------------------------------------------

	var news_posts = $('.news-post');
	var news_count = news_posts.length;
	var current = news_count - 1;

	// display most recent news item initially
	function display_post() {

		news_posts.hide();
		$('.next, .prev').css('visibility', 'visible');

		var most_recent = news_posts[current];
		$(most_recent).show();
		// console.log("the current is " + current);

		if (current == news_count - 1) {
			$('.prev').css('visibility', 'hidden');
		}

		if (current == 0) {
			$('.next').css('visibility', 'hidden');
		}


	}

	display_post();

	// press next button and get next post
	$('.next').click(function(){
		current--;
		display_post();
	});

	// press next button and get next post
	$('.prev').click(function(){
		current++;
		display_post();
	});


	// STEP 8. CLICK THROUGH MULTI-IMAGE WORKS
	// --------------------------------------------------------------------------------

	// if there are multiple images, then do all this stuff
	if ($('img.multi').length){

		images = $('.multi-link img.multi');
		imageCount = images.length;
		imageCurrent = imageCount - images.length;
		
		// display one image
		function displayOneImage() {
			images.hide();
			visible = images[imageCurrent];
			$(visible).show();
			$('.slideshow-count').html(imageCurrent + 1 + " of " + imageCount);
		}

		displayOneImage();

		// press next button and get next post
		$('.multi-link').click(function(){
			imageCurrent++;
			displayOneImage();
			if(imageCurrent == imageCount - 1) {
				$('.multi-link').hide();
			}
		});

	}

});