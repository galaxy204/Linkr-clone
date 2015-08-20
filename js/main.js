function _(x){
	return document.getElementById(x);
}


function restrict(elem){
	var tf = _(elem);
	var rx = new RegExp;
	if(elem == "email"){
		rx = /[' "]/gi;
	} else if(elem == "username"){
		rx = /[^a-z0-9_]/gi;
	} else if(elem == "fullname") {
		rx = /[^a-z0-9 ]/gi;
	} else if(elem == "position") {
		rx = /[^a-z0-9 .]/gi;
	} else if(elem == "organization") {
		rx = /[^a-z0-9 .]/gi;
	} else if(elem == "phone") {
		rx = /[^0-9+ ]/;
	} else if(elem == "filter") {
		rx = /[^a-z0-9.]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}

function emptyElement(x){
	_(x).innerHTML = "";
}

function notification(msg) {
	_('notification').style.display = "block";
	_('notification').innerHTML = '<p>'+msg+'</p>';
	$('#notification').fadeOut(5000, queue = false);
}

function checked(elem) {
	var check = _(elem).checked;
	if ( check == true ) {
		return '1';
	} else {
		return '0';
	}
}

// Micro-time
function microtime(get_as_float)
{
	var unixtime_ms = (new Date).getTime();
	var sec = Math.floor(unixtime_ms/1000);
	uploadTime = get_as_float ? (unixtime_ms/1000) : (unixtime_ms - (sec * 1000))/1000 + ' ' + sec;

	var rx = new RegExp;
	var rx = /[ .]/gi;
	var uploadTime = uploadTime.replace(rx, "");

	return uploadTime;
}

// Get id from mixed div# from the end
function idFromStr(string) {
	var id = string;
	var id = id.split('-');
	var id = id[id.length - 1];
	return id;
}

//cuts the file name only from the full path @ arif
function baseName(str){
	var base = new String(str).substring(str.lastIndexOf("\\") + 1);
	return base;
}


// popup box
$('.popup').click(function() {
	$this = $(this);
	var box = '<div class="display-popup"></div>';
	$('body').prepend(box);
	$('.display-popup').hide().fadeIn(400).delay(800);

	url = $this.attr('src');
	text = $this.next('.list-img-title').text();
	appendText = '<p>' + text + '</p>';
	appendText += '<img src="'+ url +'">';
	$('.display-popup').html(appendText);

	var height = $(window).height();
	var width = $(window).width();
	if( $('.display-popup').height() > 500 || $('.display-popup').width() > 500 ) {

		$('.display-popup').css({
			top: '20%',
			left: '30%',
			'max-height': '600px',
			'max-width': '600px'
		});

		$('.display-popup').find('img').css({
			'max-width'	: '550px',
			'max-height'	: '550px'
		});

	} else {
		var top = ( height - $('.display-popup').height() ) / 2;
		var left = ( width - $('.display-popup').width() ) / 2;

		$('.display-popup').css({
			top: top + 'px',
			left: left + 'px',
		});
	}

	// background shadow
	var spaceShadow = '<div class="space-shadow"></div>';
	$('body').prepend(spaceShadow);
	$('.space-shadow').css({
		background: 'rgba(0, 0, 0, .3)',
		width		: width,
		height		: height,
		'z-index'	: '99999999999999',
		position	: 'fixed'

	});

});

$(document).mouseup(function (e)
{
	var container = $(".display-popup");

	if (!container.is(e.target) // if the target of the click isn't the container...
		&& container.has(e.target).length === 0) // ... nor a descendant of the container
	{
		container.hide();
		$('body').find('.space-shadow').remove();
	}
});

$(document).ready(function() {
	(function() {
		var height = $(window).height();
		$('#right_form').css({
			'min-height': height + 'px'
		});
	})();
});


/*
|------------------------------------------------------------------------------------------------
| 4. Mr. Arif
|------------------------------------------------------------------------------------------------
*/
//show current date and time in this format: Wed Aug 19 2015 23:31 PM
//Credit: Flame Trap(Stackoverflow)
function formatAMPM() {
	var d = new Date(),
		minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
		hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
		ampm = d.getHours() >= 12 ? ' PM' : ' AM',
		months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
		days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
	return months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear()+' '+hours+':'+minutes+ampm;
}




