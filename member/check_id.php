<meta charset="utf-8">
<?
   
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);

   //$id = 'a';
  
    if(!$id) 
   {
      echo("아이디를 입력하세요.");
   }
   else
   {
      include "../lib/dbconn.php";
 
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

