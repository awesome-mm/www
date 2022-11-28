$(window).on('scroll', function () {
  var scrolling1 = $(window).scrollTop();
  console.log(scrolling1)

  if (scrolling1 > 500) {
    $('.content1 li:eq(0)').addClass('fadein');
  }
  if (scrolling1 > 1000) {
    $('.content1 li:eq(1)').addClass('fadein');
  }
  if (scrolling1 > 1600) {
    $('.content1 li:eq(2)').addClass('fadein');
  }
  if (scrolling1 > 2400) {
    $('.content2 ul li:eq(0)').addClass('fadein');
    $('.content2 ul li:eq(1)').addClass('fadein');
  }
  if (scrolling1 > 2900) {
    $('.content2 ul li:eq(2)').addClass('fadein');
    $('.content2 ul li:eq(3)').addClass('fadein');
  }


});