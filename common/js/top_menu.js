
//top menu로 이동 버튼
$(document).ready(function () {
  var main_image=$('.main').height();
            
  $('.topMove').hide();

 $(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
      var scroll = $(window).scrollTop(); //스크롤의 거리
      if(scroll>main_image-100){ //main사진의 크기보다 100작을때 
          $('.topMove').fadeIn('slow');//top버튼 보이게
      }else{
          $('.topMove').fadeOut('fast');//top버튼 안보이게
      }
 });

$('.topMove').click(function(e){
     e.preventDefault();
     $("html,body").stop().animate({"scrollTop":0},1000); //스크롤을 스무스하게 움직이는 코드
  });
});

//family site
$('.family .arrow').toggle(function(e){
  e.preventDefault();
  $('.family .aList').fadeIn();
},function(e){
  e.preventDefault();
  $('.family .aList').fadeOut();
});


$('.family .arrow').on('focus',function(e){
  e.preventDefault();
  $('.family .aList').fadeIn();
});

$('.family .aList li:last a').on('blur',function(e){
  e.preventDefault();
  $('.family .aList').fadeOut();
});