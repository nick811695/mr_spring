$(document).ready(function(){
	// var card_num = $('.card').length;
	// for(let i=0;i<card_num;i++){

	// }

	$('.cards').click(function(){
		var temp = $(this).html();
		// console.log(temp);
		$('#add_card').html(temp);

	});
});