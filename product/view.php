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

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

  $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  $item_nick    = $row[nick];
	$item_hit     = $row[hit];

		//for문을 사용하기위해 이미지를 $image_name[]배열에 저장 
		$image_name[0]   = $row[file_name_0];
		$image_name[1]   = $row[file_name_1];
		$image_name[2]   = $row[file_name_2];
	
	
		$image_copied[0] = $row[file_copied_0];
		$image_copied[1] = $row[file_copied_1];
		$image_copied[2] = $row[file_copied_2];

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

	// 첨부된 이미지 가져오기
	for ($i=0; $i<3; $i++) //0-2
	{
		if ($image_copied[$i]) //첨부된 이미지가 있으면
		{
			//파일 업로드
			$imageinfo = GetImageSize("./data/".$image_copied[$i]); //배열로 리턴(이미지의 너비,이미지의 높이 , 이미지의 타입(jpg, pdf)) 실제이미지의 크기를 가지고온다

			$image_width[$i] = $imageinfo[0]; //이미지의 너비
			$image_height[$i] = $imageinfo[1]; //이미지의 높이
			$image_type[$i]  = $imageinfo[2];  //이미지의 종류

			if ($image_width[$i] > 785) //이미지의 최대 사이즈를 제한한다
				$image_width[$i] = 785;//이미지의 너비를 조절하면 높이도 비례하기때문에
		}
		else //첨부된 이미지가 없으면 
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>주성엔지니어링</title>
<link rel="stylesheet" href="../common/css/common.css" type="text/css" media="all">
<link href="./css/sub2common.css" rel="stylesheet" type="text/css" media="all">
<link href="./css/view.css" rel="stylesheet" type="text/css" media="all">
<script src="https://kit.fontawesome.com/e67abfe1c6.js" crossorigin="anonymous"></script>
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
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
      <h3>제품소개</h3>
      <p>Product Information</p>
    </div>
  </div>

  <div class="sub_nav">
    <ul>
      <li><a href="../sub2/sub2_1.html">반도체장비</a></li>
      <li><a href="../sub2/sub2_2.html">디스플레이장비</a></li>
      <li><a href="../sub2/sub2_3.html">태양광장비</a></li>
      <li><a class="current" href="./list.php">제품검색</a></li>
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
					<li id="view_image">
<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];  // 2022_11_21_10_20_17_0.jpg
			$img_name = "./data/".$img_name; // ./data/2022_11_21_10_20_17_0.jpg
			$img_width = $image_width[$i];  
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
				</li>
				</ul>
				<div id="view_content">
					<?= $item_content ?>
				</div>

				<div id="view_button">
						<!-- 목록버튼 인덱스 -->
						<a href="list.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>">목록</a>&nbsp;
<? 	
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	// 글쓴이 or 레벨1 or admin아이디 인사람만 수정 삭제 가능
	{
?>
						<!-- 수정버튼 -->
						<a href="write_form.php?mode=modify&table=<?=$table?>&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">수정</a>
						<!-- 삭제버튼 -->
						<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>')">삭제</a>
						<!-- javascript:del() 매개변수로 num을 던져주고 del이라는 함수실행 -->
<?
	}
?>
<? 
	if($userid )
	{
?>
<!-- 새글쓰기 버튼 -->
						<a href="write_form.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
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
