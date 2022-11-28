

$('#writer_title3 #modify_btn').toggle(function(e){
  e.preventDefault();
  $(this).parent().next().find('#writer_title4_form').css('display','block');
  $(this).parent().next().find('#ripple_content').css('display','none');
},function(e){
  e.preventDefault();

  $(this).parent().next().find('#writer_title4_form').css('display','none');
  $(this).parent().next().find('#ripple_content').css('display','block');
}
)