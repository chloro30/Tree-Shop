<?php
    $_POST['no']; //post로 넘어오는 상품 번호
    
    //DB연결
    include '../../config/conn.php';  //DB연결 정보 가져오기

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