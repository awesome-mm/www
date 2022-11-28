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

