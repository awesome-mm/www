var  cont1 = $('.content1 ul .con1_1').offset().top -300;
var  cont2 = $('.content1 ul .con1_2').offset().top-300;
var content2 = $('.content2').offset().top-300;

$(window).scroll(function(){
  scrolling = $(window).scrollTop();

  if(scrolling>=cont1-200){
    $('.content1 .con1_1').addClass('boxMove');
  }
  if(scrolling>=cont2-200){
    $('.content1 .con1_2').addClass('boxMove');
  }
  if(scrolling>=content2-200){
    $('.content2 .content2_title').addClass('boxMove');
  }
  if(scrolling>=content2+100){
    $('.content2 ul li').addClass('boxMove2');
  }

});