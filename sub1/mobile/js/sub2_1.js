$(document).ready(function () {
  var productResponData = new XMLHttpRequest();
  productResponData.open('GET', './Data/sub2_1.json', true);
  productResponData.send(null);

  var productImgTotal = $('.product .img_box').size(); //총 이미지
  var productIndex = 0;
  var startX, endX;
  var numPopX = 0;

  $('#modal .modal_text').on('touchstart mousedown', function (e) {
    startX = e.pageX || e.originalEvent.touches[0].pageX;
  })
  $('#modal .modal_text').on('touchend mouseup', function (e) {
    endX = e.pageX || e.originalEvent.changedTouches[0].pageX;

    numPopX = startX - endX 

    if (numPopX >= 50) { // 오른쪽으로 드래그 (이전)
      if (productIndex <= 0) {
        productIndex = productImgTotal
      }
      productIndex--;
      productCall()
    } else if(numPopX <= -50){ //왼쪽으로 드래그 (다음)
      productIndex++;
      if (productIndex >= productImgTotal) {
        productIndex = 0
      }
      productCall()
    }
  })


  productResponData.onload = function () {
    if (productResponData.status == 200) {
      productData = JSON.parse(productResponData.responseText)

      productCall()
    }
  }
  $('.modal_perv').click(function () {
    if (productIndex <= 0) {
      productIndex = productImgTotal
    }
    productIndex--;
    productCall()
  })
  $('.modal_next').click(function () {
    productIndex++;
    if (productIndex >= productImgTotal) {
      productIndex = 0
    }
    productCall()
  })

  function productCall() {
    var textProduct = '';
    textProduct += '    <div class="modal_imgbox">'
    textProduct += '      <img class="modal_img" src="./images/sub2_1/product' + (productIndex + 1) + '.jpg" alt="">'
    textProduct += '    </div>'
    textProduct += '    <dl class="modal_con1">'
    textProduct += '      <dt class="title">' + productData.product1[productIndex].title + '</dt>'
    textProduct += '      <dd><span class="sub_title">' + productData.product1[productIndex].subTitle + '</span></dd>'
    textProduct += productData.product1[productIndex].dd1
    textProduct += '    </dl>'
    textProduct += '    <dl class="modal_con2">'
    textProduct += '      <dt>KEY BENEFITS</dt>'
    textProduct += productData.product1[productIndex].dd2
    textProduct += '    </dl>'
    textProduct += '    <dl class="modal_con3">'
    textProduct += '      <dt>KEY APPLICATIONS</dt>'
    textProduct += productData.product1[productIndex].dd3
    textProduct += '      </dd>'
    textProduct += '    </dl>'
    $('#modal .modal_text').html(textProduct)
  }

  // 팝업
  $('.text_area a').click(function (e) {
    e.preventDefault();
    productIndex = $(this).index('.text_area a')
    productCall();
    $('#modal').addClass('popup');
  })

  // 닫기
  $('#modal .popCloseBtn').click(function (e) {
    e.preventDefault();
    $('#modal').removeClass('popup');
  })

  //움직이는 메뉴 구현해보기
  var listStartX, listEndX;
  var numList =0;

  $('#content .spy').on('touchstart mousedown', function (e) {
    listStartX = e.pageX || e.originalEvent.touches[0].pageX;
  })
  $('#content .spy').on('touchend mouseup', function (e) {
    listEndX = e.pageX || e.originalEvent.changedTouches[0].pageX;
    // console.log(listStartX)
    // console.log(listEndX)
    if(listStartX !== listEndX){
      numList = listStartX - listEndX
      if (numList >= 30) { // 30이상이면 왼쪽에서 오른쪽드래그
        $('#content .spy').css('right',85+'%')
  
      } else if(numList <= -30){//30이하이면 오른쪽에서 왼쪽드래그
        $('#content .spy').css('right',2+'%')

      } 
    }
})

var offset = screen.height/2 ; 



  var list1 = $('.product ul li:eq(0)').offset().top -offset;
  var list2 = $('.product ul li:eq(1)').offset().top -offset;
  var list3 = $('.product ul li:eq(2)').offset().top -offset;
  var list4 = $('.product ul li:eq(3)').offset().top -offset;
  var list5 = $('.product ul li:eq(4)').offset().top -offset;

  $(window).on('scroll',function(){
    var productScroll = $(window).scrollTop();
    if(productScroll>list1 && productScroll<list2){
      $('.spy ul li a').removeClass('fadeIn');
      $('.spy ul li:eq(0) a').addClass('fadeIn');
    }else if(productScroll>list2 && productScroll<list3 ){
      $('.spy ul li a').removeClass('fadeIn');
      $('.spy ul li:eq(1) a').addClass('fadeIn');
    }else if(productScroll>list3 && productScroll<list4 ){
      $('.spy ul li a').removeClass('fadeIn');
      $('.spy ul li:eq(2) a').addClass('fadeIn');
    }else if(productScroll>list4 && productScroll<list5){
      $('.spy ul li a').removeClass('fadeIn');
      $('.spy ul li:eq(3) a').addClass('fadeIn');
    }else if(productScroll>list5 ){
      $('.spy ul li a').removeClass('fadeIn');
      $('.spy ul li:eq(4) a').addClass('fadeIn');
    }
  })

  $('#content .spy .close_btn').toggle(function (e) {
    e.preventDefault()
    $('.spy_list ul').fadeOut()
  }, function (e) {
    e.preventDefault()
    $('.spy_list ul').fadeIn()
  })

  $('#content .spy ul li a').click(function(){
    var  spyIndex = $(this).index('#content .spy ul li a');

    scrollMove = $('.product ul li:eq('+spyIndex+')').offset().top

    $('html,body').animate({scrollTop: scrollMove},'fast').clearQueue();
  })

})