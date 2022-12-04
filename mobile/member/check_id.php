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

   //$id = 'a';
  
    if(!$id) 
   {
      echo("아이디를 입력하세요.");
      
   } else if(strpos($id, ' ') !== false)
   {
       echo "<span>공백을 포함하지 않은 아이디를 입력하세요.</span>";
      
   } else {
      include "../../lib/dbconn.php";
 
      $sql = "select * from member where id='$id' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);


     
      if ($num_record)
      {
       
         echo "<span style='color:red'>다른 아이디를 사용하세요.</span>";
      }
      else
      {
         echo "<span style='color:green'>사용가능한 아이디입니다.</span>";
      }
    //data라는 매개변수에 echo의 문자열이 return되서 만들어지게 되어있다.
 
      mysql_close();
   }

?>

