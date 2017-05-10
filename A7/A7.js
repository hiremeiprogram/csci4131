$(document).ready(function(){ 
    $("#myform").submit(function(event){
	if(!$("#first").val() || !$("#last").val() || !$("#addone").val() || !$("#city").val() || !$("#state").val() || !$("#zip").val() ){
		alert("fill all necessary text fields");
		event.preventDefault(); 
	}
	else{	
		event.preventDefault();
		var first = document.getElementById('first').value;
		var last = document.getElementById('last').value;
		var addone = document.getElementById('addone').value;
		var addtwo = document.getElementById('addtwo').value;
		var city = document.getElementById('city').value;
		var state = document.getElementById('state').value;
		var zip = document.getElementById('zip').value;
		var data = new FormData();
		data.append('first', first);
		data.append('last', last);
		data.append('addone', addone);
		data.append('addtwo', addtwo);
		data.append('city', city);
		data.append('state', state);
		data.append('zip', zip);
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "A7.php", true);
		xhttp.onload = function(){
			document.getElementById('json').innerHTML = xhttp.responseText;
		};
		xhttp.send(data);
	}
    }); 
});
