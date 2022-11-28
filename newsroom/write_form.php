<? 
	session_start(); 
	@extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 
  include "../lib/dbconn.php";

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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link rel="stylesheet" href="../common/css/common.css" type="text/css" media="all">
<link href="./css/sub6common.css" rel="stylesheet" type="text/css" media="all">
<link href="./css/write_form.css" rel="stylesheet" type="text/css" media="all">
<script src="https://kit.fontawesome.com/e67abfe1c6.js" crossorigin="anonymous"></script>
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
<?  include "../common/sub_header.html"  ?>

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
      <li><a href="../greet/list.php">공지사항</a></li>
      <li><a class="current" href="./list.php">뉴스룸</a></li>
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

		<? include "../common/sub_footer.html" ?>
</body>
</html>