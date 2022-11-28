$(window).on('scroll',function(){
  var  scrolling1 = $(window).scrollTop();
  // console.log(scrolling1)
  
  if(scrolling1>500){
   $('.content1').addClass('count123');
  }
 });