<? 
	session_start(); 
	@extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 
  include "../../lib/dbconn.php";

	if ($mode=="modify") //수정 
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
<link href="./css/write_form.css" rel="stylesheet" type="text/css" media="all">
<script src="https://kit.fontawesome.com/e67abfe1c6.js" crossorigin="anonymous"></script>
<script src="./js/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="./js/jquery-migrate-1.4.1.min.js" type="text/javascript"></script>
<script src="../js/prefixfree.min.js"></script>
<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
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
        <?
          if($mode=="modify")
          {
        ?>
        <!--  enctype  -->
        <!-- enctype="multipart/form-data" -->
        <!-- 첨부할 파일이 있을 때 무조건 들어가야하는 것 , 파일의 데이터를 넘길 때 필수 -->
            <form class="write_form" name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>&table=<?=$table?>" enctype="multipart/form-data"> 
        <?
          }
          else
          {
        ?>
            <form class="write_form"  name="board_form" method="post" action="insert.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>&table=<?=$table?>" enctype="multipart/form-data"> 
        <?
          }
        ?>
					<ul class="form_box">
						<li id="write_row1">
								<label for="title">닉네임</label>
								<input type="text" id="title" name="title" value="<?=$usernick?>" disabled></input>
						</li>
						<li id="write_row2">
								<label for="subject">제목</label>
								<input type="text" id="subject" name="subject" value="<?=$item_subject?>">
								<!-- name="subject"  필드명 subject-->

						</li>

						<li id="write_row3">
									<label for="content" >내용</label>
									<div class="html_box">
                  <?
                    if( $userid && ($mode != "modify") ) // 수정이 아닐때 = 새글쓰기일 때
                    {
                  ?>
                  <input type="checkbox" id="html_ok" name="html_ok" value="y">
                  <label for="html_ok">Html쓰기</label>
                  <?
                    }
                  ?>
										<!-- name="html_ok" value="y"  필드명 is_html-->
									</div>
                  <div class="category_box">
                  <select name="category" id="category">  
                    <option value="반도체" checked>반도체</option>
                    <option value="태양광">태양광</option>
                    <option value="디스플레이">디스플레이</option>
                  </select>
                  </div>
									<textarea rows="15" cols="79" id="content" name="content"><?=$item_content?></textarea>
									<!-- name="content"  필드명 content-->
						</li>
            <div id="write_row4">
              <div class="col1"> 이미지파일1</div>
              <div class="col2"><input type="file" name="upfile[]"></div>
            </div>
            <? 	
            if ($mode=="modify" && $item_file_0)
              {
            ?>
                  <div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
            <?
              }
            ?>
            <div id="write_row5">
              <div class="col1"> 이미지파일2</div>
              <div class="col2"><input type="file" name="upfile[]"></div>
            </div>
            <? 	if ($mode=="modify" && $item_file_1)
              {
            ?>
                  <div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
            <?
              }
            ?>
            <div id="write_row6">
              <div class="col1"> 이미지파일3</div>
              <div class="col2"><input type="file" name="upfile[]"></div>
            </div>
            <? 	if ($mode=="modify" && $item_file_2)
              {
            ?>
              <div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
              <div class="clear"></div>
            <?
              }
            ?>
					</ul>

					<div id="write_button">
						<a href="list.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>">취소</a>
						<button onclick="check_input()">등록</button>
					</div>
				</form>

			</div> <!-- content1 close-->
    </div> <!-- content_area -->
  </article> <!-- id = content colse -->

		<? include "../footer.html" ?>
    <script src="../js/common.js"></script>
  <script src="../js/subcommon.js"></script>
</body>
</html>