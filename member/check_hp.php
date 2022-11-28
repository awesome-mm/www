<meta charset="utf-8">
<?
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);

   //$id = 'a';
   //$regex = /^[0-9]+$/;
   $hp2_check = preg_match( "/^[0-9]/i", $hp2);
   $hp3_check = preg_match( "/^[0-9]/i", $hp3);

   if(!$hp1 && $hp2 && $hp3) 
   {
      echo("휴대전화 번호를 입력해주세요.");

   } else if(strpos($hp2, ' ') !== false || strpos($hp3, ' ') !== false)
   {
       echo "<span>공백을 포함하지 않은 번호를 입력하세요.</span>";
      
   } else if( !($hp2_check) && !($hp3_check))
   {
       echo "<span>숫자만 사용해주세요.</span>";
      
   } else {

       echo "<span style='color:green'>사용가능한 번호입니다.</span>";

    //data라는 매개변수에 echo의 문자열이 return되서 만들어지게 되어있다.
 
   }

?>
