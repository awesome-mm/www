  var jumpIndex = 0;
  $('.content').hide();
  $('.content'+(jumpIndex+1)).fadeIn();
  $('.chart').hide();
  $('.chart'+(jumpIndex+1)).fadeIn();

  $('.jump ul li a').click(function(e){
    e.preventDefault();
    jumpIndex = $(this).index('.jump ul li a')
    // console.log(jumpIndex)

    if(jumpIndex==0){
      $('.content').hide();
      $('.content'+(jumpIndex+1)).fadeIn();
      $('.chart_box').show();
      $('.chart_box .chart').hide();
      $('.chart_box .chart'+(jumpIndex+1)).fadeIn();
    }
    if(jumpIndex==1){
      $('.content').hide();
      $('.content'+(jumpIndex+1)).fadeIn();
      $('.chart_box').show();
      $('.chart_box .chart').hide();
      $('.chart_box .chart'+(jumpIndex+1)).fadeIn();
    }
    if(jumpIndex==2){
      $('.chart_box').hide();
      $('.content').hide();
      $('.content'+(jumpIndex+1)).fadeIn();
    }
  });

  