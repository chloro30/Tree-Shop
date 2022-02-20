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
            $_GET['no'];
            
            include '../../config/conn.php';  //DB연결 정보 가져오기

            $sql = "SELECT * FROM product
                    WHERE no={$_GET['no']};
                ";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
        ?>
        <section id="product-view">
            <h1>상품 보기</h1>
            <table>
                <tr>
                    <td>상품 번호</td>
                    <td><?=$row['no']?></td>
                </tr>
                <tr>
                    <td>제목</td>
                    <td><?=$row['title']?></td>
                </tr>
                <tr>
                    <td>가격</td>
                    <td><?=number_format($row['price'])?>원</td>
                </tr>
                <tr>
                    <td>별점</td>
                    <td><?=$row['star']?>점</td>
                </tr>
                <tr>
                    <td>작성자</td>
                    <td><?=$row['writer']?></td>
                </tr>
                <tr>
                    <td>등록일</td>
                    <td><?=$row['date']?></td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td>
                        <img src="../../<?=$row['imgsrc']?>" width="500px" alt="게시물_이미지">
                        <br>
                        <?=$row['description']?>
                    </td>
                </tr>
            </table>
            <div id="btns">
                <button onclick="location.href='../../index.php'">목록</button>
                <?php
                    // echo "<button><a href='../../process/basket/add_basket.php?no={$row['no']}'>장바구니 담기</a></button>";
                ?>

                <?php
                    //세션의 아이디가 admin일 때만 수정/삭제 버튼 생성
                    session_start();

                    if(isset($_SESSION['userNo']) && ($_SESSION['userNo']==1)){
                ?>
                    <form action="edit_product.php" method="post">
                        <input type="hidden" name="no" value="<?=$_GET['no']?>">
                        <button>수정하기</button>
                    </form>
                    <form action="../../process/product/product_delete_process.php" method="post" id="proDelForm">
                        <input type="hidden" name="no" value="<?=$_GET['no']?>">
                        <button type="button" id="proDelBtn">삭제하기</button>
                    </form>
                <?php
                    }else{
                        echo "<button><a href='../../process/basket/add_basket.php?no={$row['no']}'>장바구니 담기</a></button>";
                    }
                ?>

            </div>
        </section>
        <script>
            //삭제 확인하기
            const proDelForm = document.querySelector('#proDelForm');
            const proDelBtn = document.querySelector('#proDelBtn');

            proDelBtn.addEventListener('click',function(){
                let yesNo = confirm('정말 삭제하시겠습니까?');
                if(yesNo){ //yes
                    proDelForm.submit();
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