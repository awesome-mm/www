<? 
	session_start(); 
	@extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 

	/*
	$num = 1 게시글번호 프라이머리 키
	$page / $scale


	저장하는 페이지 에서는  htmlspecialchars 함수

	클릭시 보는 페이지 공백 , 엔터 처리 해주기

	*/

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

  $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  $item_nick    = $row[nick];
	$item_hit     = $row[hit];

  $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	//공백문자를 &nbsp;로 바꿔준다

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link rel="stylesheet" href="../common/css/common.css" type="text/css" media="all">
<link href="./css/sub6common.css" rel="stylesheet" type="text/css" media="all">
<link href="./css/view.css" rel="stylesheet" type="text/css" media="all">
<script src="https://kit.fontawesome.com/e67abfe1c6.js" crossorigin="anonymous"></script>
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
		function check_text(this){
			this = 
		}
</script>
</head>

<body>

<? include "../common/sub_header.html" ?>


  <div class="main">
    <div class="main_ani">
      <img src="./images/visual01.jpg" alt="">
    </div>
    <div class="text">
      <h3>홍보센터</h3>
      <p>promotion center</p>
    </div>
  </div>

  <div class="sub_nav">
    <ul>
      <li><a class="current" href="../greet/list.php">공지사항</a></li>
      <li><a href="../sub6/sub6_1.html">뉴스룸</a></li>
      <li><a href="../sub6/sub6_2.html">C I</a></li>
      <li><a href="../sub6/sub6_3.html">Q &amp; A</a></li>
      <li><a href="../sub6/sub6_4.html">문의하기</a></li>
    </ul>
  </div>
  

	<article id="content">
    <div class="title_area">
      <div class="line_map">
        <i class="fa-solid fa-house"></i><span class="hidden">home</span>&gt;
        <span>홍보센터</span>&gt;
        <span>공지사항</span>
      </div>
      <div class="title_text">
        <h2>공지사항</h2>
        <p class="slogan">주성엔지니어링의 <span>공지사항</span>을 알려드립니다.</p>
      </div>
    </div>

    <div class="content_area">
      <!-- 본문 컨텐츠 영역 -->
      <div class="content1">



				<ul id="view_title">
					<li id="view_title1"><?= $item_subject ?></li>
					<li id="view_title2">
						<span><?= $item_nick ?></span>
						<span>조회 : <?= $item_hit ?></span>
						<span><?= $item_date ?></span>
					</li>	
				</ul>

				<div id="view_content">
					<?= $item_content ?>
				</div>

				<div id="view_button">
						<!-- 목록버튼 인덱스 -->
						<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>&nbsp;
<? 	
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	// 글쓴이 or 레벨1 or admin아이디 인사람만 수정 삭제 가능
	{
?>
						<!-- 수정버튼 -->
						<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">수정</a>
						<!-- 삭제버튼 -->
						<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>
						<!-- javascript:del() 매개변수로 num을 던져주고 del이라는 함수실행 -->
<?
	}
?>
<? 
	if($userid )
	{
?>
<!-- 새글쓰기 버튼 -->
						<a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
<?
	}
?>
					</div><!-- view_button close -->


      </div> <!-- content1 close-->
    </div> <!-- content_area -->
  </article> <!-- id = content colse -->

<? include "../common/sub_footer.html" ?>

</body>
</html>
