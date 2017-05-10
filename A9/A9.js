$(document).ready(function(){ 
    $("#myform").submit(function(event){
	if(!$("#first").val() || !$("#last").val() || !$("#addone").val() || !$("#city").val() || !$("#state").val() || !$("#zip").val() ){
		alert("fill all necessary text fields");
		event.preventDefault(); 
	}
    }); 
});
