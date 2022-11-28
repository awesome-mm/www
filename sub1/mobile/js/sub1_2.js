$(document).ready(function(){
  $('.jump li:eq(0) a').addClass('active');
  $('.history ul li').hide();
  $('.history ul li:eq(0)').fadeIn();

  $('.jump li a').click(function(e){
    e.preventDefault()
    var jumpIndex = $(this).index('.jump li a');

    $('.jump li a').removeClass('active');
    $('.jump li:eq('+jumpIndex +') a').addClass('active');

    $('.history ul li').hide();
    $('.history ul li:eq('+jumpIndex+')').fadeIn();
  })


  
})