<? 
	session_start(); 
	@extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 
  $table = "product";

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
<link href="./css/mian_list_mobile.css" rel="stylesheet" type="text/css" media="all">
<script src="https://kit.fontawesome.com/e67abfe1c6.js" crossorigin="anonymous"></script>
<script src="./js/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="./js/jquery-migrate-1.4.1.min.js" type="text/javascript"></script>
<script src="../js/prefixfree.min.js"></script>

</head>
<?
	include "../../lib/dbconn.php";

	if(!$scale){$scale=6;}			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>
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
        <div class="top_menu">
          <div class="search_box">
              <form action="./list.php?mode=search" method="post">
                <select name="find" id="find">
                  <option value="category">카테고리</option>  
                  <option value="subject">제목</option>
                  <option value="content">내용</option>
                  <option value="nick">닉네임</option>
                </select>
                <label for="search" class="hidden">검색</label>
                <input maxlength="15" type="text" name="search" id="search" placeholder="검색어를 입력해주세요" value="<?=$search?>" list="dataList_id">
                <datalist id="dataList_id">
                  <option value="반도체"></option>
                  <option value="태양광"></option>
                  <option value="디스플레이"></option>
                </datalist>
                <button>
                  <i class="fa-solid fa-magnifying-glass"></i>
                  <span class="hidden">검색</span>
                </button> 
              </form>
            </div>
            <div class="top_btn">
            <p>총 <span><?= $total_record ?></span> 개의 게시물이 있습니다.</p>
              <div class="btn_inner">
                <div class="list_style">
                  <a href="./list.php?liststyle=box&page=<?=$page?>&scale=<?=$scale?>" class="box_style_btn active">
                  <span class="hidden">박스형</span>
                <i class="fa-solid fa-table-cells-large"></i>
                  </a>
                  <a href="./list.php?liststyle=list&page=<?=$page?>&scale=<?=$scale?>" class="list_stlye_btn">
                  <span class="hidden">목록형</span>
                <i class="fa-solid fa-list-check"></i>
                  </a>
                </div>
                <div class="option_list">
                  <select name="scale" id="scale" onchange="location.href='list.php?scale='+this.value">
                    <option value=""><?=$scale?>개씩</option>
                    <option value="4">4개씩</option>
                    <option value="6">6개씩</option>
                    <option value="8">8개씩</option>
                  </select>
                </div>
              </div>
            </div>

        </div>

        <div class="table_box">
          <div class="table_list product_list">
            <ul class="list_content">

  <?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기

	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	$item_nick    = $row[nick];
    $item_content = $row[content];
	  $item_hit     = $row[hit];
    $item_date    = $row[regist_day];
    $irem_category =$row[category];

	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

		if($row[file_copied_0]){
			$item_image   = './data/'.$row[file_copied_0];
		}else{
			$item_image = './data/default.jpg';
		}
  ?>
                <li class="list_item">
                  <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>">
                    <div class="list_item1 img_box">
                      <img src="<?= $item_image ?>"></img>
                    </div>

                    <div class="list_text">
                      <div class="list_item2">
                        <b><?=$irem_category?></b>
                      </div>
                      <div class="list_item3"><strong><?= $item_subject ?></strong></div>
                      <div class="list_item4"><p><?=$item_content?></p></div>
                      <div class="list_item5">
                        <span><?= $item_nick ?></span>
                        <span><?= $item_date ?></span>
                        <span><i class="fa-solid fa-eye"></i><?= $item_hit ?></span>
                      </div>
                    </div>
                  </a>
                </li>
  <?
        $number--;
    }
  ?>
            </ul>
        </div>
      </div>

        <div id="page_button">
          <!-- 목록버튼 인덱스 -->
          <div id="button">
            <a href="list.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>">목록</a>&nbsp;
<?
	if($userid)
	{
?>
<!-- 글쓰기 버튼 -->
            <a href="write_form.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
          </div>

<?
	}
?>
        </div>

        <div class="bottom_menu">
          <div class="page_menu">
              <span class="hidden">이전</span>
              <i class="fa-solid fa-angle-left"></i>
              <?
                // 게시판 목록 하단에 페이지 링크 번호 출력
                for ($i=1; $i<=$total_page; $i++)
                  {
                  if ($page == $i)     // 현재 페이지 번호 링크 안함
                    {
                      echo "<b> $i </b>";
                    }
                  else
                    { 
                      echo "<a href='list.php?table=$table&page=$i&scale=$scale&liststyle=$liststyle'> $i </a>";
                    }      
                }
                ?>	
              <span class="hidden">다음</span>
              <i class="fa-solid fa-angle-right"></i>
        </div>
      </div>



      </div> <!-- content1 close-->
    </div> <!-- content_area -->
  </article> <!-- id = content colse -->

  <? include "../footer.html" ?>
  
  <?
  if (!$liststyle){
    $liststyle = 'box';	// 리스트 스타일
    echo "
      <script>
        $('.list_stlye_btn').removeClass('active');
        $('.box_style_btn').addClass('active');
      </script>
    ";
  } else if($liststyle == 'list'){
    $liststyle = 'list';	// 리스트 스타일
    echo "
      <script>
        $('.box_style_btn').removeClass('active');
        $('.list_stlye_btn').addClass('active');
        $('.table_list').addClass('list_style');
      </script>
    ";
  }
?>
  
  <script src="../js/common.js"></script>
  <script src="../js/subcommon.js"></script>
</body>
</html>
