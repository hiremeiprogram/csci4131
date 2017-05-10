var interval = 0;

var count = 0;

var beginning = true;
var auto = true;

var uno = document.createElement("IMG");
uno.setAttribute("src", "JavascriptCookbook.jpg");
uno.setAttribute("alt", "Javascript Cookbook");
uno.setAttribute("height", "295");
uno.setAttribute("width", "800");
uno.setAttribute("title", "Javascript Cookbook");
uno.setAttribute("onclick", "window.open('JavascriptCookbook.jpg');");
var dos = document.createElement("IMG");
dos.setAttribute("src", "learningPerl.jpg");
dos.setAttribute("alt", "Learning Perl");
dos.setAttribute("height", "295");
dos.setAttribute("width", "800");
dos.setAttribute("title", "Learning Perl");
dos.setAttribute("onclick", "window.open('learningPerl.jpg');");
var tres = document.createElement("IMG");
tres.setAttribute("src", "modernPHP.jpg");
tres.setAttribute("alt", "Modern PHP");
tres.setAttribute("height", "295");
tres.setAttribute("width", "800");
tres.setAttribute("title", "Modern PHP");
tres.setAttribute("onclick", "window.open('modernPHP.jpg');");
var quatro = document.createElement("IMG");
quatro.setAttribute("src", "mysqlCookbook.jpg");
quatro.setAttribute("alt", "My SQL Cookbook")
quatro.setAttribute("height", "295");
quatro.setAttribute("width", "800");
quatro.setAttribute("title", "My SQL CookBook");
quatro.setAttribute("onclick", "window.open('mysqlCookbook.jpg');");

var go = setInterval(automatic, interval);

function next(){
	if(count == 0){
		if(beginning == false){
			document.body.removeChild(quatro);
		}
		document.body.appendChild(uno);
		count = 1;
		beginning = false;
	}
	else if(count == 1){
		document.body.appendChild(dos);
		document.body.removeChild(uno);
	
		count = 2;
	}
	else if(count == 2){
		document.body.removeChild(dos);
		document.body.appendChild(tres);
		count = 3;
	}
	else if(count == 3){
		document.body.removeChild(tres);
		document.body.appendChild(quatro);
		count = 0;
	}
}

function previous(){
	if(count == 0){
		document.body.removeChild(quatro);
		document.body.appendChild(tres);
		count = 3;
	}
	else if(count == 1){
		document.body.removeChild(uno);
		document.body.appendChild(quatro);
		count = 0;
	}
	else if(count == 2){
		document.body.removeChild(dos);
		document.body.appendChild(uno);
		count = 1;
	}
	else if(count == 3){
		document.body.removeChild(tres);
		document.body.appendChild(dos);
		count = 2;
	}
}

function automatic(){
	auto = true;
	if(count == 0){
		manual();
		interval = 3000;
		next();
		go = setInterval(automatic, interval);
	}
	else if(count == 1){
		manual();
		interval = 5000;
		next();
		go = setInterval(automatic, interval);
	}
	else if(count == 2){
		manual();
		interval = 3000;
		next();
		go = setInterval(automatic, interval);
	}
	else if(count == 3){
		manual();
		interval = 7000;
		next();
		go = setInterval(automatic, interval);
	}
}

function manual(){
	clearInterval(go);
	auto = false;
}


