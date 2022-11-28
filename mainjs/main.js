// JavaScript Document


//비주얼 영역
    var timeonoff;   //타이머 처리
    var imageCount=$('.gallery ul li').size();//이미지 총개수
    var cnt=1;   //이미지 순서
    var onoff=true; // true=>타이머 동작중 , false=>동작하지 않을 때

    //첫번째 화면처리
    $('.btn_main1 span').addClass('on');  
    $('.gallery .link1').css('opacity','1'); 
    $('.gallery .link1 span').delay(300).animate({top:480, opacity:1 ,'z-index':3},'slow');

    //이미지,텍스트,페이지네이션 애니메이션
    function visualAni(){
      //해당 이미지가 보이게
      $('.gallery li').css('opacity','0') 
      $('.gallery .link'+cnt).css('opacity','1'); 

      //버튼 순서대로 애니이션
      $('.dock ul li span').removeClass('on');
      $('.btn_main'+cnt+' span').addClass('on');

      //텍스트 애니메이션
      $('.gallery ul li span').css('top',300).css('opacity','0').css('z-index',2);
      $('.gallery .link'+cnt).find('span').delay(300).animate({top:480, opacity:1 ,'z-index':3},'slow');
    }

    function moveg(){
      //카운트 초기화
      if(cnt==imageCount+1)cnt=1; //첫페이지에서 이전버튼을 눌렀을때 버그 발생
      if(cnt==imageCount)cnt=0;  //마지막 페이지에서 다음버튼 눌렀을때 버그 발생 
      cnt++; 
      visualAni();//이미지,텍스트,페이지네이션 애니메이션
     }

     
    timeonoff= setInterval( moveg , 5000);// 타이머를 동작 순서대로 자동 처리

   $('.dock').click(function(event){  //각각의 페이지네이션 클릭시
	     var $target=$(event.target); //클릭한 버튼 $target == $(this)
       clearInterval(timeonoff); //타이머 중지     

      $('.gallery li').css('opacity','0'); //모든 이미지를 보이지 않게

		  if($target.is('.btn_main1')){  //첫번째 버튼 클릭시
				 cnt=1;  //클릭한 해당 카운트를 담아놓는다
		  }else if($target.is('.btn_main2')){  //두번째 버튼 클릭시
				 cnt=2; 
		  }else if($target.is('.btn_main3')){ 
				 cnt=3; 
		  }

      visualAni();//이미지,텍스트,페이지네이션 애니메이션
      
      if(cnt==imageCount)cnt=0;  //카운트 초기화
     
      timeonoff= setInterval( moveg , 5000); //타이머 다시 재생
     
      if(onoff==false){ //만약 타이머가 중지상태라면
            onoff=true; //타이머를 다시 시작
            //타이머 동작될떄는 play버튼 아닐때는 stop버튼
            $('.main .btn_play').attr('src','./images/visual/stop-button.png');
      }
    });

	 //stop/play 버튼 클릭시 타이머 동작/중지
  $('.main .btn_play').click(function(){ 
     if(onoff==true){ // 타이머가 동작 중이라면
	       clearInterval(timeonoff); //stop버튼 클릭시 타이머를 끄고 
		     $(this).attr('src','./images/visual/play-button.png');
         onoff=false;   
	   }else{  // false 타이머가 중지 상태라면
      setTimeout(moveg,0); // play버튼 클릭시 딜레이 없이 다음페이지로 전환
		   timeonoff= setInterval( moveg ,5000); //play버튼 클릭시 타이머재생
		   $(this).attr('src','./images/visual/stop-button.png');
		   onoff=true; 
	   } 
  });	

    //왼쪽/오른쪽 버튼 처리
    $('.main .btn').click(function(){

      clearInterval(timeonoff); //타이머중지

      if($(this).is('.btnRight')){ // 오른쪽 버튼 클릭
          if(cnt==imageCount)cnt=0;  //카운트가 마지막 번호라면 초기화 0
          if(cnt==imageCount+1)cnt=1;  //애니메이션 마지막 일때 오른쪽버튼시 첫페이지
          cnt++; //카운트 1씩증가
      }else if($(this).is('.btnLeft')){  //왼쪽 버튼 클릭
          if(cnt==1)cnt=imageCount+1;  
          if(cnt==0)cnt=imageCount; //애니메이션 첫번째 일때 왼쪽버튼시 마지막페이지
          cnt--; //카운트 1씩 감소
      }

    visualAni();//이미지,텍스트,페이지네이션 애니메이션

    timeonoff= setInterval( moveg , 5000); //타이머재생

    if(onoff==false){
      onoff=true;
      $('.main .btn_play').attr('src','./images/visual/stop-button.png');
    }
  });


