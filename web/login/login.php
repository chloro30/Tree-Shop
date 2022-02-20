<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TREE Shop</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../resource/css/reset.css">
    <link rel="stylesheet" href="../../resource/css/style.css">
</head>
<body>
    <div id="wrap">
        <header>
            <div class="inner_contents">
                <div id="logo">
                    <h1><a href="../../index.php">Tree Shop</a></h1>
                </div>
                <div id="menu">
                    <ul>
                        <li onclick="location.href='../../web/basket/view.php'">장바구니</li>
                        <?php
                            //세션 체크하기
                            session_start();

                            if(isset($_SESSION['userNo'])){
                                $userName = $_SESSION['userName'];
                                $userNo = $_SESSION['userNo'];
                        ?>
                        <li id="user-name"><span><?=$userName?>(<?=$userNo?>)</span></li>
                        <form action="../../web/member/view.php" method="post">
                            <input type="hidden" name="no" value="<?=$userNo?>">
                            <input type="submit" value="마이페이지" id="mypageBtn">
                        </form>
                        <li onclick="location.href='../../process/login/logout_process.php'">로그아웃</li>
                        <?php
                            }else{
                        ?>
                        <li onclick="location.href='../../web/login/login.php'">로그인</li>
                        <li onclick="location.href='../../web/member/register.php'">회원가입</li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </header>

        <section id="login">
            <h1><span>로그인</span></h1>
            <table>
                <form action="../../process/login/login_process.php" id="loginForm" method="post">
                    <tr>
                        <td>아이디</td>
                        <td><input type="text" name="userId" id="userId" required/></td>                
                    </tr>
                    <tr>
                        <td>비밀번호</td>
                        <td><input type="password" name="userPw" id="userPw" required/></td>
                    </tr>            
                </form>
            </table>
            <div id="loginBtnDiv">
                <button type="button" id="loginBtn">로그인</button>
            </div>
            <div id="register">
                <button onclick="location.href='../member/register.php'">회원가입</button>
                <p>관리자 id: admin, pw: 1234</p>
            </div>
        </section>

        <script>
            const loginForm = document.querySelector('#loginForm');
            const loginBtn = document.querySelector('#loginBtn');
            const userId = document.querySelector('#userId');
            const userPw = document.querySelector('#userPw');

            loginBtn.addEventListener('click',function(){
                if(userId.value!="" && userPw.value!=""){
                    if(userPw.value.length == 4){
                        loginForm.submit();
                    }else{
                        alert('비밀번호는 4자리로 입력해주세요.');
                    }
                }else{
                    alert('아이디와 비밀번호를 입력해주세요.');
                }
            });

        </script>
        <footer>
            <div class="inner_contents">
                <div>
                    <p>
                        (주)Tree_shop<br/>
                        대표이사 : 홍길동&nbsp;&nbsp;주소: 서울특별시 종로구<br/>
                        사업자등록번호 : 512-12-12345&nbsp;&nbsp;통신판매업신고 : 1234-서울종로구-1234
                    </p>
                    <p>
                        고객센터 1234-1234<br/>
                        01234) 서울특별시 구로구<br/> 
                        Fax : 02-4321-2345 / E-mail : customerservice@treeshop.com
                    </p>
                </div>
                <address>Copyright ⓒ 2022 All rights reserved.</address>
            </div>
        </footer>
    </div>
</body>
</html>