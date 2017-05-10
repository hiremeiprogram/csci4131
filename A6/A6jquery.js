var switched = false;

$(document).ready(function(){
var count = 0;
	    $("div.blacksquare").click(function(){
		if(count < 3 ){
		$("div").animate({left: '-=200px'});
		count += 1;
		}
		else{
		$("div").animate({left: '+=200px'});
		count += 1;
		if(count > 5){
		count = 0;
		}
		}
	    });
	});

$(document).ready(function(){

	    $("div.redsquare").click(function(){
		if(switched){
		$("div.redsquare").animate({top: '0px'});
		$("div.violetsquare").animate({top: '600px'});
		switched = false;
		}
		else{
		$("div.redsquare").animate({top: '600px'});
		$("div.violetsquare").animate({top: '0px'});
		switched = true;
		}
		
	    });
	});

$(document).ready(function(){
	    $("div.violetsquare").click(function(){
		if(switched){
		$("div.redsquare").animate({top: '0px'});
		$("div.violetsquare").animate({top: '600px'});
		switched = false;
		}
		else{
		$("div.redsquare").animate({top: '600px'});
		$("div.violetsquare").animate({top: '0px'});
		switched = true;
		}
		
	    });
	});
