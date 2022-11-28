var mapIndex =0;
$(document).ready(function () {
    $("html,body").stop().animate({"scrollTop":0},500); //새로 고침시 스크롤상단에 고정
    $(window).on('scroll', scroll);
    $('.content_area .contlist:eq(0)').fadeIn('slow'); // 첫번째 탭 내용만 열어라
    //자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***

    $('.content_area .tab').click(function (e) {
        e.preventDefault(); // <a> href="#" 값을 강제로 막는다  

        var mapIndex = $(this).index('.content_area .tab'); // 클릭시 해당 index를 뽑아준다
        // console.log(ind);

        $(".content_area .contlist").hide(); //모든 탭내용을 안보이게...
        $(".content_area .contlist:eq(" + mapIndex + ")").fadeIn('slow'); //클릭한 해당 탭내용만 보여라


    });

});

function scroll(){
    var scroll = $(window).scrollTop(); //스크롤의 거리를 리턴하는 함수

    
    if (scroll > 50 && scroll < 100) { //스크롤이 50 ~ 100 이상일때 이벤트발생
        $(".content_area .contlist").hide();
        $(".content_area .contlist:eq(" + mapIndex + ")").fadeIn('slow'); //클릭한 해당 탭내용만 보여라
    }
} 
