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

	include "../../lib/dbconn.php";

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
<link rel="stylesheet" href="../css/common.css" type="text/css" media="all">
<link href="./css/sub_common.css" rel="stylesheet" type="text/css" media="all">
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

<? include "../header_php.html" ?>


<article id="content">
      <div class="sub_layout">
        <div class="main">
            <img src="../images/visual_sub2.png" alt="">
            <h3>제품소개 <span>Product</span></h3>
        </div>
        <div class="sub_menu">
          <h2>
            <a href="#" class="menu_open_btn">제품검색</a>
            <span class="notice hidden">
            </span>
            <i id="sub_menu_icon" class="fa-solid fa-plus"></i>
          </h2>
          <ul>
            <li><a href="../sub2_1.html">반도체장비</a></li>
            <li><a href="../sub2_2.html">디스플레이장비</a></li>
            <li><a href="../sub2_3.html">태양광장비</a></li>
            <li><a href="./list.php">제품검색</a></li>
          </ul>
        </div>
        <div class="title_area">
          <strong class="slogan">
            원하시는 <span>제품</span>을 검색해보세요
          </strong>
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

<? include "../footer.html" ?>
<script src="https://kit.fontawesome.com/e67abfe1c6.js" crossorigin="anonymous"></script>
<script src="./js/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="./js/jquery-migrate-1.4.1.min.js" type="text/javascript"></script>
<script src="../js/prefixfree.min.js"></script>
<script src="../js/common.js"></script>
  <script src="../js/subcommon.js"></script>
</body>
</html>
