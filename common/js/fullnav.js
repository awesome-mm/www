
$(document).ready(function() {

   var smh=$('.main').height();  //비주얼 이미지의 높이를 리턴한다   900px
   var on_off=false;  //마우스 false(안오버)  true(오버)
   $('#headerArea').css('background','rgba(0, 0, 0, 0.2)').css('border-bottom','1px solid rgba(0,0,0,0)');
   $('.dropdownmenu li a').css('color','#fff');
   
       $('#headerArea').mouseenter(function(){
           $(this).css('background','#fff').css('border-bottom','1px solid #ccc');
           $('#headerArea a').css('color','#333'); 
           on_off=true;
       });

       //스크롤이 내려갔을때도 배경의 마우스리브가 발동하지않게함
      $('#headerArea').mouseleave(function(){
           var scroll = $(window).scrollTop();  //스크롤의 거리

           
           if(scroll<smh-50 ){
               $(this).css('background','rgba(0, 0, 0, 0.2)').css('border-bottom','1px solid rgba(0,0,0,0)'); 
               $('.dropdownmenu li a').css('color','#fff');
               $('.top_menu li a').css('color','#fff');
               $('.search_top_btn a').css('color','#fff');

           }else{
               $(this).css('background','#fff'); 
               $('.dropdownmenu li a').css('color','#333');
               $('.top_menu li a').css('color','#333');

           }
          on_off=false;    

      });
   
      $(window).on('scroll',function(){//스크롤의 거리가 발생하면
           var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수

           if(scroll>smh-210){//스크롤900까지 내리면
               $('#headerArea').css('background','#fff').css('border-bottom','1px solid #ccc');
               $('.dropdownmenu li a').css('color','#333');
               $('.top_menu li a').css('color','#333');
               $('.search_top_btn a').css('color','#333');
           }else{//스크롤 900이상일 때
              if(on_off==false){//마우스가 헤더에 리브했을때만 투명해라
                   $('#headerArea').css('background','rgba(0, 0, 0, 0.2)').css('border-bottom','1px solid rgba(0,0,0,0)');
                   $('.dropdownmenu li a').css('color','#fff');
                   $('.top_menu li a').css('color','#fff');
                   $('.search_top_btn a').css('color','#fff');
              }
           }; 
           
        });

  
    //2depth 열기/닫기
    $('ul.dropdownmenu').hover(
       function() { 
          $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
          $('#headerArea').animate({height:434},'fast').clearQueue();
       },function() {
          $('ul.dropdownmenu li.menu ul').hide(); //모든 서브를 다 닫아라
          $('#headerArea').animate({height:200},'fast').clearQueue();
     });
    
     //1depth 효과
     $('ul.dropdownmenu li.menu').hover(
       function() { 
           $('.depth1',this).css('color','#b51f1f');
       },function() {
          $('.depth1',this).css('color','#333');
     });

     $('.menu ul li').hover(
        function() { 
            $('a',this).css('color','#b51f1f').css('background','rgba(0, 0, 0, 0.1)');
        },function() {
           $('a',this).css('color','#333').css('background','none');
      });

     //로그인효과
     $('.top_menu ul li').hover(
        function() { 
            $('a',this).css('color','#b51f1f');
        },function() {
           $('a',this).css('color','#333');
      });
     

     //tab 처리
     $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').slideDown('normal');
        $('#headerArea').animate({height:434},'fast').clearQueue();
     });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').slideUp('fast');
        $('#headerArea').animate({height:200},'normal').clearQueue();
    });


    //headersearch
    $('#headerArea .header_inner .top_menu .search_top_btn').click(function(){
        $('#headerSearch').slideDown();
    })
    
    $('#headerSearch .search_close_btn').click(function(){
        $('#headerSearch').slideUp();
    })
    

});
