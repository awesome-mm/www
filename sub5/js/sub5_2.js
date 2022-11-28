$(window).on('scroll',function(){
  var con1 = $('.content1 .con1_1').offset().top;
  var con2 = $('.content1 .con1_2').offset().top;
  var con3 = $('.content1 .con1_3').offset().top;
  var con4 = $('.content1 .con1_4').offset().top;
  var offset = 400;
 
  var  scrolling2 = $(window).scrollTop();
  // console.log(scrolling2)
  
  if(scrolling2>con1-offset){
    $('.content1 .con1_1').addClass('scale');
  }
  if(scrolling2>con2-offset){
    $('.content1 .con1_2').addClass('scale');
  }
  if(scrolling2>con3-offset){
    $('.content1 .con1_3').addClass('scale');
  }
  if(scrolling2>con4-offset){
    $('.content1 .con1_4').addClass('scale');
  }
 });