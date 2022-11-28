<meta charset="utf-8">
<?
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);

   if(!$pass) 
   {
      echo("비밀번호를 입력하세요.");
   }
   else
   {

      if ($pass != $pass_confirm)
      {
       
         echo "<span style='color:red'>비밀번호가 일치하지 않습니다.</span>";
      }
      else
      {
         echo "<span style='color:green'>비밀번호가 일치합니다.</span>";
      }
		 
   }
?>

