function addPoll(input){
	var poll = document.createElement("div");
	poll.className = "poll";
	var text = document.createTextNode(input);
	poll.appendChild(text);
	var element = document.getElementsByTagName("body")[0];
	element.appendChild(poll);
}
function pressEnter(){
	if ( event.keycode == 13){
		document.getElementById("lisa").click();
	}
}
function lisa(){
	var input = document.getElementsByName("pealkiri").value;	
}
function hideMenu() {
    document.getElementById("menu").style.display = 'none';
	document.getElementById("otsing").style.display = 'none';
	document.getElementById("ankeet").style.display = 'block';
	document.getElementById("ankeet").style.clear = 'both';
}
function showMenu(){
	document.getElementById("menu").style.display = 'block';
	document.getElementById("otsing").style.display = 'block';
	document.getElementById("ankeet").style.display = 'none';
}
