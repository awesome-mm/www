// JavaScript Document


$(document).ready(function () {
    var cnt = $('.tab_menu li').size();; //탭메뉴 개수 ***
    // console.log(cnt)
    $('.tabs .contlist:eq(0)').fadeIn('slow'); // 첫번째 탭 내용만 열어라
    $('.tabs .tab1').css('background', 'green').css('color', '#333'); //첫번째 탭메뉴 활성화
    //자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***

    $('.tabs .tab').click(function (e) {
        e.preventDefault(); // <a> href="#" 값을 강제로 막는다  

        var ind = $(this).index('.tabs .tab'); // 클릭시 해당 index를 뽑아준다
        console.log(ind);

        $(".tabs .contlist").hide(); //모든 탭내용을 안보이게...
        $(".tabs .contlist:eq(" + ind + ")").fadeIn('slow'); //클릭한 해당 탭내용만 보여라
        $('.tab').css('background', 'red').css('color', '#fff'); //모든 탭메뉴를 비활성화
        $(this).css('background', 'green').css('color', '#333'); // 클릭한 해당 탭메뉴만 활성화
    });
});

    var scroll = $(window).scrollTop(); //스크롤의 거리를 리턴하는 함수
    // console.log(scroll);
    // 지도 api에서 첫페이지불러올때 display none이 되어있으면 api를 불러오지못한다.
    // 해결방법 : 스크롤이 내려갈때 이벤트를 발생해서 첫텝메뉴 말고는 dispaly none을 시킨다.

    if (scroll > 50) { //스크롤이 50이면
        $(".tabs .contlist").hide();
    };
