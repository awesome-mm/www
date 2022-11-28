// const closebtn = document.querySelector('.fixed_box .close');
// const fixed_box = document.querySelector('#loadtext');

// closebtn.addEventListener('click' , function(){
//   fixed_box.style.display = 'none';
// })

$('#loadtext .fixed_box .close').click(function(e){
  e.preventDefault();
  $('#loadtext').css('display' ,'none');
})
