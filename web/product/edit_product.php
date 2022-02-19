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
            $_POST['no'];
        
            //DB연결
            include '../../config/conn.php';  //DB연결 정보 가져오기
            
            $sql = "SELECT * FROM product
                    WHERE no={$_POST['no']};
                    ";
            // echo $sql;

            $result = mysqli_query($conn,$sql);
            // var_dump($result);
            $row = mysqli_fetch_array($result);
            // var_dump($row);
        ?>

        <section id="product-edit">
            <h1>상품 수정하기</h1>
            <form action="../../process/product/product_update_process.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="writer_hidden" value="<?=$row['writer']?>">
                <input type="hidden" name="no" value="<?=$_POST['no']?>">
                <table>
                    <tr>
                        <td>상품 번호</td>
                        <td><?=$row['no']?></td>
                    </tr>
                    <tr>
                        <td>작성자</td>
                        <td><input type="text" name="writer" id="writer" value="<?=$row['writer']?>" disabled></td>
                    </tr>
                    <tr>
                        <td>제목</td>
                        <td><input type="text" name="title" value="<?=$row['title']?>"></td>
                    </tr>
                    <tr>
                        <td>가격</td>
                        <td><input type="number" name="price" value="<?=$row['price']?>"></td>
                    </tr>
                    <tr>
                        <td>별점</td>
                        <td>
                            <select name="star">
                                <option value="0">0</option>
                                <option value="0.5">0.5</option>
                                <option value="1">1</option>
                                <option value="1.5">1.5</option>
                                <option value="2">2</option>
                                <option value="2.5">2.5</option>
                                <option value="3">3</option>
                                <option value="3.5">3.5</option>
                                <option value="4">4</option>
                                <option value="4.5">4.5</option>
                                <option value="5">5</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>이미지 등록</td>
                        <td><input type="file" name="file_img"></td>
                    </tr>
                    <tr>
                        <td>내용</td>
                        <td><textarea name="desc" cols="50" rows="20"><?=$row['description']?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="수정하기">
                            <input type="reset" value="초기화">
                        </td>
                    </tr>
                </table>
            </form>
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