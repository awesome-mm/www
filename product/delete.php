<?
   session_start();

   @extract($_GET); 
   @extract($_POST); 
   @extract($_SESSION); 

   include "../lib/dbconn.php";

   $sql = "select * from $table where num = $num";
   $result = mysql_query($sql, $connect);

   $row = mysql_fetch_array($result);

   $copied_name[0] = $row[file_copied_0];
   $copied_name[1] = $row[file_copied_1];
   $copied_name[2] = $row[file_copied_2];

    
// 딜리트할때 레코드만 지우고 이미지를 지우지않으면 파일은 서버에 게속 남아서 데이터를 낭비하게 된다

   for ($i=0; $i<3; $i++)
   {
		if ($copied_name[$i]) //첨부된 파일이 있으면
	   {
			$image_name = "./data/".$copied_name[$i]; //'./data/2022_11_21_10_20_17_0.jpg'
			unlink($image_name); //서버에 있는 파일을 삭제해주는 함수
	   }
   }

   $sql = "delete from $table where num = $num";
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	    location.href = 'list.php?table=$table&page=$page&scale=$scale';
	   </script>
	";
?>

