<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>주성엔지니어링-아이디찾기</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="./css/id_find.css">
<script src="https://kit.fontawesome.com/f8a0f5a24e.js" crossorigin="anonymous"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/jquery-migrate-1.4.1.min.js"></script>

<script>
	$(document).ready(function() {

         $(".find").click(function() {    // id입력 상자에 id값 입력시
            var name = $('#name').val(); //홍길동
            var hp1 = $('#hp1').val(); //010
            var hp2 = $('#hp2').val(); //1111
            var hp3 = $('#hp3').val(); //2222

            $.ajax({
                type: "POST",
                url: "find.php", 
                data: "name="+ name+ "&hp1="+hp1+ "&hp2="+hp2+ "&hp3="+hp3,  /*매개변수id도 같이 넘겨줌 여러가지 값을 넘겨줄때는 &를 이용한다*/
                cache: false, 
                success: function(data) /*이 메소드가 완료되면 data라는 변수 안에 echo문이 들어감*/
                {
                     $("#loadtext").html(data); /*span안에 있는 태그를 사용할것이기 때문에 html 함수사용*/
                }
            });

             
            $("#loadtext").addClass('on'); // css 변경
        }); 

    });
</script>
</head>
<body>

<header>
    <h1><a href="../index.html"><span class="hidden">로고</span><img src="../images/logox2.png"></a></h1>
</header>

    <div id="wrap">
	<div id="col2">
        <form name="find" method="post" action="find.php"> 
		<div id="title">
        
        <ul class="top_menu">
            <li>
            <h2><a class="current" href="./id_find.php">아이디 찾기</a></h2>
            </li>
            <li>
            <h2><a href="./pw_find.php">비밀번호 찾기</a></h2>
            </li>
        </ul>
        <strong>가입 시 입력하신 정보로 아이디를 찾아드립니다</strong>
		</div>
       
		<div id="login_form">
			 <div class="clear"></div>

			 <div id="login2">
				<div id="id_input_button">
					<fieldset>
                        <input type="text" name="name" class="find_input" id="name" placeholder="이름을 입력하세요">
                        <div class="telBox">
                            <label class="hidden" for="hp1">연락처 앞3자리</label>
                            <select name="hp1" id="hp1" title="휴대폰 앞3자리를 선택하세요." class="find_input">
                                <option>010</option>
                                <option>011</option>
                                <option>016</option>
                                <option>017</option>
                                <option>018</option>
                                <option>019</option>
                            </select> -                            
                            <label class="hidden" for="hp2">연락처 가운데3자리</label>
                            <input class="find_input" type="text" id="hp2" name="hp2" title="연락처 가운데3자리를 입력하세요." maxlength="4" placeholder="(ex. 1111)"> -                            
                            <label class="hidden" for="hp3">연락처 마지막3자리</label>
                            <input class="find_input" type="text" id="hp3" name="hp3" title="연락처 마지막3자리를 입력하세요." maxlength="4" placeholder="(ex. 2222)">
                        </div>
                        <input type="button" value="아이디찾기" class="find"> 
                        <!--  ajax를 사용해서 실시간으로 처리하기 위해 submit이 아니다 -->
                    </fieldset>


                    <ul class="go">
                        <li><a href="login_form.php">로그인</a></li>
                        <li><a href="../member/join.html" class="go_join">회원가입</a></li>
                    </ul>

                    <span id="loadtext"> 
                        <!-- ajax를 이용하여 텍스트 넣어줄 공간 -->
                    </span>


				</div>

			 </div>			 
		</div> <!-- end of form_login -->

	    </form>
	</div> <!-- end of col2 -->

</div> <!-- end of wrap -->
</body>
</html>