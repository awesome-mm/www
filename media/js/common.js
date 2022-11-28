$(document).ready(function () {


  var current = 0;
  $(window).resize(function () {
    // document.documentElement.clientWidth
      var screenSize = $(window).width();
      // console.log(screenSize)
      if (screenSize > 1024) {
          $("#headerArea #gnb").show();
          current = 1;
      }
      if (current == 1 && screenSize <= 1024) {
          $("#headerArea #gnb").hide();
          current = 0;
      }
  });

  //스크롤 다운 버튼
  $('.down').click(function(e){
    e.preventDefault();
    screenHeight = $(window).height();
    $('html,body').animate({'scrollTop':screenHeight}, 1000);
  });

  //메뉴
  $('#headerArea .menu_open').click(function (e) {
    e.preventDefault();

    if (!($('#headerArea').hasClass('active'))) {
      $('#headerArea').addClass('active');
      $('#gnb').slideDown('fast');
      $('#headerArea').css('background', 'rgba(0, 0, 0, 0.8)')

    } else {
      $('#headerArea').removeClass('active');
      $('#gnb').slideUp('fast')
      $('#headerArea').css('background', 'rgba(0, 0, 0, 0)')
    }
  })
  var videoBoxHeight = 0;

  $(window).on('scroll', function () {
    var mediaScroll = $(window).scrollTop();
    videoBoxHeight = $('.videoBox').height();

    if (mediaScroll >= videoBoxHeight || $('#headerArea').hasClass('active')) {
      $('#headerArea').css('background', 'rgba(0, 0, 0, 0.8)')
    } else {
      $('#headerArea').css('background', 'rgba(0, 0, 0, 0)')
    }

    if (mediaScroll > videoBoxHeight){
      $('.topMove').fadeIn('slow'); //top버튼 보이게
    } else {
      $('.topMove').fadeOut('fast'); //top버튼 안보이게
    }


  })

  //top으로 이동 버튼
  $('.topMove').fadeOut();
  $('.topMove').click(function (e) {
    e.preventDefault();
    $("html,body").stop().animate({
      "scrollTop": 0
    }, 1000); //스크롤을 스무스하게 움직이는 코드
  });

  $('.dark').click(function(e){
    e.preventDefault();

    if(!($('#content').hasClass('dark'))){
      $("html,body").css('color','#000')
      $('#content').css('background','rgba(255, 255, 255, 0.6)')
      $('#content').addClass('dark')
      $('.character_name').css('color','#fff')
      $(this).addClass('white')
      $('.effect-terry dd a').css('color','#333')
      $('#footerArea .dark span').text('white mode')
    } else{
      $("html,body").css('color','#fff')
      $('#content').css('background','rgba(0, 0, 0, 0.8)')
      $('#content').removeClass('dark')
      $(this).removeClass('white')
      $('.effect-terry dd a').css('color','#fff')
      $('#footerArea .dark span').text('dark mode')

    }

  })


})