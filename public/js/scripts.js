$(document).ready(function() {
    $('#fullpage').fullpage({
		sectionsColor: ['#000000', '#5c5d5e', '#000000', '#000000', '#000000', '#000000', '#000000', '#5c5d5e', '#000000', '#5c5d5e'],
		anchors:['firstSection','tenthSection' , 'secondSection', 'thirdSection', 'fourthSection', 'fifthSection', 'sixthSection', 'seventhSection', 'eighthSection', 'ninethSection'],
        autoScrolling: false,
		menu: '.main-nav ul',
	});
});
