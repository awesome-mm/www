// JavaScript Document

$(document).ready(function() {


    var timeonoff;   //타이머 처리  홍길동 정보
    var imageCount=$('.gallery ul li').size();   //이미지 총개수
    var cnt=1;   //이미지 순서 1 2 3 4 5 1 2 3 4 5....(주인공!!=>현재 이미지 순서)
    var onoff=true; // true=>타이머 동작중 , false=>동작하지 않을때
    $('.btn_main1 span').addClass('on');  //첫번째 불켜
    $('.gallery .link1').css('opacity','1'); //첫번째 이미지 보인다..
    $('.gallery .link1 span').delay(300).animate({top:480, opacity:1 ,'z-index':3},'slow');


    function moveg(){
      //카운트 초기화
      if(cnt==imageCount+1)cnt=1; //첫페이지에서 이전버튼을 눌렀을때 버그 방생
      if(cnt==imageCount)cnt=0;  //5번째 페이지에서 cnt가 6이되기때문에 0으로 초기화

      cnt++;  //카운트 1씩 증가.. 5가되면 다시 초기화 0  1 2 3 4 5 1 2 3 4 5..
    //  for(var i=1;i<=imageCount;i++){
    //         $('.gallery .link'+i).hide(); //모든 이미지를 보이지 않게.
    //  }
    
      $('.gallery li').css('opacity','0') //모든 이미지를 보이지 않게.
      $('.gallery .link'+cnt).css('opacity','1'); //자신만 이미지가 보인다..
  
	 		                    
    //  for(var i=1;i<=imageCount;i++){
    //       $('.btn'+i).css('background','#00f'); //버튼불다꺼!!
    //      $('.btn'+i).css('width','16'); // 버튼 원래의 너비
    //   }
      
      $('.dock ul li span').removeClass('on'); //버튼불다꺼!!
      $('.btn_main'+cnt+' span').addClass('on');//자신만 불켜
      
      $('.gallery ul li span').css('top',300).css('opacity','0').css('z-index',2);
      $('.gallery .link'+cnt).find('span').delay(300).animate({top:480, opacity:1 ,'z-index':3},'slow');

      

       if(cnt==imageCount)cnt=0;  //카운트의 초기화 0
     }
     
    timeonoff= setInterval( moveg , 5000);// 타이머를 동작 1~5이미지를 순서대로 자동 처리
      //var 변수 = setInterval( function(){처리코드} , 5000);  //홍길동의 정보를 담아놓는다
      //clearInterval(변수); -> 살인마/사이코패스/살인청부업자


   $('.dock').click(function(event){  //각각의 버튼 클릭시
	     var $target=$(event.target); //클릭한 버튼 $target == $(this)
       clearInterval(timeonoff); //타이머 중지     
	    //  for(var i=1;i<=imageCount;i++){
	    //      $('.gallery .link'+i).hide(); //모든 이미지 안보인다.
      //    } 
      $('.gallery li').css('opacity','0'); //모든 이미지를 보이지 않게.

		  if($target.is('.btn_main1')){  //첫번째 버튼 클릭??
				 cnt=1;  //클릭한 해당 카운트를 담아놓는다
		  }else if($target.is('.btn_main2')){  //두번째 버튼 클릭??
				 cnt=2; 
		  }else if($target.is('.btn_main3')){ 
				 cnt=3; 
		  }
      $('.gallery .link'+cnt).css('opacity','1'); //자신만 이미지가 보인다..
  
		  // for(var i=1;i<=imageCount;i++){
			//   $('.btn'+i).css('background','#00f'); //버튼 모두불꺼
      //   $('.btn'+i).css('width','16');
		  // }
      $('.dock ul li span').removeClass('on'); //버튼불다꺼!!
      $('.btn_main'+cnt+' span').addClass('on');//자신만 불켜


      $('.gallery ul li span').css('top',300).css('opacity','0').css('z-index',2);
      $('.gallery .link'+cnt).find('span').delay(300).animate({top:480, opacity:1 ,'z-index':3},'slow');

      
      if(cnt==imageCount)cnt=0;  //카운트 초기화
     
      timeonoff= setInterval( moveg , 5000); //타이머의 부활!!!
     
      if(onoff==false){ //중지상태냐??
            onoff=true; //동작~~
            $('.main .btn_play').attr('src','./images/visual/stop-button.png');
      }
      
    });



	 //stop/play 버튼 클릭시 타이머 동작/중지
  $('.main .btn_play').click(function(){ 
     if(onoff==true){ // 타이머가 동작 중이냐??
	       clearInterval(timeonoff);   //살인마 고용 stop버튼 클릭시
		     $(this).attr('src','./images/visual/play-button.png'); //js파일에서는 경로의 기준이 html파일이 기준!!
         onoff=false;   
	   }else{  // false 타이머가 중지 상태냐??
      setTimeout(moveg,0); // play버튼 클릭시 딜레이 없이 다음페이지로 전환
		   timeonoff= setInterval( moveg ,5000); //play버튼 클릭시  부활
		   $(this).attr('src','./images/visual/stop-button.png');
		   onoff=true; 
	   } 
  });	

    //왼쪽/오른쪽 버튼 처리
    $('.main .btn').click(function(){

      clearInterval(timeonoff); //살인마

      if($(this).is('.btnRight')){ // 오른쪽 버튼 클릭
          if(cnt==imageCount)cnt=0;  //카운트가 마지막 번호(5)라면 초기화 0
          if(cnt==imageCount+1)cnt=1;  
          cnt++; //카운트 1씩증가
      }else if($(this).is('.btnLeft')){  //왼쪽 버튼 클릭
          if(cnt==1)cnt=imageCount+1;  //1->6
          if(cnt==0)cnt=imageCount;
          cnt--; //카운트 감소
      }

    // for(var i=1;i<=imageCount;i++){
    //     $('.gallery .link'+i).hide(); //모든 이미지를 보이지 않게.
    // }
    $('.gallery li').css('opacity','0'); //모든 이미지를 보이지 않게.
    $('.gallery .link'+cnt).css('opacity','1'); //자신만 이미지가 보인다..
  
    $('.dock ul li span').removeClass('on'); //버튼불다꺼!!
    $('.btn_main'+cnt+' span').addClass('on');//자신만 불켜

    $('.gallery ul li span').css('top',300).css('opacity','0').css('z-index',2);
    $('.gallery .link'+cnt).find('span').delay(300).animate({top:480, opacity:1 ,'z-index':3},'slow');


    // if($(this).is('.btnRight')){
    //   if(cnt==imageCount)cnt=0;
    // }else if($(this).is('.btnLeft')){
    //   if(cnt==1)cnt=imageCount+1;
    // }

    timeonoff= setInterval( moveg , 5000); //부활

    if(onoff==false){
      onoff=true;
      $('.main .btn_play').attr('src','./images/visual/stop-button.png');
    }

  });


});