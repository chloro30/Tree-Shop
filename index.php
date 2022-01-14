<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TREE Shop</title>
    <link rel="stylesheet" href="resource/css/reset.css">
    <link rel="stylesheet" href="resource/css/style.css">
    <link rel="stylesheet" href="resource/swiper/swiper.css">
</head>
<body>
<?php
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    $conn = mysqli_connect('localhost','root','1005','treeshop'); //학원 비번 다름
    // $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결
    $sql = "SELECT * FROM product
            ORDER BY no DESC
            LIMIT 8;
           ";
    $result = mysqli_query($conn,$sql);

    function showList(){
        global $result;
        while($row = mysqli_fetch_array($result)){
            // 가격 자릿수 , 추가
            $price = number_format($row['price']);

            echo "<li>";
            echo "<p><a href='web/product/view_product.php?no={$row['no']}'><img src=\"{$row['imgsrc']}\" width='100px'></a></p>";
            echo "<p><a href='web/product/view_product.php?no={$row['no']}'>{$row['title']}</a></p>";
            echo "<p>{$price}원</p>";
            echo "<div>
                    <div><a href='web/product/view_product.php?no={$row['no']}'>상세보기</a></div>
                    <div>장바구니 담기</div>
                  </div>
                  ";
            echo "</li>";
        }
    }
?>
    <div id="wrap">
        <div id="inner_contents">
            <header>
                <div id="logo">
                    <h1><a href="index.php">Tree Shop</a></h1>
                </div>
                <div id="search_div">
                    <input type="text" name="search" id="search">&nbsp;&nbsp;
                    <div id="search_btn">검색</div>
                </div>
                <div id="menu">
                    <ul>
                        <li>장바구니</li>
                        <?php
                            //세션 체크하기
                            session_start();

                            if(isset($_SESSION['userNo'])){
                                $userName = $_SESSION['userName'];
                                $userNo = $_SESSION['userNo'];
                        ?>
                        <li><span><?=$userName?>(<?=$userNo?>)</span> 님</li>
                        <form action="web/member/view.php" method="post">
                            <input type="hidden" name="no" value="<?=$userNo?>">
                            <li id="mypageLi"><input type="submit" id="mypageBtn" value="마이페이지"></li>
                        </form>
                        <li onclick='location.href="process/login/logout_process.php"'>로그아웃</li>
                        <?php
                            }else{
                        ?>
                        <li><a href="web/login/login.php">로그인</a></li>
                        <li><a href="web/member/register.php">회원가입</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </header>
            <section>
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="resource/img/swiper/슬라이드1.jpg" alt="슬라이드1"></div>
                        <div class="swiper-slide"><img src="resource/img/swiper/슬라이드2.jpg" alt="슬라이드2"></div>
                        <div class="swiper-slide"><img src="resource/img/swiper/슬라이드3.jpg" alt="슬라이드3"></div>
                        <div class="swiper-slide"><img src="resource/img/swiper/슬라이드4.jpg" alt="슬라이드4"></div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <!-- Swiper JS -->
                <script src="resource/swiper/swiper.min.js"></script>

                <!-- Initialize Swiper -->
                <script>
                var swiper = new Swiper('.swiper-container', {
                    pagination: '.swiper-pagination',
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    slidesPerView: 1,
                    paginationClickable: true,
                    spaceBetween: 30, //슬라이드 사이 여백
                    loop: true,
                    autoplay: 3000, //재생 속도
                    autoplayDisableOnInteraction: false, //이전, 다음 클릭했을 때 다시 자동 재생하기
                });
                </script>
                <!-- Swiper end -->
            </section>
            <section>
                <div id="pro_list">
                    <ul>
                        <?php showList() ?>
                        <!-- <li>
                            <p><img src="resource/img/달리기.jpg" alt="상품이미지"></p>
                            <p><span>달리기</span></p>
                            <p><span>10,000원</span></p>
                        </li> -->
                    </ul>
                </div>
                <div class="btns">
                    <?php
                        //세션의 아이디가 admin일 때만 등록하기 버튼 생성
                        session_start();
    
                        if(isset($_SESSION['userNo']) && ($_SESSION['userNo']==1)){
                    ?>
                        <button onclick="location.href='web/product/create_product.php'">상품 등록</button>
                    <?php
                        }
                    ?>
                </div>
            </section>
            <footer>
                <address>Copyright ⓒ 2021 All rights reserved.</address>
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
            </footer>
        </div>
    </div>
</body>
</html>