<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
     $connect = mysql_connect("localhost","opokonse","rlatjdcks12!@");
     $dbconn = mysql_select_db("opokonse", $connect);
 
     $sql = "create table member ( ";
     $sql .= "id    char(15) not null, ";
     $sql .= " pass  char(41) not null,";
     $sql .= "name  char(10) not null,";
     $sql .= "nick  char(10) not null,";
     $sql .= "hp    char(20) not null,";
     $sql .= "email char(80) not null ,";
     $sql .= "regist_day char(20),";
     $sql .= "level int,";
     $sql .= "primary key(id)";   
 
     $result = mysql_query($sql, $connect);
 
    //  if ($result)
    //      echo "데이터베이스 테이블 'stud_score'가 생성되었습니다!";
    //  else
    //      echo "데이터베이스 테이블 생성 에러!!!";
 
     mysql_close();
?>
