<?php include_once '../../include/header.php'; ?>

<?php
    $_GET['no'];
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    $conn = mysqli_connect('localhost','root','1234','treeshop');
    // $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결
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
                <td><?=$row['price']?>원</td>
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
            <form action="edit_product.php" method="post">
                <input type="hidden" name="no" value="<?=$_GET['no']?>">
                <button>수정하기</button>
            </form>
            <form action="../../process/product/product_delete_process.php" method="post" id="proDelForm">
                <input type="hidden" name="no" value="<?=$_GET['no']?>">
                <button type="button" id="proDelBtn">삭제하기</button>
            </form>
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
<?php include_once '../../include/footer.php'; ?>