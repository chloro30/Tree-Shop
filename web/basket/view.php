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
            // $conn = mysqli_connect('localhost','root','1234','treeshop');
            include '../../config/conn.php';  //DB연결 정보 가져오기

            $sql = "SELECT * FROM basket
                    ORDER BY no DESC;
                ";

            // echo $sql;
            $result = mysqli_query($conn,$sql);

        ?>
        <section id="basket">
            <table>
                <thead>
                    <tr>
                        <th>상품 이미지</th>
                        <th>상품명</th>
                        <th>가격</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total = 0;  //가격 총 합
                        while($row = mysqli_fetch_array($result)){
                            global $total;
                            $total += (int)$row['price'];
                            
                            // 가격 자릿수 , 추가
                            $price = number_format($row['price']);
                            echo "<tr>";
                            echo "<td><a href='../product/view_product.php?no={$row['no']}'><img src=\"../../{$row['imgsrc']}\" width='100px'></a></td>";
                            echo "<td><a href='../product/view_product.php?no={$row['no']}'>{$row['title']}</a></td>";
                            echo "<td>{$price}원</td>";
                            echo "</tr>";
                        }
                        $total_price = number_format($total);
                        
                    ?>
                </tbody>
            </table>
            <div class="total">
                <?php
                    echo "<tr>";
                    echo "<td colSpan='3'>상품가격 {$total_price}원 + 배송비 무료 = 주문금액 {$total_price}원</td>";
                    echo "</tr>";
                ?>
            </div>
        </section>
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