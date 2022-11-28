<!-- 인덱스 -->

<div id="logo"><a href="index.php"><img src="./img/logo.gif" border="0"></a></div>
	<div id="moto"><img src="./img/moto.gif"></div>
	<div id="top_login">
<?
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);//세션만있으면됨
	 //$userid =$_SESSION['userid']; ,... 


    if(!$userid) // 세션변수 받은게 있냐?
	{
?>
    <a href="./login/login_form.php">로그인</a> | <a href="./member/join.html">회원가입</a>
<?
	}
	else
	{
?>
		<?=$username?> <?=$usernick?> (level:<?=$userlevel?>) | 
		<a href="./login/logout.php">로그아웃</a> | <a href="./login/member_form_modify.php">정보수정</a>
<?
	}
?>
	 </div>
