<?php
    session_start();

    //세션 삭제하기
    unset($_SESSION['userName']);
    unset($_SESSION['userNo']);
?>

<script>
    alert('로그아웃 되었습니다.');
    // location.href="../../index.php";
    location.replace("../../index.php");
</script>