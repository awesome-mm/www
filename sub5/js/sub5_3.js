$(window).on('scroll',function(){
  var  scrolling3 = $(window).scrollTop();
  // console.log(scrolling3)
  
  if(scrolling3>500){
   $('.content1 .list ol').addClass('cont12345');
  }
  if(scrolling3>800){
    $('.content1 .list_text ol').addClass('cont12345');
  }

 });