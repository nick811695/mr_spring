

$(document).ready(function(){

	/*-----hot_forum fall*/
	$('.hot_forum_box1 .hot_forum_hidden').css({
		"max-width":"0",
	});
	$('.hot_forum_box1 .hot_forum_hidden').delay(800).animate({
		"max-width":"1000",
	});

	function rand(min,max){
		var a=Math.floor( Math.random()*(max-min-1)+min);
		return a;
	}


	$(".card .knot").before("<div class='rope'></div>");
	$('.rope').append("<img src='images/rope.png'><img src='images/rope.png'><img src='images/rope.png'><img src='images/rope.png'><img src='images/rope.png'><img src='images/rope.png'><img src='images/rope.png'><img src='images/rope.png'><img src='images/rope.png'>")
	


	$('.hot_forum_box').css("top","-800px");
	
	$('.hot_forum_box1').animate({
		"top": '50',
	},rand(200,500),);
	$('.hot_forum_box1').animate({
		"top": '-50',
	},rand(200,500),);
	$('.hot_forum_box1').animate({
		"top": '20',
	},rand(200,500),);
	$('.hot_forum_box1').animate({
		"top": '0',
	},rand(200,500),);

	$('.hot_forum_box2').animate({
		"top": '50',
	},rand(200,500),);
	$('.hot_forum_box2').animate({
		"top": '-50',
	},rand(200,500),);
	$('.hot_forum_box2').animate({
		"top": '20',
	},rand(200,500),);
	$('.hot_forum_box2').animate({
		"top": '0',
	},rand(200,500),);

	$('.hot_forum_box3').animate({
		"top": '50',
	},rand(200,500),);
	$('.hot_forum_box3').animate({
		"top": '-50',
	},rand(200,500),);
	$('.hot_forum_box3').animate({
		"top": '20',
	},rand(200,500),);
	$('.hot_forum_box3').animate({
		"top": '0',
	},rand(200,500),);
	


	/*-----hot_forum_slide--------*/
	var sequence = 1; 
	$("#prev").click(function(){
		if (sequence==1) {
			sequence = 3;
			$(".hot_forum_box1 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box2 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box3 .hot_forum").css({
				left:0,
				opacity: 1,
			});
			$(".hot_forum_box1").css('z-index',"10");
			$(".hot_forum_box3").css('z-index',"999");
			$(".hot_forum_box2").css('z-index',"10");
			$(".hot_forum_box1").stop().animate({
				'left':10,
			});
			
			$(".hot_forum_box3").stop().animate({
				'left':100,
			});
			$(".hot_forum_box2").stop().animate({
				'left':966,
			});
			

			$(".hot_forum_box1 .card").addClass('zoom_out');
			$(".hot_forum_box2 .card").addClass('zoom_out');
			$(".hot_forum_box3 .card").addClass('zoom_in');
			$(".hot_forum_box3 .card").removeClass('zoom_out');
		}else if(sequence==2){
			sequence = 1;
			
			$(".hot_forum_box1 .hot_forum").css({
				left:0,
				opacity: 1,
			});
			$(".hot_forum_box2 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box3 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box1").css('z-index',"999");
			$(".hot_forum_box3").css('z-index',"10");
			$(".hot_forum_box2").css('z-index',"10");
			$(".hot_forum_box1").stop().animate({
				'left':100,
				'z-index':999,
			});
			$(".hot_forum_box2").stop().animate({
				'left':10,
				'z-index':10,
			});
			$(".hot_forum_box3").stop().animate({
				'left':966,
				'z-index':10,
			});
			

			$(".hot_forum_box1 .card").addClass('zoom_in');
			$(".hot_forum_box2 .card").addClass('zoom_out');
			$(".hot_forum_box3 .card").addClass('zoom_out');
			$(".hot_forum_box1 .card").removeClass('zoom_out');
		}else{
			sequence = 2;
			$(".hot_forum_box1 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box2 .hot_forum").css({
				left:0,
				opacity: 1,
			});
			$(".hot_forum_box3 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box1").css('z-index',"10");
			$(".hot_forum_box3").css('z-index',"10");
			$(".hot_forum_box2").css('z-index',"999");
			$(".hot_forum_box1").stop().animate({
				'left':966,
				'z-index':11,
			});
			$(".hot_forum_box2").stop().animate({
				'left':100,
				'z-index':999,
			});
			$(".hot_forum_box3").stop().animate({
				'left':10,
				'z-index':10,
			});
			

			$(".hot_forum_box1 .card").addClass('zoom_out');
			$(".hot_forum_box2 .card").addClass('zoom_in');
			$(".hot_forum_box3 .card").addClass('zoom_out');
			$(".hot_forum_box2 .card").removeClass('zoom_out');
		}
		
	});
	$("#next").click(function(){
		if (sequence==1) {
			sequence = 2;
			$(".hot_forum_box1 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box3 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box2 .hot_forum").css({
				left:0,
				opacity: 1,
			});

			$(".hot_forum_box1").css('z-index',"10");
			$(".hot_forum_box3").css('z-index',"10");
			$(".hot_forum_box2").css('z-index',"999");
			$(".hot_forum_box2").stop().animate({
				'left':100,
			});
			$(".hot_forum_box3").stop().animate({
				'left':10,
			});
			$(".hot_forum_box1").stop().animate({
				'left':966,
			});
			
			
			$(".hot_forum_box2 .card").addClass('zoom_in');
			$(".hot_forum_box1 .card").addClass('zoom_out');
			$(".hot_forum_box3 .card").addClass('zoom_out');
			
			$(".hot_forum_box2 .card").removeClass('zoom_out');
		}else if(sequence==2){
			sequence = 3;
			
			$(".hot_forum_box3 .hot_forum").css({
				left:0,
				opacity: 1,
			});
			$(".hot_forum_box2 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box1 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});

			$(".hot_forum_box1").css('z-index',"10");
			$(".hot_forum_box3").css('z-index',"999");
			$(".hot_forum_box2").css('z-index',"10");
			$(".hot_forum_box3").stop().animate({
				'left':100,
				'z-index':999,
			});
			$(".hot_forum_box1").stop().animate({
				'left':10,
				'z-index':11,
			});
			$(".hot_forum_box2").stop().animate({
				'left':966,
				'z-index':10,
			});
			

			$(".hot_forum_box3 .card").addClass('zoom_in');
			$(".hot_forum_box2 .card").addClass('zoom_out');
			$(".hot_forum_box1 .card").addClass('zoom_out');
			$(".hot_forum_box3 .card").removeClass('zoom_out');
		}else{
			sequence = 1;
			$(".hot_forum_box2 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});
			$(".hot_forum_box1 .hot_forum").css({
				left:0,
				opacity: 1,
			});
			$(".hot_forum_box3 .hot_forum").css({
				left:-2000,
				opacity: 0,
			});


			$(".hot_forum_box1").css('z-index',"999");
			$(".hot_forum_box3").css('z-index',"10");
			$(".hot_forum_box2").css('z-index',"10");
			$(".hot_forum_box1").stop().animate({
				'left':100,
			});
			$(".hot_forum_box2").stop().animate({
				'left':10,
			});
			$(".hot_forum_box3").stop().animate({
				'left':966,
			});
			
			

			$(".hot_forum_box2 .card").addClass('zoom_out');
			$(".hot_forum_box1 .card").addClass('zoom_in');
			$(".hot_forum_box3 .card").addClass('zoom_out');
			$(".hot_forum_box1 .card").removeClass('zoom_out');
		}
	});
	/*--card link--*/
	$(".card").click(function (){
		window.location = 'forum_article.html';
	});
	/*---filter---*/
	var count1=0;
	var count2=0;
	var k1 = 0;
	var k2 = 0;
	$("#kind_of_forum_box").click(function(){
		k1++;
		console.log(k1);
		if(k1%2==1){
			$(this).css({
				"max-height": 300,
			});
		}else{
			$(this).css({
				"max-height": 40,
			});
		}
		
	});
	$("#item_of_forum_box").click(function(){
		k2++;
		console.log(k2);
		if(k2%2==1){
			$(this).css({
				"max-height": 1000,
			});
		}else{
			$(this).css({
				"max-height": 40,
			});
		}
	});


	$('.kind_of_forum li label').click(function(){
		var check = $(this).siblings("input").prop('checked');
		if (check == false) {
			$(this).siblings("img").css({
				"opacity":"1",
			})
			count1++;
		}else if(check == true){
			$(this).siblings("img").css({
				"opacity":"0",
			})
			count1--;
		}
		$(this).parent().parent().siblings(".count").text(count1);

	});
	$('.item_of_forum li label').click(function(){
		var check = $(this).siblings("input").prop('checked');
		if (check == false) {
			$(this).siblings("img").css({
				"opacity":"1",
			})
			count2++;
		}else if(check == true){
			$(this).siblings("img").css({
				"opacity":"0",
			})
			count2--;
		}
		$(this).parent().parent().siblings(".count").text(count2);
	});





	/*---tag----*/
	$(".forum .forum_item span").click(function(){
		var temp = $(this).text();
		$(".forum_search input").val(temp);
		$(".forum_search input").focus();
	});



	/*----methods----*/
	var i=0;
	$(".forum_methods").click(function(){
		i++;
		if (i%2==1) {
			$(this).siblings(".forum_methods_menu").css({
				"max-height": 1000,
			});
			$(this).siblings(".mask").css({
				"display":"block",
			});
		}else{
			$(this).siblings(".forum_methods_menu").css({
				"max-height": 0,
			});
			$(this).siblings(".mask").css({
				"display":"none",
			});
		}
		
		
	});

	$(".mask").click(function(){
		i++;
		$(".forum_methods_menu").css("max-height","0");
		$(".mask").css("display","none");
	});

	/*----like-----*/

	$(".heart_icon ").click(function(){
		if ($(this).hasClass('solid_heart')) {
			$(this).attr("src","../images/hollow_heart.png");
			$(this).removeClass('solid_heart');
			$(this).addClass('hollow_heart');
		}else {
			$(this).attr("src","../images/solid_heart.png");
			$(this).removeClass('hollow_heart');
			$(this).addClass('solid_heart');
		}
		
	});
});


