<?
   session_start();
?>
    <meta charset="UTF-8">
<?
  @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 

/*
$name='홍길동'
$hp1='010'
$hp2='1111'
$hp3='2222'
*/

   if(!$name) {  /* !='없으면'*/
     echo("
           <script>
             window.alert('이름을 입력하세요');
             history.go(-1);
           </script>
         ");
         exit;
   }
  //  $hp1은 value값이 이미넘어와있어서 undefined가 아니다

   if(!($hp2 && $hp3)) {
     echo("
           <script>
             window.alert('연락처를 입력하세요');
             history.go(-1);
           </script>
         ");
         exit;
   }


   include "../lib/dbconn.php";

   $sql = "select * from member where name='$name'";  //이름으로 검색
   $result = mysql_query($sql, $connect); //있으면 1, 없으면 null

   $num_match = mysql_num_rows($result);  //1 null

   if(!$num_match) //검색 레코드가 없으면
   {
     echo(" 
           <script>
             window.alert('등록되지 않은 이름 입니다');
             history.go(-1);
           </script>
         ");
    }
    else     //검색 레코드가 있으면  
    {
         $hp = $hp1."-".$hp2."-".$hp3;  // 010-1111-2222
        
		     $row = mysql_fetch_array($result); 
          //$row[id] ,.... $row[level]
         $sql ="select * from member where name='$name' and hp='$hp'";
         $result = mysql_query($sql, $connect);
         $num_match = mysql_num_rows($result); //있으면 1, 없으면 null
     
  /* db에 이미 암호화 된 pass를 다시 암호화해서 기존의 pass로 알아낼수 없다,
  암호화된 pass가 입력된 pass의 암호화와 일치하는가를 확인해야함*/

        if(!$num_match) //이름은 있지만..전화번호가 일치하지 않으면
        {
           echo("
              <script>
                window.alert('등록된 정보가 없습니다');
                history.go(-1);
              </script>
           ");

           exit;
        }
        else  //1이면=이름과 전화번호가 모두 일치 한다면
        {
          //일반변수로 사용해도 가능하다. 로그인을 하지 않았으니 굳이 세션변수로 변환하지 않아도 된다.
           $id = $row[id];
           $name = $row[name];
           $hp = $row[hp];
           $date = $row[regist_day];

           echo "<script>".
            "$('.close').click(function(){
              $('#loadtext').removeClass('on')
            })".
            "</script>";

                       
           echo "<div class='fixed_box'>".
           "<strong>가입정보</strong>".
           "<p>아이디 : $id <br>
           이름 : $name <br>
           연락처: $hp <br>
           가입일자 : $date
           </p> ".
           "<a href='#' class='close'>닫기</a>".
          "</div>"
           
           

           ;
        }
   }          
?>
