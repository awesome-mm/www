<?
    session_start();
    @extract($_GET);
    @extract($_POST);
    @extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://kit.fontawesome.com/f8a0f5a24e.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
    <h1><a href="../index.html"><span class="hidden">로고</span><img src="../images/logox2.png"></a></h1>
    </header>

    
<div id="wrap">
    <form  name="member_form" method="post" action="login.php"> 
    
        <h2>로그인</h2>
        <p>아이디와 패스워드를 입력해주세요</p>
    
        <div id="id_pw_input">
            <ul>
                <li>
                    <label for="id" class="hidden">아이디</label>
                    <input type="text" id="id" name="id" class="login_input" placeholder="아이디" required>
                </li>
                <li>
                    <label for="pass" class="hidden">비밀번호 </label>
                    <input type="password" id="pass" name="pass" class="login_input" placeholder="비밀번호" required>
                </li>
            </ul>						
        </div>

        <ul class="find">
            <li>
            <a href="id_find.php">아이디 찾기</a>
            </li>
            <li>
            <a href="pw_find.php">비밀번호 찾기</a>
            </li>
        </ul>
    
        <div id="login_button">
            <button type="submit">로그인</button>
        </div>

    

    
        <div id="join_button">
            <a href="../member/join.html">회원가입</a>
        </div>
    </form>
    
</div>
</body>
</html>