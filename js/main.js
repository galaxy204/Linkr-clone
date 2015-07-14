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
		rx = /[^a-z0-9 ]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}

function emptyElement(x){
	_(x).innerHTML = "";
}
