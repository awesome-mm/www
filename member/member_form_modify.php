<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="./css/modify.css" rel="stylesheet" type="text/css" media="all">

<script src="./js/jquery-1.12.4.min.js"></script>
  <script src="./js/jquery-migrate-1.4.1.min.js"></script>
<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }

   $(document).ready(function() {
    $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 

//password 중복검사
$("#pass_confirm").keyup(function() {    // id입력 상자에 id값 입력시
    var pass = $('#pass').val();
    var pass_confirm = $('#pass_confirm').val();
    var passData = {"pass":pass , "pass_confirm":pass_confirm};

    $.ajax({
        type: "POST",
        url: "check_pass.php",
        data: passData,
        cache: false, 
        success: function(data)
        {
		 
             $("#loadtext3").html(data);
        }
    });
});	
   });
       //nick 중복검사		 


</script>
</head>
<?
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    //세션 아이디
    $result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    //split이랑 같은 함수
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>

<script>

</script>
<body>

<header id="header">
        <a class="logo" href="../index.html"><span class="hidden">로고</span><img src="../common/images/logo.png" alt=""></a>
    </header>

<article id="content"> 

    <h2>회원정보수정</h2>
    <p class="title
">원하시는 정보를 입력 후 저장하세요</p>
    <p> <span>*</span>는  필수 입력사항입니다.</p>

	<div id="col2">
		<form name="member_form" method="post" action="modify.php">


            <dl class="row row_id">
                <dt>
                    <p>아이디</p>
                </dt>
                <dd class="row id_box">
                    <p><?= $row[id] ?></p>
                </dd>
            </dl>


            <dl class="row">
                <dt>
                <label for="pass">비밀번호</label>
                </dt>
                <dd>
                <input type="password" name="pass" id="pass" placeholder="비밀번호를 입력하세요" required>
                </dd>
            </dl>
            <dl class="row">
                <dt>
                <label for="pass_confirm">비밀번호 확인</label>
                </dt>
                <dd>
                 <input type="password" name="pass_confirm" id="pass_confirm" placeholder="비밀번호를 입력하세요" required>
                <span id="loadtext3"></span>
                 </dd>
            </dl>
            <div class="row">
                <dl class="name_box">
                <dt>
                    <label for="name">이름</label>
                </dt>
                <dd>
                    <input type="text" name="name" id="name" placeholder="홍길동" value="<?= $row[name] ?>" required>
                </dd>
                </dl>
                <dl class="nick_box">
                <dt>
                    <label for="nick">닉네임</label>
                </dt>
                <dd>
                    <input type="text" name="nick" id="nick" placeholder="홍홍홍" value="<?= $row[nick] ?>" required>
                    <span id="loadtext2"></span>
                </dd>
                </dl>
            </div>
            <dl class="row hp_box">
                <dt>
                <span>휴대폰</span>
                <label class="hidden" for="hp1">전화번호앞3자리</label>
                </dt>
                <dd>
                <select class="hp" name="hp1" id="hp1">
                    <option value='010' <? if($hp1 == '010'){echo 'selected';}?>>010</option>
                    <option value='011' <? if($hp1 == '011'){echo 'selected';}?>>011</option>
                    <option value='016' <? if($hp1 == '016'){echo 'selected';}?>>016</option>
                    <option value='017' <? if($hp1 == '017'){echo 'selected';}?>>017</option>
                    <option value='018' <? if($hp1 == '018'){echo 'selected';}?>>018</option>
                    <option value='019' <? if($hp1 == '019'){echo 'selected';}?>>019</option>
                </select> -
                <label class="hidden" for="hp2">전화번호중간4자리</label>
                <input type="text" class="hp" name="hp2" id="hp2" value="<?= $hp2 ?>"
                    placeholder="0000" required>
                - <label class="hidden" for="hp3">전화번호끝4자리</label>
                <input type="text" class="hp" name="hp3" id="hp3" value="<?= $hp3 ?>"
                    placeholder="0000" required>
                </dd>

            </dl>
            <dl class="row email_box">
                <dt>
                <span>이메일</span>
                </dt>
                <dd>
                <label class="hidden" for="email1">이메일아이디</label>
                <input type="text" id="email1" name="email1" placeholder="jusung12" value="<?= $email1 ?>" required> @
                <label class="hidden" for="email2">이메일주소</label>
                <input type="text" name="email2" id="email2" placeholder="jusung.com" value="<?= $email2 ?>" required>
                </dd>
            </dl>
            <div class="row bottom_btn">
                <a href="#" onclick="reset_form()" class="cansle_btn">취소</a>
                <a href="#" onclick="check_input()" class="signup_btn">정보저장</a>&nbsp;&nbsp;
            </div>
            </form>
	</div>
</article>

</body>
</html>
