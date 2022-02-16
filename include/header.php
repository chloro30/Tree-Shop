<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TREE Shop</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/phpjw/Tree-Shop/resource/css/reset.css">
    <link rel="stylesheet" href="/phpjw/Tree-Shop/resource/css/style.css">
    <link rel="stylesheet" href="/phpjw/Tree-Shop/resource/swiper/swiper.css">
</head>
<body>
    <div id="wrap">
        <div class="inner_contents">
            <header>
                <div id="logo">
                    <h1><a href="/phpjw/Tree-Shop/index.php">Tree Shop</a></h1>
                </div>
                <div id="menu">
                    <ul>
                        <li onclick="location.href='/phpjw/Tree-Shop/web/basket/view.php'">장바구니</li>
                        <?php
                            //세션 체크하기
                            session_start();

                            if(isset($_SESSION['userNo'])){
                                $userName = $_SESSION['userName'];
                                $userNo = $_SESSION['userNo'];
                        ?>
                        <li><span><?=$userName?>(<?=$userNo?>)</span> 님</li>
                        <form action="/phpjw/Tree-Shop/web/member/view.php" method="post">
                            <input type="hidden" name="no" value="<?=$userNo?>">
                            <li id="mypageLi"><input type="submit" id="mypageBtn" value="마이페이지"></li>
                        </form>
                        <li onclick="location.href='/phpjw/Tree-Shop/process/login/logout_process.php'">로그아웃</li>
                        <?php
                            }else{
                        ?>
                        <li onclick="location.href='/phpjw/Tree-Shop/web/login/login.php'">로그인</li>
                        <li onclick="location.href='/phpjw/Tree-Shop/web/member/register.php'">회원가입</li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </header>