$(document).ready(function() {



  var screenSize, screenHeight;

  function screen_size(){
      screenSize = $(window).width(); //스크린의 너비
      screenHeight = $(window).height();  //스크린의 높이
      $("#content").css('margin-top',screenHeight);

      if(screenSize>1024){
        $('#imgBG').attr('src','./images/sub1/sub_main1.jpg')

      }else if(screenSize<=1024){
        $('#imgBG').attr('src','./images/sub1/sub_main1_2.png')
      }


      $("#imgBG").show();
      if(screenSize>768){
        $('#content .paly_game li.img1').css('background-image','url(./images/sub1/play_game1.png)')
        $('#content .paly_game li.img2').css('background-image','url(./images/sub1/play_game2.png)')
        $('#content .paly_game li.img3').css('background-image','url(./images/sub1/play_game3.png)')
        $('#content .paly_game li.img4').css('background-image','url(./images/sub1/play_game4.png)')
        $('#content .paly_game li.img5').css('background-image','url(./images/sub1/play_game5.png)')
        $('#content .paly_game li.img6').css('background-image','url(./images/sub1/play_game6.png)')

      }else if(screenSize<=768){
        $('#content .paly_game li.img1').css('background-image','url(./images/sub1/play_game1_2.png)')
        $('#content .paly_game li.img2').css('background-image','url(./images/sub1/play_game2_2.png)')
        $('#content .paly_game li.img3').css('background-image','url(./images/sub1/play_game3_2.png)')
        $('#content .paly_game li.img4').css('background-image','url(./images/sub1/play_game4_2.png)')
        $('#content .paly_game li.img5').css('background-image','url(./images/sub1/play_game5_2.png)')
        $('#content .paly_game li.img6').css('background-image','url(./images/sub1/play_game6_2.png)')

      }

      



    //   if( screenSize > 768){
    //     $(".videoBox img").attr('src','./images/' + myURL + '/vis.jpg');
    // }
    // if(screenSize <= 768){
    //     $(".videoBox img").attr('src','./images/' + myURL +  '/vis_1024.jpg');
    // }

  }

  screen_size();  //최초 실행시 호출
  
 $(window).resize(function(){    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
      screen_size();
  }); 
  
  $('.scrollDown').click(function(){
      screenHeight = $(window).height();
      $('html,body').animate({'scrollTop':screenHeight}, 1000);
  });
  
  
});