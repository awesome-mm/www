<? session_start(); ?>
<meta charset="utf-8">
<?
  @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 
		/* 
	받은 것
	get
	$mode = modify
	$page / $num

	넘기는 것
	post  - form태그에서 modify에서 받은 것
	subject - 제목
	content - text
	
*/

	// post방식으로 write_form.php에서 submit으로  넘어오는 변수
	//  name="html_ok" value="y"  필드명 is_html
	//  name="subject"  필드명 subject
	//  name="content"  필드명 content


	// 글쓰기 버튼 자체가 로그인을 해야 보이기 때문에 지워도 됨
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
	include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

	// mode를 num이 넘어오면 수적하는 것으로 바꿀수 있다

	// 수정 글쓰기
	if ($mode=="modify")
	{
    $subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);

		$sql = "update greet set subject='$subject', content='$content' where num=$num";
	}
	
	// 새 글쓰기
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
		
		// htmlspecialchars = 특수문자를 엔티티로 바꿔준다  5가지만 (",',&,<,>)

		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);
	 //  "(&quot;) '(&#039;) &(&amp;) <(&lt;) >(&gt;)

	 //auto-increment있으면 생략가능한데 is_html이 null값이 될수도 있어서 필드명을 생략할수없다
		$sql = "insert into greet (id, name, nick, subject, content, regist_day, hit, is_html) ";
		$sql .= "values('$userid', '$username', '$usernick', '$subject', '$content', '$regist_day', 0, '$is_html')";
	}

	mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	mysql_close();                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'list.php?page=$page&scale=$scale';
	   </script>
	";
?>

<!-- insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.1' , '공지사항 내용입니다.1 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.2' , '공지사항 내용입니다.2 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.3' , '공지사항 내용입니다.3 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.4' , '공지사항 내용입니다.4 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.5' , '공지사항 내용입니다.5 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.6' , '공지사항 내용입니다.6 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.7' , '공지사항 내용입니다.7 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.8' , '공지사항 내용입니다.8 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.9' , '공지사항 내용입니다.9 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.10' , '공지사항 내용입니다.10 ', '2022-11-19' , 0, '');
insert into greet (id, name , nick , subject , content ,regist_day , hit , is_html) values ('aaa' , '최순실' , '순실이','공지사항 제목입니다.11' , '공지사항 내용입니다.11 ', '2022-11-19' , 0, ''); -->
