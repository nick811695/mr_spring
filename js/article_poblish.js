$(document).ready(function(){
	window_width = $(window).width();

});

//開燈箱桌機
var lightboxOnBtn = document.getElementsByClassName("springCard");
lightboxOnBtn[0].addEventListener("click",lightboxOn);
//開燈箱手機
document.getElementById('add_card').addEventListener("click",lightboxOn);

function lightboxOn(){//開燈箱
    document.getElementById('lightbox_wrapper').style.visibility = "visible";
    //讓畫面無法滑動
    $('body').css({
    	"height":"100vh",
      "over-flow":"hidden",
    });
    //點選到的牌子給class 使其變色
    $('.card').click(function(){
      $(".card").removeClass("card_selected");
      $(this).addClass("card_selected");
      $('#nextStep').click(function(){//點完牌子後點選完成關閉燈箱
        $("#lightbox_wrapper").css("visibility","hidden");
        $('body').css({//畫面恢復可滾動
          "height":"auto",
        });
      });
		  temp_card = $(this).parent('.cards').html();//將點選到的牌子寫入temp
		  if (window_width<=1200) {//不是桌機時
  			$("#lightbox_radar_btn").css("display","block");//當card被點選 會開啟雷達btn
  			$("#lightbox_radar_btn").click(function(){
  				$("#lightbox_radar").css("display","block");//雷達btn被點選開啟雷達圖
  			});
  			$("#lightbox_radar_close").click(function(){
  				$("#lightbox_radar").css("display","none");//點選關閉將雷達圖關閉
  			});
     
		}
		
		
		$('#nextStep').click(function(){
			$('#add_card').html(temp_card);
			$('.springCard').css('display','none');
			
			if (window_width<=768) {
				$('.selected_card_data').html(temp_card);
				$('.selected_card_data').addClass('change_card');
				$('.selected_card_data').css('margin-bottom','0px');
				$('.forum_wrap .article_publish').css('padding-top','10px');
				$('.change_card').click(lightboxOn);
				$("#lightbox_radar").css("display","none");

			}
			
			
		});


	});
}






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


