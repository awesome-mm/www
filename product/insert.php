<? session_start();?>
<!--  삽입 , 수정 (modify) -->
<meta charset="utf-8">
<?
	@extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 

	//새 글쓰기
	// $table = 'concert' $subject , #content , unfile[] 

	//변수 a태그로   get mode=modify , num , page , table
	//form으로 post $subject , #content , unfile[] , del_file[] = 0/1/2

	if(!$userid) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	if(!$subject) {
		echo("
	   <script>
	     window.alert('제목을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	if(!$content) {
		echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
		/*   단일 파일 업로드 
		파일을 업로드하려면 5가지가 있어야한다 $_FILES함수를 사용한다
		upfile에 파일명 확장자명이 담겨있다.

		 $_FILES[첨부된파일의 실제이름]['name'];

		$upfile_name	 = $_FILES["upfile"]["name"];						//첨부파일의    실제이름  (dog1.jpg)
		$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];			//첨부파일의 임시파일이름 (tmp1.jpg)
		$upfile_type     = $_FILES["upfile"]["type"];					//첨부파일의 종류 jpeg,gif,pdf 등등 
		$upfile_size     = $_FILES["upfile"]["size"];					//첨부파일의 실제용량 imgage / jpeg     
		$upfile_error    = $_FILES["upfile"]["error"];				//업로드 상태 (true / false)
		*/

	// 다중 파일 업로드
	$files = $_FILES["upfile"]; //배열로 리턴
	$count = count($files["name"]); //php배열의 개수
			
	$upload_dir = './data/';

	for ($i=0; $i<$count; $i++) 
	{
		$upfile_name[$i]     = $files["name"][$i]; //(dog1.jpg)
		$upfile_tmp_name[$i] = $files["tmp_name"][$i]; //(tmp1.jpg)
		$upfile_type[$i]     = $files["type"][$i]; //jpeg,gif,pdf 등등 
		$upfile_size[$i]     = $files["size"][$i]; //22.3kb 
		$upfile_error[$i]    = $files["error"][$i]; //(true / false)
      
		$file = explode(".", $upfile_name[$i]); // .을 기준으로 'dog1, jpg'  
		$file_name = $file[0];
		$file_ext  = $file[1];

		if (!$upfile_error[$i]) //에러가 없으면
		{
			$new_file_name = date("Y_m_d_H_i_s"); // 2022_11_21_12_18_50    +  _ 0,1,2를 더함
			$new_file_name = $new_file_name."_".$i; //  2022_11_21_12_18_50_01
			$copied_file_name[$i] = $new_file_name.".".$file_ext;//2022_11_21_12_18_50_01.jpg 
			$uploaded_file[$i] = $upload_dir.$copied_file_name[$i]; // ./data/2022_11_21_12_18_50_01.jpg 

			if( $upfile_size[$i]  > 700000 ) { //1024인데 1000배로 계산 했을 시  500000만 바이트 = 500KB
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(500KB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
			}

			if ( ($upfile_type[$i] != "image/gif") &&
				($upfile_type[$i] != "image/jpeg") &&
				($upfile_type[$i] != "image/pjpeg") &&
				($upfile_type[$i] != "image/png") &&
				($upfile_type[$i] != "image/x-png")
				)
			{
				echo("
					<script>
						alert('JPG, GIF, PNG 이미지 파일만 업로드 가능합니다!');
						history.go(-1)
					</script>
					");
				exit;
			}
			//파일의 업로드 move_uploaded_file( pc에 있는 임시파일명 , 실제 서버의 저장될 파일의 경로 )
			//원본에 영향이 가지않게 파일의 복제본을 만든 후 복제본을 업로드한다. 
			//메소드 -> 리턴(ture , false)
			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) )  //파일 업로드 후 파일 업로드가 실패했을때 true
			{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
			}
		}
	}

	include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

	if ($mode=="modify")
	{
		$num_checked = count($_POST['del_file']);  // 3개 
		$position = $_POST['del_file'];            // 0 / 1 / 2 value값 담아두기

		for($i=0; $i<$num_checked; $i++)   //  체크가 되있는 것 확인  delete checked item
		{
			$index = $position[$i]; // 0  /  1  /  2 
			$del_ok[$index] = "y";  // $del_ok[0] = "y" , $del_ok[1] = "y" , $del_ok[2] = "y"
		}

		$sql = "select * from $table where num=$num";   // get target record
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);

		for ($i=0; $i<$count; $i++)					// update DB with the value of file input box
		{

			$field_org_name = "file_name_".$i; //file_name_0 , file_name_1 , file_name_2
			$field_real_name = "file_copied_".$i; // file_copied_0 , file_copied_1 , file_copied_2 

			$org_name_value = $upfile_name[$i];  //dog1.jpg
			$org_real_value = $copied_file_name[$i]; //2022_11_21_12_18_50_01.jpg 

			if ($del_ok[$i] == "y") // 삭제 체크한 놈은
			{
				$delete_field = "file_copied_".$i;  // file_copied_0
				$delete_name = $row[$delete_field]; // file_copied_0 실제 레코드를 읽어온다
				
				$delete_path = "./data/".$delete_name; // ./data/2022_11_21_12_18_50_01.jpg 

				unlink($delete_path); //실제 삭제코드

				$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
				mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
			}
			else
			{
				if (!$upfile_error[$i]) //삭제 체크 안되어 있는 것 //파일 등록으로 이미지 바꿔치기 할 때
				{
					$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
					mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행					
				}
			}

		}
		
		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);
		
		$sql = "update $table set subject='$subject', category='$category', content='$content' where num=$num";
		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	}
	else
	{
		if ($html_ok=="y")
		{
			$is_html = "y";
		}
		else
		{
			$is_html = "";
		}
		
		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);

		$sql = "insert into $table (id, name, nick, category, subject, content, regist_day, hit, is_html, ";
		$sql .= " file_name_0, file_name_1, file_name_2, file_copied_0,  file_copied_1, file_copied_2) ";
		$sql .= "values('$userid', '$username', '$usernick', '$category', '$subject', '$content', '$regist_day', 0, '$is_html', ";
		$sql .= "'$upfile_name[0]', '$upfile_name[1]',  '$upfile_name[2]', '$copied_file_name[0]', '$copied_file_name[1]','$copied_file_name[2]')";
		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	}

	mysql_close();                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'list.php?table=$table&page=$page&scale=$scale';
	   </script>
	";
?>