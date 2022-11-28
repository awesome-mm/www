$(document).ready(function() {


  var screenSize, screenHeight;

  function screen_size(){
      screenSize = $(window).width(); //스크린의 너비
      screenHeight = $(window).height();  //스크린의 높이
      $("#content").css('margin-top',screenHeight);
      if(screenSize>1024){
        $('#imgBG').attr('src','./images/sub3/sub_main3.jpg')

      }else if(screenSize<=1024){
        $('#imgBG').attr('src','./images/sub3/sub_main3_2.png')
      }

      $("#imgBG").show();

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