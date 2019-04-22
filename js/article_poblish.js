$(document).ready(function(){
	window_width = $(window).width();
	$(".lightbox_filter").click(function(){
		if ($(".lightbox_filter_box").hasClass("open") == false) {
			$(".lightbox_filter_box").addClass("open");
			$('#lightbox_filter_mask').css("display","block");
		}else{
			$(".lightbox_filter_box").removeClass("open");
			$('#lightbox_filter_mask').css("display","none");
		}
	});
	$('#lightbox_filter_mask').click(function(){
		$(".lightbox_filter_box").removeClass("open");
		$('#lightbox_filter_mask').css("display","none");
	});
	
});


var lightboxOnBtn = document.getElementsByClassName("springCard");
var lightboxOffBtn = document.getElementById("lightboxToggle");


lightboxOnBtn[0].addEventListener("click",lightboxOn);
lightboxOffBtn.addEventListener("click",lightboxOff);
document.getElementById('add_card').addEventListener("click",lightboxOn);
function lightboxOn(){
    document.getElementById('lightbox_wrapper').style.visibility = "visible";
    $('.card').click(function(){
    	$(".card").removeClass("card_selected");
    	$(this).addClass("card_selected");

		temp_card = $(this).parent('.cards').html();
		// card_name = $(this).children(".card_name").text();
		// card_item1 = $(this).children(".card_item_box").children(".card_item1").children(".card_item_name").html();
		// card_item2 = $(this).children(".card_item_box").children(".card_item2").children(".card_item_name").html();
		// card_item3 = $(this).children(".card_item_box").children(".card_item3").children(".card_item_name").html();
		// card_item4 = $(this).children(".card_item_box").children(".card_item4").children(".card_item_name").html();
		if (window_width<=1200) {
			$("#lightbox_radar_btn").css("display","block");
			$("#lightbox_radar_btn").click(function(){
				$("#lightbox_radar").css("display","block");
				$("#lightbox_radar_mask").css("display","block");
			});
			$("#lightbox_radar_close").click(function(){
				$("#lightbox_radar").css("display","none");
				$("#lightbox_radar_mask").css("display","none");
			});
		}
		
		
		$('#nextStep').click(function(){
			$('#add_card').html(temp_card);
			$('.springCard').css('display','none');
			// $('.selected_card_data').html("<h3>"+card_name+"</h3>"+"<div class='item_box'>"+card_item1+card_item2+card_item3+card_item4+"</div>");
			
			if (window_width<=1200) {
				$('.selected_card_data').html(temp_card);
				$('.selected_card_data').addClass('change_card');
				$('.selected_card_data').css('margin-bottom','0px');
				$('.forum_wrap .article_publish').css('padding-top','10px');
				$('.change_card').click(lightboxOn);
			}
			
			
		});


	});
}

function lightboxOff(){
    document.getElementById('lightbox_wrapper').style.visibility = "hidden";

}




/*----------*/
$(document).ready(function(){
  /*點確定關閉燈箱*/
  $(".card").click(function(){
    $('#nextStep').click(function(){
      $("#lightbox_wrapper").css("visibility","hidden");
    });
    /*選到的卡給class*/
    $(".card").removeClass("card_selected");
    $(this).addClass("card_selected");
  });
});

$("select").on("click" , function() {
  
  $(this).parent(".select-box").toggleClass("open");
  
});

$(document).mouseup(function (e){
    var container = $(".select-box");

    if (container.has(e.target).length === 0)
    {
        container.removeClass("open");
    }
});


$("select").on("change" , function() {
  
  var selection = $(this).find("option:selected").text(),
      labelFor = $(this).attr("id"),
      label = $("[for='" + labelFor + "']");
    
  label.find(".label-desc").html(selection);
    
});

$('.responsive').slick({
  dots: false,
  prevArrow: $('.prev'),
  nextArrow: $('.next'),
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1100,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 780,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  ]
});


