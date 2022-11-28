<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>주성엔지니어링</title>
<?
  @extract($_POST);

   $hp = $hp1."-".$hp2."-".$hp3; // 010-0000-0000 형태로 넘기기
   $email = $email1."@".$email2; // bini@naver.com  

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장

   include "../../lib/dbconn.php";       // dconn.php 파일을 불러옴

   //아이디 중복검사를 한번더 해주었다
   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect);
   $exist_id = mysql_num_rows($result);

   $sql2 = "select * from member where nick='$nick'";
   $result2 = mysql_query($sql2, $connect);
   $exist_nick = mysql_num_rows($result2);


   if($exist_id) {
     echo("
           <script>
             window.alert('해당 아이디가 존재합니다.')
             history.go(-1)
           </script>
         ");
         exit;

    }else if($exist_nick){
      echo("
            <script>
              window.alert('해당 닉네임이 존재합니다.')
              history.go(-1)
            </script>
          ");
          exit;
    }
    
   else //아이디 중복이 되지않으면
   {            // 레코드 삽입 명령을 $sql에 입력
	    $sql = "insert into member(id, pass, name, nick, hp, email, regist_day, level) ";
		$sql .= "values('$id', password('$pass'), '$name', '$nick', '$hp', '$email', '$regist_day', 9)";
    //패쓰워드는  password('$pass') 암호화하여 저장한다.
    //레벨은 게시글의 접근권한
		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
   }

   mysql_close();                // DB 연결 끊기
   echo "
	   <script>
      alert('회원가입이 완료되었습니다.')
	    location.href = '../login/login_form.php'; 
	   </script>
	";
  // /location.href = '../index.php'; 로그인페이지로 이동하도록 수정하기
?>

   
