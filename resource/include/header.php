<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TREE Shop</title>
    <!-- CSS -->
    <link rel="stylesheet" href="resource/css/reset.css">
    <link rel="stylesheet" href="resource/css/style.css">
    <link rel="stylesheet" href="resource/swiper/swiper.css">
</head>
<body>
    <div id="wrap">
        <div class="inner_contents">
            <header>
                <div id="logo">
                    <h1><a href="./index.php">Tree Shop</a></h1>
                </div>
                <div id="menu">
                    <ul>
                        <li onclick="location.href='web/basket/view.php'">장바구니</li>
                        <?php
                            //세션 체크하기
                            session_start();

                            if(isset($_SESSION['userNo'])){
                                $userName = $_SESSION['userName'];
                                $userNo = $_SESSION['userNo'];
                        ?>
                        <li id="user-name"><span><?=$userName?>(<?=$userNo?>)</span></li>
                        <form action="web/member/view.php" method="post">
                            <input type="hidden" name="no" value="<?=$userNo?>">
                            <input type="submit" value="마이페이지" id="mypageBtn">
                        </form>
                        <li onclick="location.href='process/login/logout_process.php'">로그아웃</li>
                        <?php
                            }else{
                        ?>
                        <li onclick="location.href='web/login/login.php'">로그인</li>
                        <li onclick="location.href='web/member/register.php'">회원가입</li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </header>