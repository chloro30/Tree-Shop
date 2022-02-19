<?php
    $_GET['no'];
    // echo $_GET['no'];

    //DB연결
    include '../../config/conn.php';  //DB연결 정보 가져오기
    

    //현재 장바구니에 담긴 상품인지 조회
    $sql = "SELECT * FROM basket
            WHERE no = {$_GET['no']};
           ";
    // echo $sql;
    echo "<br/>";
    
    $result2 = mysqli_query($conn,$sql);
    $row2 = mysqli_fetch_array($result2);
    
    if($row2){
?>

        <script>
            alert('이미 장바구니에 담으셨습니다!');
        </script>

<?php
    }else {
        $sql = "SELECT * FROM product
                WHERE no = {$_GET['no']};
           ";
        // echo $sql;

        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($result)){
            
            // basket 테이블에 추가하기
            $sql = "INSERT INTO basket (no, title, price, imgsrc, date)
                    VALUES ('{$row['no']}', '{$row['title']}', {$row['price']}, '{$row['imgsrc']}', now());
                ";
            // echo $sql;
        }
?>
        <script>
            alert('장바구니에 추가되었습니다!');
        </script>
<?php
    }

    $result = mysqli_query($conn,$sql);
    if($result){
        // echo "DB에 저장 성공.<br>";
    }else{
        // echo "DB에 저장 실패.<br>";
    }
?>
<script>
    // 페이지 이동
    location.href = "../../index.php";
</script>
<?php
    //리다이렉션
    // header('Location: ../../index.php');
?>

