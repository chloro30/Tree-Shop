<?php
    $_GET['no'];
    // echo $_GET['no'];

    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    $conn = mysqli_connect('localhost','root','1005','treeshop'); //학원 비번 다름
    // $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결
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


    $result = mysqli_query($conn,$sql);
    if($result){
        // echo "DB에 저장 성공.<br>";
    }else{
        // echo "DB에 저장 실패.<br>";
    }
?>
<script>
    alert('장바구니에 추가되었습니다!');
    // 페이지 이동
    location.href = "../../index.php";
</script>
<?php
    //리다이렉션
    // header('Location: ../../index.php');
?>

