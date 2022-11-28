$(window).on('scroll', function () {
  var mainScroll = $(window).scrollTop();
  // console.log(mainScroll)
  charaterOffset = $('.charater').offset().top;

  if (mainScroll > charaterOffset +500) {
    $('.charater').addClass('ani')
  } else{
    $('.charater').removeClass('ani')

  }
})