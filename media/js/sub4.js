$(document).ready(function() {


  var screenSize, screenHeight;

  function screen_size(){
      screenSize = $(window).width(); //스크린의 너비
      screenHeight = $(window).height();  //스크린의 높이
      $("#content").css('margin-top',screenHeight);

      if(screenSize>1024){
        $('#imgBG').attr('src','./images/sub4/sub_main4.jpg')
        $('#imgBG').attr('src','./images/sub4/sub_main4_2.jpg')
        $('.gallery .grid-image-item .img1').attr('src','./images/sub4/gallery1.jpg')
        $('.gallery .grid-image-item .img2').attr('src','./images/sub4/gallery2.gif')
        $('.gallery .grid-image-item .img3').attr('src','./images/sub4/gallery3.jpg')
        $('.gallery .grid-image-item .img4').attr('src','./images/sub4/gallery4.jpg')
        $('.gallery .grid-image-item .img5').attr('src','./images/sub4/gallery5.jpg')
        $('.gallery .grid-image-item .img6').attr('src','./images/sub4/gallery6.jpg')
        $('.gallery .grid-image-item .img7').attr('src','./images/sub4/gallery7.jpg')
        $('.gallery .grid-image-item .img8').attr('src','./images/sub4/gallery8.gif')
        $('.gallery .grid-image-item .img9').attr('src','./images/sub4/gallery9.jpg')
        $('.gallery .grid-image-item .img10').attr('src','./images/sub4/gallery10.jpg')
        $('.gallery .grid-image-item .img11').attr('src','./images/sub4/gallery11.jpg')
        $('.gallery .grid-image-item .img12').attr('src','./images/sub4/gallery12.jpg')
        $('.gallery .grid-image-item .img13').attr('src','./images/sub4/gallery13.jpg')
        $('.gallery .grid-image-item .img14').attr('src','./images/sub4/gallery14.jpg')
        $('.gallery .grid-image-item .img15').attr('src','./images/sub4/gallery15.jpg')
        $('.gallery .grid-image-item .img16').attr('src','./images/sub4/gallery16.jpg')
        $('.gallery .grid-image-item .img17').attr('src','./images/sub4/gallery17.jpg')
        $('.gallery .grid-image-item .img18').attr('src','./images/sub4/gallery18.jpg')
        $('.gallery .grid-image-item .img19').attr('src','./images/sub4/gallery19.jpg')
        $('.gallery .grid-image-item .img20').attr('src','./images/sub4/gallery20.png')
        $('.gallery .grid-image-item .img21').attr('src','./images/sub4/gallery21.jpg')

      }else if(screenSize<=1024){
        $('#imgBG').attr('src','./images/sub4/sub_main4_2.jpg')
        $('.gallery .grid-image-item .img1').attr('src','./images/sub4/gallery1.jpg')
        $('.gallery .grid-image-item .img2').attr('src','./images/sub4/gallery2.gif')
        $('.gallery .grid-image-item .img3').attr('src','./images/sub4/mobile1024/gallery3.jpg')
        $('.gallery .grid-image-item .img4').attr('src','./images/sub4/mobile1024/gallery4.jpg')
        $('.gallery .grid-image-item .img5').attr('src','./images/sub4/mobile1024/gallery5.jpg')
        $('.gallery .grid-image-item .img6').attr('src','./images/sub4/mobile1024/gallery6.jpg')
        $('.gallery .grid-image-item .img7').attr('src','./images/sub4/mobile1024/gallery7.jpg')
        $('.gallery .grid-image-item .img8').attr('src','./images/sub4/gallery8.gif')
        $('.gallery .grid-image-item .img9').attr('src','./images/sub4/mobile1024/gallery9.jpg')
        $('.gallery .grid-image-item .img10').attr('src','./images/sub4/mobile1024/gallery10.jpg')
        $('.gallery .grid-image-item .img11').attr('src','./images/sub4/mobile1024/gallery11.jpg')
        $('.gallery .grid-image-item .img12').attr('src','./images/sub4/mobile1024/gallery12.jpg')
        $('.gallery .grid-image-item .img13').attr('src','./images/sub4/mobile1024/gallery13.jpg')
        $('.gallery .grid-image-item .img14').attr('src','./images/sub4/mobile1024/gallery14.jpg')
        $('.gallery .grid-image-item .img15').attr('src','./images/sub4/mobile1024/gallery15.jpg')
        $('.gallery .grid-image-item .img16').attr('src','./images/sub4/mobile1024/gallery16.jpg')
        $('.gallery .grid-image-item .img17').attr('src','./images/sub4/mobile1024/gallery17.jpg')
        $('.gallery .grid-image-item .img18').attr('src','./images/sub4/mobile1024/gallery18.jpg')
        $('.gallery .grid-image-item .img19').attr('src','./images/sub4/mobile1024/gallery19.jpg')
        $('.gallery .grid-image-item .img20').attr('src','./images/sub4/mobile1024/gallery20.jpg')
        $('.gallery .grid-image-item .img21').attr('src','./images/sub4/mobile1024/gallery21.jpg')
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