$(document).ready(function(){
  var countHistory =0;
  var menuMove = $('.jump').offset().top - 201;// 서브메뉴까지의 거리, 201px = header height
  var  jump1 = $('#jump1').offset().top-260; //첫번째 메뉴
  var  jump2 = $('#jump2').offset().top-268; //두번째 메뉴
  var  jump3 = $('#jump3').offset().top-270; //세번째 메뉴

  var bg1 = $('.bg1').height();
  var bg2 = $('.bg2').height();
  var bg3 = $('.bg3').height();
  var textheight1 =0;
  var textheight2 =0;
  var textheight3 =0;

  //스크롤 이동 점프메뉴

  //tab , click 이벤트
  $('.jump ul li a').click(function(e){
    e.preventDefault();
    var tapIndex = $(this).index('.jump ul li a'); //0 1 2

    var move = $('.history .year:eq('+tapIndex+')').offset().top-72.5;

    $("html,body").stop().animate({"scrollTop":move},1000); //스크롤을 스무스하게 움직이는 코드
  });

  $(window).on('scroll',function(){
    var scroll = $(window).scrollTop(); //스크롤탑 값

    if($('#jump1').hasClass('fixed')){
      var textposition = 10 + (bg1 / 1080) * (textheight1/10);
      $('#jump1').css('top',textposition+'%');
      textheight1++;
    }
    if($('#jump2').hasClass('fixed2')){
      var height2 = 10 +(bg2 / 1080) * (textheight2*0.1);
      $('#jump2').css('top',height2+'%');
    textheight2++;
    }
    if($('#jump3').hasClass('fixed')){
      var height3 =10 +  (bg3 / 1080) * (textheight3*0.1);
      $('#jump3').css('top',height3+'%');
    textheight3++;
    }

    if(scroll>menuMove){  //스크롤이 서브메뉴에 닿으면
      $('.jump').addClass('navOn'); //서브메뉴 고정
      $('header').hide(); // 헤더 none
      $('.jump li:eq(0)').find('a').addClass('spy'); //첫번째 메뉴에 스타일
      $('#content .jump').css('border-bottom','1px solid  rgba(0, 0, 0, 0.3)')
    }else{
      $('.jump').removeClass('navOn');
      //스크롤의  서브메뉴에 닿지않으면
      $('header').show();
      $('#content .jump').css('border','1px solid rgba(0, 0, 0, 0.3)')
      $('#jump1').removeClass('fixed'); //글자 fixed효과 제거
    }
    $('.jump li').find('a').removeClass('spy');

    //글자 fixed
    if(scroll>=jump1-72.5 && scroll<=jump2-72.5){ //서브메뉴의 크기만큼 위에서 발동
      countHistory=0;
      $('#jump1').removeClass('fixed');
      $('#jump2').removeClass('fixed2');
      $('#jump3').removeClass('fixed');
      $('#jump1').addClass('fixed');
      textheight2=0;
      textheight3=0;
    }else if(scroll>=jump2-72.5 && scroll<=jump3-72.5){ //3056이상  3800
      countHistory=1;
      $('#jump1').removeClass('fixed');
      $('#jump2').removeClass('fixed2');
      $('#jump3').removeClass('fixed');
      $('#jump2').addClass('fixed2');
      textheight1=0;
      textheight3=0;
    }else if(scroll>=jump3-72.5){ //6216 이상  6500
      countHistory=2;
      $('#jump1').removeClass('fixed');
      $('#jump2').removeClass('fixed2');
      $('#jump3').removeClass('fixed');
      $('#jump3').addClass('fixed');
      textheight1=0;
      textheight2=0;
    }
    
    $('.jump li:eq('+countHistory+')').find('a').addClass('spy');
    //첫번째 서브메뉴 활성화
    $('.history ul li:eq('+countHistory+')').addClass('boxMove');
    //첫번째 내용 콘텐츠 애니메이션
    
  });
});


