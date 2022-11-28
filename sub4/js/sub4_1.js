$(window).on('scroll',function(){
  var  scrolling1 = $(window).scrollTop();
  var offsetval = 400;
  var contop = $('.con_top').offset().top -offsetval;
  var content1 = $('.content1').offset().top -offsetval;
  var content2 = $('.content2').offset().top -offsetval;
  var con_bottom = $('.con_bottom').offset().top -offsetval;
  console.log(scrolling1)
  
if(scrolling1>contop-300 ){
   $('.content_area>.con_top').addClass('opacity');
}
if(scrolling1>content1 -300){
  $('.content1').addClass('opacity');
}
if(scrolling1>content1){
  $('.content1 ol').addClass('opacity');
}
if(scrolling1>content2-100 ){
  $('.content2').addClass('opacity');
}
if(scrolling1>content2+300 ){
  $('.content2 .process').addClass('opacity');
}
if(scrolling1>con_bottom-200){
  $('.content2 .con_bottom ').addClass('opacity');
}
});