//스크롤 이벤트
//바닐라 스크립트 코드
// const area = document.querySelector('#content .area');
// const areaList = document.querySelectorAll('#content .area li');
// //스크롤값 접근
// area.getBoundingClientRect().top
// areaList[i].getBoundingClientRect().top

//각 스크롤이 닿을때의 거리를 담음
var productEvent = $('.product').offset().top -500;
var introduceEvent = $('.introduce').offset().top -600;
var managementEvent = $('.management').offset().top -600;
var newsEvent = $('.news').offset().top -600;
var recruitmentEvent = $('.recruitment').offset().top -500;

//스크롤이 특정값에 닿을 때 애니메이션 적용
$(window).on('scroll',function(e){
  e.preventDefault();

  var scrollng = $(window).scrollTop();// 스크롤 값 저장
  // console.log(scrollng)
  //화면이 위에있을 때 초기화
  if(scrollng<=productEvent-200){

    $('#content h3').removeClass('headerMove');
    $('.product').removeClass('headerMove');
    $('.business_img').removeClass('imgSlide');
    $('.business_box').removeClass('textSlide');
    $('.introduce ul').removeClass('introduce_inner');
    $('.introduce ul li').removeClass('boxSlide');
    $('.management .img1').removeClass('mana_img1');
    $('.management .img2').removeClass('mana_img2');
    $('.management .management_text:eq(0)').removeClass('mana_text1');
    $('.management .management_text:eq(1)').removeClass('mana_text2');
    $('.management .management_sub ').removeClass('mana_icon');
    $('.news .news_btn').removeClass('news_move');
    $('.news .news_Box .clone_inner2').removeClass('news_move');
    $('.recruitment ul li').removeClass('textMove');
    $('.recruitment .recruitment_back').removeClass('recruitment_move');
  }

  //business영역
  if(scrollng>=productEvent){
    $('.product').addClass('headerMove');
    $('.product h3').addClass('headerMove');
  }
  if(scrollng>=productEvent+200){
    $('.business_img').addClass('imgSlide');
    $('.business_box').addClass('textSlide');
  }
  //introduce영역
  if(scrollng>=introduceEvent+100){
    $('.introduce h3').addClass('headerMove');
  }
  if(scrollng>=introduceEvent){
    $('.introduce ul').addClass('introduce_inner');
    $('.introduce ul li').addClass('boxSlide');
  }
  //managementEvent
  if(scrollng>=managementEvent){
    $('.management h3').addClass('headerMove');
    $('.management .img1').addClass('mana_img1');
    $('.management .management_text:eq(0)').addClass('mana_text1');
    $('.management .img2').addClass('mana_img2');
    $('.management .management_text:eq(1)').addClass('mana_text2');
  }

  //managementEvent 아이콘
  if(scrollng>=managementEvent+1100){
    $('.management .management_sub ').addClass('mana_icon');
  }
  //newsEvent 
  if(scrollng>=newsEvent){
    $('.news h3').addClass('headerMove');
    $('.news .news_btn').addClass('news_move');
    $('.news .news_Box .clone_inner2').addClass('news_move');
  }
  //recruitmentEvent
  if(scrollng>=recruitmentEvent){
    $('.recruitment h3').addClass('headerMove');
    $('.recruitment p').addClass('headerMove');
    $('.recruitment ul li').addClass('textMove');
    $('.recruitment .recruitment_back').addClass('recruitment_move');
  }

});

