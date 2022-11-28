<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>주성엔지니어링</title>
<?
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);

   if(!$nick) 
   {
      echo("닉네임을 입력하세요.");
   }
   else
   {
      include "../../lib/dbconn.php";
 
      $sql = "select * from member where nick='$nick' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);

      if ($num_record)
      {
       
         echo "<span style='color:red'>다른 닉네임을 사용하세요.</span>";
      }
      else
      {
         echo "<span style='color:green'>사용가능한 닉네입니다.</span>";
      }
		 
      mysql_close();
   }
?>

