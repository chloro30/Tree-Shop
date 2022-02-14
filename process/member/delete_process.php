<?php
    // hidden으로 넘어온 값 받기
    $no = $_POST['no'];

    //DB연결
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    // $conn = mysqli_connect('localhost','root','1005','treeshop'); //학원 비번 다름
    $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결


    // 쿼리 작성
    $sql = "DELETE FROM member
             WHERE no = {$no};
            ";

    // 쿼리 전송
    $result = mysqli_query($conn, $sql);

    session_start();

    //세션 삭제하기
    unset($_SESSION['userName']);
    unset($_SESSION['userNo']);
?>
<script>
    alert('탈퇴 되었습니다.');
</script>
<?php
    // 리다이렉션
    header('Location: ../../index.php');
?>