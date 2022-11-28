$(document).ready(function(){
  $('.business_img img:eq(0)').fadeIn('slow')
//json으로 데이터 뿌려주기
  //json파일의 있는 것을 가지고 와서 데이터 객체 생성
  var responProductData = new XMLHttpRequest();
  responProductData.open('GET','./maindata/product_data.json',true);
  responProductData.send(null);



  var indexProduct=0;//prduct 인덱스
  var productSize = $('.business_img img').size(); //총 이미지

//product 데이터 뿌려주기 
responProductData.onload = function(){
    if(responProductData.status === 200){//전송 요청이 완료되면
      //데이터 받은 객체를 사용할 객체로 넣어준다
      ProductData = JSON.parse(responProductData.responseText)
      createDl(indexProduct);//데이터 뿌리는 함수 호출
    }

};



//product 영역 버튼
$('.business_btn a').click(function(e){
  e.preventDefault();

      if($(this).hasClass('btn_prev')){ // is() , hasClass() 2 1 0 2 1 0 
        if(indexProduct==0){indexProduct=productSize;}
        indexProduct--;
      }else if($(this).hasClass('btn_next')){ // 0 1 2 0 1 2 
        indexProduct++;
          if(indexProduct==productSize){indexProduct=0;}
      }
      $('.business_img img' ).hide();
      $('.business_img img:eq('+indexProduct+')').fadeIn('slow');
      createDl(indexProduct);
      $('.business_box dl').addClass('fadein');
  });
  
//product 데이터 뿌려주는 함수
function createDl(indexProduct){
    var textpro ='';//추가할 태그를 넣어둘 곳
    textpro+= '<dl>';
    textpro+='<dt>'+ProductData.product[indexProduct].dt+'</dt>';
    textpro+='<dd>'+ProductData.product[indexProduct].dd1+'</dd>';
    textpro+='<dd>'+ProductData.product[indexProduct].dd2+'</dd>';
    textpro+='<dd>'+ProductData.product[indexProduct].dd3+'</dd>';
    textpro+='<dd>'+ProductData.product[indexProduct].dd4+'</dd>';
    textpro+='</dl>';
  document.querySelector('.product .business_content').innerHTML = textpro;
}

//news 영역 버튼 (무한반복 clone()이용하기)
var position = 0; //최초위치
var positionMove = 380; //이동하는 거리 li의 크기+margin+padding

  $('.clone_inner ul').after($('.clone_inner ul').clone());


//왼쪽 버튼
$('.news_btn ul li .news_perv').click(function(e){
  e.preventDefault()
  //왼쪽 버튼
    if(position==0){
      $('.clone_inner').css('left',-1900);
      position=-1900;
    }
    position+=positionMove;
    $('.clone_inner').stop().animate({left:position},'fast');
});

//오른쪽 버튼
$('.news_btn ul li .news_next').click(function(e){
  e.preventDefault()
  
    if(position==-1900){
      $('.clone_inner').css('left',0);
      position=0
    }
    position-=positionMove;
    $('.clone_inner').stop().animate({left:position},'fast');
});
});
