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
        <?php

            //회원 번호 받기
            $member_no = $_POST['no'];

            //DB연결
            include '../../config/conn.php';  //DB연결 정보 가져오기
            
            //쿼리작성
            $sql = "SELECT * FROM member
                    WHERE no='{$member_no}';
                    ";
            // echo $sql;

            //쿼리전송
            $result = mysqli_query($conn,$sql);

            //select 결과를 연관배열 형태로 변환
            $row = mysqli_fetch_array($result);
        ?>
        <section id="member-detail">
            <h1>회원 정보</h1>
            <table border="1">
                <tr>
                    <td>번호</td>
                    <td><?= $row['no'] ?></td>
                </tr>
                <tr>
                    <td>아이디</td>
                    <td><?= $row['id'] ?></td>
                </tr>
                <tr>
                    <td>이름</td>
                    <td><?= $row['name'] ?></td>
                </tr>
                <tr>
                    <td>주소</td>
                    <td><?= $row['address'] ?></td>
                </tr>
                <tr>
                    <td>가입날짜</td>
                    <td><?= $row['date'] ?></td>
                </tr>
            </table>
            <div class="btns">
                <form action="edit.php" method="post">
                    <input type="hidden" name="no" value="<?=$_POST['no']?>">
                    <input type="submit" value="수정하기">
                </form>
                <form action="../../process/member/delete_process.php" method="post" id="withdrawalForm">
                    <input type="hidden" name="no" value="<?=$_POST['no']?>">
                    <input type="button" id="withdrawalBtn" value="탈퇴하기">
                </form>
            </div>
        </section>
        <script>
            //탈퇴 확인하기
            const withdrawalForm = document.querySelector('#withdrawalForm');
            const withdrawalBtn = document.querySelector('#withdrawalBtn');

            withdrawalBtn.addEventListener('click',function(){
                let yesNo = confirm('정말 탈퇴하시겠습니까?');
                if(yesNo){ //yes
                    withdrawalForm.submit();
                }
            });
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