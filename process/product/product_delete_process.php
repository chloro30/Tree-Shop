<?php
    $_POST['no']; //post로 넘어오는 상품 번호
    
    //DB연결
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    $conn = mysqli_connect('localhost','root','1234','treeshop'); //학원 비번 다름
    // $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결

    //sql 쿼리 작성
    $sql = "DELETE FROM product
            WHERE no={$_POST['no']};
           ";
    // echo $sql;

    //sql 쿼리 전송
    $result = mysqli_query($conn,$sql);

    //정상적으로 전송 되었다면..
    if($result){
?>
<script>
    //리다이렉션
    location.replace("../../index.php");
    // location.href="../../index.php";
</script>
<?php
    }
?>