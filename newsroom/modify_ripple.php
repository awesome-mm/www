<?
   session_start();
   
      @extract($_GET); 
      @extract($_POST); 
      @extract($_SESSION); 

      include "../lib/dbconn.php";
      
			$ripple_modify1 = htmlspecialchars($ripple_modify);
      $ripple_modify1 = str_replace("'", "&#039;", $ripple_modify1);
      $ripple_content = str_replace("\n", "<br>",  $ripple_content); //리플 내용 엔터


      $sql = "update free_ripple set content ='$ripple_modify1' where num ='$ripple_num'";

      mysql_query($sql, $connect);
      mysql_close();

      echo "
	   <script>
	    location.href = 'view.php?table=$table&num=$num&page=$page&scale=$scale';
	   </script>
	  ";
?>
