$(document).ready(function () {

  //product
  var startX, endX;
  var productImageCount = document.querySelectorAll('.product ul li').length; //총 이미지 개수
  var productimageSize = $(window).width(); //이미지 사이즈
  $('.product li').width(productimageSize);
  var imgIndex = 0; //이미지 순서

  $('.product .business_img').on('touchstart mousedown', function (e) {
    e.preventDefault();
    //startX = pc  +  mobile
    startX = e.pageX || e.originalEvent.touches[0].pageX;
  });
  $('.product .business_img').on('touchend mouseup', function (e) {

    e.preventDefault();

    endX = e.pageX || e.originalEvent.changedTouches[0].pageX;

    if (startX < endX) { //끝값이 더 크다면 오른쪽으로 드래그 (이전)
      imgIndex--;
      if (imgIndex < 0) imgIndex = 0;
      $('.product ul').stop().animate({
        left: -productimageSize * imgIndex
      }, 'fast');
    } else { //왼쪽으로 드래그 (다음)
      imgIndex++;
      if (imgIndex >= productImageCount) imgIndex = productImageCount - 1;
      $('.product ul').stop().animate({
        left: -productimageSize * imgIndex
      }, 'fast');
    }

  });

  //웹브라우저 크기 조절시 이미지 사이즈 조절 (반응형)
  $(window).resize(function () {
    productimageSize = $(window).width();
    $('.product li').width(productimageSize);
    $('.product ul').css('left', -productimageSize * imgIndex);
  });

  //product_btn 이전 다음버튼 클릭시
  $('.product_btn .left').click(function (e) { //이전
    e.preventDefault();
    imgIndex--;
    if (imgIndex < 0) imgIndex = 0;
    $('.product ul').stop().animate({
      'left': -productimageSize * imgIndex
    }, 'fast');
  })
  $('.product_btn .right').click(function (e) { //다음
    e.preventDefault();
    imgIndex++;
    if (imgIndex >= productImageCount) imgIndex = productImageCount - 1;
    $('.product ul').stop().animate({
      'left': -productimageSize * imgIndex
    }, 'fast').clearQueue();
  })





  //management 텝메뉴 처리
  var managementIndex = 0;
  $(document).ready(function () {
    $(".management .management_img li").hide();
    $('.management .management_img li:eq(0)').fadeIn('fast');
    $(".management .management_text li").hide();
    $('.management .management_text li:eq(0)').fadeIn('fast');
    $('.management .management_tap a:eq(0)').addClass('select');
    $('.management .management_tap a').click(function (e) {
      e.preventDefault();
      managementIndex = $(this).index('.management .management_tap a');
      $('.management .management_tap a').removeClass('select');
      $(this).addClass('select');
      $(".management .management_img li").hide();
      $(".management .management_img li:eq(" + managementIndex + ")").fadeIn('fast');
      $(".management .management_text li").hide();
      $(".management .management_text li:eq(" + managementIndex + ")").fadeIn('fast');
    });



  });


});