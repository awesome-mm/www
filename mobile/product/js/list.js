$(document).ready(function(){


  $('.list_stlye_btn').click(function(){
    $(this).addClass('active');
    $('.table_list').removeClass('box_style');
    $('.box_style_btn').removeClass('active');
  })
  $('.box_style_btn').click(function(){
    $(this).addClass('active');
    $('.table_list').addClass('box_style');
    $('.list_stlye_btn').removeClass('active');
  })

})
