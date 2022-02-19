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
        <section id="register-wrap">
            <h1><span>회원가입</span></h1>
            <form action="../../process/member/register_process.php" method="post" id="registerForm">
                <table>
                    <tr>
                        <td>이름</td>
                        <td><input type="text" name="userName" id="userName"></td>
                    </tr>
                    <tr>
                        <td>아이디</td>
                        <td><input type="text" name="userId" id="userId"></td>
                    </tr>
                    <tr>
                        <td>비밀번호</td>
                        <td><input type="password" name="userPw" id="userPw" placeholder="비밀번호는 4자로 해주세요"></td>
                    </tr>
                    <tr>
                        <td>비밀번호 확인</td>
                        <td><input type="password" name="userPwCheck" id="userPwCheck" placeholder="비밀번호와 일치하게 해주세요"></td>
                    </tr>
                    <tr>
                        <td>주소</td>
                        <td>
                            <input type="text" name="zipcode" id="zipcode" placeholder="우편번호" readonly>&nbsp;<button type="button" id="zipcodeBtn">우편번호 찾기</button><br>
                            <input type="text" name="roadAddress" id="roadAddress" placeholder="도로명 주소" readonly>&nbsp;
                            <input type="text" name="detailAddress" id="detailAddress" placeholder="상세 주소">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="button" id="registerBtn">회원가입</button>
                            <button type="reset">취소</button>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
        <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js" defer></script>
        <script src="../../resource/js/zipcode.js"></script>
        <script>
            const joinForm = document.querySelector('#registerForm');
            const joinBtn = document.querySelector('#registerBtn');
            const name = document.querySelector('#userName');
            const id = document.querySelector('#userId');
            const pw = document.querySelector('#userPw');
            const pwCh = document.querySelector('#userPwCheck');
            const zipcode = document.querySelector('#zipcode');
            const roadAddress = document.querySelector('#roadAddress');
            const detailAddress = document.querySelector('#detailAddress');

            joinBtn.addEventListener('click',function(e){
                //아이디, 이름, 패스워드, 패스워드 체크의 값이 입력되었는가?
                if((id.value!="") && (name.value!="") && (pw.value!="") && (pwCh.value!="")
                    && (zipcode.value!="") && (roadAddress.value!="")){

                    console.log(zipcode.value);

                    //비밀번호가 4자리인가?
                    if(pw.value.length == 4){
                        //비밀번호와 비밀번호 확인이 같은가?
                        if(pw.value == pwCh.value){
                            joinForm.submit();

                        }else{
                            alert('비밀번호를 확인하세요!');
                        }
                    }else{
                        alert('비밀번호는 4자리로 해주세요');
                    }
                }else{
                    alert('입력칸을 다 채워주세요!');
                }
            });

            //우편번호        
            const zipcodeBtn = document.querySelector('#zipcodeBtn');
            zipcodeBtn.addEventListener('click',DaumZipcode);
        </script>
        <footer>
            <div class="inner_contents">
                <div>
                    <p>
                        (주)Tree_shop<br/>
                        대표이사 : 홍길동, 주소: 서울특별시 종로구<br/>
                        사업자등록번호 : 512-12-12345, 통신판매업신고 : 1234-서울종로구-1234
                    </p>
                    <p>
                        고객센터 1234-1234<br/>
                        01234) 서울특별시 구로구<br/> 
                        Fax : 02-4321-2345 / E-mail : customerservice@treeshop.com
                    </p>
                </div>
                <address>Copyright ⓒ 2021 All rights reserved.</address>
            </div>
        </footer>
    </div>
</body>
</html>