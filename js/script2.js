$(document).ready(function () {

	$(".meni1  ul  li").mouseout(function(){
		$("a",this).css("color","#344C0E");
		$("> ul",this).css("display","none");
	});

	$(".meni1  ul  li").mouseover(function(){

		$("a",this).css("color","#990066");
		$("> ul",this).css("display","block");
	});


	$(".meni1 ul li").mouseout(function(){
		$(this).css("background-color","#C6E2FF");
	});

	$(".meni1 ul li").mouseover(function(){
		$(this).css("background-color","#FFDAB9");
	});

	$(".menu1  ul  li").mouseout(function(){
		$("a",this).css("color","#344C0E");
	});

	$(".menu1  ul  li").mouseover(function(){

		$("a",this).css("color","#990066");
	});
});
