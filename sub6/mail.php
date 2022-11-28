<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
 <?

  $name=$_POST['uname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $message=$_POST['message'];

  $to='opokonse123@naver.com';
  $subject = '주성엔지니어링 사이트에서 관지자에게 보낸 메일';
  $msg = "보낸 사람 : $name\n".
          "보낸 사람 메일주소 : $email\n".
          "보낸 사람 전화번호 : $phone\n".
          "내용 : $message\n";

  mail($to ,$subject , $msg , '보낸 사람 메일주소 : '.$email);

  echo "
  <script>
  alert('성공정으로 메일이 전송되었습니다.');
  location.href = '../index.html';
  </script>
  ";

  /*
  echo '이름:'.$name_01.'<br />';
  echo '메일:'.$mail_02.'<br />';
  echo '메일:'.$phone_03.'<br />';
  echo '내용:'.$msg_04.'<br />';
  echo '메일이 성공적으로 전송되었습니다<br />';
  */
 ?>
