$(document).ready(function(){
//ajex json파일 불러오기
var productData = new XMLHttpRequest();// XMLHttpRequest 객체를 생성한다.
productData.open('GET', './data/sub2_2.json', true);// 요청을 준비한다.
productData.send(null);                         // 요청을 전송한다.


  
  //스크롤 이동 정프메뉴 
  var  jump1 = $('#jump1').offset().top-500;
  var  jump2 = $('#jump2').offset().top-500;
  var  jump3 = $('#jump3').offset().top-500;
  var ProductIndexScroll =0;
  var popIndex = 0;  

  
  // 스크롤을 눌렀을때 이동하는 이벤트
  $('.content1 .img_box ul li a').click(function(e){
    e.preventDefault();
    ProductIndexScroll = $(this).index('.content1 .img_box ul li a');
  //  console.log(indexProduct);
   var jump = $('.product ul li:eq('+ProductIndexScroll+')').offset().top-300;
   $("html,body").stop().animate({"scrollTop":jump},500); //스크롤을 움직이는 코드
  });
  
  //스크롤 이벤트
  $(window).on('scroll',function(){
  var scrollEvent = $(window).scrollTop(); //스크롤의 거리
    if(scrollEvent>=jump1){
      $('.product ul li:eq(0) .text_box').addClass('boxMove');
    }
    if( scrollEvent>=jump2){
      $('.product ul li:eq(1) .text_box').addClass('boxMove');
    }
    if( scrollEvent>=jump3){
      $('.product ul li:eq(2) .text_box').addClass('boxMove');
    }
  })
  
  
  
//팝업 내용 , json 데이터 뿌려주기
function popchange(){

  if(productData.status === 200){
     responseObj = JSON.parse(productData.responseText);

    var createText = '';
    var pop_img = document.querySelector('.popup img')
    pop_img.setAttribute('src','./images/content2/con2_'+(popIndex+1)+'.jpg');

    createText += '<dl>';
    createText += '<dt>'+responseObj.text_box[popIndex].title+'</dt>';
    createText += '<dd>'+responseObj.text_box[popIndex].p1+'</dd>';
    createText += '<dd>'+responseObj.text_box[popIndex].p2+'</dd>';
    createText += '<dd>'+responseObj.text_box[popIndex].p3+'</dd>';
    createText += "<span>"+responseObj.text_box[popIndex].span+"</span>";
    createText += '</dl>';

    document.querySelector('.pop .popup .txt').innerHTML = createText;
  }
}

  
  // 이미지 클릭시 팝업띄우기
    $('.product .text_box a').click(function(e){
        e.preventDefault();
        popIndex = $(this).index('.product .text_box a');  // 0 1 2 3
  
        $('.pop_btn').fadeIn('slow');
        $('.pop .modal_box').fadeIn('fast');
        $('.pop .popup').fadeIn('slow');
        popchange();
    });
  
  //화면 닫기 
    $('.close_btn,.pop .modal_box').click(function(e){
        e.preventDefault();
        $('.pop .modal_box').fadeOut('fast');
        $('.pop .popup').fadeOut('fast');
        $('.pop_btn').fadeOut('fast');
    });
  
  //이전 다음
  $('.pop_btn a').click(function(e){
    e.preventDefault();
    var totalSize = $('.content1 .img_box ul li').size();

    $('.pop .popup').hide().fadeIn('slow'); 
   
   if($(this).hasClass('prev')){ // is() , hasClass() 3 2 1 0 3 2 1 0

       if(popIndex==totalSize-1)popIndex=-1;
       popIndex++;
   }else if($(this).hasClass('next')){ // 0 1 2 3 0 1 2 3
     if(popIndex==0)popIndex=totalSize;
     popIndex--;
   }
   popchange();

});
});
