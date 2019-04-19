$(document).ready(function(){
	// var card_num = $('.card').length;
	// for(let i=0;i<card_num;i++){

	// }

	$('.cards').click(function(){
		temp_card = $(this).html();
		card_name = $(this).children('.card').children(".front").children(".card_name").text();
		card_item1 = $(this).children('.card').children(".front").children(".card_item_box").children(".card_item1").children(".card_item_name").html();
		card_item2 = $(this).children('.card').children(".front").children(".card_item_box").children(".card_item2").children(".card_item_name").html();
		card_item3 = $(this).children('.card').children(".front").children(".card_item_box").children(".card_item3").children(".card_item_name").html();
		card_item4 = $(this).children('.card').children(".front").children(".card_item_box").children(".card_item4").children(".card_item_name").html();
		
		$('#nextStep').click(function(){
			$('#add_card').html(temp_card);
			$('.springCard').html('更換湯牌');
			$('.selected_card_data').html("<h3>"+card_name+"</h3>"+"<div class='item_box'>"+card_item1+card_item2+card_item3+card_item4+"</div>");
		});


	});
});