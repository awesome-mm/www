<?
   function latest_article($table, $loop, $char_limit ,$char_limit2)    //테이블명, 게시물 개수, 문자개수
   {
		include "dbconn.php";    //디비열결

		$sql = "select * from $table order by num desc limit $loop";  
                                        // $table 테이블에서 num필드를 기준으로 $loop 개수 만큼만  내림차순 정렬 
		$result = mysql_query($sql, $connect); // 검색 쿼리 적용


		while ($row = mysql_fetch_array($result))   //읽어드린 레코드 만큼..
		{
			$num = $row[num];    // 번호를 저장
			$subject = $row[subject];    // 제목을 저장한다
			$len_subject = strlen($row[subject]);  // 제목의 길이를 구한다.

			$content = $row[content];    // 내용을 저장한다
			$len_content = strlen($row[content]);  // 내용의 길이를 구한다.


			if ($len_subject > $char_limit)   //제목의 길이가 지정한 길이보다 크면
			{
				$subject = mb_substr($row[subject], 0, $char_limit, 'utf-8');   // 첫번째 문자부터 $char_limit만큼 잘라낸다.
                                                  //mb_substr 은 입력받은 문자열을 정해진 길이만큼 잘라서 리턴하는데 
                                                  //2byte 문자인 한글에 대해서도 처리가 가능한 함수입니다. 

				$subject = $subject."...";   // 잘라낸 문자열에 ...을 추가한다.
			}
			
			if ($len_content > $char_limit2)   //제목의 길이가 지정한 길이보다 크면
			{
				$content = mb_substr($row[content], 0, $char_limit2, 'utf-8');   // 첫번째 문자부터 $char_limit만큼 잘라낸다.
                                                  //mb_substr 은 입력받은 문자열을 정해진 길이만큼 잘라서 리턴하는데 
                                                  //2byte 문자인 한글에 대해서도 처리가 가능한 함수입니다. 

				$content = $content."...";   // 잘라낸 문자열에 ...을 추가한다.
			}
			$regist_day = substr($row[regist_day], 0, 10);  // 2015-04-29 날짜만 잘라내서 저장한다.

			// if($table=='concert' ){
			// 	$file_copied_0 = $row[file_copied_0];
			// 	if($file_copied_0){
			// 		echo "<img class='cimg' src='./$table/data/$file_copied_0'>";
			// 	}else{
			// 		echo "<img class='cimg' src='./$table/data/default.jpg'>";
			// 	}
			// }

			echo "
					<li>
						<a href='./newsroom/view.php?table=$table&num=$num'>
							<dl>
								<dt>$subject</dt>
								<dd>$content</dd>
							</dl>
							<span class='news_day'>$regist_day</span>
							<div>
								<span class='border_top'></span>
								<span class='border_right'></span>
								<span class='border_bottom'></span>
								<span class='border_left'></span>
							</div>
						</a>
					</li>
			";
		}
		mysql_close();
   }
?>

<!-- <li>
      <a href="#">
        <dl>
          <dt>반디기술학회 20주년 기념식… 황철주 회장,`산학연협력상`수상</dt>
          <dd>한국반도체디스플레이기술학회(반디학회)서울 코엑스 인터컨티넨탈에서창립 20주년 기념식을개최 반도체 디스플레이 기술발전과 상호 협업에 앞장선 산업 공로자에...
          </dd>
        </dl>
        <span class="news_day">2022.06.16</span>
        <div>
          <span class="border_top"></span>
          <span class="border_right"></span>
          <span class="border_bottom"></span>
          <span class="border_left"></span>
        </div>
      </a>
    </li> -->