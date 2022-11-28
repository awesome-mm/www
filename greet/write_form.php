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
  <title>주성엔지니어링</title>
<link rel="stylesheet" href="../common/css/common.css" type="text/css" media="all">
<link href="./css/sub6common.css" rel="stylesheet" type="text/css" media="all">
<link href="./css/write_form.css" rel="stylesheet" type="text/css" media="all">
<script src="https://kit.fontawesome.com/e67abfe1c6.js" crossorigin="anonymous"></script>
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

				<form  name="board_form" method="post" action="insert.php?page=<?=$page?>&scale=<?=$scale?>" class="write_form"> 
					<ul class="form_box">
						<li id="write_row1">
								<label for="title">닉네임</label>
								<input type="text" id="title" name="title" value="<?=$usernick?>" disabled></input>
						</li>
						<li id="write_row2">
								<label for="subject">제목</label>
								<input type="text" id="subject" name="subject" placeholder="제목을 입력해주세요">
								<!-- name="subject"  필드명 subject-->

						</li>

						<li id="write_row3">
									<label for="content" >내용</label>
									<div class="html_box">
										<input type="checkbox" id="html_ok" name="html_ok" value="y">
										<label for="html_ok">Html쓰기</label>										
										<!-- name="html_ok" value="y"  필드명 is_html-->
									</div>
									<textarea rows="15" cols="79" id="content" name="content" placeholder="내용을 입력해주세요"></textarea>
									<!-- name="content"  필드명 content-->
						</li>
					</ul>

					<div id="write_button">
						<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">취소</a>
						<button type="submit">등록</button>
					</div>
				</form>

			</div> <!-- content1 close-->
    </div> <!-- content_area -->
  </article> <!-- id = content colse -->

		<? include "../common/sub_footer.html" ?>
</body>
</html>