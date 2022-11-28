<? 
	session_start(); 
?>
<!-- 새션 아이디는 브라우저가 갖고 서버에 비밀번호를 저장해서 모든페이지에 적용하고 로그인 유지상태를 만듬 -->


<!DOCTYPE html>
<html lang="ko">
<head> 
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all">

<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return false;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return false;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return false;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return false;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return false;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return false;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return false;
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
   }
</script>
</head>

<body>
<div id="wrap">
  <div id="header">
    <? include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<? include "../lib/top_menu2.php"; ?>
  </div>  <!-- end of menu --> 

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?
			include "../lib/left_menu.php";
?>
		</div>
	</div> <!-- end of col1 -->

  <div id="col2">
  <form name="member_form" method="post" action="insert.php">
    <div id="title">
      <img src="../img/title_join.gif">
    </div>

    <div id="form_join">
      <div id="join1">
        <ul>
          <li>* 아이디</li>
          <li>* 비밀번호</li>
          <li>* 비밀번호 확인</li>
          <li>* 이름</li>
          <li>* 닉네임</li>
          <li>* 휴대폰</li>
          <li>&nbsp;&nbsp;&nbsp;이메일</li>
        </ul>
      </div>
      <div id="join2">
        <ul>
          <li>
            <div id="id1"><input type="text" name="id"></div>
            <div id="id2"><a href="#"><img src="../img/check_id.gif" onclick="check_id()"></a></div>
            <div id="id3">4~12자의 영문 소문자, 숫자와 특수기호(_) 만 사용할 수 있습니다.</div>
          </li>
          <li><input type="password" name="pass"></li>
          <li><input type="password" name="pass_confirm"></li>
          <li><input type="text" name="name"></li>
          <li>
            <div id="nick1"><input type="text" name="nick"></div>
            <div id="nick2"><a href="#"><img src="../img/check_id.gif" onclick="check_nick()"></a></div>
          </li>
          <li><select class="hp" name="hp1">
              <option value='010'>010</option>
              <option value='011'>011</option>
              <option value='016'>016</option>
              <option value='017'>017</option>
              <option value='018'>018</option>
              <option value='019'>019</option>
            </select> - <input type="text" class="hp" name="hp2"> - <input type="text" class="hp" name="hp3"></li>
          <li><input type="text" id="email1" name="email1"> @ <input type="text" name="email2"></li>
        </ul>
      </div>
      <div class="clear"></div>
      <div id="must"> * 는 필수 입력항목입니다.^^</div>
    </div>

    <div id="button"><a href="#"><img src="../img/button_save.gif" onclick="check_input()"></a>&nbsp;&nbsp;
      <a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>
    </div>
  </form>
</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
