$(document).ready(function () {

  //메뉴
  $('#headerArea .menu_btn').toggle(function (e) {
      $('#headerArea').addClass('menu_open');
      $('#headerArea').removeClass('scroll_move')
      $('#headerArea').css('border-bottom', '1px solid rgba(0,0,0,0)')
    },
    function () {
      $('#headerArea').removeClass('menu_open');
      $('#headerArea').addClass('scroll_move');
      $('#headerArea').css('border-bottom', '1px solid #ccc')
    });


  //스크롤 해더
  $(document).scroll(function () {
    var main = $('.main').offset().top+200;
    var scroll = $(window).scrollTop()
    // console.log(scroll)


      if (!($('#headerArea').hasClass('menu_open'))) {
        if (scroll > main) {
          $('#headerArea').addClass('scroll_move')
          $('#headerArea').css('border-bottom', '1px solid #ccc')
        } else {
          $('#headerArea').removeClass('scroll_move')
          $('#headerArea').css('border-bottom', '1px solid rgba(0,0,0,0)')
        }
      }
      if($('#modal').hasClass('popup')){
        $('#headerArea').addClass('scroll_move')
        $('#headerArea').css('border-bottom', '1px solid #ccc')
      }
    
  });


  //아코디언
  $('.menu_box li ul').removeClass('open')
  $('.menu_box li ul').slideUp('fast')
  $('.menu_box li:eq(0) ul').addClass('open')
  $('.menu_box li:eq(0) ul').slideDown('fast')
  $('.menu_box li:eq(0)').find('i').attr('class', "fa-solid fa-minus")
  $('.menu_box li:eq(0)').find('b').text('닫기')

  $('.depth1 h3 a').click(function (e) {
    e.preventDefault()
    //open클래스가 있다면 닫기

    if ($(this).parents('.depth1').find('ul').hasClass('open')) {
      // $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast')
      // $(this).parents('.depth1').find('ul').slideUp('fast')
      $('.menu_box li ul').slideUp('fast')
      $(this).parents('.depth1').find('ul').removeClass('open')
      $(this).find('i').attr('class', "fa-solid fa-plus")
      $(this).find('b').text('열기')
    } else { // 없다면 열기
      $('.depth1 ul').removeClass('open')
      $('.depth1 ul').slideUp('fast')
      $('.depth1 h3 i').attr('class', "fa-solid fa-plus")

      $(this).parents('.depth1').find('ul').slideDown('fast')
      $(this).parents('.depth1').find('ul').addClass('open')
      $(this).find('i').attr('class', "fa-solid fa-minus")
    }
  })

  //family Site
  $('#footerArea .family .arrow').toggle(function () {
      $('#footerArea .family .aList').css('display', 'block');
    },
    function () {
      $('#footerArea .family .aList').css('display', 'none');
    })

  // top으로 이동
  let main_image = $('.main').height();
  let offset = main_image * 0.7
  let main_imageheight = $('.main').height()- offset;

  $(window).resize(function () {
     main_image = $('.main').height();
     offset = main_image * 0.7
     main_imageheight = $('.main').height()- offset;
  });

  $('.topMove').hide()

  $(window).on('scroll',function(){
    let scroll = $(window).scrollTop();


    if(scroll>main_imageheight){
      $('.topMove').fadeIn()
    }else{
      $('.topMove').hide()
    }
  })

  $('.topMove').click(function(e){
    e.preventDefault();
    $("html,body").animate({'scrollTop':0},1000).clearQueue();
  })

  })


