

function rand(min,max){
	var a=Math.floor( Math.random()*(max-min-1)+min);
	return a;
}

$(document).ready(function(){
	$('.card1').css("top","-800px");
	$('.card2').css("top","-800px");
	$('.card3').css("top","-800px");
	$('.card4').css("top","-800px");
	$('.card5').css("top","-800px");

	$('.card1').animate({
			top: '50px'
		},rand(800,1000),"easeInQuad");
	$('.card2').animate({
			top: '50px'
		},rand(800,1000),"easeInQuad");
	$('.card3').animate({
			top: '50px'
		},rand(800,1000),"easeInQuad");
	$('.card4').animate({
			top: '50px'
		},rand(800,1000),"easeInQuad");
	$('.card5').animate({
			top: '50px'
		},rand(800,1000),"easeInQuad");


	$('.card1').animate({
			top: '-100px'
		},rand(300,700));
	$('.card2').animate({
			top: '-100px'
		},rand(300,700));
	$('.card3').animate({
			top: '-100px'
		},rand(300,700));
	$('.card4').animate({
			top: '-100px'
		},rand(300,700));
	$('.card5').animate({
			top: '-100px'
		},rand(300,700));

	$('.card1').delay(100).animate({
			top: '10px',
		},rand(300,700));
	$('.card2').delay(100).animate({
			top: '10px',
		},rand(300,700));
	$('.card3').delay(100).animate({
			top: '10px',
		},rand(300,700));
	$('.card4').delay(100).animate({
			top: '10px',
		},rand(300,700));
	$('.card5').delay(100).animate({
			top: '10px',
		},rand(300,700));

	$('.card1').animate({
			top: '0px',
		},rand(800,1800));
	$('.card2').animate({
			top: '0px',
		},rand(800,1800));
	$('.card3').animate({
			top: '0px',
		},rand(800,1800));
	$('.card4').animate({
			top: '0px',
		},rand(800,1800));
	$('.card5').animate({
			top: '0px',
		},rand(800,1800));
});		